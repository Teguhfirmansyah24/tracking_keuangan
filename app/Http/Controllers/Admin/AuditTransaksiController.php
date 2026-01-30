<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class AuditTransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with(['user', 'kategori', 'akun'])
            ->orderByDesc('tanggal');

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('tipe')) {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('tipe', $request->tipe);
            });
        }

        if ($request->export === 'excel') {
            $data = $query->get();

            return response()->streamDownload(function () use ($data) {
                $output = fopen('php://output', 'w');

                fputcsv($output, [
                    'Tanggal',
                    'User',
                    'Kategori',
                    'Akun',
                    'Jumlah',
                    'Keterangan'
                ]);

                foreach ($data as $trx) {
                    fputcsv($output, [
                        $trx->tanggal->format('Y-m-d'),
                        $trx->user->name,
                        $trx->kategori->nama,
                        $trx->akun->nama,
                        $trx->jumlah,
                        $trx->keterangan
                    ]);
                }

                fclose($output);
            }, 'audit-transaksi.csv');
        }

        $transaksis = $query->paginate(20);
        $users = User::orderBy('name')->get();

        return view('admin.audit.transaksi.index', compact('transaksis', 'users'));
    }
}
