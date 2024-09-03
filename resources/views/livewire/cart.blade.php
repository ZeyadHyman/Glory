<div class="mx-4 sm:mx-10 lg:mx-32 my-5 lg:my-10 mt-10 {{ in_array(count($cartItems), [1, 2, 3]) ? 'md:h-[75vh]' : '' }}"
    x-data="{ open: false, thankYou: false, paymentMethod: '', thankYou: @json(session('success') ? true : false) }">

    <style>
        .checkmark {
            inline-size: 100px;
            block-size: 100px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #4bb71b;
            stroke-miterlimit: 10;
            box-shadow: inset 0px 0px 0px #4bb71b;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
            position: relative;
            inset-block-start: 5px;
            inset-inline-end: 5px;
            margin: 0 auto;
        }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 3;
            stroke-miterlimit: 10;
            stroke: #4ab71b86;
            fill: #fff;
            animation: stroke 3s cubic-bezier(0.65, 0, 0.45, 1) forwards;

        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.5s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none;
            }

            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #4bb71b;
            }
        }
    </style>

    @if (count($cartItems) > 0)
        <div class="grid gap-6">
            <!-- Cart Header -->
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-zinc-50">Your Cart</h1>
                <button wire:click='removeAll'
                    class="px-4 py-2 sm:px-6 sm:py-3 bg-red-600 hover:bg-red-500 text-white rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-300">
                    Remove All
                </button>
            </div>

            <!-- Cart Items -->
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
                    <div class="relative bg-gray-800 rounded-lg shadow-lg grid grid-cols-2 gap-4">
                        <button
                            wire:click="removeItem('{{ $item['product_id'] . '-' . $item['frame_size'] . '-' . $item['frame_color'] }}')"
                            class="absolute top-2 right-2 w-9 h-9 bg-red-600 hover:bg-red-500 text-white rounded-full shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-300">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                        <div class="w-full h-full md:h-auto overflow-hidden relative rounded-l-lg">
                            @if (is_array($item['image']) && !empty($item['image']))
                                <img class="w-full h-full object-cover absolute inset-0"
                                    src="{{ asset('storage/' . $item['image'][0]) }}" alt="{{ $item['name'] }}">
                            @else
                                <p class="text-gray-400">No image available</p>
                            @endif
                        </div>
                        <div class="py-4 pr-2 flex flex-col justify-between">
                            <div>

                                <a class="text-2xl sm:text-3xl font-semibold text-zinc-50 hover:text-zinc-400 transition-all hover:transition-all mb-4"
                                    href="{{ route('product-details', ['productId' => $item['product_id']]) }}">
                                    {{ $item['name'] }}
                                </a>

                                <p class="text-md sm:text-lg text-gray-300 mb-1 mt-4">
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
                                <p class="text-md sm:text-lg text-gray-300 mt-2 font-semibold">
                                    Total: {{ $itemTotal }} EGP
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Total Price and Checkout Button -->
            <div class="flex flex-col lg:flex-row w-full space-y-8 lg:space-y-0 lg:space-x-5">
                <!-- Price Section -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-4 bg-gray-700 rounded-lg shadow-md flex-1">
                    <h2 class="text-2xl sm:text-3xl font-bold text-zinc-50">Total Price</h2>
                    <p class="text-xl sm:text-2xl font-semibold text-zinc-50 text-right">
                        {{ $totalPrice }} EGP
                    </p>
                </div>

                <!-- Checkout Button -->
                <div class="flex lg:justify-end">
                    <button @click="open = true"
                        class="px-6 py-3 bg-green-600 hover:bg-green-500 text-white rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-300">
                        Checkout
                    </button>
                </div>
            </div>
        </div>

        <!-- Checkout Modal Background -->
        <div x-show="open" x-transition:enter="transition transform ease-out duration-300"
            x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100"
            x-transition:leave="transition transform ease-in duration-200"
            x-transition:leave-start="scale-100 opacity-100" x-transition:leave-end="scale-95 opacity-0"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 z-50">
            <!-- Modal Container -->
            <div
                class="bg-gradient-to-tr from-slate-900 to-slate-800 p-8 rounded-lg shadow-lg w-full max-w-md md:max-w-lg lg:max-w-xl overflow-y-auto">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl text-zinc-50 font-bold">Checkout</h2>
                    <button @click="open = false" class="text-zinc-500 transition-all hover:text-zinc-50">
                        <i class="fa-solid fa-times fa-lg"></i>
                    </button>
                </div>

                <!-- Form Start -->
                <form method="POST" action="{{ route('pay') }}">
                    @csrf
                    <!-- Add this within your form tags -->
                    @foreach ($cartItems as $item)
                        <input type="hidden" name="cart[{{ $loop->index }}][product_id]"
                            value="{{ $item['product_id'] }}">
                        <input type="hidden" name="cart[{{ $loop->index }}][frame_size]"
                            value="{{ $item['frame_size'] }}">
                        <input type="hidden" name="cart[{{ $loop->index }}][frame_color]"
                            value="{{ $item['frame_color'] }}">
                        <input type="hidden" name="cart[{{ $loop->index }}][quantity]"
                            value="{{ $item['quantity'] }}">
                        <input type="hidden" name="cart[{{ $loop->index }}][price]" value="{{ $item['price'] }}">
                        <input type="hidden" name="cart[{{ $loop->index }}][discount]"
                            value="{{ $item['discount'] }}">
                    @endforeach

                    <!-- User Information -->
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3 text-zinc-50 flex items-center">
                            <i class="fa-solid fa-user mr-3"></i> Contact Information
                        </h3>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-zinc-50">Name</label>
                            <input required type="text" id="name" name="name"
                                value="{{ auth()->user()->name ?? '' }}"
                                class="mt-1 block w-full px-4 border border-gray-300 bg-white/90 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-zinc-50">Email</label>
                            <input required type="email" id="email" name="email"
                                value="{{ auth()->user()->email ?? '' }}"
                                class="mt-1 block w-full px-4 border border-gray-300 bg-white/90 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out">
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-zinc-50">Phone Number (including
                                WhatsApp)</label>
                            <input required type="tel" id="phone" name="phone"
                                class="mt-1 block w-full px-4 border border-gray-300 bg-white/90 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out">
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-zinc-50">Address</label>
                            <input required type="text" id="address" name="address"
                                class="mt-1 block w-full px-4 border border-gray-300 bg-white/90 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out">
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-3 text-zinc-50 flex items-center">
                            <i class="fa-solid fa-credit-card mr-3"></i> Payment Information
                        </h3>

                        <!-- Payment Options -->
                        <div class="mb-4">
                            <div class="flex items-center mb-3">
                                <input required type="radio" id="cash" name="payment" value="cash"
                                    class="mr-3" x-model="paymentMethod">
                                <label for="cash" class="text-zinc-50 flex items-center">
                                    <i class="fa-solid fa-money-bill-wave mr-3"></i> Cash on Delivery
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="flex justify-between items-center mb-6 pt-6 border-t border-gray-300">
                        <h4 class="text-xl font-semibold text-zinc-50 flex items-center">
                            <i class="fa-solid fa-receipt mr-3"></i> Order Summary
                        </h4>
                        <p class="text-xl text-zinc-50 font-bold">{{ $totalPrice }} EGP</p>
                    </div>

                    <!-- Confirm Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white rounded-lg shadow-md flex items-center transition-colors duration-300">
                            Confirm Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @else
        {{-- {{session()->flush()}}; --}}
        {{-- @dd(session()->all()); --}}

        <div class="flex flex-col items-center justify-center text-center">
            <h1 class="text-zinc-50 text-4xl font-bold mb-4">Your Cart's Empty</h1>
            <img src="{{ asset('images/empty_cart.png') }}" alt="Empty Cart" class="w-full md:w-2/5 mb-6">
            <a href="{{ route('home') }}"
                class="text-center px-6 py-3 bg-red-600 hover:bg-red-500 text-white rounded-lg shadow-md transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-300">
                Fill It Out Now
            </a>
        </div>
        <!-- Thank You Modal Background -->
        <div x-show="thankYou" x-transition:enter="transition transform ease-out duration-300"
            x-transition:enter-start="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100"
            x-transition:leave="transition transform ease-in duration-200"
            x-transition:leave-start="scale-100 opacity-100" x-transition:leave-end="scale-95 opacity-0"
            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 z-50">

            <!-- Check Mark Animation -->
            <div class="fixed top-[38%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 flex justify-center">
                <svg class="checkmark w-16 h-16 md:w-24 md:h-24" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                </svg>
            </div>

            <!-- Modal Container -->
            <div
                class="bg-gradient-to-tr from-slate-900 to-slate-800 rounded-lg shadow-lg w-full max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl overflow-y-auto p-6 md:p-8 relative">

                <!-- Header -->
                <div class="flex md:flex-row justify-between  mb-6">
                    <h2 class="text-xl md:text-2xl text-zinc-50 font-bold mb-4 md:mb-0">Thank You!</h2>
                    <button @click="thankYou = false"
                        class="text-zinc-500 hover:text-zinc-50 transition-colors duration-300">
                        <i class="fa-solid fa-times fa-lg"></i>
                    </button>
                </div>

                <!-- Thank You Message -->
                <div class="mb-6">
                    <p class="text-base md:text-lg text-zinc-50">Your order has been successfully placed!</p>
                    @auth
                        <p></p>
                    @else
                        <p class="text-sm mt-1 md:text-base text-zinc-50">To track your orders you should
                            <a href="{{ route('login') }}" class="underline text-gray-300 hover:text-gray-50">login</a>
                        @endauth
                    </p>
                </div>

                <!-- Close Button -->
                <div class="flex justify-center">
                    <button @click="thankYou = false"
                        class="px-4 py-2 md:px-6 md:py-3 bg-green-600 hover:bg-green-500 text-white rounded-lg shadow-md transition-colors duration-300">
                        Ok
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>
