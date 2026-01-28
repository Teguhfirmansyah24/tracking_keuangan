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
        <aside class="w-72 bg-slate-900 text-white flex-shrink-0 hidden lg:flex flex-col">
            <div class="p-8">
                <div class="flex items-center gap-3">
                    <div
                        class="w-8 h-8 bg-indigo-500 rounded-lg shadow-lg shadow-indigo-500/50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-black tracking-tighter uppercase">Admin<span
                            class="text-indigo-400">Panel</span></h1>
                </div>
            </div>

            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 p-4 rounded-2xl font-bold transition
                        {{ request()->routeIs('admin.dashboard')
                            ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-900/20'
                            : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center gap-3 p-4 rounded-2xl font-bold transition group
                        {{ request()->routeIs('admin.users.*')
                            ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-900/20'
                            : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 group-hover:text-indigo-400 transition" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Data Pengguna
                </a>
                <a href="{{ route('admin.kategori-master.index') }}"
                    class="flex items-center gap-3 p-4 rounded-2xl font-bold transition group
                        {{ request()->routeIs('admin.kategori-master.*')
                            ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-900/20'
                            : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 group-hover:text-indigo-400 transition" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Master Kategori
                </a>
            </nav>

            <div class="p-6">
                <div class="bg-slate-800/50 rounded-3xl p-4 border border-slate-700/50">
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest text-center">System Version
                        v2.0</p>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col h-screen overflow-hidden overflow-y-auto">
            <header
                class="bg-white/80 backdrop-blur-md border-b border-slate-200 p-4 px-8 flex justify-between items-center sticky top-0 z-30">
                <div class="flex items-center gap-4">
                    <span class="lg:hidden text-slate-600"><svg class="w-6 h-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16m-7 6h7" />
                        </svg></span>
                    <h2 class="font-black text-slate-800 uppercase tracking-widest text-xs">System Overview</h2>
                </div>
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center gap-4 focus:outline-none">
                        <div class="text-right mr-2">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">
                                Login as Admin
                            </p>
                            <p class="text-xs font-black text-slate-900 uppercase">
                                {{ auth()->user()->name }}
                            </p>
                        </div>

                        <img src="https://ui-avatars.com/api/?name=Admin&background=4f46e5&color=fff"
                            class="w-10 h-10 rounded-2xl shadow-md border-2 border-white">
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute right-0 mt-3 w-44 bg-white rounded-xl shadow-lg border border-slate-100 z-50">

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-b-xl font-semibold">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

            </header>

            <div class="p-8 max-w-7xl mx-auto w-full">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
