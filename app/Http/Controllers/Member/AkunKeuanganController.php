<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\AkunKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunKeuanganController extends Controller
{
    public function index()
    {
        $akuns = AkunKeuangan::where('user_id', Auth::id())->withCount('transaksi')->latest()->get();
        return view('member.akun.index', compact('akuns'));
    }

    public function create()
    {
        return view('member.akun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_akun' => 'required|string|max:255',
            'jenis' => 'required|in:tunai,bank,wallet',
            'saldo_awal' => 'required|numeric|min:0',
        ]);

        AkunKeuangan::create([
            'nama_akun' => $request->nama_akun,
            'jenis' => $request->jenis,
            'saldo_awal' => $request->saldo_awal,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('akun.index')->with('success', 'Akun berhasil ditambahkan!');
    }

    public function show(AkunKeuangan $akun)
    {
        // Proteksi: Pastikan akun milik user yang login
        if ($akun->user_id !== Auth::id()) {
            abort(403);
        }

        // Ambil transaksi khusus akun ini, diurutkan dari yang terbaru
        $transaksis = $akun->transaksi()
            ->with('kategori')
            ->orderBy('tanggal', 'desc')
            ->paginate(10); // Gunakan paginate agar tidak berat jika data banyak

        return view('member.akun.show', compact('akun', 'transaksis'));
    }

    public function edit(AkunKeuangan $akun)
    {
        // Pastikan hanya pemilik yang bisa edit
        if ($akun->user_id !== Auth::id()) {
            abort(403);
        }
        return view('member.akun.edit', compact('akun'));
    }

    public function update(Request $request, AkunKeuangan $akun)
    {
        if ($akun->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nama_akun' => 'required|string|max:255',
            'jenis' => 'required|in:tunai,bank,wallet',
            'saldo_awal' => 'required|numeric|min:0',
        ]);

        $akun->update($request->only(['nama_akun', 'jenis', 'saldo_awal']));

        return redirect()->route('akun.index')->with('success', 'Akun berhasil diperbarui!');
    }

    public function destroy(AkunKeuangan $akun)
    {
        if ($akun->user_id !== Auth::id()) {
            abort(403);
        }

        $akun->delete();
        return redirect()->route('member.akun.index')->with('success', 'Akun berhasil dihapus!');
    }
}
