@extends('frontend.layouts.master')
@section('meta')
    <title>Afrorentiz - Find Houses and Apartments Across Africa</title>
    <meta name="description"
        content="Discover affordable houses, apartments, and properties for rent or sale across Africa. Browse listings on Afrorentiz to find your perfect home.">
    <meta name="keywords" content="Africa real estate, houses for rent, apartments, property listings, Afrorentiz">

    <!-- Open Graph -->
    <meta property="og:title" content="Afrorentiz - Find Houses and Apartments Across Africa">
    <meta property="og:description"
        content="Discover affordable houses, apartments, and properties for rent or sale across Africa. Browse listings on Afrorentiz to find your perfect home.">
    <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('assets/logo/icon.png') }}">
@endsection
@section('content')
    <section class="relative">
        <!-- Hero with background image and overlay -->
        <div class="relative bg-cover bg-center bg-no-repeat min-h-[600px]"
            style="background-image: url('https://storage.googleapis.com/a1aa/image/bbaf7aed-d5e7-43d6-0c22-5ae79c9c667e.jpg');">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-white bg-opacity-75 dark:bg-black dark:bg-opacity-60"></div>

            <!-- Content -->
            <div class="relative flex flex-col justify-center items-center px-4 py-24 max-w-4xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-6 text-gray-900 dark:text-white leading-tight">
                    Find <span class="text-blue-600 dark:text-white-400">Your Dream Home</span>
                </h1>
                <p class="mb-10 text-base sm:text-lg md:text-xl max-w-2xl mx-auto text-gray-700 dark:text-gray-300">
                    Explore the finest properties in your city — modern apartments, cozy homes, and everything in between.
                    Let us help you find a place you truly belong.
                </p>

                <!-- Search form -->
                <form method="GET" action="{{ route('properties') }}"
                    class="w-full max-w-4xl grid grid-cols-1 sm:grid-cols-6 gap-3 bg-white dark:bg-gray-800 rounded-lg p-6 shadow-md text-gray-900 dark:text-gray-100">

                    <!-- Country Select -->
                    <div class="sm:col-span-1">
                        <select id="country" name="country"
                            class="w-full px-3 py-2 text-sm border rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Country</option>
                            <!-- Dynamic countries loaded by JS -->
                        </select>
                    </div>

                    <!-- City Select -->
                    <div class="sm:col-span-1">
                        <select id="city" name="city"
                            class="w-full px-3 py-2 text-sm border rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">City</option>
                            <!-- Dynamic cities loaded by JS -->
                        </select>
                    </div>

                    <!-- Listing Type -->
                    <div class="sm:col-span-1">
                        <select id="listing_type" name="listing_type"
                            class="w-full px-3 py-2 text-sm border rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Any</option>
                            <option value="sale" {{ request('listing_type') == 'sale' ? 'selected' : '' }}>For Sale
                            </option>
                            <option value="rent" {{ request('listing_type') == 'rent' ? 'selected' : '' }}>For Rent
                            </option>
                        </select>
                    </div>

                    <!-- Price Range -->
                    <div class="sm:col-span-1">
                        <select name="price"
                            class="w-full px-3 py-2 text-sm border rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Price</option>
                            <option value="0-1000" {{ request('price') == '0-1000' ? 'selected' : '' }}>$0 - $1K</option>
                            <option value="1000-3000" {{ request('price') == '1000-3000' ? 'selected' : '' }}>$1K - $3K
                            </option>
                            <option value="3000+" {{ request('price') == '3000+' ? 'selected' : '' }}>$3K+</option>
                        </select>
                    </div>

                    <!-- Property Type -->
                    <div class="sm:col-span-1">
                        <select name="property_type"
                            class="w-full px-3 py-2 text-sm border rounded-lg dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Type</option>
                            @foreach (['Villa', 'Apartment', 'Condo', 'House', 'Studio', 'Office'] as $type)
                                <option value="{{ $type }}"
                                    {{ request('property_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search Button -->
                    <div class="sm:col-span-1 flex items-center">
                        <button type="submit"
                            class="w-full h-full bg-blue-600 hover:bg-blue-700 text-white rounded-lg p-2 transition flex items-center justify-center"
                            title="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>


    <!-- Featured Homes Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4 max-w-7xl flex flex-col md:flex-row gap-6 py-8">
            <!-- Sidebar -->
            {{-- <aside class="w-full md:w-1/4 bg-white dark:bg-gray-800 p-4 rounded shadow">
                <h2 class="font-bold mb-4 text-gray-900 dark:text-white">Filters</h2>
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-300">Location</label>
                    <input type="text" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white"
                        placeholder="Enter location" />
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-300">Price Range</label>
                    <select class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                        <option value="">Any</option>
                        <option value="0-1000">$0 - $1,000</option>
                        <option value="1000-3000">$1,000 - $3,000</option>
                        <option value="3000+">$3,000+</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300">Property Type</label>
                    <select class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                        <option value="">Any</option>
                        <option value="house">House</option>
                        <option value="apartment">Apartment</option>
                        <option value="condo">Condo</option>
                    </select>
                </div>
            </aside> --}}

            <!-- Properties List -->
            <main class="w-full grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
                @foreach ($properties as $property)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col">
                        <!-- Image Container with Price Badge and Listing Type -->
                        <div class="relative">
                            <img src="{{ asset($property->image_1) }}" alt="Property" class="w-full h-48 object-cover" />

                            <!-- Price Badge Top Left -->
                            <div
                                class="absolute top-3 left-3 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm text-gray-900 dark:text-white font-bold px-3 py-1 rounded-full text-sm shadow-sm">
                                ${{ number_format($property->price) }}
                            </div>

                            <!-- Listing Type Badge Top Right -->
                            <div
                                class="absolute top-3 right-3 bg-blue-600 text-white font-medium px-3 py-1 rounded-full text-xs uppercase tracking-wide shadow-sm">
                                {{ $property->listing_type === 'rent' ? 'For Rent' : 'For Sale' }}
                            </div>
                        </div>

                        <!-- Property Details -->
                        <div class="p-4 flex flex-col flex-grow">
                            <!-- Title -->
                            <h3 class="text-lg font-bold mb-1 text-gray-900 dark:text-white line-clamp-1">
                                {{ $property->title }}
                            </h3>

                            <!-- Location -->
                            <p class="text-sm text-gray-600 dark:text-gray-400 flex items-center mb-2">
                                <i class="fa-solid fa-location-dot text-red-500 mr-2"></i>
                                <span class="line-clamp-1">{{ $property->address }}, {{ $property->city }}</span>
                            </p>

                            <!-- Property Specs -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                                    <i class="fa-solid fa-bed mr-1 text-blue-500"></i> {{ $property->bedrooms }} beds
                                </span>
                                <span class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                                    <i class="fa-solid fa-bath mr-1 text-blue-500"></i> {{ $property->bathrooms }} baths
                                </span>
                                <span class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                                    <i class="fa-solid fa-upload mr-1 text-blue-500"></i>
                                    {{ $property->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <!-- Owner Info -->
                            <div
                                class="flex items-center space-x-3 mt-auto pt-3 border-t border-gray-200 dark:border-gray-700">
                                <img src="{{ $property->owner->image ? asset($property->owner->image) : 'https://api.dicebear.com/9.x/initials/svg?seed=' . urlencode($property->owner->name) }}"
                                    alt="Owner Avatar" class="w-9 h-9 rounded-full object-cover" />
                                <div class="flex-1 min-w-0">
                                    <p
                                        class="font-semibold text-gray-900 dark:text-white flex items-center space-x-1 truncate">
                                        <span>{{ $property->owner->name }}</span>
                                        <i class="fa-solid fa-circle-check text-blue-500 text-xs ml-1" title="Verified"></i>
                                    </p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 truncate">
                                        {{ $property->owner->email }}</p>
                                </div>
                            </div>

                            <!-- View Button -->
                            <a href="{{ route('property.view', $property->slug) }}"
                                class="mt-4 inline-flex items-center justify-center text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md transition-colors duration-300">
                                <i class="fa-solid fa-eye mr-2"></i> View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </main>


        </div>

    </section>

    <section class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-bold">
                Testimonials
            </h2>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
                Hear from our happy clients who found their perfect homes in Nairobi, Mogadishu, and Hargeisa with
                Afrorentiz.
            </p>
        </div>
        <div class="mt-16 max-w-7xl mx-auto grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg flex flex-col items-center text-center">
                <img alt="Portrait of a smiling Somali man with short curly hair wearing a light blue shirt, standing outdoors in a sunny urban environment"
                    class="w-24 h-24 rounded-full object-cover" height="96"
                    src="https://storage.googleapis.com/a1aa/image/b3a94859-8e03-4362-9fc8-40eacb4f620b.jpg"
                    width="96" />
                <h3 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">
                    Abdi Mohamed
                </h3>
                <p class="mt-4 text-gray-700 dark:text-gray-300 max-w-xs">
                    “Afrorentiz helps me to find my new home in Nairobi. The process was smooth and the team was very
                    supportive throughout.”
                </p>
            </div>
            <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg flex flex-col items-center text-center">
                <img alt="Portrait of a happy Somali woman with braided hair wearing a white blouse, smiling indoors with soft natural light"
                    class="w-24 h-24 rounded-full object-cover" height="96"
                    src="https://storage.googleapis.com/a1aa/image/6b89cbee-6c2b-43c4-455c-e301f7680d6a.jpg"
                    width="96" />
                <h3 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">
                    Fadumo Ali
                </h3>
                <p class="mt-4 text-gray-700 dark:text-gray-300 max-w-xs">
                    “Thanks to Afrorentiz, I found a beautiful apartment in Mogadishu that fits my budget perfectly. Highly
                    recommended!”
                </p>
            </div>
            <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg flex flex-col items-center text-center">
                <img alt="Portrait of a confident Somali man with short hair and a trimmed beard wearing a dark jacket, standing in front of a modern building"
                    class="w-24 h-24 rounded-full object-cover" height="96"
                    src="https://storage.googleapis.com/a1aa/image/369602b5-6def-42e2-16da-0741070a202f.jpg"
                    width="96" />
                <h3 class="mt-6 text-xl font-semibold text-gray-800 dark:text-white">
                    Hassan Warsame
                </h3>
                <p class="mt-4 text-gray-700 dark:text-gray-300 max-w-xs">
                    “I needed a home in Hargeisa and Afrorentiz made it easy to find exactly what I wanted. Great service
                    and friendly staff.”
                </p>
            </div>
        </div>
    </section>


    @push('main_scripts')
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABr5lopM7hRTReYjwA-_a3lFn63y8NE1w&libraries=places&callback=initMap"
            async defer></script>
        <script>
            const countrySelect = document.getElementById("country");
            const citySelect = document.getElementById("city");

            // Filtered list of African countries
            const africanCountries = [
                "Ethiopia",
                "Djibouti",
                "Somalia",
                "Kenya",
                "Uganda",
                "Eritrea",
                'South Africa'
            ];


            // Load countries
            function loadAfricanCountries() {
                countrySelect.innerHTML = `<option value="">Select Country</option>`;
                africanCountries.forEach(c => {
                    const option = document.createElement("option");
                    option.value = c;
                    option.textContent = c;
                    countrySelect.appendChild(option);
                });
            }

            // Load cities using API
            async function loadCities(country) {
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

            // Events
            countrySelect.addEventListener("change", function() {
                if (this.value) loadCities(this.value);
            });

            // Init
            loadAfricanCountries();
        </script>
        <script>
            function initAddressAutocomplete() {
                const input = document.getElementById('address');
                new google.maps.places.Autocomplete(input, {
                    types: ['geocode'], // or use ['address'] for stricter results
                    componentRestrictions: {
                        region: 'af'
                    } // 'af' limits suggestions to Africa
                });
            }

            // Call after page load
            window.initAddressAutocomplete = initAddressAutocomplete;
        </script>
    @endpush
@endsection
