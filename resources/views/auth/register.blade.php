{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('frontend.layouts.auth-master')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-md p-8 space-y-6">
        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white">Create an Account</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Full Name</label>
                <input type="text" name="name"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            </div>
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded font-semibold">Register</button>
        </form>

        {{-- <div class="text-center text-gray-500 dark:text-gray-400">or register with</div> --}}

        {{-- <div class="flex space-x-4 justify-center">
            <button
                class="flex text-white items-center space-x-2 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded text-sm hover:bg-gray-100 dark:hover:bg-gray-700">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" />
                <span>Google</span>
            </button>
        </div> --}}

        <p class="text-center text-sm text-gray-600 dark:text-gray-400">Already have an account?
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>
</section>
@endsection
