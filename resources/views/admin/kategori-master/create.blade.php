<x-admin-layout>
    <div class="p-8 max-w-2xl">
        <div class="mb-8">
            <nav class="flex text-slate-400 text-xs mb-2 uppercase tracking-widest font-bold">
                <a href="{{ route('admin.kategori-master.index') }}"
                    class="hover:text-indigo-600 transition-colors">Kategori Master</a>
                <span class="mx-2">/</span>
                <span class="text-slate-600">Tambah Baru</span>
            </nav>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight uppercase">
                Buat Kategori Baru <span class="text-indigo-600">.</span>
            </h1>
            <p class="text-slate-500 text-sm">Definisikan kategori standar baru yang akan langsung tersedia untuk semua
                member.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-8">
                <form method="POST" action="{{ route('admin.kategori-master.store') }}" class="space-y-6">
                    @csrf

                    <div class="p-4 bg-indigo-50/50 rounded-xl border border-indigo-100 flex items-start gap-3 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500 mt-0.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-[11px] text-indigo-700 font-bold leading-relaxed uppercase tracking-tight">
                            Kategori yang Anda buat di sini akan muncul sebagai pilihan default saat user baru mendaftar
                            atau mengatur keuangan mereka.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-500 uppercase tracking-wider mb-2 ml-1">Nama
                                Kategori</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" required
                                class="w-full px-4 py-3 rounded-xl text-sm font-semibold focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all @error('nama') border-red-400 @enderror"
                                placeholder="Misal: Investasi, Hobi, Bonus...">
                            @error('nama')
                                <p class="mt-1 text-xs text-red-500 font-bold ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-500 uppercase tracking-wider mb-2 ml-1">Tipe
                                Transaksi</label>
                            <div class="relative">
                                <select name="tipe" required
                                    class="w-full px-4 py-3 rounded-xl text-sm font-bold text-slate-700 appearance-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all @error('tipe') border-red-400 @enderror">
                                    <option value="" disabled selected>Pilih Tipe Transaksi...</option>
                                    <option value="pemasukan" {{ old('tipe') === 'pemasukan' ? 'selected' : '' }}>🟢
                                        PEMASUKAN (Income)</option>
                                    <option value="pengeluaran" {{ old('tipe') === 'pengeluaran' ? 'selected' : '' }}>🔴
                                        PENGELUARAN (Expense)</option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('tipe')
                                <p class="mt-1 text-xs text-red-500 font-bold ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <hr class="border-slate-50 my-6">

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="submit"
                            class="flex-1 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-[11px] font-black uppercase tracking-[0.2em] rounded-xl shadow-lg shadow-indigo-100 transition-all active:scale-95 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Kategori
                        </button>

                        <a href="{{ route('admin.kategori-master.index') }}"
                            class="flex-1 px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 text-[11px] font-black uppercase tracking-[0.2em] rounded-xl text-center transition-all">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
