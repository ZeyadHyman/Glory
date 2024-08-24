<div class="">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 px-4 py-10 md:px-10 lg:px-20 xl:px-40 mt-20 ">
        <style>
            #thumbnails .is-active {
                border: 2px solid #134ae08c;
                border-radius: 7px;
                transition: border-color 0.3s ease-in-out;
            }

            @keyframes slideBackAndForth {
                0% {
                    transform: translateX(-100%);
                    opacity: 0;
                }

                50% {
                    transform: translateX(100%);
                    opacity: 1;
                }

                100% {
                    transform: translateX(-100%);
                    opacity: 0;
                }
            }

            .animate-back-and-forth {
                animation: slideBackAndForth 4s ease-in-out infinite;
            }
        </style>
        <div class="hidden md:flex flex-col md:flex-row">

            <!-- Thumbnail Carousel -->
            <ul id="thumbnails"
                class="flex flex-row md:flex-col space-x-2 md:space-x-0 md:space-y-2 md:mr-4 w-full md:w-1/6 lg:w-1/5 xl:w-1/6">
                <h1 class="text-zinc-50 text-xs mb-2 hidden md:block">Click on Image to Expand it
                    <i class="fa fa-arrow-right animate-back-and-forth" aria-hidden="true"></i>
                </h1>
                @php
                    if (is_string($product->images)) {
                        $product->images = json_decode($product->images, true);
                    }
                @endphp
                @foreach ($product->images as $image)
                    <li
                        class="thumbnail overflow-hidden cursor-pointer transition-transform duration-300 hover:scale-105 hover:transition-transform">
                        <img class="h-full w-full object-cover rounded-md" src="{{ asset('storage/' . $image) }}"
                            alt="Thumbnail Image">
                    </li>
                @endforeach
                <li
                    class="thumbnail overflow-hidden cursor-pointer transition-transform duration-300 hover:scale-105 hover:transition-transform">
                    <img class="h-full w-full object-cover rounded-md" src="{{ asset('images/size_guide.jpg') }}"
                        alt="Thumbnail Image">
                </li>
            </ul>

            <!-- Main Carousel -->
            <section id="main-carousel" class="splide w-full">

                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($product->images as $image)
                            <li class="splide__slide max-h-[70vh]">
                                <button class="open-modal h-full w-full object-cover"
                                    data-image="{{ asset('storage/' . $image) }}">
                                    <img class="h-full w-auto object-fill" src="{{ asset('storage/' . $image) }}"
                                        alt="Main Image">
                                </button>
                            </li>
                        @endforeach
                        <li class="splide__slide">
                            <button class="open-modal h-full w-full " data-image="{{ asset('images/size_guide.jpg') }}">
                                <img class="h-full w-full object-cover" src="{{ asset('images/size_guide.jpg') }}"
                                    alt="Main Image">
                            </button>
                        </li>
                    </ul>
                </div>
            </section>
        </div>

        <div class="flex md:hidden flex-col">
            <div class="flex justify-between w-full ">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-zinc-50">
                    {{ $product->name }}
                </h1>
                @auth
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('editProduct', ['productId' => $product->id]) }}"
                            class="text-zinc-100 hover:text-gray-500 text-xl px-6 py-4 bg-red-500 hover:bg-red-400 transition-all hover:transition-all rounded-3xl">
                            Edit
                        </a>
                    @endif
                @endauth
            </div>
            <p class="text-base md:text-lg lg:text-xl text-gray-300 mt-2">
                {{ $product->description }}
            </p>
        </div>

        <section class="splide splide-product mt-2 block lg:hidden" aria-labelledby="carousel-heading">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($product->images as $image)
                        <li class="splide__slide">
                            <img class="h-auto w-full object-cover" src="{{ asset('storage/' . $image) }}"
                                alt="Product Image">
                        </li>
                    @endforeach
                    <li class="splide__slide">
                        <img class="h-auto w-full object-cover" src="{{ asset('images/size_guide.jpg') }}"
                            alt="Size Guide">
                    </li>
                </ul>
            </div>
        </section>

        <!-- Product Details -->
        <div class="w-full mt-8 md:mt-0 text-center md:text-left px-4 md:px-8 lg:px-12 xl:px-16">
            <div class="hidden md:block">
                <div class="flex justify-between w-full ">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-zinc-50">
                        {{ $product->name }}
                    </h1>
                    @auth
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('editProduct', ['productId' => $product->id]) }}"
                                class="text-zinc-100 hover:text-gray-500 text-xl px-6 py-4 bg-red-500 hover:bg-red-400 transition-all hover:transition-all rounded-3xl">
                                Edit This Product
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="mt-2 text-base md:text-lg lg:text-xl text-gray-300">
                    {{ $product->description }}
                </p>
            </div>

            {{-- Price --}}
            @if ($product->discount)
                <div class="flex flex-col mt-8 text-start space-y-2">
                    <div class="flex items-center space-x-2">
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-green-400">
                            {{ $product->price * (1 - $product->discount / 100) }} EGP
                        </h1>
                        <s class="text-lg md:text-xl lg:text-2xl font-medium text-gray-500">
                            {{ $product->price }} EGP
                        </s>
                    </div>
                </div>
            @else
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-zinc-50 mt-8 text-start">
                    {{ $product->price }} EGP
                </h1>
            @endif


            {{-- Frame Color --}}
            <div x-data="{ selectedColor: @entangle('frame_color') }">
                <h1 class="mt-8 text-gray-300 font-bold text-start">Frame Color:
                    <span class="text-zinc-50" x-text="selectedColor"></span>
                </h1>
                <div class="flex mt-2 flex-wrap gap-2">
                    @foreach ($product->frame_colors as $color)
                        <button
                            :class="{
                                'bg-black border-none': '{{ $color }}'
                                === 'black' && selectedColor === '{{ $color }}',
                                'bg-white border-none text-slate-600': '{{ $color }}'
                                === 'white' &&
                                selectedColor === '{{ $color }}',
                                'bg-{{ $color }}-500 border-none ': '{{ $color }}'
                                !== 'black' &&
                                selectedColor === '{{ $color }}',
                            }"
                            @click="selectedColor = '{{ $color }}'"
                            class="text-zinc-50 px-4 py-2 rounded-xl border">
                            {{ $color }}
                        </button>
                    @endforeach

                </div>
            </div>

            {{-- Frame Size --}}
            <div x-data="{ selectedSize: @entangle('frame_size') }">
                <h1 class="mt-8 text-gray-300 font-bold text-start">Frame Size:
                    <span class="text-zinc-50" x-text="selectedSize"></span>
                </h1>
                <div class="flex mt-2 flex-wrap gap-2">
                    @foreach ($product->frame_sizes as $size)
                        <button
                            :class="{
                                'bg-white border-white text-gray-600': selectedSize === '{{ $size }}',
                                'bg-transparent border-gray-300 text-zinc-50': selectedSize !== '{{ $size }}'
                            }"
                            @click="selectedSize = '{{ $size }}'" class="px-4 py-2 rounded-xl border">
                            {{ $size }}
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Quantity --}}
            <div x-data="{ quantity: @entangle('quantity') }">
                <label for="counter-input" class="mt-8 text-gray-300 font-bold block text-start">Quantity:
                    <span class="text-zinc-50" x-text="quantity"></span>
                </label>
                <div class="relative flex items-center mt-2">
                    <button type="button" @click="quantity = Math.max(1, quantity - 1)"
                        class="flex-shrink-0 bg-gray-700 hover:bg-gray-600 border-gray-600 inline-flex items-center justify-center border rounded-md h-8 w-8 focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <i class="fa fa-minus text-white" aria-hidden="true"></i>
                    </button>
                    <input type="text" x-model="quantity"
                        class="flex-shrink-0 text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[3rem] text-center"
                        readonly />
                    <button type="button" @click="quantity = quantity + 1"
                        class="flex-shrink-0 bg-gray-700 hover:bg-gray-600 inline-flex items-center justify-center border border-gray-600 rounded-md h-8 w-8 focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <i class="fa fa-plus text-white" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <!-- Add to Cart & Wishlist -->
            <div class="flex md:flex-row gap-4 mt-8">
                <form wire:submit.prevent="addToCart">
                    <button type="submit"
                        class="px-8 py-4 transition-all duration-300 bg-[#251f81] hover:bg-[#352e9b] border border-transparent hover:border-white/50 rounded-xl text-zinc-50 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>Add To Cart</span>
                    </button>
                </form>
                @livewire('components.product-details-wishlist', ['product_id' => $product->id])
            </div>

        </div>

        <!-- Modal -->
        <div id="imageModal" class=" fixed inset-0 z-50 hidden flex items-center justify-center bg-black/90">
            <div class="h-[90vh]">
                <img id="modalImage" class="h-full w-full" alt="Large Image">
                <button id="closeModal"
                    class="absolute top-4 right-4 text-white text-2xl bg-red-500 rounded-full h-10 w-10">&times;</button>
            </div>
        </div>
    </div>

    {{-- Related Products --}}
    <div class="px-4 py-10 md:px-10 lg:px-20 xl:px-40 mt-10">
        <h1 class="text-zinc-50 text-2xl md:text-3xl lg:text-4xl font-bold mb-8 ">Related products</h1>
        <div class="flex flex-wrap gap-6">
            @foreach ($relatedProducts as $product)
                @php
                    if (is_string($product->images)) {
                        $product->images = json_decode($product->images, true);
                    }
                @endphp

                <div
                    class="relative flex flex-col text-zinc-50 shadow-lg group rounded-xl overflow-hidden w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">
                    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}"
                        class="w-full h-full object-cover rounded-t-xl transition-transform duration-500 ease-in-out group-hover:scale-105">

                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-70 rounded-xl text-center opacity-0 transition-opacity duration-500 ease-in-out group-hover:opacity-100 p-4">
                        <h1 class="text-base md:text-lg lg:text-xl font-bold mb-3">
                            {{ $product->name }}
                        </h1>
                        <a href="{{ route('product-details', ['productId' => $product->id]) }}"
                            class="bg-[#e30613] text-white rounded px-4 py-2 text-sm font-semibold transition-transform duration-500 ease-in-out group-hover:scale-110">
                            Order Now
                        </a>
                    </div>

                    <div
                        class="absolute top-4 left-4 bg-black/60 text-zinc-50 text-xs md:text-sm px-3 py-1 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                        {{ $product->category }}
                    </div>

                    @livewire('components.wishlist-button', ['product' => $product])
                </div>
            @endforeach
        </div>
    </div>
</div>
