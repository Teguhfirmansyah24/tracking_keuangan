<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $setting = DB::table('system_settings')->first();

        // fallback kalau tabel kosong
        if (! $setting) {
            $setting = (object) [
                'maintenance_mode' => false
            ];
        }

        // Total member
        $totalUser = User::where('role', 'member')->count();

        // Statistic Transaksi global
        $statGlobal = Transaksi::join('kategori_keuangans', 'transaksis.kategori_keuangan_id', '=', 'kategori_keuangans.id')
            ->selectRaw("
                COALESCE(SUM(CASE WHEN kategori_keuangans.tipe = 'pemasukan' THEN transaksis.jumlah END), 0) as total_masuk,
                COALESCE(SUM(CASE WHEN kategori_keuangans.tipe = 'pengeluaran' THEN transaksis.jumlah END), 0) as total_keluar
            ")
            ->first();

        // Net flow
        $netFlow = $statGlobal->total_masuk - $statGlobal->total_keluar;

        // User baru
        $recentUsers = User::where('role', 'member')
            ->latest()
            ->take(5)
            ->get();

        // Statistic untuk chart
        $statsTransaksi = Transaksi::join('kategori_keuangans', 'transaksis.kategori_keuangan_id', '=', 'kategori_keuangans.id')
            ->select(
                'kategori_keuangans.tipe',
                DB::raw('SUM(transaksis.jumlah) as total')
            )
            ->groupBy('kategori_keuangans.tipe')
            ->get();

        return view('admin.dashboard', compact(
            'setting',
            'totalUser',
            'statGlobal',
            'netFlow',
            'recentUsers',
            'statsTransaksi'
        ));
    }
}
