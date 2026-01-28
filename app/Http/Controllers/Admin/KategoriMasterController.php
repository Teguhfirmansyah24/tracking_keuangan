<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKeuangan;
use Illuminate\Http\Request;

class KategoriMasterController extends Controller
{
    /**
     * Tampilkan daftar kategori master
     */
    public function index()
    {
        $categories = KategoriKeuangan::whereNull('user_id')
            ->orderBy('tipe')
            ->orderBy('nama')
            ->get();

        return view('admin.kategori-master.index', compact('categories'));
    }

    /**
     * Form tambah kategori master
     */
    public function create()
    {
        return view('admin.kategori-master.create');
    }

    /**
     * Simpan kategori master baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tipe' => 'required|in:pemasukan,pengeluaran',
        ]);

        KategoriKeuangan::create([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'user_id' => null, // ini kunci master category
        ]);

        return redirect()
            ->route('admin.kategori-master.index')
            ->with('success', 'Kategori master berhasil ditambahkan');
    }

    /**
     * Form edit kategori master
     */
    public function edit(KategoriKeuangan $kategori_master)
    {
        // proteksi keras: admin hanya boleh edit master
        if ($kategori_master->user_id !== null) {
            abort(403);
        }

        return view('admin.kategori-master.edit', compact('kategori_master'));
    }

    /**
     * Update kategori master
     */
    public function update(Request $request, KategoriKeuangan $kategori_master)
    {
        if ($kategori_master->user_id !== null) {
            abort(403);
        }

        $request->validate([
            'nama' => 'required|string|max:100',
            'tipe' => 'required|in:pemasukan,pengeluaran',
        ]);

        $kategori_master->update([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
        ]);

        return redirect()
            ->route('admin.kategori-master.index')
            ->with('success', 'Kategori master berhasil diperbarui');
    }

    /**
     * Hapus kategori master
     */
    public function destroy(KategoriKeuangan $kategori)
    {
        if ($kategori->user_id !== null) {
            abort(403);
        }

        $kategori->delete();

        return back()->with('success', 'Kategori master berhasil dihapus');
    }
}
