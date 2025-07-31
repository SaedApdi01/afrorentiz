@extends('frontend.user.layouts.master')

@section('user-content')
    <!-- Profile Form -->
    <div class="bg-white dark:bg-gray-800 rounded shadow p-6">
        <div class="flex items-center space-x-6 mb-6">
            <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : 'https://api.dicebear.com/9.x/initials/svg?seed=' . urlencode(Auth::user()->name) }}"
                alt="User Avatar" class="w-24 h-24 rounded-full" />
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white flex items-center space-x-2">
                    <span>{{ Auth::user()->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" title="Verified">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </h2>
                <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('update-profile') }}" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="name">Profile Photo</label>
                <input name="image" type="file"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />

            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="name">Full Name</label>
                <input name="name" type="text" value="{{ Auth::user()->name }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="email">Email</label>
                <input name="email" type="email" value="{{ Auth::user()->email }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="name">Phone Number</label>
                <input name="phone" type="text" value="{{ Auth::user()->phone ? Auth::user()->phone : '+254' }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1" for="name">Whatspp Number</label>
                <input name="whatsapp" type="text" value="{{ Auth::user()->whatsapp ? Auth::user()->whatsapp : '+254' }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />
            </div>
            @if (!Auth::user()->document)
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-1" for="name">Passport / National ID</label>
                    <input name="document" type="file"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                    <x-input-error :messages="$errors->get('document')" class="mt-2" />

                </div>
            @endif
            <button type="submit"
                class="bg-blue-600 text-white rounded px-6 py-2 hover:bg-blue-700 transition font-semibold">
                Save Changes
            </button>
        </form>
    </div> <br><br>

    <div class="bg-white dark:bg-gray-800 rounded shadow p-6">
        <form method="POST" action="{{ route('update-password') }}" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="current_password" class="block text-gray-700 dark:text-gray-300 mb-1">Current Password</label>
                <input type="password" name="current_password" id="current_password"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
            </div>
            <div>
                <label for="password" class="block text-gray-700 dark:text-gray-300 mb-1">New Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div>
                <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300 mb-1">Confirm New
                    Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <button type="submit"
                class="bg-blue-600 text-white rounded px-6 py-2 hover:bg-blue-700 transition font-semibold">
                Save Changes
            </button>
        </form>
    </div>
@endsection
