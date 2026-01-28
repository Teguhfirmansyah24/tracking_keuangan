<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tracking Keuangan | Kelola Finansial Anda</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/TeguhDev Logo.png') }}" type="png">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-white text-gray-900">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/img/TeguhDev Logo.png') }}" alt="Logo" class="h-10 w-auto">
                    <span class="text-xl font-bold tracking-tight text-indigo-600 uppercase">TeguhDev</span>
                </div>

                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-indigo-600 hover:text-indigo-500">Dashboard →</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-semibold text-gray-600 hover:text-indigo-600 transition">Masuk</a>
                        <a href="{{ route('register') }}"
                            class="px-5 py-2.5 bg-indigo-600 text-white rounded-full text-sm font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all transform hover:scale-95">
                            Mulai Gratis
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <header class="relative overflow-hidden pt-16 pb-24 lg:pt-32">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full -z-10">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-50 rounded-full blur-3xl opacity-50">
            </div>
            <div class="absolute bottom-[10%] right-[-5%] w-[30%] h-[30%] bg-blue-50 rounded-full blur-3xl opacity-50">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span
                class="inline-block px-4 py-1.5 mb-6 text-sm font-semibold tracking-wide text-indigo-600 uppercase bg-indigo-50 rounded-full">
                🚀 Solusi Cerdas Kelola Uang
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-gray-900 mb-6 leading-[1.1]">
                Ambil Kendali Atas <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-500">Masa Depan
                    Finansialmu</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed">
                Platform pelacakan keuangan paling sederhana untuk memantau pengeluaran harian, tabungan, dan rencana
                masa depan tanpa ribet.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}"
                    class="px-8 py-4 bg-indigo-600 text-white rounded-xl font-bold text-lg hover:bg-indigo-700 shadow-xl shadow-indigo-200 transition-all transform hover:scale-95">
                    Daftar Sekarang — Gratis
                </a>
                <a href="#fitur"
                    class="px-8 py-4 bg-white text-gray-700 border border-gray-200 rounded-xl font-bold text-lg hover:bg-gray-50 transition-all">
                    Lihat Fitur
                </a>
            </div>
        </div>
    </header>

    <section id="fitur" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Kenapa Memilih Kami?</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-6 text-2xl">
                        📊
                    </div>
                    <h3 class="text-xl font-bold mb-3">Laporan Otomatis</h3>
                    <p class="text-gray-600 leading-relaxed">Lihat visualisasi pengeluaranmu dalam bentuk grafik yang
                        mudah dimengerti setiap bulan.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-6 text-2xl">
                        🛡️
                    </div>
                    <h3 class="text-xl font-bold mb-3">Keamanan Terjamin</h3>
                    <p class="text-gray-600 leading-relaxed">Data transaksimu terenkripsi dengan aman. Hanya kamu yang
                        memiliki akses penuh.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div
                        class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-6 text-2xl">
                        📱
                    </div>
                    <h3 class="text-xl font-bold mb-3">Akses Dimana Saja</h3>
                    <p class="text-gray-600 leading-relaxed">Pantau keuanganmu dari laptop, tablet, atau smartphone
                        secara real-time.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-12 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-400 text-sm">© 2026 TeguhDev Tracking Keuangan. Dibuat dengan ❤️ untuk kemudahan
                finansial Anda.</p>
        </div>
    </footer>

</body>

</html>
