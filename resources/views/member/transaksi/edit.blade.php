<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('transaksi.index') }}"
                class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1 mb-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali
            </a>
            <h2 class="text-2xl font-bold text-gray-800">Edit Transaksi</h2>
            <p class="text-gray-500 text-sm">Perubahan data akan otomatis menyesuaikan saldo akun terkait.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ $transaksi->tanggal }}"
                            class="mt-1 block w-full rounded-xl border-gray-200 focus:ring-blue-500 focus:border-blue-500">
                        @error('tanggal')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Nominal (Rp)</label>
                        <input type="number" name="jumlah" value="{{ (int) $transaksi->jumlah }}"
                            class="mt-1 block w-full rounded-xl border-gray-200 focus:ring-blue-500 focus:border-blue-500"
                            required>
                        @error('jumlah')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Akun/Dompet</label>
                        <select name="akun_keuangan_id"
                            class="mt-1 block w-full rounded-xl border-gray-200 focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($akuns as $akun)
                                <option value="{{ $akun->id }}"
                                    {{ $transaksi->akun_keuangan_id == $akun->id ? 'selected' : '' }}>
                                    {{ $akun->nama_akun }} (Saldo: Rp
                                    {{ number_format($akun->saldo_awal, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select name="kategori_keuangan_id"
                            class="mt-1 block w-full rounded-xl border-gray-200 focus:ring-blue-500 focus:border-blue-500">
                            @foreach ($kategoris as $kat)
                                <option value="{{ $kat->id }}"
                                    {{ $transaksi->kategori_keuangan_id == $kat->id ? 'selected' : '' }}>
                                    [{{ strtoupper($kat->tipe) }}] {{ $kat->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Keterangan (Opsional)</label>
                        <textarea name="keterangan" rows="3"
                            class="mt-1 block w-full rounded-xl border-gray-200 focus:ring-blue-500 focus:border-blue-500">{{ $transaksi->keterangan }}</textarea>
                    </div>
                </div>

                <div class="mt-6 p-4 bg-amber-50 rounded-xl border border-amber-100 flex gap-3">
                    <svg class="w-5 h-5 text-amber-500 shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-xs text-amber-700">
                        Sistem akan secara otomatis menghitung ulang saldo akun jika Anda mengubah nominal, jenis
                        kategori, atau memindahkan transaksi ke akun lain.
                    </p>
                </div>

                <div class="mt-8 flex gap-4">
                    <button type="submit"
                        class="flex-1 bg-indigo-600 text-white py-3 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                        Update Transaksi
                    </button>
                    <a href="{{ route('transaksi.index') }}"
                        class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-xl font-bold text-center hover:bg-gray-200 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
