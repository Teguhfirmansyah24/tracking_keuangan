<x-app-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Halo, {{ Auth::user()->name }}!</h2>
            <p class="text-gray-500 text-sm">Berikut adalah ringkasan keuangan Anda hari ini.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 p-6 rounded-2xl shadow-sm text-white">
                <p class="text-blue-100 text-sm font-medium">Total Saldo Saat Ini</p>
                <h3 class="text-3xl font-bold mt-1">Rp {{ number_format($saldoSekarang, 0, ',', '.') }}</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-green-100 rounded-lg text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-sm font-medium">Pemasukan (Bulan Ini)</p>
                </div>
                <h3 class="text-2xl font-bold mt-3 text-gray-800">Rp
                    {{ number_format($statsBulanIni->masuk ?? 0, 0, ',', '.') }}</h3>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-red-100 rounded-lg text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-sm font-medium">Pengeluaran (Bulan Ini)</p>
                </div>
                <h3 class="text-2xl font-bold mt-3 text-gray-800">Rp
                    {{ number_format($statsBulanIni->keluar ?? 0, 0, ',', '.') }}</h3>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-1 space-y-4">
                <h4 class="font-bold text-gray-700">Dompet & Bank</h4>
                @foreach ($daftarAkun as $akun)
                    <div
                        class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $akun->nama_akun }}</p>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">{{ $akun->jenis }}</p>
                        </div>
                        <span class="text-sm font-bold text-gray-600 italic">Terdaftar</span>
                    </div>
                @endforeach
            </div>

            <div class="lg:col-span-2 space-y-4">
                <div class="flex justify-between items-center">
                    <h4 class="font-bold text-gray-700">Transaksi Terakhir</h4>
                    <a href="{{ route('transaksi.index') }}"
                        class="text-blue-600 text-xs font-semibold hover:underline">Lihat Semua</a>
                </div>
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50 text-gray-400 text-xs uppercase">
                            <tr>
                                <th class="px-6 py-3 font-medium">Tanggal</th>
                                <th class="px-6 py-3 font-medium">Kategori</th>
                                <th class="px-6 py-3 font-medium text-right">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($transaksiTerbaru as $trx)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ \Carbon\Carbon::parse($trx->tanggal)->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="text-sm font-medium text-gray-800">{{ $trx->kategori->nama }}</span>
                                        <p class="text-xs text-gray-400">{{ $trx->keterangan ?? '-' }}</p>
                                    </td>
                                    <td
                                        class="px-6 py-4 text-right font-bold {{ $trx->kategori->tipe == 'pemasukan' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $trx->kategori->tipe == 'pemasukan' ? '+' : '-' }}
                                        {{ number_format($trx->jumlah, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-10 text-center text-gray-400 text-sm">Belum ada
                                        transaksi bulan ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
