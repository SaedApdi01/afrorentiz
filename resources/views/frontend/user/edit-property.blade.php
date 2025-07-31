@extends('frontend.user.layouts.master')

@section('user-content')
<div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow mt-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Edit Property</h2>
    <form action="{{ route('property.update', $property->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 text-gray-700 dark:text-gray-300" for="title">Title</label>
            <input id="title" name="title" type="text"
                value="{{ old('title', $property->title) }}"
                class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-gray-700 dark:text-gray-300" for="description">Description</label>
            <textarea id="description" name="description" rows="4"
                class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">{{ old('description', $property->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="price">Price ($)</label>
                <input id="price" name="price" type="number"
                    value="{{ old('price', $property->price) }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="property_type">Property Type</label>
                <select id="property_type" name="property_type"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                    @foreach(['Villa','Apartment','Condo','House','Studio','Office'] as $type)
                        <option value="{{ $type }}" {{ $property->property_type == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="listing_type">Listing Type</label>
                <select id="listing_type" name="listing_type"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                    <option value="sale" {{ $property->listing_type == 'sale' ? 'selected' : '' }}>For Sale</option>
                    <option value="rent" {{ $property->listing_type == 'rent' ? 'selected' : '' }}>For Rent</option>
                </select>
            </div>
        </div>

        <!-- Location -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="country">Country</label>
                <select id="country" name="country"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                </select>
                <x-input-error :messages="$errors->get('country')" class="mt-2" />
            </div>
            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="city">City</label>
                <select id="city" name="city"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                </select>
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>
            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="address">Address</label>
                <input id="address" name="address" type="text" value="{{ old('address', $property->address) }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
        </div>

        <!-- Property Details -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="bedrooms">Bedrooms</label>
                <input id="bedrooms" name="bedrooms" type="number" min="0"
                    value="{{ old('bedrooms', $property->bedrooms) }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
            </div>
            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="bathrooms">Bathrooms</label>
                <input id="bathrooms" name="bathrooms" type="number" min="0"
                    value="{{ old('bathrooms', $property->bathrooms) }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
            </div>
            <div>
                <label class="block mb-1 text-gray-700 dark:text-gray-300" for="parking_spaces">Parking Spaces</label>
                <input id="parking_spaces" name="parking_spaces" type="number" min="0"
                    value="{{ old('parking_spaces', $property->parking_spaces) }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
            </div>
        </div>

        <!-- Features -->
        <div class="mb-4">
            <label class="block mb-3 text-gray-700 dark:text-gray-300">Features</label>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach (['wifi' => 'WiFi', 'elevator' => 'Elevator', 'garden' => 'Garden', 'pool' => 'Swimming Pool'] as $field => $label)
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" id="{{ $field }}" name="{{ $field }}" value="1" {{ $property->$field ? 'checked' : '' }} />
                        <span class="ml-2">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Image Uploads -->
        <div class="mb-6">
            <label class="block mb-3 text-gray-700 dark:text-gray-300">Property Images</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach(['image_1', 'image_2', 'image_3'] as $imageField)
                    <div>
                        <label class="block mb-1 text-sm text-gray-700 dark:text-gray-300" for="{{ $imageField }}">@php echo ucwords(str_replace('_', ' ', $imageField)); @endphp</label>
                        <input id="{{ $imageField }}" name="{{ $imageField }}" type="file"
                            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" />
                        @if ($property->$imageField)
                            <img src="{{ asset($property->$imageField) }}" class="w-full h-32 object-cover mt-2 rounded" />
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit"
            class="bg-green-600 text-white rounded px-6 py-2 hover:bg-green-700 transition font-semibold">
            Update Property
        </button>
    </form>
</div>

@push('main_scripts')
<script>
    const countrySelect = document.getElementById("country");
    const citySelect = document.getElementById("city");

    const africanCountries = ["Ethiopia", "Djibouti", "Somalia", "Kenya", "Uganda", "Eritrea"];

    function loadAfricanCountries(selected) {
        countrySelect.innerHTML = `<option value="">Select Country</option>`;
        africanCountries.forEach(c => {
            const opt = document.createElement("option");
            opt.value = c;
            opt.textContent = c;
            if (selected === c) opt.selected = true;
            countrySelect.appendChild(opt);
        });
    }

    async function loadCities(country, selectedCity) {
        citySelect.innerHTML = `<option value="">Loading cities...</option>`;
        try {
            const res = await fetch("https://countriesnow.space/api/v0.1/countries/cities", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ country: country })
            });
            const data = await res.json();
            citySelect.innerHTML = `<option value="">Select City</option>`;
            if (data.data && data.data.length > 0) {
                data.data.forEach(city => {
                    const opt = document.createElement("option");
                    opt.value = city;
                    opt.textContent = city;
                    if (selectedCity === city) opt.selected = true;
                    citySelect.appendChild(opt);
                });
            } else {
                citySelect.innerHTML = `<option value="">No cities found</option>`;
            }
        } catch (err) {
            citySelect.innerHTML = `<option value="">Error loading cities</option>`;
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        loadAfricanCountries("{{ $property->country }}");
        if ("{{ $property->country }}") {
            loadCities("{{ $property->country }}", "{{ $property->city }}");
        }

        countrySelect.addEventListener("change", function () {
            if (this.value) loadCities(this.value);
        });
    });
</script>
@endpush

@endsection
