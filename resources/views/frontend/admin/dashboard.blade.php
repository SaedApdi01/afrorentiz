@extends('frontend.admin.layouts.master')

@section('user-content')
    <!-- Add New Property Button -->

    <!-- Stats Section -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
        <!-- Properties Added -->
        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow text-center">
            <div class="text-blue-600 dark:text-blue-400 text-3xl font-bold">{{ $properties }}</div>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Total Properties</p>
        </div>
        <!-- Properties Saved -->
        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow text-center">
            <div class="text-green-600 dark:text-green-400 text-3xl font-bold">{{ $users }}</div>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Total Users</p>
        </div>
        <!-- Messages -->
        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow text-center">
            <div class="text-purple-600 dark:text-purple-400 text-3xl font-bold">{{  $messages  }}</div>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Total Messages</p>
        </div>
    </div>



@endsection
