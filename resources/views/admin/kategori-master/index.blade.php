<x-admin-layout>
    <div class="p-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <nav class="flex text-slate-400 text-xs mb-2 uppercase tracking-widest font-bold">
                    <span>Master Data</span>
                    <span class="mx-2">/</span>
                    <span class="text-indigo-600">Kategori</span>
                </nav>
                <h1 class="text-2xl font-black text-slate-800 tracking-tight uppercase">
                    Kategori Default <span class="text-indigo-600">.</span>
                </h1>
                <p class="text-slate-500 text-sm">Kelola kategori standar yang akan otomatis tersedia bagi member baru.
                </p>
            </div>

            <a href="{{ route('admin.kategori-master.create') }}"
                class="flex items-center gap-2 px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-black uppercase tracking-widest shadow-lg shadow-indigo-100 transition-all active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Kategori
            </a>
        </div>

        @if (session('success'))
            <div
                class="mb-6 flex items-center p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-xl shadow-sm">
                <span class="text-xs font-black uppercase tracking-widest">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-slate-500">
                        <th class="p-5 text-[11px] font-black uppercase tracking-tighter">Info Kategori</th>
                        <th class="p-5 text-[11px] font-black uppercase tracking-tighter text-center">Tipe Transaksi
                        </th>
                        <th class="p-5 text-[11px] font-black uppercase tracking-tighter text-right">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($categories as $kategori)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="p-5">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="h-10 w-10 rounded-xl flex items-center justify-center text-lg shadow-sm border border-slate-100 group-hover:rotate-6 transition-transform
                                        {{ $kategori->tipe === 'pemasukan' ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600' }}">
                                        {{-- Anda bisa mengganti ini dengan field ikon jika ada di database --}}
                                        <span class="font-bold tracking-tighter">#</span>
                                    </div>
                                    <span class="font-bold text-slate-700 tracking-tight">{{ $kategori->nama }}</span>
                                </div>
                            </td>
                            <td class="p-5 text-center">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest
                                    {{ $kategori->tipe === 'pemasukan' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                    {{ $kategori->tipe }}
                                </span>
                            </td>
                            <td class="p-5">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.kategori-master.edit', $kategori) }}"
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all"
                                        title="Ubah Kategori">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>

                                    <form method="POST"
                                        action="{{ route('admin.kategori-master.destroy', $kategori) }}"
                                        onsubmit="return confirm('Hapus kategori ini? Member yang menggunakan kategori ini mungkin akan terpengaruh.')"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all"
                                            title="Hapus Kategori">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="h-16 w-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-200"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                        </svg>
                                    </div>
                                    <h3 class="text-slate-500 font-bold tracking-tight text-sm">Data Kategori Kosong
                                    </h3>
                                    <p class="text-slate-400 text-xs">Anda belum menambahkan kategori master apapun ke
                                        sistem.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="p-5 bg-slate-50/30 border-t border-slate-100">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    Kategori master bersifat global dan dapat digunakan oleh seluruh member.
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
