<div class="mx-4 sm:mx-10 lg:mx-32 my-5 lg:my-10 mt-10 {{ count($cartItems) == 1 ? 'h-[75vh]' : '' }}">
    @if (count($cartItems) > 0)
        <div class="grid gap-6">
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-zinc-50">Your Cart</h1>
                <button wire:click='removeAll'
                    class="px-4 py-2 sm:px-6 sm:py-3 bg-red-600 hover:bg-red-500 text-white rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-300">
                    Remove All
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $totalPrice = 0;
                @endphp
                @foreach ($cartItems as $item)
                    @php
                        $itemPrice = $item['price'];
                        $itemDiscount = $item['discount'] ?? 0;
                        $discountedPrice = $itemPrice - $itemPrice * ($itemDiscount / 100);
                        $itemTotal = $discountedPrice * ($item['quantity'] ?? 1);
                        $totalPrice += $itemTotal;

                        if (is_string($item['image'])) {
                            $item['image'] = json_decode($item['image'], true);
                        }
                    @endphp
                    <div class="relative p-4 bg-gray-800 rounded-lg shadow-lg grid grid-cols-2 gap-4">

                        <button
                            wire:click="removeItem('{{ $item['product_id'] . '-' . $item['frame_size'] . '-' . $item['frame_color'] }}')"
                            class="absolute top-2 right-2 w-9 h-9 bg-red-600 hover:bg-red-500 text-white rounded-full shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-300">
                            <i class="fas fa-trash-alt"></i>
                        </button>

                        <div class="w-full h-full md:h-auto overflow-hidden relative">
                            @if (is_array($item['image']) && !empty($item['image']))
                                <img class="w-full h-full object-cover absolute inset-0"
                                    src="{{ asset('storage/' . $item['image'][0]) }}" alt="{{ $item['name'] }}">
                            @else
                                <p class="text-gray-400">No image available</p>
                            @endif
                        </div>
                        <div class="flex flex-col justify-between">
                            <div>
                                <h2 class="text-xl sm:text-2xl font-semibold text-zinc-50 mb-2">
                                    {{ $item['name'] }}
                                </h2>
                                <p class="text-md sm:text-lg text-gray-300 mb-1">
                                    Price: {{ $itemPrice }} EGP
                                </p>
                                <p class="text-md sm:text-lg text-gray-300 mb-1">
                                    Discount: {{ $itemDiscount }}%
                                </p>
                                <p class="text-md sm:text-lg text-gray-300 mb-1">
                                    Quantity: {{ $item['quantity'] ?? 1 }}
                                </p>
                                <p class="text-md sm:text-lg text-gray-300 mb-1">
                                    Frame Size: {{ $item['frame_size'] ?? 'Not specified' }}
                                </p>
                                <p class="text-md sm:text-lg text-gray-300">
                                    Color: {{ $item['frame_color'] ?? 'Not specified' }}
                                </p>
                            </div>
                            <p class="text-md sm:text-lg text-gray-300 mt-2 font-semibold">
                                Total: {{ $itemTotal }} EGP
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Total Price -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8 p-4 bg-gray-700 rounded-lg shadow-md">
                <h2 class="text-2xl sm:text-3xl font-bold text-zinc-50">Total Price</h2>
                <p class="text-xl sm:text-2xl font-semibold text-zinc-50 text-right">
                    {{ $totalPrice }} EGP
                </p>
            </div>

            <!-- Checkout Button -->
            <div class="flex justify-end mt-8">
                <button
                    class="px-6 py-3 bg-green-600 hover:bg-green-500 text-white rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-300">
                    Checkout (Coming Soon)
                </button>
            </div>
        </div>
    @else
        <div class="flex flex-col items-center justify-center text-center">
            <h1 class="text-zinc-50 text-4xl font-bold mb-4">Your Cart's Empty</h1>
            <img src="{{ asset('images/empty_cart.png') }}" alt="Empty Cart" class="w-full md:w-2/5 mb-6">
            <a href="{{ route('home') }}"
                class="text-center px-6 py-3 bg-red-600 hover:bg-red-500 text-white rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-300">
                Fill It Out Now
            </a>
        </div>
    @endif
</div>
