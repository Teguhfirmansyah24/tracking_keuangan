<x-app-layout>
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit Akun</h2>
            <p class="text-gray-500 text-sm">Ubah detail untuk akun: <strong>{{ $akun->nama_akun }}</strong></p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <form action="{{ route('akun.update', $akun->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Akun</label>
                        <input type="text" name="nama_akun" value="{{ $akun->nama_akun }}"
                            class="mt-1 block w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Akun</label>
                        <select name="jenis"
                            class="mt-1 block w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500">
                            <option value="tunai" {{ $akun->jenis == 'tunai' ? 'selected' : '' }}>Tunai</option>
                            <option value="bank" {{ $akun->jenis == 'bank' ? 'selected' : '' }}>Bank</option>
                            <option value="wallet" {{ $akun->jenis == 'wallet' ? 'selected' : '' }}>E-Wallet</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Saldo Awal</label>
                        <div class="relative mt-1">
                            <span
                                class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 font-bold">Rp</span>
                            <input type="number" name="saldo_awal" value="{{ (int) $akun->saldo_awal }}"
                                class="pl-10 block w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex gap-3">
                    <button type="submit"
                        class="flex-1 bg-indigo-600 text-white py-3 rounded-xl font-bold hover:bg-indigo-700 transition">
                        Update Akun
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
