<?php

namespace App\Http\Controllers\Member;

use App\Models\Transaksi;
use App\Models\AkunKeuangan;
use App\Models\KategoriKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['akun', 'kategori'])
            ->where('user_id', Auth::id())
            ->orderBy('tanggal', 'desc')
            ->paginate(15);

        return view('member.transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $userId = Auth::id();

        $akuns = AkunKeuangan::where('user_id', $userId)->get();
        $kategoris = KategoriKeuangan::where('user_id', $userId)
            ->orWhereNull('user_id')
            ->get();

        return view('member.transaksi.create', compact('akuns', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori_keuangan_id' => 'required|exists:kategori_keuangans,id',
            'akun_keuangan_id' => 'required|exists:akun_keuangans,id',
            'jumlah' => 'required|numeric|min:1',
            'keterangan' => 'nullable|string|max:255',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $userId = Auth::id();

                $kategori = KategoriKeuangan::findOrFail($request->kategori_keuangan_id);
                $akun = AkunKeuangan::findOrFail($request->akun_keuangan_id);

                // VALIDASI SALDO
                if ($kategori->tipe === 'pengeluaran' && $request->jumlah > $akun->saldo_awal) {
                    throw new \Exception('Saldo tidak mencukupi');
                }

                Transaksi::create([
                    'tanggal' => $request->tanggal,
                    'kategori_keuangan_id' => $request->kategori_keuangan_id,
                    'akun_keuangan_id' => $request->akun_keuangan_id,
                    'user_id' => $userId,
                    'jumlah' => $request->jumlah,
                    'keterangan' => $request->keterangan,
                ]);

                if ($kategori->tipe === 'pemasukan') {
                    $akun->increment('saldo_awal', $request->jumlah);
                } else {
                    $akun->decrement('saldo_awal', $request->jumlah);
                }
            });
        } catch (\Exception $e) {
            return back()
                ->withErrors(['jumlah' => $e->getMessage()])
                ->withInput();
        }

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil disimpan');
    }

    public function edit(Transaksi $transaksi)
    {
        if ($transaksi->user_id !== Auth::id()) {
            abort(403);
        }

        $userId = Auth::id();

        $akuns = AkunKeuangan::where('user_id', $userId)->get();
        $kategoris = KategoriKeuangan::where('user_id', $userId)
            ->orWhereNull('user_id')
            ->get();

        return view('member.transaksi.edit', compact('transaksi', 'akuns', 'kategoris'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        if ($transaksi->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'tanggal' => 'required|date',
            'kategori_keuangan_id' => 'required|exists:kategori_keuangans,id',
            'akun_keuangan_id' => 'required|exists:akun_keuangans,id',
            'jumlah' => 'required|numeric|min:1',
        ]);

        try {
            DB::transaction(function () use ($request, $transaksi) {
                // REVERT SALDO LAMA
                $akunLama = AkunKeuangan::findOrFail($transaksi->akun_keuangan_id);
                $katLama = KategoriKeuangan::findOrFail($transaksi->kategori_keuangan_id);

                if ($katLama->tipe === 'pemasukan') {
                    $akunLama->decrement('saldo_awal', $transaksi->jumlah);
                } else {
                    $akunLama->increment('saldo_awal', $transaksi->jumlah);
                }

                // VALIDASI SALDO BARU
                $akunBaru = AkunKeuangan::findOrFail($request->akun_keuangan_id);
                $katBaru = KategoriKeuangan::findOrFail($request->kategori_keuangan_id);

                if ($katBaru->tipe === 'pengeluaran' && $request->jumlah > $akunBaru->saldo_awal) {
                    throw new \Exception('Saldo tidak mencukupi untuk perubahan transaksi');
                }

                // UPDATE TRANSAKSI
                $transaksi->update([
                    'tanggal' => $request->tanggal,
                    'kategori_keuangan_id' => $request->kategori_keuangan_id,
                    'akun_keuangan_id' => $request->akun_keuangan_id,
                    'jumlah' => $request->jumlah,
                    'keterangan' => $request->keterangan,
                ]);

                // APPLY SALDO BARU
                if ($katBaru->tipe === 'pemasukan') {
                    $akunBaru->increment('saldo_awal', $request->jumlah);
                } else {
                    $akunBaru->decrement('saldo_awal', $request->jumlah);
                }
            });
        } catch (\Exception $e) {
            return back()
                ->withErrors(['jumlah' => $e->getMessage()])
                ->withInput();
        }

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy(Transaksi $transaksi)
    {
        if ($transaksi->user_id !== Auth::id()) {
            abort(403);
        }

        DB::transaction(function () use ($transaksi) {
            $akun = AkunKeuangan::findOrFail($transaksi->akun_keuangan_id);
            $kategori = KategoriKeuangan::findOrFail($transaksi->kategori_keuangan_id);

            if ($kategori->tipe === 'pemasukan') {
                $akun->decrement('saldo_awal', $transaksi->jumlah);
            } else {
                $akun->increment('saldo_awal', $transaksi->jumlah);
            }

            $transaksi->delete();
        });

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }
}
