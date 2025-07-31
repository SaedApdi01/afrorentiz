{{-- <x-guest-layout>
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
</x-guest-layout> --}}
@extends('frontend.layouts.auth-master')

@section('content')

<section class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4">

    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-md p-8 space-y-6">
        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white">Login to Your Account</h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Email</label>
                <input type="email"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded dark:bg-gray-700 dark:text-white"
                    name="email" id="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Password</label>
                <input type="password"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded dark:bg-gray-700 dark:text-white" name="password" id="password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400">
                <label><input type="checkbox" class="mr-1">Remember me</label>
                <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">Forgot Password?</a>
            </div>
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded font-semibold">Login</button>
        </form>

        {{-- <div class="text-center text-gray-500 dark:text-gray-400">or continue with</div> --}}

        {{-- <div class="flex space-x-4 justify-center">
            <button
                class="flex text-white items-center space-x-2 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded text-sm hover:bg-gray-100 dark:hover:bg-gray-700">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" />
                <span>Google</span>
            </button>
        </div> --}}

        <p class="text-center text-sm text-gray-600 dark:text-gray-400">Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
        </p>
    </div>
</section>
@endsection
