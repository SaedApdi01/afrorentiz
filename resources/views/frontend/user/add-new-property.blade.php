@extends('frontend.user.layouts.master')

@section('user-content')
    <div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow mt-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Add New Property</h2>
        <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Basic Info -->
            <div class="mb-4">
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="title">Title</label>
                <input id="title" name="title" type="text" placeholder="Property title"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="description">Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Property description"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white"></textarea>
                     <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="price">Price ($)</label>
                    <input id="price" name="price" type="number" placeholder="Price"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                         <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="property_type">Property Type</label>
                    <select id="property_type" name="property_type"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                        <option value="Villa">Villa</option>
                        <option value="Apartment" selected>Apartment</option>
                        <option value="Condo">Condo</option>
                        <option value="House">House</option>
                        <option value="Studio">Studio</option>
                        <option value="Office">Office</option>
                    </select>
                     <x-input-error :messages="$errors->get('property_type')" class="mt-2" />
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="listing_type">Listing Type</label>
                    <select id="listing_type" name="listing_type"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                        <option value="sale" selected>For Sale</option>
                        <option value="rent">For Rent</option>
                    </select>
                </div>
            </div>

            <!-- Location -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="country">Country</label>
                    <select id="country" name="country"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                        <option value="">Select Country</option>
                        <!-- Add your countries here -->
                    </select>
                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="city">City</label>
                    <select id="city" name="city"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                        <option value="">Select City</option>
                    </select>
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="address">Address</label>
                    <input id="address" name="address" type="text" placeholder="Full address"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
            </div>

            <!-- Property Details -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="bedrooms">Bedrooms</label>
                    <input id="bedrooms" name="bedrooms" type="number" min="0" value="0"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                        <x-input-error :messages="$errors->get('bedrooms')" class="mt-2" />
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="bathrooms">Bathrooms</label>
                    <input id="bathrooms" name="bathrooms" type="number" min="0" value="0"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                        <x-input-error :messages="$errors->get('bathrooms')" class="mt-2" />
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300" for="parking_spaces">Parking Spaces</label>
                    <input id="parking_spaces" name="parking_spaces" type="number" min="0" value="0"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                        <x-input-error :messages="$errors->get('parking_spaces')" class="mt-2" />
                </div>
            </div>

            <!-- Features -->
            <div class="mb-4">
                <label class="block mb-3 text-gray-700 dark:text-gray-300">Features</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" id="wifi" name="wifi" value="1" />
                        <span class="ml-2">WiFi</span>
                        <x-input-error :messages="$errors->get('wifi')" class="mt-2" />
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" id="elevator" name="elevator" value="1" />
                        <span class="ml-2">Elevator</span>
                        <x-input-error :messages="$errors->get('elevator')" class="mt-2" />
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" id="garden" name="garden" value="1" />
                        <span class="ml-2">Garden</span>
                        <x-input-error :messages="$errors->get('garden')" class="mt-2" />
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" id="pool" name="pool" value="1" />
                        <span class="ml-2">Swimming Pool</span>
                        <x-input-error :messages="$errors->get('pool')" class="mt-2" />
                    </label>
                </div>
            </div>

            <!-- Image Uploads -->
            <div class="mb-6">
                <label class="block mb-3 text-gray-700 dark:text-gray-300">Property Images</label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300" for="image_1">Main
                            Image</label>
                        <input id="image_1" name="image_1" type="file"
                            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                            <x-input-error :messages="$errors->get('image_1')" class="mt-2" />
                    </div>
                    <div>
                        <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300" for="image_2">Secondary
                            Image</label>
                        <input id="image_2" name="image_2" type="file"
                            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                            <x-input-error :messages="$errors->get('image_2')" class="mt-2" />
                    </div>
                    <div>
                        <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300" for="image_3">Additional
                            Image</label>
                        <input id="image_3" name="image_3" type="file"
                            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                            <x-input-error :messages="$errors->get('image_3')" class="mt-2" />
                    </div>
                </div>
            </div>

            <button type="submit"
                class="bg-blue-600 text-white rounded px-6 py-2 hover:bg-blue-700 transition font-semibold">
                Add Property
            </button>
        </form>
    </div>

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
                "Eritrea"
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
