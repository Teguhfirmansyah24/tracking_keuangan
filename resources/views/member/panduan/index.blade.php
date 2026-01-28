<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="text-center space-y-2">
                <h1 class="text-3xl font-extrabold text-gray-900 uppercase tracking-tight">Pusat Bantuan & Panduan</h1>
                <p class="text-gray-500">Pelajari cara mengelola keuangan Anda dengan efisien di platform kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 transition-all hover:shadow-md group">
                    <div
                        class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <span class="font-bold text-lg">01</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Atur Dompet</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Pergi ke menu <strong>Dompet</strong> untuk menambahkan akun keuangan Anda (seperti Bank,
                        E-Wallet, atau Tunai).
                    </p>
                </div>

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 transition-all hover:shadow-md group">
                    <div
                        class="w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 mb-4 group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <span class="font-bold text-lg">02</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Catat Transaksi</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Gunakan tombol <strong>(+)</strong> di navigasi atas atau menu Transaksi untuk mencatat
                        pemasukan dan pengeluaran harian.
                    </p>
                </div>

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 transition-all hover:shadow-md group">
                    <div
                        class="w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center text-purple-600 mb-4 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <span class="font-bold text-lg">03</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Pantau Laporan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Lihat ringkasan keuangan bulanan di menu <strong>Laporan</strong> dan unduh data dalam format
                        PDF atau Excel.
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Pertanyaan Umum (FAQ)
                </h2>

                <div class="space-y-4">
                    <details
                        class="group p-4 bg-gray-50 rounded-2xl cursor-pointer transition-colors hover:bg-gray-100">
                        <summary
                            class="font-bold text-sm text-gray-700 list-none flex justify-between items-center uppercase tracking-wide">
                            Apakah data saya aman?
                            <span class="transition group-open:rotate-180"><svg class="w-4 h-4" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 9l-7 7-7-7" />
                                </svg></span>
                        </summary>
                        <p class="mt-3 text-sm text-gray-500">Ya, semua data transaksi Anda hanya dapat diakses oleh
                            akun Anda sendiri melalui sistem enkripsi kami.</p>
                    </details>

                    <details
                        class="group p-4 bg-gray-50 rounded-2xl cursor-pointer transition-colors hover:bg-gray-100">
                        <summary
                            class="font-bold text-sm text-gray-700 list-none flex justify-between items-center uppercase tracking-wide">
                            Cara ganti format laporan?
                            <span class="transition group-open:rotate-180"><svg class="w-4 h-4" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 9l-7 7-7-7" />
                                </svg></span>
                        </summary>
                        <p class="mt-3 text-sm text-gray-500">Pada halaman laporan, Anda akan menemukan dua tombol di
                            pojok kanan atas untuk mengekspor data ke Excel atau PDF.</p>
                    </details>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
