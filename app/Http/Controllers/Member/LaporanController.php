<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\KategoriKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        // Default ke bulan ini jika tidak ada filter
        $bulan = $request->get('bulan', date('m'));
        $tahun = $request->get('tahun', date('Y'));

        // 1. Ambil semua transaksi berdasarkan filter
        $query = Transaksi::with(['kategori', 'akun'])
            ->where('user_id', $userId)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun);

        $transaksis = $query->orderBy('tanggal', 'desc')->get();

        // 2. Hitung Ringkasan
        $totalMasuk = 0;
        $totalKeluar = 0;

        foreach ($transaksis as $trx) {
            if ($trx->kategori->tipe == 'pemasukan') {
                $totalMasuk += $trx->jumlah;
            } else {
                $totalKeluar += $trx->jumlah;
            }
        }

        // 3. Kelompokkan per Kategori (untuk Chart/Tabel Distribusi)
        $laporanPerKategori = Transaksi::join('kategori_keuangans', 'transaksis.kategori_keuangan_id', '=', 'kategori_keuangans.id')
            ->selectRaw('kategori_keuangans.nama, SUM(transaksis.jumlah) as total, kategori_keuangans.tipe')
            ->where('transaksis.user_id', $userId)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->groupBy('kategori_keuangans.nama', 'kategori_keuangans.tipe')
            ->get();

        return view('member.laporan.index', compact(
            'transaksis',
            'totalMasuk',
            'totalKeluar',
            'laporanPerKategori',
            'bulan',
            'tahun'
        ));
    }

    public function exportExcel(Request $request)
    {
        $bulan = $request->get('bulan', date('m'));
        $tahun = $request->get('tahun', date('Y'));
        $nama_file = 'laporan_keuangan_' . $bulan . '_' . $tahun . '.xlsx';

        return Excel::download(new TransaksiExport($bulan, $tahun, Auth::id()), $nama_file);
    }

    public function exportPdf(Request $request)
    {
        $bulan = $request->get('bulan', date('m'));
        $tahun = $request->get('tahun', date('Y'));

        $transaksis = Transaksi::with(['kategori', 'akun'])
            ->where('user_id', Auth::id())
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->get();

        $pdf = Pdf::loadView('member.laporan.pdf', compact('transaksis', 'bulan', 'tahun'));
        return $pdf->download('laporan_keuangan.pdf');
    }
}
