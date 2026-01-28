<x-admin-layout>
    <div class="p-8 max-w-2xl">
        <div class="mb-8">
            <nav class="flex text-slate-400 text-xs mb-2 uppercase tracking-widest font-bold">
                <a href="{{ route('admin.kategori-master.index') }}"
                    class="hover:text-indigo-600 transition-colors">Kategori Master</a>
                <span class="mx-2">/</span>
                <span class="text-slate-600">Edit Kategori</span>
            </nav>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight uppercase">
                Ubah Konfigurasi <span class="text-indigo-600">.</span>
            </h1>
            <p class="text-slate-500 text-sm">Perubahan pada kategori master akan tercermin pada pilihan default member
                baru.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-8">
                <form method="POST" action="{{ route('admin.kategori-master.update', $kategori_master) }}"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div
                        class="flex items-center gap-4 p-5 rounded-2xl border-2 border-dashed border-slate-100 bg-slate-50/50 mb-6">
                        <div
                            class="h-14 w-14 rounded-xl flex items-center justify-center text-2xl shadow-sm
                            {{ $kategori_master->tipe === 'pemasukan' ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600' }}">
                            <span class="font-black">#</span>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Kategori Saat
                                Ini</p>
                            <h2 class="text-lg font-bold text-slate-700 leading-tight">{{ $kategori_master->nama }}</h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-500 uppercase tracking-wider mb-2 ml-1">Nama
                                Kategori</label>
                            <input type="text" name="nama" value="{{ old('nama', $kategori_master->nama) }}"
                                class="w-full px-4 py-3 rounded-xl border-slate-200 text-sm font-semibold focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all @error('nama') @enderror"
                                placeholder="Contoh: Gaji, Makanan, Transportasi...">
                            @error('nama')
                                <p class="mt-1 text-xs text-red-500 font-bold ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-500 uppercase tracking-wider mb-2 ml-1">Tipe
                                Transaksi</label>
                            <div class="relative">
                                <select name="tipe"
                                    class="w-full px-4 py-3 rounded-xl border-slate-200 text-sm font-bold text-slate-700 appearance-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all">
                                    <option value="pemasukan"
                                        {{ old('tipe', $kategori_master->tipe) === 'pemasukan' ? 'selected' : '' }}>
                                        🟢 PEMASUKAN (Income)
                                    </option>
                                    <option value="pengeluaran"
                                        {{ old('tipe', $kategori_master->tipe) === 'pengeluaran' ? 'selected' : '' }}>
                                        🔴 PENGELUARAN (Expense)
                                    </option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-[10px] text-slate-400 italic font-medium ml-1">
                                * Tipe ini menentukan apakah transaksi akan menambah atau mengurangi saldo user.
                            </p>
                        </div>
                    </div>

                    <hr class="border-slate-50 my-6">

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="submit"
                            class="flex-1 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-black uppercase tracking-widest rounded-xl shadow-lg shadow-indigo-100 transition-all active:scale-95">
                            Update Kategori
                        </button>

                        <a href="{{ route('admin.kategori-master.index') }}"
                            class="flex-1 px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-black uppercase tracking-widest rounded-xl text-center transition-all">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-6 flex items-start gap-3 p-4 bg-amber-50 rounded-xl border border-amber-100">
            <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <p class="text-[11px] text-amber-700 font-bold leading-relaxed uppercase tracking-tight">
                Penting: Mengubah nama kategori master tidak akan mengubah nama kategori yang sudah disalin (cloned)
                oleh user lama, namun akan berdampak pada seluruh user baru yang mendaftar setelah perubahan ini.
            </p>
        </div>
    </div>
</x-admin-layout>
