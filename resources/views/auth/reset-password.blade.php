{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('frontend.layouts.auth-master')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4">

    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-md p-8 space-y-6">
        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white">Reset Password</h2>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Email</label>
                <input type="email"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded dark:bg-gray-700 dark:text-white"
                    name="email" id="email" value="{{ old('email', $request->email) }}" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Password</label>
                <input type="password"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded dark:bg-gray-700 dark:text-white"
                    name="password" id="password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-300">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded font-semibold">Reset
                Password</button>
        </form>


    </div>
</section>
@endsection
