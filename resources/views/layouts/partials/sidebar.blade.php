<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-30 w-64 h-screen pt-24 transition-transform -translate-x-full bg-white border-r border-gray-100 sm:translate-x-0 shadow-sm"
    aria-label="Sidebar">
    <div class="h-full px-4 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                    class="w-full flex items-center p-3 text-gray-700 rounded-xl group transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 border-none">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </x-nav-link>
            </li>

            <li class="pt-5 pb-2 px-3 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Menu Keuangan</li>

            <li>
                <a href="{{ route('transaksi.index') }}"
                    class="flex items-center p-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('member.transaksi.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('member.transaksi.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <span class="ms-3">Riwayat Transaksi</span>
                </a>
            </li>

            <li>
                <a href="{{ route('akun.index') }}"
                    class="flex items-center p-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('member.akun.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('member.akun.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    <span class="ms-3">Dompet & Akun</span>
                </a>
            </li>

            <li>
                <a href="{{ route('laporan.index') }}"
                    class="flex items-center p-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('member.laporan.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('member.laporan.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span class="ms-3">Laporan Analitik</span>
                </a>
            </li>
        </ul>

        <div class="mt-10 p-4 bg-gray-50 rounded-2xl">
            <p class="text-xs text-gray-500 leading-relaxed text-center">Butuh bantuan mengelola keuangan Anda?</p>
            <a href="{{ route('member.panduan.index') }}"
                class="block text-center w-full mt-2 py-2 bg-white border border-gray-200 text-xs font-bold rounded-xl hover:bg-gray-100 transition shadow-sm">
                PANDUAN APP
            </a>
        </div>
    </div>
</aside>
