<section class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-gray-100">
    <header class="flex items-center gap-4 mb-8">
        <div class="p-3 bg-blue-50 rounded-2xl">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-900 uppercase tracking-tight">
                {{ __('Informasi Profil') }}
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                {{ __('Perbarui informasi akun dan alamat email Anda.') }}
            </p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <x-input-label for="name" :value="__('Nama Lengkap')"
                    class="text-xs font-bold text-gray-400 uppercase ml-1" />
                <div class="relative group">
                    <x-text-input id="name" name="name" type="text"
                        class="block w-full rounded-2xl border-gray-100 bg-gray-50/50 focus:bg-white focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="space-y-2">
                <x-input-label for="email" :value="__('Alamat Email')"
                    class="text-xs font-bold text-gray-400 uppercase ml-1" />
                <div class="relative group">
                    <x-text-input id="email" name="email" type="email"
                        class="block w-full rounded-2xl border-gray-100 bg-gray-50/50 focus:bg-white focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        :value="old('email', $user->email)" required autocomplete="username" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div class="bg-amber-50 p-4 rounded-2xl border border-amber-100 mt-4">
                        <p class="text-xs text-amber-700 leading-relaxed flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            {{ __('Email Anda belum diverifikasi.') }}
                        </p>
                        <button form="send-verification"
                            class="mt-2 text-xs font-bold text-blue-600 hover:text-blue-700 underline underline-offset-4 transition">
                            {{ __('Kirim ulang link verifikasi?') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-bold text-[10px] text-green-600 uppercase">
                                {{ __('Link baru telah dikirim!') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-50">
            <button type="submit"
                class="px-8 py-3 bg-blue-600 text-white rounded-2xl font-bold text-sm hover:bg-blue-700 transition-all shadow-lg shadow-blue-200 active:scale-95">
                {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'profile-updated')
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
