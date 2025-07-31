@extends('frontend.layouts.master')
@section('meta')
    <title>{{ $property->title }} - Afrorentiz</title>
    <meta name="description" content="{{ Str::limit($property->description, 160) }}">
    <meta name="keywords" content="{{ $property->property_type }}, {{ $property->city }}, {{ $property->country }}, real estate, rental">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ $property->title }} - Afrorentiz">
    <meta property="og:description" content="{{ Str::limit($property->description, 160) }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset($property->image_1) }}">

    <!-- Twitter -->
    <meta name="twitter:title" content="{{ $property->title }} - Afrorentiz">
    <meta name="twitter:description" content="{{ Str::limit($property->description, 160) }}">
    <meta name="twitter:image" content="{{ asset($property->image_1) }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('content')
    <section class="pt-20 max-w-7xl mx-auto p-4 grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-3 space-y-6">
            <!-- Image Gallery -->
            <div
                class="grid gap-4
            @if ($property->image_2 && $property->image_3) grid-cols-1 sm:grid-cols-3
            @elseif ($property->image_2) grid-cols-1 sm:grid-cols-2
            @else grid-cols-1 @endif
        ">
                <img src="{{ asset($property->image_1) }}"
                    class="w-full rounded-lg object-cover @if (!$property->image_2 && !$property->image_3) h-67 @else h-48 @endif"
                    alt="Property Image">

                @if ($property->image_2)
                    <img src="{{ asset($property->image_2) }}" class="w-full rounded-lg h-48 object-cover"
                        alt="Property Image">
                @endif

                @if ($property->image_3)
                    <img src="{{ asset($property->image_3) }}" class="w-full rounded-lg h-48 object-cover"
                        alt="Property Image">
                @endif
            </div>

            <!-- Property Info -->
            <div class="space-y-2">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $property->title }}</h2>
                <p class="text-gray-600 dark:text-gray-300"><i class="fas fa-map-marker-alt text-blue-600 mr-1"></i>
                    {{ $property->address ?? '' }}, {{ $property->city }}, {{ $property->country }}
                </p>
                <p class="text-lg font-semibold text-green-600 dark:text-green-400">
                    <i id="currency-icon" class="fas fa-dollar-sign mr-1"></i>
                    <span
                        id="base-price">{{ $property->price }}</span>{{ $property->listing_type == 'rent' ? ' / Monthly' : '' }}
                </p>

                <select id="currency-selector"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-primary focus:border-primary">
                    <option value="USD" data-symbol="$">United States (USD)</option>
                    <option value="ETB" data-symbol="Br">Ethiopia (ETB)</option>
                    <option value="SOS" data-symbol="Sh">Somalia (SOS)</option>
                    <option value="KES" data-symbol="KSh">Kenya (KES)</option>
                    <option value="DJF" data-symbol="Fdj">Djibouti (DJF)</option>
                    <option value="UGX" data-symbol="USh">Uganda (UGX)</option>
                    <option value="ZAR" data-symbol="R">South Africa (ZAR)</option>
                </select>


                <p class="text-gray-700 dark:text-gray-200">
                    {{ $property->description }}
                </p>
            </div>

            <!-- Features -->
            <div class="flex flex-wrap gap-4 pt-4 text-gray-800 dark:text-gray-100">
                <div class="flex items-center gap-2">
                    <i class="fas fa-building text-blue-500"></i> {{ $property->property_type }}
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-bed text-purple-500"></i> {{ $property->bedrooms }} Bedrooms
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-bath text-teal-500"></i> {{ $property->bathrooms }} Bathrooms
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-car text-orange-500"></i> {{ $property->parking_spaces }} Parking
                </div>
                @if ($property->wifi)
                    <div class="flex items-center gap-2"><i class="fas fa-wifi text-indigo-500"></i> Wi-Fi</div>
                @endif
                @if ($property->elevator)
                    <div class="flex items-center gap-2"><i class="fas fa-elevator text-pink-500"></i> Elevator</div>
                @endif
                @if ($property->garden)
                    <div class="flex items-center gap-2"><i class="fas fa-seedling text-green-500"></i> Garden</div>
                @endif
                @if ($property->pool)
                    <div class="flex items-center gap-2"><i class="fas fa-swimming-pool text-cyan-500"></i> Pool</div>
                @endif
            </div>

            <!-- Google Map -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Location</h2>
                <div class="h-96 bg-gray-200 rounded-lg overflow-hidden">
                    <iframe style="height:100%;width:100%;border:0;" frameborder="0"
                        src="https://www.google.com/maps/embed/v1/place?q={{ urlencode($property->address . ' ' . $property->city . ' ' . $property->country) }}&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- Latest Properties -->
            <div class="pt-8">
                <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">🏡 Our Latest Properties</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($latestProperties as $property)
                        <a href="{{ route('property.view', $property->slug) }}">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-3">
                                <img src="{{ $property->image_1 }}" class="rounded-lg h-40 w-full object-cover"
                                    alt="">
                                <div class="mt-3">
                                    <h4 class="font-semibold text-gray-800 dark:text-white">{{ $property->title }}</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400"><i
                                            class="fas fa-map-marker-alt mr-1 text-blue-500"></i>
                                        {{ $property->country }}, {{ $property->city }}, {{ $property->address }}</p>
                                    <p class="text-sm text-green-600 font-semibold dark:text-green-400">
                                        <i class="fas fa-dollar-sign mr-1"></i>
                                        ${{ $property->price }}
                                        <span id="converted-price-{{ $property->id }}"
                                            class="ml-2 text-xs text-gray-500 dark:text-gray-300"></span>
                                    </p>

                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Owner Card -->
            <aside class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 space-y-4 sticky top-24 h-fit">
                <div class="flex items-center space-x-4">
                    <img src="{{ $user->image ? asset($user->image) : 'https://api.dicebear.com/9.x/initials/svg?seed=' . urlencode($user->name) }}"
                        class="w-16 h-16 rounded-full" alt="Owner Avatar">
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">{{ $user->name ?? 'Guest' }}</h4>
                        <p class="text-sm text-green-600 flex items-center">
                            <i class="fas fa-check-circle mr-1"></i> Verified
                        </p>
                    </div>
                </div>

                <div class="space-y-2">
                    <a href="tel:{{ $user->phone }}"
                        class="w-full flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        <i class="fas fa-phone-alt mr-2"></i> Call
                    </a>
                    <a href="https://wa.me/{{ $user->whatsapp }}"
                        class="w-full flex items-center justify-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                    </a>

                    <!-- Send Message Button -->
                    <button id="openMessageModal"
                        class="w-full flex items-center justify-center px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 mt-2"
                        type="button">
                        <i class="fas fa-envelope mr-2"></i> Send Message
                    </button>
                </div>
            </aside>


            <!-- Safety Tips Card -->
            <aside class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 space-y-4 sticky top-[400px] h-fit">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white"><i
                        class="fas fa-shield-alt mr-2 text-yellow-500"></i> Safety Tips</h4>
                <ul class="list-disc list-inside text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    <li>It's safer not to pay ahead for inspections</li>
                    <li>Ask friends or somebody you trust to accompany you for viewing</li>
                    <li>Look around the apartment to ensure it meets your expectations</li>
                    <li>Don't pay beforehand if they won't let you move in immediately</li>
                    <li>Verify that the account details belong to the right property owner</li>
                </ul>

                <!-- Social Media -->
                <div class="pt-4 border-t border-gray-200 dark:border-gray-600">
                    <p class="text-sm font-semibold mb-2 text-gray-800 dark:text-white">Follow Us</p>
                    <div class="flex space-x-3 text-xl text-gray-600 dark:text-gray-300">
                        <a href="https://facebook.com" target="_blank" class="hover:text-blue-600"><i
                                class="fab fa-facebook"></i></a>
                        <a href="https://twitter.com" target="_blank" class="hover:text-blue-400"><i
                                class="fab fa-twitter"></i></a>
                        <a href="https://instagram.com" target="_blank" class="hover:text-pink-500"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://t.me/yourchannel" target="_blank" class="hover:text-blue-500"><i
                                class="fab fa-telegram"></i></a>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <!-- Message Modal (hidden by default) -->
    <div id="messageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden"
        aria-modal="true" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDesc">

        <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-md p-6 relative">
            <h3 id="modalTitle" class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Send Message to
                {{ $user->name }}</h3>

            <form action="{{ route('messages.store') }}" method="POST">
                @csrf

                <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                <input type="hidden" name="property_id" value="{{ $property->id }}">

                <textarea name="message" required rows="5" placeholder="Write your message here..."
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white dark:border-gray-600 mb-4 resize-none"></textarea>

                <p class="text-sm mb-4 text-gray-700 dark:text-gray-300">
                    When the owner receives your message, they will contact you on your phone number.
                </p>

                <div class="flex justify-end space-x-2">
                    <button type="button" id="closeMessageModal"
                        class="px-4 py-2 rounded bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-200 hover:bg-gray-400 dark:hover:bg-gray-700">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">
                        Send
                    </button>
                </div>
            </form>

            <!-- Close icon top right -->
            <button id="closeModalX" type="button"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300"
                aria-label="Close modal">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    @push('main_scripts')
        <script>
            document.getElementById('openMessageModal').addEventListener('click', () => {
                document.getElementById('messageModal').classList.remove('hidden');
            });

            document.getElementById('closeMessageModal').addEventListener('click', () => {
                document.getElementById('messageModal').classList.add('hidden');
            });

            document.getElementById('closeModalX').addEventListener('click', () => {
                document.getElementById('messageModal').classList.add('hidden');
            });

            // Optional: Close modal if user clicks outside the modal content
            document.getElementById('messageModal').addEventListener('click', (e) => {
                if (e.target.id === 'messageModal') {
                    document.getElementById('messageModal').classList.add('hidden');
                }
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const baseCurrency = 'USD';
                const originalPrice = parseFloat("{{ $property->price }}");

                const priceEl = document.getElementById('base-price');
                const currencyIcon = document.getElementById('currency-icon');
                const currencySelector = document.getElementById('currency-selector');

                currencySelector.addEventListener('change', () => {
                    const targetCurrency = currencySelector.value;
                    const selectedOption = currencySelector.selectedOptions[0];
                    const symbol = selectedOption.getAttribute('data-symbol') || '';

                    if (targetCurrency === baseCurrency) {
                        // Reset to original price and dollar icon
                        priceEl.innerText = originalPrice.toFixed(2);
                        currencyIcon.className = 'fas fa-dollar-sign mr-1'; // dollar icon
                        currencyIcon.textContent = ''; // remove any text if present
                        return;
                    }

                    const access_key = '9b8db86a8607ec4e283252c078e326cd';
                    const endpoint = 'live';

                    $.ajax({
                        url: `http://api.currencylayer.com/${endpoint}?access_key=${access_key}&currencies=${targetCurrency}&source=${baseCurrency}&format=1`,
                        dataType: 'jsonp',
                        success: function(json) {
                            if (json.success) {
                                const rate = json.quotes[baseCurrency + targetCurrency];
                                if (rate) {
                                    const converted = (originalPrice * rate).toFixed(2);
                                    priceEl.innerText = converted;

                                    // Remove dollar icon class and set text symbol
                                    currencyIcon.className = '';
                                    currencyIcon.textContent = symbol;
                                } else {
                                    priceEl.innerText = '(Conversion unavailable)';
                                    currencyIcon.className = '';
                                    currencyIcon.textContent = '';
                                }
                            } else {
                                priceEl.innerText = '(Conversion error)';
                                currencyIcon.className = '';
                                currencyIcon.textContent = '';
                                console.error('API error:', json.error.info);
                            }
                        },
                        error: function() {
                            priceEl.innerText = '(Conversion error)';
                            currencyIcon.className = '';
                            currencyIcon.textContent = '';
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
