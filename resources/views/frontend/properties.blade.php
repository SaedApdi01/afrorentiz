@extends('frontend.layouts.master')
@section('meta')
    <title>All Properties - Afrorentiz</title>
    <meta name="description"
        content="Browse all available properties for rent and sale on Afrorentiz. Find houses, apartments, and commercial spaces across Africa with ease.">
    <meta name="keywords" content="all properties, real estate listings, apartments, houses, Africa real estate, Afrorentiz">

    <!-- Open Graph -->
    <meta property="og:title" content="All Properties - Afrorentiz">
    <meta property="og:description"
        content="Browse all available properties for rent and sale on Afrorentiz. Find houses, apartments, and commercial spaces across Africa with ease.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('assets/logo/icon.png') }}">
@endsection
@section('content')
    <!-- Featured Homes Section -->

    <section class="py-20 bg-gray-50 dark:bg-gray-900 ">
        <div class="container mx-auto px-4 max-w-7xl flex flex-col md:flex-row gap-6 py-8">
            <!-- Mobile Filter Toggle Button -->
            <button id="filterToggle"
                class="md:hidden flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded mb-4 w-full">
                <i class="fa-solid fa-filter"></i> Show Filters
            </button>

            <!-- Sidebar Filters - Hidden on mobile by default -->
            <aside id="filterSidebar"
                class="hidden md:block w-full md:w-1/3 bg-white dark:bg-gray-800 p-4 rounded shadow h-fit sticky top-24">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-bold text-gray-900 dark:text-white">Filters</h2>
                    <button id="closeFilters"
                        class="md:hidden text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>

                <form action="{{ route('properties') }}" method="GET" class="space-y-4">
                    <!-- Country -->
                    <div>
                        <label class="block mb-1 text-gray-700 dark:text-gray-300">Country</label>
                        <select name="country" id="country"
                            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-primary focus:border-primary">
                            <option value="">Select Country</option>
                            <!-- Your dynamic JS will populate this -->
                        </select>
                    </div>

                    <!-- City -->
                    <div>
                        <label class="block mb-1 text-gray-700 dark:text-gray-300">City</label>
                        <select name="city" id="city"
                            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-primary focus:border-primary">
                            <option value="">Select City</option>
                            <!-- Your dynamic JS will populate this -->
                        </select>
                    </div>

                    <!-- Price Range -->
                    <div>
                        <label class="block mb-1 text-gray-700 dark:text-gray-300">Price Range</label>
                        <select name="price"
                            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-primary focus:border-primary">
                            <option value="">Any</option>
                            <option value="0-1000" {{ request('price') == '0-1000' ? 'selected' : '' }}>$0 - $1,000</option>
                            <option value="1000-3000" {{ request('price') == '1000-3000' ? 'selected' : '' }}>$1,000 -
                                $3,000</option>
                            <option value="3000+" {{ request('price') == '3000+' ? 'selected' : '' }}>$3,000+</option>
                        </select>
                    </div>

                    <!-- Property Type -->
                    <div>
                        <label class="block mb-1 text-gray-700 dark:text-gray-300">Property Type</label>
                        <select name="property_type"
                            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-primary focus:border-primary">
                            <option value="">Any</option>
                            @foreach (['Villa', 'Apartment', 'Condo', 'House', 'Studio', 'Office'] as $type)
                                <option value="{{ $type }}"
                                    {{ request('property_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Listing Type -->
                    <div>
                        <label class="block mb-1 text-gray-700 dark:text-gray-300">Listing Type</label>
                        <select name="listing_type"
                            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-primary focus:border-primary">
                            <option value="">Any</option>
                            <option value="sale" {{ request('listing_type') == 'sale' ? 'selected' : '' }}>For Sale
                            </option>
                            <option value="rent" {{ request('listing_type') == 'rent' ? 'selected' : '' }}>For Rent
                            </option>
                        </select>
                    </div>

                    <!-- Features -->
                    <div>
                        <p class="text-gray-700 dark:text-gray-300 font-medium mb-1">Features</p>
                        <div class="space-y-2 text-sm text-gray-800 dark:text-gray-300">
                            <label class="flex items-center gap-2">
                                <input name="wifi" type="checkbox"
                                    class="form-checkbox rounded text-primary focus:ring-primary dark:bg-gray-700 dark:border-gray-600"
                                    {{ request()->has('wifi') ? 'checked' : '' }}>
                                <span>WiFi</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input name="pool" type="checkbox"
                                    class="form-checkbox rounded text-primary focus:ring-primary dark:bg-gray-700 dark:border-gray-600"
                                    {{ request()->has('pool') ? 'checked' : '' }}>
                                <span>Swimming Pool</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input name="parking_spaces" type="checkbox"
                                    class="form-checkbox rounded text-primary focus:ring-primary dark:bg-gray-700 dark:border-gray-600"
                                    {{ request()->has('parking_spaces') ? 'checked' : '' }}>
                                <span>Parking Space</span>
                            </label>
                        </div>
                    </div>

                    <!-- Filter Button -->
                    <div class="flex gap-2 pt-2">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-1 rounded transition flex items-center justify-center">
                            <i class="fa-solid fa-filter mr-2"></i> Apply Filters
                        </button>
                        <a href="{{ route('properties') }}"
                            class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white py-2 px-4 rounded transition flex items-center justify-center">
                            <i class="fa-solid fa-xmark mr-2"></i> Clear
                        </a>
                    </div>
                </form>
            </aside>

            <!-- Properties Grid -->
            <div class="w-full">

                <main class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                    @if ($properties->isNotEmpty())
                        @foreach ($properties as $property)
                            <div
                                class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col">
                                <!-- Image & Badges -->
                                <div class="relative">
                                    <img src="{{ asset($property->image_1) }}" alt="Property"
                                        class="w-full h-48 object-cover" />
                                    <div
                                        class="absolute top-3 left-3 bg-white/90 dark:bg-green-900/90 text-gray-900 dark:text-white font-bold px-3 py-1 rounded-full text-sm shadow-sm">
                                        ${{ number_format($property->price) }}
                                        {{ $property->listing_type == 'rent' ? ' / Monthly ' : '' }}
                                    </div>
                                    <div
                                        class="absolute top-3 right-3 bg-blue-600 text-white font-medium px-3 py-1 rounded-full text-xs uppercase tracking-wide shadow-sm">
                                        {{ $property->listing_type === 'rent' ? 'For Rent' : 'For Sale' }}
                                    </div>
                                </div>

                                <!-- Info -->
                                <div class="p-4 flex flex-col flex-grow">
                                    <h3 class="text-lg font-bold mb-1 text-gray-900 dark:text-white line-clamp-1">
                                        {{ $property->title }}
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 flex items-center mb-2">
                                        <i class="fa-solid fa-location-dot text-red-500 mr-2"></i>
                                        <span class="line-clamp-1">{{ $property->address }}, {{ $property->city }}</span>
                                    </p>

                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                                            <i class="fa-solid fa-bed mr-1 text-blue-500"></i> {{ $property->bedrooms }}
                                            beds
                                        </span>
                                        <span class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                                            <i class="fa-solid fa-bath mr-1 text-blue-500"></i> {{ $property->bathrooms }}
                                            baths
                                        </span>
                                        <span class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                                            <i class="fa-solid fa-upload mr-1 text-blue-500"></i>
                                            {{ $property->created_at->diffForHumans() }}
                                        </span>
                                    </div>

                                    <!-- Owner -->
                                    <div
                                        class="flex items-center space-x-3 mt-auto pt-3 border-t border-gray-200 dark:border-gray-700">
                                        <img src="{{ $property->owner->image ? asset($property->owner->image) : 'https://api.dicebear.com/9.x/initials/svg?seed=' . urlencode($property->owner->name) }}"
                                            alt="Owner" class="w-9 h-9 rounded-full object-cover" />
                                        <div class="flex-1 min-w-0">
                                            <p
                                                class="font-semibold text-gray-900 dark:text-white flex items-center space-x-1 truncate">
                                                <span>{{ $property->owner->name }}</span>
                                                <i class="fa-solid fa-circle-check text-blue-500 text-xs ml-1"
                                                    title="Verified"></i>
                                            </p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 truncate">
                                                {{ $property->owner->email }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- View Button -->
                                    <a href="{{ route('property.view', $property->slug) }}"
                                        class="mt-4 inline-flex items-center justify-center text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md">
                                        <i class="fa-solid fa-eye mr-2"></i> View Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="w-full text-center py-16 px-4 bg-white dark:bg-gray-800 rounded-md shadow-inner">
                            <i class="fa-solid fa-house-circle-xmark text-5xl text-red-500 mb-4"></i>
                            <h2 class="text-xl font-semibold text-gray-700 dark:text-white mb-2">No properties found</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-300">Try adjusting your search or come back
                                later.</p>
                        </div>
                    @endif

                </main>

                <!-- Hardcoded Pagination -->
                {{ $properties->links() }}

            </div>
        </div>
    </section>

    @push('main_scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const filterToggle = document.getElementById('filterToggle');
                const filterSidebar = document.getElementById('filterSidebar');
                const closeFilters = document.getElementById('closeFilters');

                // Toggle filter sidebar on mobile
                filterToggle.addEventListener('click', function() {
                    filterSidebar.classList.toggle('hidden');
                    filterSidebar.classList.add('fixed', 'inset-0', 'z-50', 'w-full', 'h-full', 'overflow-auto',
                        'bg-white', 'dark:bg-gray-800', 'p-6');
                    filterSidebar.classList.remove('sticky', 'top-24', 'max-h-[90vh]');

                    // Update button text
                    if (filterSidebar.classList.contains('hidden')) {
                        filterToggle.innerHTML = '<i class="fa-solid fa-filter"></i> Show Filters';
                    } else {
                        filterToggle.innerHTML = '<i class="fa-solid fa-filter"></i> Hide Filters';
                    }
                });

                // Close filters on mobile
                closeFilters.addEventListener('click', function() {
                    filterSidebar.classList.add('hidden');
                    filterSidebar.classList.remove('fixed', 'inset-0', 'z-50', 'w-full', 'h-full');
                    filterSidebar.classList.add('sticky', 'top-24', 'max-h-[90vh]');
                    filterToggle.innerHTML = '<i class="fa-solid fa-filter"></i> Show Filters';
                });
            });
        </script>
    @endpush
    @push('main_scripts')
        <script>
            const countrySelect = document.getElementById("country");
            const citySelect = document.getElementById("city");

            // These will come from Laravel (via Blade)
            const selectedCountry = @json(request('country'));
            const selectedCity = @json(request('city'));

            const africanCountries = [
                "Ethiopia",
                "Djibouti",
                "Somalia",
                "Kenya",
                "Uganda",
                "Eritrea"
            ];

            // Load countries and optionally select one
            function loadAfricanCountries() {
                countrySelect.innerHTML = `<option value="">Select Country</option>`;
                africanCountries.forEach(c => {
                    const option = document.createElement("option");
                    option.value = c;
                    option.textContent = c;
                    if (c === selectedCountry) {
                        option.selected = true;
                    }
                    countrySelect.appendChild(option);
                });

                if (selectedCountry) {
                    loadCities(selectedCountry, selectedCity);
                }
            }

            // Load cities using API, and optionally select one
            async function loadCities(country, selected = null) {
                citySelect.innerHTML = `<option value="">Loading cities...</option>`;
                try {
                    const res = await fetch("https://countriesnow.space/api/v0.1/countries/cities", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            country: country
                        })
                    });
                    const data = await res.json();
                    citySelect.innerHTML = `<option value="">Select City</option>`;
                    if (data.data && data.data.length > 0) {
                        data.data.forEach(city => {
                            const opt = document.createElement("option");
                            opt.value = city;
                            opt.textContent = city;
                            if (selected && city === selected) {
                                opt.selected = true;
                            }
                            citySelect.appendChild(opt);
                        });
                    } else {
                        citySelect.innerHTML = `<option value="">No cities found</option>`;
                    }
                } catch (error) {
                    citySelect.innerHTML = `<option value="">Error loading cities</option>`;
                    console.error(error);
                }
            }

            // When country changes
            countrySelect.addEventListener("change", function() {
                if (this.value) loadCities(this.value);
                else citySelect.innerHTML = `<option value="">Select City</option>`;
            });

            // Init
            loadAfricanCountries();
        </script>

        <script>
            // Google Places Autocomplete for Address
            function initAddressAutocomplete() {
                const input = document.getElementById('address');
                if (!input) return;
                new google.maps.places.Autocomplete(input, {
                    types: ['geocode'],
                    componentRestrictions: {
                        region: 'af'
                    }
                });
            }

            window.initAddressAutocomplete = initAddressAutocomplete;
        </script>
    @endpush
@endsection
