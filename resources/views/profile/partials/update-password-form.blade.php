<section class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-gray-100 mt-6">
    <header class="flex items-center gap-4 mb-8">
        <div class="p-3 bg-amber-50 rounded-2xl">
            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-900 uppercase tracking-tight">
                {{ __('Perbarui Kata Sandi') }}
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}
            </p>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2 space-y-2">
                <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')"
                    class="text-xs font-bold text-gray-400 uppercase ml-1" />
                <x-text-input id="update_password_current_password" name="current_password" type="password"
                    class="block w-full rounded-2xl border-gray-100 bg-gray-50/50 focus:bg-white focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div class="space-y-2">
                <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')"
                    class="text-xs font-bold text-gray-400 uppercase ml-1" />
                <x-text-input id="update_password_password" name="password" type="password"
                    class="block w-full rounded-2xl border-gray-100 bg-gray-50/50 focus:bg-white focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div class="space-y-2">
                <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi')"
                    class="text-xs font-bold text-gray-400 uppercase ml-1" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="block w-full rounded-2xl border-gray-100 bg-gray-50/50 focus:bg-white focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-50">
            <button type="submit"
                class="px-8 py-3 bg-gray-900 text-white rounded-2xl font-bold text-sm hover:bg-black transition-all shadow-lg shadow-gray-200 active:scale-95">
                {{ __('Ubah Kata Sandi') }}
            </button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-4"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-green-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm font-medium">{{ __('Berhasil diperbarui.') }}</span>
                </div>
            @endif
        </div>
    </form>
</section>
