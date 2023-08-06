<x-guest-register>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="relative mb-6">
            <x-input-label for="name" :value="__('Nama Lengkap')"
                class="p1 text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
            <div class="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 mt-7 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <x-text-input id="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

         <!-- Username -->
         <div class="relative mb-6">
            <x-input-label for="username" :value="__('Username')"
                class="p1 text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
            <div class="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 mt-7 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <x-text-input id="username"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                type="text" name="username" :value="old('username')" required autofocus autocomplete="username"
                placeholder="John Doe" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

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

        <!-- Phone Number -->
        <div class="relative mb-6">
            <x-input-label for="phone" :value="__('No. Handphone')"
                class="p1 text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
            <div class="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 mt-7 h-4 text-gray-500 dark:text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                </svg>
            </div>
            <x-text-input id="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone"
                placeholder="+123-4567-8910" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
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

        <!-- Confirm Password -->
        <div class="relative mb-6">
            <x-input-label for="password_confirmation" :value="__('Ulangi Password')"
                class="p1 text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white" />
            <div class="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 mt-7 h-4 text-gray-500 dark:text-gray-400">
                    <path stroke-linecap=" round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </div>
            <x-text-input id="password_confirmation"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                type="password" name="password_confirmation" :value="old('password_confirmation')" required autofocus
                autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="text-white bg-blue-700 font-medium text-sm">
            {{ __('Register') }}
        </x-primary-button>
    </form>

    <x-guest-registerwith>

    </x-guest-registerwith>

    <div class="flex items-center justify-center mt-2 space-x-1">
        <span class="text-sm text-black-600 ">{{ __('Sudah Mendaftar ?') }} </span>
        <a class="text-sm text-blue-800 hover:text-violet-600" href="{{ route('login') }}">
            {{ __('Silahkan Login ') }}
        </a>
    </div>
</x-guest-register>
