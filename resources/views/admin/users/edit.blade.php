<x-admin-layout>
    <div class="p-8 max-w-2xl">
        <div class="mb-8">
            <nav class="flex text-slate-400 text-xs mb-2 uppercase tracking-widest font-bold">
                <a href="{{ route('admin.users.index') }}" class="hover:text-indigo-600 transition-colors">Manajemen
                    Pengguna</a>
                <span class="mx-2">/</span>
                <span class="text-slate-600">Edit Profil</span>
            </nav>
            <h1 class="text-2xl font-black text-slate-800 tracking-tight uppercase">
                Ubah Data Member <span class="text-indigo-600">.</span>
            </h1>
            <p class="text-slate-500 text-sm">Pastikan perubahan data sudah sesuai dengan permintaan atau kebijakan
                sistem.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-8">
                <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl mb-6">
                        <div
                            class="h-12 w-12 rounded-full bg-indigo-600 flex items-center justify-center text-white font-black shadow-lg shadow-indigo-100">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">User ID</p>
                            <p class="text-sm font-mono font-bold text-slate-700">
                                #{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-500 uppercase tracking-wider mb-2 ml-1">Nama
                                Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                class="w-full px-4 py-3 rounded-xl text-sm font-semibold focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all @error('name') border-red-400 @enderror"
                                placeholder="Masukkan nama lengkap...">
                            @error('name')
                                <p class="mt-1 text-xs text-red-500 font-bold ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-500 uppercase tracking-wider mb-2 ml-1">Alamat
                                Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="w-full px-4 py-3 rounded-xltext-sm font-semibold focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all @error('email') border-red-400 @enderror"
                                placeholder="nama@email.com">
                            @error('email')
                                <p class="mt-1 text-xs text-red-500 font-bold ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-500 uppercase tracking-wider mb-2 ml-1">Status
                                Akun</label>
                            <div class="relative">
                                <select name="status"
                                    class="w-full px-4 py-3 rounded-xl border-slate-200 text-sm font-bold text-slate-700 appearance-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all">
                                    <option value="active"
                                        {{ old('status', $user->status) === 'active' ? 'selected' : '' }}>🟢 AKTIF
                                    </option>
                                    <option value="inactive"
                                        {{ old('status', $user->status) === 'inactive' ? 'selected' : '' }}>🔴 NONAKTIF
                                        / SUSPENDED</option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-50 my-4">

                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <button type="submit"
                            class="flex-1 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-black uppercase tracking-widest rounded-xl shadow-lg shadow-indigo-100 transition-all active:scale-95">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('admin.users.index') }}"
                            class="flex-1 px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-black uppercase tracking-widest rounded-xl text-center transition-all">
                            Batal & Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-8 p-6 border-2 border-dashed border-rose-100 rounded-2xl bg-rose-50/30">
            <h3 class="text-rose-600 text-xs font-black uppercase tracking-widest mb-1">
                Zona Bahaya
            </h3>

            <p class="text-slate-500 text-xs mb-4 font-medium">
                Menghapus user akan menghilangkan seluruh data transaksi terkait secara permanen.
            </p>

            <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                onsubmit="return confirm('Yakin hapus akun ini PERMANEN? Tindakan ini tidak bisa dibatalkan.')">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="text-rose-600 hover:text-rose-700 text-xs font-bold underline decoration-2 underline-offset-4">
                    Hapus Akun Selamanya
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>
