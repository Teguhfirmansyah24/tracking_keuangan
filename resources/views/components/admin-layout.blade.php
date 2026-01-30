<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('assets/img/TeguhDev Logo.png') }}" type="png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-slate-50 font-sans antialiased">
    <div class="min-h-screen flex">
        <aside class="w-72 bg-slate-900 text-white flex-shrink-0 hidden lg:flex flex-col border-r border-slate-800">
            <div class="p-8 pb-4">
                <div class="flex items-center gap-3 group cursor-pointer">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg shadow-indigo-500/20 flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-black tracking-tighter uppercase leading-none">Admin<span
                                class="text-indigo-400">Panel</span></h1>
                        <p class="text-[9px] font-bold text-slate-500 uppercase tracking-[0.2em] mt-1">Enterprise Core
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex-1 px-4 py-6 space-y-8 overflow-y-auto custom-scrollbar">

                <div>
                    <p class="px-4 mb-3 text-[10px] font-black text-slate-500 uppercase tracking-[0.3em]">Main Menu</p>
                    <nav class="space-y-1">
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold transition-all duration-200 group
                        {{ request()->routeIs('admin.dashboard')
                            ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-900/40'
                            : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-100' }}">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-500 group-hover:text-indigo-400' }} transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2.5"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                            <span class="text-sm">Overview</span>
                        </a>
                    </nav>
                </div>

                <div>
                    <p class="px-4 mb-3 text-[10px] font-black text-slate-500 uppercase tracking-[0.3em]">Management</p>
                    <nav class="space-y-1">
                        <a href="{{ route('admin.users.index') }}"
                            class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold transition-all duration-200 group
                        {{ request()->routeIs('admin.users.*')
                            ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-900/40'
                            : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-100' }}">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.users.*') ? 'text-white' : 'text-slate-500 group-hover:text-indigo-400' }} transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2.5"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="text-sm">Data Pengguna</span>
                        </a>

                        <a href="{{ route('admin.kategori-master.index') }}"
                            class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold transition-all duration-200 group
                        {{ request()->routeIs('admin.kategori-master.*')
                            ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-900/40'
                            : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-100' }}">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.kategori-master.*') ? 'text-white' : 'text-slate-500 group-hover:text-indigo-400' }} transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2.5"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span class="text-sm">Master Kategori</span>
                        </a>
                    </nav>
                </div>

                <div>
                    <p class="px-4 mb-3 text-[10px] font-black text-slate-500 uppercase tracking-[0.3em]">Monitoring</p>
                    <nav class="space-y-1">
                        <a href="{{ route('admin.audit.transaksi.index') }}"
                            class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold transition-all duration-200 group
                        {{ request()->routeIs('admin.audit.transaksi.*')
                            ? 'bg-indigo-600 text-white shadow-xl shadow-indigo-900/40'
                            : 'text-slate-400 hover:bg-slate-800/50 hover:text-slate-100' }}">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.audit.transaksi.*') ? 'text-white' : 'text-slate-500 group-hover:text-indigo-400' }} transition-colors"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            <span class="text-sm">Audit Transaksi</span>
                        </a>
                    </nav>
                </div>
            </div>

            <div class="p-6">
                <div
                    class="bg-gradient-to-tr from-slate-800 to-slate-800/40 rounded-3xl p-5 border border-slate-700/50 relative overflow-hidden group">
                    <div
                        class="absolute -right-4 -top-4 w-16 h-16 bg-indigo-500/10 rounded-full blur-2xl group-hover:bg-indigo-500/20 transition-all">
                    </div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-black text-indigo-400 uppercase tracking-widest">System
                                Engine</span>
                            <span class="flex h-2 w-2">
                                <span
                                    class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                        </div>
                        <div class="flex items-baseline gap-1">
                            <span class="text-xs font-bold text-slate-300 tracking-tight">Version</span>
                            <span class="text-xs font-black text-white">1.2.4</span>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-screen overflow-hidden bg-[#f8fafc]">
            <header
                class="bg-white/70 backdrop-blur-xl border-b border-slate-200/60 p-4 px-10 flex justify-between items-center sticky top-0 z-40 shadow-sm shadow-slate-200/20">

                <div class="flex items-center gap-6">
                    <button
                        class="lg:hidden p-2 rounded-xl bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>

                    <div class="hidden md:block">
                        <nav class="flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em]">
                            <span class="text-slate-400">Platform</span>
                            <svg class="w-2.5 h-2.5 text-slate-300" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" />
                            </svg>
                            <span class="text-indigo-600">Overview</span>
                        </nav>
                        <h2 class="text-xs font-black text-slate-900 uppercase tracking-widest mt-0.5">Control Center
                        </h2>
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center gap-3 p-1 pr-4 rounded-2xl transition-all duration-300 hover:bg-slate-50 border border-transparent hover:border-slate-100 focus:outline-none group">

                            <div class="relative">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4f46e5&color=fff"
                                    class="w-10 h-10 rounded-xl shadow-lg border-2 border-white group-hover:scale-105 transition-transform">
                                <div
                                    class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full shadow-sm">
                                </div>
                            </div>

                            <div class="text-right hidden sm:block">
                                <p
                                    class="text-[9px] font-black text-indigo-500 uppercase tracking-tighter leading-none mb-1">
                                    Authorized Admin
                                </p>
                                <div class="flex items-center gap-2">
                                    <p class="text-xs font-black text-slate-900 uppercase tracking-tight italic">
                                        {{ auth()->user()->name }}
                                    </p>
                                    <svg class="w-3 h-3 text-slate-400 group-hover:translate-y-0.5 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </button>

                        <div x-show="open" @click.outside="open = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl shadow-indigo-900/10 border border-slate-100 z-50 overflow-hidden">

                            <div class="p-4 border-b border-slate-50 bg-slate-50/50">
                                <p class="text-[10px] font-bold text-slate-400 uppercase">Signed in as</p>
                                <p class="text-sm font-black text-slate-800 truncate">{{ auth()->user()->email }}</p>
                            </div>

                            <div class="p-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center gap-3 px-3 py-2 text-xs font-bold text-rose-600 hover:bg-rose-50 rounded-xl transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Terminate Session
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto custom-scrollbar bg-[#f8fafc]">
                <div class="p-10 max-w-[1600px] mx-auto w-full">
                    {{ $slot }}
                </div>

                <footer class="p-10 pt-0 text-center">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">
                        &copy; {{ date('Y') }} — Core System Alpha v1.2.4
                    </p>
                </footer>
            </div>
        </main>
    </div>
</body>

</html>
