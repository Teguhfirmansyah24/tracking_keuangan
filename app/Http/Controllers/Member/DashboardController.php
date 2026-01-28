<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\AkunKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $now = Carbon::now();
        $saldoSekarang = AkunKeuangan::where('user_id', $userId)->sum('saldo_awal');

        // 1. Statistik Bulan Ini
        $statsBulanIni = Transaksi::where('transaksis.user_id', $userId)
            ->join('kategori_keuangans', 'transaksis.kategori_keuangan_id', '=', 'kategori_keuangans.id')
            ->whereMonth('tanggal', $now->month)
            ->whereYear('tanggal', $now->year)
            ->selectRaw("
                SUM(CASE WHEN kategori_keuangans.tipe = 'pemasukan' THEN jumlah ELSE 0 END) as masuk,
                SUM(CASE WHEN kategori_keuangans.tipe = 'pengeluaran' THEN jumlah ELSE 0 END) as keluar
            ")
            ->first();

        // 2. Data Akun Keuangan (Widget Saldo per Tempat)
        $daftarAkun = AkunKeuangan::where('user_id', $userId)->get();

        // 3. Riwayat Transaksi Terbaru
        $transaksiTerbaru = Transaksi::with(['kategori', 'akun'])
            ->where('user_id', $userId)
            ->orderBy('tanggal', 'desc')
            ->latest()
            ->take(5)
            ->get();

        return view('member.dashboard', compact(
            'saldoSekarang',
            'statsBulanIni',
            'daftarAkun',
            'transaksiTerbaru'
        ));
    }
}
