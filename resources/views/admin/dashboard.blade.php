<x-admin-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">

        <div
            class="bg-white p-7 rounded-[2.5rem] border border-slate-100 shadow-sm relative overflow-hidden group hover:shadow-xl transition-all duration-300">
            <div
                class="absolute top-0 right-0 p-3 bg-indigo-50 rounded-bl-[2rem] text-indigo-500 font-black text-[10px] uppercase">
                Active Members</div>
            <div class="flex flex-col gap-4">
                <div
                    class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-4xl font-black text-slate-900 tracking-tighter">{{ number_format($totalUser) }}</h3>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Total Pengguna</p>
                </div>
            </div>
        </div>

        <div
            class="bg-white p-7 rounded-[2.5rem] border border-slate-100 shadow-sm relative overflow-hidden group hover:shadow-xl transition-all duration-300">
            <div
                class="absolute top-0 right-0 p-3 bg-emerald-50 rounded-bl-[2rem] text-emerald-500 font-black text-[10px] uppercase tracking-tighter">
                Gross Volume</div>
            <div class="flex flex-col gap-4">
                <div
                    class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-3xl font-black text-slate-900 tracking-tighter">Rp
                        Rp {{ number_format($netFlow, 0, ',', '.') }}</h3>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">NET FLOW SISTEM</p>
                </div>
            </div>
        </div>

        <div
            class="bg-white p-7 rounded-[2.5rem] border border-slate-100 shadow-sm relative overflow-hidden group hover:shadow-xl transition-all duration-300">
            <div class="flex flex-col gap-4">
                <div
                    class="w-12 h-12 bg-blue-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-blue-200 text-xs font-bold uppercase tracking-widest">
                    In
                </div>
                <div>
                    <h3 class="text-3xl font-black text-slate-900 tracking-tighter">
                        Rp {{ number_format($statGlobal->total_masuk, 0, ',', '.') }}
                    </h3>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">
                        Uang Masuk (Sistem)
                    </p>
                </div>
            </div>
        </div>

        <div
            class="bg-white p-7 rounded-[2.5rem] border border-slate-100 shadow-sm relative overflow-hidden group hover:shadow-xl transition-all duration-300">
            <div class="flex flex-col gap-4">
                <div
                    class="w-12 h-12 bg-rose-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-rose-200 text-xs font-bold uppercase tracking-widest">
                    Out
                </div>
                <div>
                    <h3 class="text-3xl font-black text-slate-900 tracking-tighter">
                        Rp {{ number_format($statGlobal->total_keluar, 0, ',', '.') }}
                    </h3>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">
                        Uang Keluar (Sistem)
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div
        class="bg-white rounded-[3rem] border border-slate-100 shadow-sm overflow-hidden border-b-8 border-b-slate-900">
        <div class="p-10 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h4 class="text-xl font-black text-slate-900 uppercase tracking-widest">Registrasi
                    Terbaru</h4>
                <p class="text-slate-500 text-sm mt-1">Daftar 5 pengguna terakhir yang bergabung ke platform.</p>
            </div>
            <a href="{{ route('admin.users.index') }}"
                class="px-6 py-3 bg-slate-900 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-slate-800 transition shadow-xl shadow-slate-200 active:scale-95">
                Kelola Semua User
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50">
                        <th class="p-6 px-10 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nama
                            Lengkap</th>
                        <th class="p-6 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Email Pengguna
                        </th>
                        <th class="p-6 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="p-6 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Terdaftar Pada
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($recentUsers as $user)
                        <tr class="group hover:bg-slate-50/50 transition duration-150">
                            <td class="p-6 px-10 flex items-center gap-4">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=f1f5f9&color=64748b"
                                    class="w-10 h-10 rounded-2xl shadow-inner border border-white">
                                <div>
                                    <p class="font-black text-slate-800 uppercase text-xs tracking-tighter">
                                        {{ $user->name }}</p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">ID:
                                        #0{{ $user->id }}</p>
                                </div>
                            </td>
                            <td class="p-6">
                                <span
                                    class="text-sm font-medium text-slate-600 italic underline decoration-slate-200 underline-offset-4">{{ $user->email }}</span>
                            </td>
                            <td class="p-6">
                                <span
                                    class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest
                                    {{ $user->isActive() ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-600' }}">
                                    {{ $user->isActive() ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="p-6">
                                <span
                                    class="text-sm text-slate-500 font-medium tracking-tight">{{ $user->created_at->format('d M Y') }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
