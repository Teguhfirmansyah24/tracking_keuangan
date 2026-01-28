<section class="bg-red-50/30 p-6 sm:p-8 rounded-3xl border border-red-100 mt-6 overflow-hidden relative">
    <div class="absolute top-0 right-0 -mr-16 -mt-16 w-32 h-32 bg-red-100/50 rounded-full blur-3xl"></div>

    <header class="flex items-center gap-4 mb-8 relative z-10">
        <div class="p-3 bg-red-100 rounded-2xl shadow-sm">
            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-red-900 uppercase tracking-tight">
                {{ __('Hapus Akun') }}
            </h2>
            <p class="mt-1 text-sm text-red-700/70">
                {{ __('Setelah akun dihapus, semua sumber daya dan data akan dihapus secara permanen.') }}
            </p>
        </div>
    </header>

    <div class="bg-white/50 p-4 rounded-2xl border border-red-100 mb-6 relative z-10">
        <p class="text-xs text-red-800 leading-relaxed italic">
            <strong>Catatan:</strong>
            {{ __('Sebelum menghapus akun, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </div>

    <div class="relative z-10">
        <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-8 py-3 bg-red-600 hover:bg-red-700 text-white rounded-2xl font-bold text-sm transition-all shadow-lg shadow-red-200 active:scale-95">
            {{ __('Hapus Akun Sekarang') }}
        </x-danger-button>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-white rounded-3xl">
            @csrf
            @method('delete')

            <div class="flex items-center gap-3 text-red-600 mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <h2 class="text-xl font-bold text-gray-900">
                    {{ __('Apakah Anda yakin?') }}
                </h2>
            </div>

            <p class="text-sm text-gray-500 leading-relaxed mb-6">
                {{ __('Tindakan ini tidak dapat dibatalkan. Harap masukkan kata sandi Anda untuk mengonfirmasi penghapusan akun secara permanen.') }}
            </p>

            <div class="space-y-2">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input id="password" name="password" type="password"
                    class="block w-full rounded-2xl border-gray-100 bg-gray-50 focus:ring-red-500 focus:border-red-500"
                    placeholder="{{ __('Masukkan Kata Sandi Anda') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <x-secondary-button x-on:click="$dispatch('close')"
                    class="px-6 py-2.5 rounded-2xl border-gray-200 font-bold text-xs uppercase tracking-widest">
                    {{ __('Batal') }}
                </x-secondary-button>

                <button type="submit"
                    class="px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-2xl font-bold text-xs uppercase tracking-widest shadow-lg shadow-red-100 transition-all active:scale-95">
                    {{ __('Ya, Hapus Permanen') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
