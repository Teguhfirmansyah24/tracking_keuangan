<x-admin-layout>
    <div class="p-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <nav class="flex text-slate-400 text-[10px] mb-2 uppercase tracking-[0.2em] font-black">
                    <span>Monitoring</span>
                    <span class="mx-2">/</span>
                    <span class="text-indigo-600">Audit Transaksi</span>
                </nav>
                <h1 class="text-2xl font-black text-slate-800 tracking-tight uppercase">
                    Log Transaksi Global <span class="text-indigo-600">.</span>
                </h1>
                <p class="text-slate-500 text-sm italic font-medium">Pantau seluruh arus kas masuk dan keluar dari
                    seluruh pengguna platform.</p>
            </div>

            <form method="GET" action="{{ route('admin.audit.transaksi.index') }}" class="flex gap-3 items-center">
                <button type="submit" name="export" value="excel"
                    class="flex items-center gap-2 px-5 py-2.5 bg-slate-800 text-white rounded-xl text-[11px] font-black uppercase tracking-widest hover:bg-slate-700 transition-all shadow-lg shadow-slate-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export Excel
                </button>
            </form>

        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm mb-8">
            <form method="GET" class="flex flex-wrap items-end gap-4">
                <div class="flex-1 min-w-[200px]">
                    <label
                        class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Filter
                        Pengguna</label>
                    <select name="user_id"
                        class="w-full bg-slate-50 border-none rounded-xl text-sm font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500 transition-all">
                        <option value="">Semua User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @selected(request('user_id') == $user->id)>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex-1 min-w-[200px]">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Tipe
                        Transaksi</label>
                    <select name="tipe"
                        class="w-full bg-slate-50 border-none rounded-xl text-sm font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500 transition-all">
                        <option value="">Semua Tipe</option>
                        <option value="pemasukan" @selected(request('tipe') == 'pemasukan')>🟢 Pemasukan</option>
                        <option value="pengeluaran" @selected(request('tipe') == 'pengeluaran')>🔴 Pengeluaran</option>
                    </select>
                </div>

                <button
                    class="px-8 py-3 bg-indigo-600 text-white rounded-xl text-[11px] font-black uppercase tracking-[0.2em] hover:bg-indigo-700 transition-all active:scale-95 shadow-lg shadow-indigo-100">
                    Terapkan Filter
                </button>

                @if (request()->anyFilled(['user_id', 'tipe']))
                    <a href="{{ route('admin.audit.transaksi.index') }}"
                        class="px-4 py-3 bg-slate-100 text-slate-500 rounded-xl text-[11px] font-black uppercase tracking-widest hover:bg-slate-200 transition-all">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Informasi
                                Dasar</th>
                            <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                                Tipe & Kategori</th>
                            <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Akun /
                                Wallet</th>
                            <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">
                                Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse ($transaksis as $trx)
                            <tr class="group hover:bg-slate-50/50 transition-colors">
                                <td class="p-6">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="h-10 w-10 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-bold text-slate-400 group-hover:bg-white transition-colors">
                                            {{ \Carbon\Carbon::parse($trx->tanggal)->format('d') }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-slate-700 leading-tight tracking-tight">
                                                {{ $trx->user->name }}</p>
                                            <p
                                                class="text-[10px] text-slate-400 font-medium uppercase tracking-tighter">
                                                {{ \Carbon\Carbon::parse($trx->tanggal)->format('M Y') }} •
                                                <span class="italic capitalize">{{ $trx->user->email }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6 text-center">
                                    <div class="flex flex-col items-center gap-1">
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-md text-[9px] font-black uppercase tracking-widest {{ $trx->kategori->tipe === 'pemasukan' ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600' }}">
                                            {{ $trx->kategori->tipe }}
                                        </span>
                                        <span
                                            class="text-xs font-bold text-slate-600">{{ $trx->kategori->nama }}</span>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <div class="flex items-center gap-2">
                                        <div class="w-1.5 h-1.5 rounded-full bg-indigo-400"></div>
                                        <span
                                            class="text-sm font-semibold text-slate-600">{{ $trx->akun->nama }}</span>
                                    </div>
                                </td>
                                <td class="p-6 text-right">
                                    <p
                                        class="text-sm font-black tracking-tight {{ $trx->kategori->tipe === 'pemasukan' ? 'text-emerald-600' : 'text-rose-600' }}">
                                        {{ $trx->kategori->tipe === 'pemasukan' ? '+' : '-' }} Rp
                                        {{ number_format($trx->jumlah, 0, ',', '.') }}
                                    </p>
                                    <p class="text-[10px] text-slate-300 font-medium uppercase">Confirmed System</p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="h-20 w-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                            <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                                            </svg>
                                        </div>
                                        <h3 class="text-slate-500 font-bold tracking-tight">Tidak Ada Data</h3>
                                        <p class="text-slate-400 text-xs">Sesuaikan filter untuk melihat transaksi lain.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-6 bg-slate-50/50 border-t border-slate-100">
                {{ $transaksis->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
