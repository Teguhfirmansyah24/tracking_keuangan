<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Catat Transaksi</h2>
            <p class="text-gray-500 text-sm">Masukkan detail pengeluaran atau pemasukan baru Anda.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}"
                            class="mt-1 block w-full rounded-xl border-gray-200 focus:ring-blue-500">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Nominal (Rp)</label>
                        <input type="number" name="jumlah" placeholder="0"
                            class="mt-1 block w-full rounded-xl border-gray-200 focus:ring-blue-500" required>
                        @error('jumlah')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pilih Akun/Dompet</label>
                        <select name="akun_keuangan_id" class="mt-1 block w-full rounded-xl border-gray-200">
                            @foreach ($akuns as $akun)
                                <option value="{{ $akun->id }}">{{ $akun->nama_akun }} ({{ $akun->jenis }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select name="kategori_keuangan_id" class="mt-1 block w-full rounded-xl border-gray-200">
                            @foreach ($kategoris as $kat)
                                <option value="{{ $kat->id }}">[{{ strtoupper($kat->tipe) }}] {{ $kat->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Keterangan (Opsional)</label>
                        <textarea name="keterangan" rows="3" class="mt-1 block w-full rounded-xl border-gray-200">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex gap-4">
                    <button type="submit"
                        class="flex-1 bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition">Simpan
                        Transaksi</button>
                    <a href="{{ route('transaksi.index') }}"
                        class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-xl font-bold text-center hover:bg-gray-200 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
