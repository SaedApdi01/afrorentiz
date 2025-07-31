@extends('frontend.user.layouts.master')

@section('user-content')
    <!-- Add New Property Button -->
    <a href="{{ route('property.index') }}"
        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Add New Property
        <span
            class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
            <i class="fa-solid fa-plus"></i>
        </span>
    </a><br><br>

    @if (!Auth::user()->whatsapp && !Auth::user()->phone)
        <div class="inline-block px-3 py-1 text-sm font-semibold text-yellow-800 bg-yellow-200 rounded-lg">
            Please add your WhatsApp or phone number so clients can contact you .
            <a style="color: blue" href="{{ route('edit-profile') }}">Edit Profile</a>
        </div><br><br>
    @endif


    <!-- Stats Section -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
        <!-- Properties Added -->
        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow text-center">
            <div class="text-blue-600 dark:text-blue-400 text-3xl font-bold">{{ $propertAddeddCount }}</div>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Properties Added</p>
        </div>
        <!-- Messages -->
        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow text-center">
            <div class="text-purple-600 dark:text-purple-400 text-3xl font-bold">{{ $messages }}</div>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Total Messages</p>
        </div>
        <!-- Properties Saved -->
        <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow text-center">
            <div class="text-green-600 dark:text-green-400 text-3xl font-bold">0</div>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Scam Reports</p>
        </div>

    </div>

    <!-- Your Properties Section -->
    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Your Properties</h2>

    <!-- Property Card (Demo) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @if (Auth::user()->properties->count() > 0)
            @foreach (Auth::user()->properties as $property)
                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow">
                    <img src="{{ asset($property?->image_1) }}" alt="Property Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $property?->title }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">{{ $property?->address }},
                            {{ $property?->city }}, {{ $property?->country }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $property?->bedrooms }} Beds •
                            {{ $property?->bathrooms }} Baths • {{ $property?->parking_spaces }} Parking</p>
                        <p class="text-blue-600 dark:text-blue-400 font-semibold mt-2">${{ $property?->price }}</p>
                        <div class="mt-3 flex justify-end gap-3 text-sm">
                            <a href="{{ route('property.edit', $property->id) }}"
                                class="inline-flex items-center gap-1 text-blue-600 hover:underline hover:text-blue-800 transition">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('property.destroy', $property->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this property?');"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center gap-1 bg-red-100 text-red-600 hover:bg-red-200 hover:text-red-800 px-3 py-1 rounded text-sm transition">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 text-center">
                <p class="text-gray-600 dark:text-gray-300">You haven't added any properties yet.</p>
            </div>
        @endif

    </div>


@endsection
