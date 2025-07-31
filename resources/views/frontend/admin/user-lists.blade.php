@extends('frontend.admin.layouts.master')

@section('user-content')
    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Users</h2>

    @if ($users->isEmpty())
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow text-gray-600 dark:text-gray-300">
            No users found.
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($users as $user)
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow flex items-center space-x-4">
                    <img src="{{ $user->image ? asset($user->image) : 'https://api.dicebear.com/7.x/initials/svg?seed=' . urlencode($user->name) }}"
                        class="w-14 h-14 rounded-full object-cover border" alt="User Image">

                    <div class="flex-1">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $user->name }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                            <i class="fas fa-phone-alt mr-1"></i>{{ $user->phone ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $users->links('pagination::tailwind') }}
        </div>
    @endif
@endsection
