<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">
        <div
            class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-xl overflow-hidden sm:rounded-2xl border border-gray-100">

            <div class="mb-8 text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Buat Akun</h2>
                <p class="text-sm text-gray-500 mt-2">Silakan isi data diri Anda untuk bergabung</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="group">
                    <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700 font-semibold" />
                    <div class="relative mt-1">
                        <x-text-input id="name"
                            class="block w-full pl-3 pr-3 py-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                            type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                            placeholder="John Doe" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                    <x-text-input id="email"
                        class="block mt-1 w-full px-3 py-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                        type="email" name="email" :value="old('email')" required autocomplete="username"
                        placeholder="nama@email.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                        <x-text-input id="password"
                            class="block mt-1 w-full px-3 py-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                            type="password" name="password" required autocomplete="new-password"
                            placeholder="••••••••" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi')"
                            class="text-gray-700 font-semibold" />
                        <x-text-input id="password_confirmation"
                            class="block mt-1 w-full px-3 py-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                            type="password" name="password_confirmation" required autocomplete="new-password"
                            placeholder="••••••••" />
                    </div>
                </div>
                <div class="col-span-2">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="mt-8">
                    <x-primary-button
                        class="w-full justify-center py-3 text-sm font-bold uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-900 focus:ring-indigo-500 rounded-xl transition duration-300 shadow-lg shadow-indigo-200">
                        {{ __('Daftar Sekarang') }}
                    </x-primary-button>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun?
                        <a class="font-bold text-indigo-600 hover:text-indigo-500 underline decoration-2 underline-offset-4"
                            href="{{ route('login') }}">
                            {{ __('Masuk di sini') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
