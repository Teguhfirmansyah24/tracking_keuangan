<x-app-layout>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('akun.index') }}"
                    class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali ke Daftar Akun
                </a>
                <h2 class="text-2xl font-bold text-gray-800 mt-2">{{ $akun->nama_akun }}</h2>
                <p class="text-gray-500 text-sm uppercase tracking-widest">{{ $akun->jenis }}</p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('akun.edit', $akun->id) }}"
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-200 transition">Edit
                    Akun</a>
            </div>
        </div>

        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <p class="text-gray-400 text-sm font-medium uppercase">Saldo Anda</p>
                <h3 class="text-3xl font-bold text-gray-800">Rp {{ number_format($akun->saldo_awal, 0, ',', '.') }}</h3>
            </div>
            <div class="text-right">
                <p class="text-gray-400 text-sm font-medium uppercase">Total Transaksi</p>
                <h3 class="text-3xl font-bold text-blue-600">{{ $transaksis->total() }}</h3>
            </div>
        </div>

        <div class="space-y-4">
            <h4 class="font-bold text-gray-700 italic">Riwayat Mutasi Akun</h4>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 text-gray-400 text-xs uppercase">
                        <tr>
                            <th class="px-6 py-3 font-medium">Tanggal</th>
                            <th class="px-6 py-3 font-medium">Kategori & Keterangan</th>
                            <th class="px-6 py-3 font-medium text-right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($transaksis as $trx)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($trx->tanggal)->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-bold text-gray-800">{{ $trx->kategori->nama }}</span>
                                    <p class="text-xs text-gray-400">{{ $trx->keterangan ?? '-' }}</p>
                                </td>
                                <td
                                    class="px-6 py-4 text-right font-bold {{ $trx->kategori->tipe == 'pemasukan' ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $trx->kategori->tipe == 'pemasukan' ? '+' : '-' }} Rp
                                    {{ number_format($trx->jumlah, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-10 text-center text-gray-400 text-sm">Belum ada
                                    aktivitas transaksi di akun ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $transaksis->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
