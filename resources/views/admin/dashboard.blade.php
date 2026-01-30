<x-admin-layout>
    <div class="mb-10 flex flex-col md:flex-row justify-between items-end gap-6">
        <div>
            <nav class="flex text-slate-400 text-[10px] mb-2 uppercase tracking-[0.3em] font-black">
                <span>Dashboard</span>
                <span class="mx-2 text-slate-300">/</span>
                <span class="text-indigo-600">Analytics Overview</span>
            </nav>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight uppercase">
                Statistik <span class="text-indigo-600">Global .</span>
            </h1>
            <p class="text-slate-500 text-sm font-medium italic mt-1">Laporan performa sistem secara real-time dan
                komprehensif.</p>
        </div>

        <div class="bg-white px-5 py-3 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></div>
            <span class="text-[10px] font-black text-slate-700 uppercase tracking-widest">Live Updates:
                {{ date('d M Y') }}</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <div
            class="bg-white p-8 rounded-[3rem] border border-slate-50 shadow-xl shadow-slate-200/50 relative overflow-hidden group transition-all duration-500 hover:-translate-y-2">
            <div
                class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-50 rounded-full blur-3xl group-hover:bg-indigo-100 transition-colors">
            </div>
            <div class="relative flex flex-col gap-5">
                <div
                    class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-200 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-5xl font-black text-slate-900 tracking-tighter leading-none">
                        {{ number_format($totalUser) }}</h3>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mt-3">Total Komunitas</p>
                </div>
            </div>
        </div>

        <div
            class="bg-slate-900 p-8 rounded-[3rem] shadow-xl shadow-slate-900/20 relative overflow-hidden group transition-all duration-500 hover:-translate-y-2">
            <div class="absolute right-0 bottom-0 w-32 h-32 bg-indigo-500/10 rounded-full blur-3xl"></div>
            <div class="relative flex flex-col gap-5">
                <div
                    class="w-14 h-14 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl flex items-center justify-center text-indigo-400 shadow-lg group-hover:rotate-12 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-black text-white tracking-tighter">Rp
                        {{ number_format($netFlow, 0, ',', '.') }}</h3>
                    <p class="text-[10px] font-black text-indigo-400 uppercase tracking-[0.2em] mt-3">
                        Net Cash Flow</p>
                </div>
            </div>
        </div>

        <div
            class="bg-white p-8 rounded-[3rem] border border-slate-50 shadow-xl shadow-slate-200/50 group transition-all duration-500 hover:-translate-y-2">
            <div class="flex flex-col gap-5">
                <div
                    class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 11l5-5m0 0l5 5m-5-5v12" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-black text-slate-900 tracking-tighter">Rp
                        {{ number_format($statGlobal->total_masuk, 0, ',', '.') }}</h3>
                    <p class="text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em] mt-3">Gross Income</p>
                </div>
            </div>
        </div>

        <div
            class="bg-white p-8 rounded-[3rem] border border-slate-50 shadow-xl shadow-slate-200/50 group transition-all duration-500 hover:-translate-y-2">
            <div class="flex flex-col gap-5">
                <div
                    class="w-14 h-14 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center group-hover:bg-rose-500 group-hover:text-white transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 13l-5 5m0 0l-5-5m5 5V6" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-black text-slate-900 tracking-tighter">Rp
                        {{ number_format($statGlobal->total_keluar, 0, ',', '.') }}</h3>
                    <p class="text-[10px] font-black text-rose-500 uppercase tracking-[0.2em] mt-3">Total Expenses</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-12">
        <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em] mb-6 ml-2">Administrative Control
        </h4>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
            <a href="{{ route('admin.kategori-master.create') }}"
                class="group bg-white p-5 rounded-[2rem] border border-slate-100 hover:border-indigo-500 hover:shadow-2xl hover:shadow-indigo-100 transition-all duration-300 text-center">
                <div
                    class="w-12 h-12 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-indigo-600 group-hover:text-white group-hover:rotate-6 transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <span class="text-[10px] font-black text-slate-700 uppercase tracking-widest">Kategori</span>
            </a>

            <form action="{{ route('admin.maintenance.toggle') }}" method="POST" class="contents">
                @csrf
                <button onclick="return confirm('Aktifkan Mode Perbaikan?')"
                    class="group bg-white p-5 rounded-[2rem] border border-slate-100 hover:border-amber-500 hover:shadow-2xl hover:shadow-amber-100 transition-all duration-300 text-center">
                    <div
                        class="w-12 h-12 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-amber-500 group-hover:text-white transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        </svg>
                    </div>
                    <span class="text-[10px] font-black text-slate-700 uppercase tracking-widest">Maintenance</span>
                </button>
            </form>
            <a href="{{ route('admin.audit.transaksi.index') }}"
                class="group bg-white p-5 rounded-[2rem] border border-slate-100 hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-100 transition-all duration-300 text-center">
                <div
                    class="w-12 h-12 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-600 group-hover:text-white transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                    </svg>
                </div>
                <span class="text-[10px] font-black text-slate-700 uppercase tracking-widest">Auditing</span>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-[3.5rem] border border-slate-50 shadow-2xl shadow-slate-200/60 overflow-hidden">
        <div class="p-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h4 class="text-2xl font-black text-slate-900 uppercase tracking-tight">Recent <span
                        class="text-indigo-600">Onboarding</span></h4>
                <p class="text-slate-400 text-xs font-medium mt-1 uppercase tracking-widest leading-relaxed">Verifikasi
                    5 pengguna terbaru yang baru saja mendaftar.</p>
            </div>
            <a href="{{ route('admin.users.index') }}"
                class="group flex items-center gap-3 px-8 py-4 bg-slate-900 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-indigo-600 transition-all shadow-xl shadow-slate-200 active:scale-95">
                Kelola User
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="p-8 px-10 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Profile
                            Identity</th>
                        <th class="p-8 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Network
                            Address</th>
                        <th class="p-8 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">
                            Status Access</th>
                        <th class="p-8 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">
                            Join Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach ($recentUsers as $user)
                        <tr class="group hover:bg-indigo-50/30 transition-colors duration-200">
                            <td class="p-8 px-10">
                                <div class="flex items-center gap-4">
                                    <div class="relative">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=4f46e5&color=fff"
                                            class="w-12 h-12 rounded-2xl shadow-lg border-2 border-white">
                                        <div
                                            class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full">
                                        </div>
                                    </div>
                                    <div>
                                        <p
                                            class="font-black text-slate-800 uppercase text-sm tracking-tighter group-hover:text-indigo-600 transition-colors">
                                            {{ $user->name }}</p>
                                        <p
                                            class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">
                                            Reference ID: #0{{ $user->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-8 font-medium text-slate-500 italic text-sm">{{ $user->email }}</td>
                            <td class="p-8 text-center">
                                <span
                                    class="px-5 py-1.5 rounded-xl text-[9px] font-black uppercase tracking-[0.15em] {{ $user->isActive() ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                    {{ $user->isActive() ? 'Verified' : 'Suspended' }}
                                </span>
                            </td>
                            <td class="p-8 text-right">
                                <span
                                    class="text-xs text-slate-600 font-black tracking-tight uppercase">{{ $user->created_at->format('M d, Y') }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
