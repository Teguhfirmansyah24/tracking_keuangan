<x-app-layout>
    <div class="space-y-6">
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
            <form action="{{ route('laporan.index') }}" method="GET" class="flex flex-wrap items-end gap-4">
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase">Bulan</label>
                    <select name="bulan" class="block w-full mt-1 rounded-xl border-gray-200 text-sm">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label class="text-xs font-bold text-gray-400 uppercase">Tahun</label>
                    <select name="tahun" class="block w-full mt-1 rounded-xl border-gray-200 text-sm">
                        @for ($i = date('Y'); $i >= date('Y') - 5; $i--)
                            <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>{{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-xl font-bold hover:bg-blue-700 transition">
                    Filter
                </button>
                <div class="flex gap-2">
                    <a href="{{ route('member.laporan.excel', request()->all()) }}"
                        class="px-6 py-2 bg-green-600 text-white rounded-xl font-bold hover:bg-green-700 transition">
                        Excel
                    </a>
                    <a href="{{ route('member.laporan.pdf', request()->all()) }}"
                        class="px-6 py-2 bg-red-600 text-white rounded-xl font-bold hover:bg-red-700 transition">
                        PDF
                    </a>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl border-l-4 border-green-500 shadow-sm">
                <p class="text-gray-500 text-xs font-bold uppercase">Total Pemasukan</p>
                <h3 class="text-2xl font-bold text-green-600">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</h3>
            </div>
            <div class="bg-white p-6 rounded-2xl border-l-4 border-red-500 shadow-sm">
                <p class="text-gray-500 text-xs font-bold uppercase">Total Pengeluaran</p>
                <h3 class="text-2xl font-bold text-red-600">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</h3>
            </div>
            <div class="bg-white p-6 rounded-2xl border-l-4 border-blue-500 shadow-sm">
                <p class="text-gray-500 text-xs font-bold uppercase">Selisih (Net)</p>
                <h3 class="text-2xl font-bold text-gray-800">Rp
                    {{ number_format($totalMasuk - $totalKeluar, 0, ',', '.') }}</h3>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h4 class="font-bold text-gray-800 mb-4">Pengeluaran per Kategori</h4>
                <div class="space-y-4">
                    @forelse($laporanPerKategori->where('tipe', 'pengeluaran') as $kat)
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">{{ $kat->nama }}</span>
                                <span class="font-bold">Rp {{ number_format($kat->total, 0, ',', '.') }}</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-red-500 h-2 rounded-full"
                                    style="width: {{ $totalKeluar > 0 ? ($kat->total / $totalKeluar) * 100 : 0 }}%">
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-400 text-center py-4 text-sm italic">Tidak ada data pengeluaran.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h4 class="font-bold text-gray-800 mb-4">Transaksi Terakhir</h4>
                <div class="overflow-y-auto max-h-[300px]">
                    <table class="w-full text-sm">
                        <tbody class="divide-y divide-gray-50">
                            @foreach ($transaksis->take(10) as $trx)
                                <tr>
                                    <td class="py-3 text-gray-500">{{ date('d/m', strtotime($trx->tanggal)) }}</td>
                                    <td class="py-3 font-medium">{{ $trx->kategori->nama }}</td>
                                    <td
                                        class="py-3 text-right font-bold {{ $trx->kategori->tipe == 'pemasukan' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ number_format($trx->jumlah, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
