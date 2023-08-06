<x-guest-login>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="relative mb-6">
            <x-input-label for="email" :value="__('Email')"
                class="p1 text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
            <div class="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 mt-7 h-4 text-gray-500 dark:text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
            </div>
            <x-text-input id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="email"
                placeholder="JohnDoe@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="relative mb-6">
            <x-input-label for="password" :value="__('Password')"
                class="p1 text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
            <div class="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 mt-7 h-4 text-gray-500 dark:text-gray-400">
                    <path stroke-linecap=" round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </div>
            <x-text-input id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                type="password" name="password" :value="old('password')" required autofocus autocomplete="password"
                placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-start">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                </div>
                <label for="remember_me" class="inline-flex items-center">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="ml-auto text-sm text-blue-700 dark:text-blue-500 text-gray-600 hover:text-yellow-700"
                    href="{{ route('password.request') }}">
                    {{ __('Lupa Password ?') }}
                </a>
            @endif
        </div>

        <div class="flex justify-center mt-5">
            <x-primary-button> {{ __('Masuk') }} </x-primary-button>
        </div>
    </form>

    <x-guest-loginwith>

    </x-guest-loginwith>

    <div class="flex items-center justify-center mt-2 space-x-1">
        <span class="text-sm text-black-600 ">{{ __('Belum Punya akun?') }} </span>
        <a class="text-sm text-blue-800 hover:text-violet-600" href="{{ route('register') }}">
            {{ __('Daftar Sekarang! ') }}
        </a>
    </div>

    <div class="flex items-center justify-center mt-2 space-x-1">
        <span class="text-sm text-black-600 ">{{ __('Akun Belum Aktif?') }} </span>
        <a class="text-sm text-blue-800 hover:text-violet-600" href="{{ route('register') }}">
            {{ __('Kirim Ulang E-mail Aktivasi') }}
        </a>
    </div>
</x-guest-login>
