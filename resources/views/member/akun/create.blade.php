<x-app-layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Tambah Akun Baru</h2>
            <p class="text-gray-500 text-sm">Masukkan detail dompet atau rekening bank baru Anda.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <form action="{{ route('akun.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Akun</label>
                        <input type="text" name="nama_akun" placeholder="Contoh: Dompet Utama / Bank BCA"
                            class="mt-1 block w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Akun</label>
                        <select name="jenis"
                            class="mt-1 block w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">
                            <option value="tunai">Tunai</option>
                            <option value="bank">Bank</option>
                            <option value="wallet">E-Wallet</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Saldo Awal</label>
                        <div class="relative mt-1">
                            <span
                                class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 font-bold">Rp</span>
                            <input type="number" name="saldo_awal" value="0"
                                class="pl-10 block w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex gap-3">
                    <button type="submit"
                        class="flex-1 bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition">
                        Simpan Akun
                    </button>
                    <a href="{{ route('akun.index') }}"
                        class="flex-1 bg-gray-100 text-gray-600 py-3 rounded-xl font-bold text-center hover:bg-gray-200 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
