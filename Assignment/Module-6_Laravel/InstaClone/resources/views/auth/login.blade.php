<x-guest-layout>
    <div class="mb-6 text-center">
        <a href="{{ route('home') }}" class="inline-flex items-center justify-center rounded-full bg-green-500 p-4 text-white shadow-sm" aria-label="Playlist Manager home">
            <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M5 6.5h8M5 11.5h6M5 16.5h5" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                <path d="M17 5v10.25a2.75 2.75 0 1 1-1.5-2.46V7l4-1.5v8.75a2.75 2.75 0 1 1-1.5-2.46V5.5L17 5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
            </svg>
        </a>
        <h1 class="mt-4 text-2xl font-semibold text-gray-800">Welcome to Your Playlist Manager</h1>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
