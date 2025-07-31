{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('frontend.layouts.auth-master')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4">

    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-md p-8 space-y-6">
        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white">Forgot your password?</h2>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Email</label>
                <input type="email"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 dark:border-gray-700 rounded dark:bg-gray-700 dark:text-white"
                    name="email" id="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded font-semibold">Login</button>
        </form>

    </div>
</section>
@endsection
