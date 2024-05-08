<x-guest-layout>
    <x-mysoftcare.general.card>
        <x-slot name="logo">
            <img src="{{ asset('img/mysoftcare.png') }}" alt="">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <div class="mb-4 text-lg font-medium">
            Log masuk
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Emel') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="app()->environment('local') ? 'admin@gmail.com' : old('email')"
                    required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Kata Laluan') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                    value="{{ app()->environment('local') ? 'pswd123' : '' }}" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4 mb-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                </label>
            </div>

            <div class="flex justify-end mb-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-blue-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Lupa kata laluan?') }}
                    </a>
                @endif
            </div>
            <button class="bg-blue-500 hover:bg-blue-900 text-white py-2 w-full rounded-lg uppercase">
                {{ __('Log masuk') }}
            </button>
        </form>
    </x-mysoftcare.general.card>
</x-guest-layout>
