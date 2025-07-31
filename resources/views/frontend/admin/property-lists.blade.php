@extends('frontend.admin.layouts.master')

@section('user-content')
    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">All Properties</h2>

    @if ($properties->isEmpty())
        <div class="p-6 bg-white dark:bg-gray-800 rounded shadow text-gray-700 dark:text-gray-300">
            No properties available.
        </div>
    @else
        <div class="space-y-6">
            @foreach ($properties as $property)
                <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="flex items-center space-x-4">
                        <img src="{{ $property->image_1 ? asset($property->image_1) : 'https://via.placeholder.com/80x60' }}"
                             alt="Image"
                             class="w-28 h-20 rounded object-cover border">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $property->title }}</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>{{ $property->city ?? 'N/A' }}, {{ $property->country ?? '' }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-dollar-sign mr-1 text-green-500"></i>{{ number_format($property->price) }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 md:mt-0 flex space-x-2">
                        <a target="_blank" href="{{ route('property.view', $property->slug) }}"
                           class="text-blue-600 hover:underline text-sm flex items-center">
                            <i class="fas fa-eye mr-1"></i> View
                        </a>
                        <a href="{{ route('property.edit', $property->id) }}"
                           class="text-yellow-600 hover:underline text-sm flex items-center">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.destroy.property', $property->id) }}" method="POST"
                              onsubmit="return confirm('Delete this property?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:underline text-sm flex items-center">
                                <i class="fas fa-trash-alt mr-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            <!-- Pagination -->
            <div class="mt-6">
                {{ $properties->links('pagination::tailwind') }}
            </div>
        </div>
    @endif
@endsection
