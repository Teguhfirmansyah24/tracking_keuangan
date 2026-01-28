<x-admin-layout>
    <div class="p-8">
        <div class="mb-8">
            <nav class="flex text-slate-400 text-xs mb-2 uppercase tracking-widest font-bold">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600 transition-colors">Admin</a>
                <span class="mx-2">/</span>
                <span class="text-indigo-600">Manajemen Pengguna</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-black text-slate-800 tracking-tight">
                        DAFTAR MEMBER <span class="text-indigo-600">.</span>
                    </h1>
                    <p class="text-slate-500 text-sm">Kelola akses, status, dan informasi akun pengguna Anda.</p>
                </div>

                <form method="GET" action="{{ url()->current() }}" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama atau email..."
                        class="w-full md:w-64 pl-10 pr-4 py-2 rounded-xl border-slate-200 text-sm
                        focus:ring-indigo-500 focus:border-indigo-500 transition-all shadow-sm">

                    <div class="absolute left-3 top-2.5 text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div
                class="mb-6 flex items-center p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-xl shadow-sm animate-pulse">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="text-sm font-bold uppercase tracking-wide">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100 text-slate-500">
                            <th class="p-5 text-[11px] font-black uppercase tracking-tighter">Profil Pengguna</th>
                            <th class="p-5 text-[11px] font-black uppercase tracking-tighter text-center">Tgl Bergabung
                            </th>
                            <th class="p-5 text-[11px] font-black uppercase tracking-tighter text-center">Status
                                Keanggotaan</th>
                            <th class="p-5 text-[11px] font-black uppercase tracking-tighter text-right">Manajemen</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach ($users as $user)
                            <tr class="hover:bg-slate-50/80 transition-colors group">
                                <td class="p-5">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold border-2 border-white shadow-sm group-hover:scale-110 transition-transform">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800 text-sm">{{ $user->name }}</div>
                                            <div class="text-xs text-slate-400 font-medium">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-5 text-center text-xs font-semibold text-slate-500 italic">
                                    {{ $user->created_at->format('d M, Y') }}
                                </td>
                                <td class="p-5 text-center">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-[0.1em] shadow-sm
                                        {{ $user->status === 'active' ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600' }}">
                                        <span
                                            class="w-1.5 h-1.5 rounded-full mr-1.5 {{ $user->status === 'active' ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                        {{ $user->status === 'active' ? 'Active' : 'Suspended' }}
                                    </span>
                                </td>
                                <td class="p-5">
                                    <div class="flex justify-end items-center gap-2">
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all"
                                            title="Edit User">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.users.toggle-status', $user) }}"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button
                                                onclick="return confirm('Apakah Anda yakin ingin mengubah status akses user ini?')"
                                                class="px-4 py-1.5 text-[10px] font-black uppercase tracking-widest rounded-lg border-2 transition-all
                                                {{ $user->status === 'active'
                                                    ? 'border-rose-100 text-rose-500 hover:bg-rose-500 hover:text-white hover:border-rose-500'
                                                    : 'border-emerald-100 text-emerald-500 hover:bg-emerald-500 hover:text-white hover:border-emerald-500' }}">
                                                {{ $user->status === 'active' ? 'Banned' : 'Restore' }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bg-slate-50/50 px-6 py-3 border-t border-slate-100 flex justify-between items-center">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                    Menampilkan {{ $users->count() }} pengguna halaman ini
                </p>
            </div>
        </div>

        <div class="mt-8">
            {{ $users->links() }}
        </div>
    </div>
</x-admin-layout>
