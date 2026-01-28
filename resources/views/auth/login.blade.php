<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">

        <div
            class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-xl overflow-hidden sm:rounded-2xl border border-gray-100">

            <div class="mb-8 text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Selamat Datang</h2>
                <p class="text-sm text-gray-500 mt-2">Silakan masuk ke akun Anda</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="group">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                    <x-text-input id="email"
                        class="block mt-1 w-full px-4 py-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                        placeholder="email@anda.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <div class="flex items-center justify-between">
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                    </div>
                    <x-text-input id="password"
                        class="block mt-1 w-full px-4 py-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                        type="password" name="password" required autocomplete="current-password"
                        placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-offset-2 transition duration-150"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600 font-medium">{{ __('Ingat saya') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm font-semibold text-indigo-600 hover:text-indigo-500 transition duration-150"
                            href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif
                </div>

                <div class="mt-8">
                    <x-primary-button
                        class="w-full justify-center py-3 text-sm font-bold uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-900 focus:ring-indigo-500 rounded-xl transition duration-300 shadow-lg shadow-indigo-100">
                        {{ __('Masuk Sekarang') }}
                    </x-primary-button>
                </div>

                <div class="mt-8 text-center border-t border-gray-100 pt-6">
                    <p class="text-sm text-gray-600">
                        Belum punya akun?
                        <a class="font-bold text-indigo-600 hover:text-indigo-500 underline decoration-2 underline-offset-4"
                            href="{{ route('register') }}">
                            {{ __('Daftar gratis') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
