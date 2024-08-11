<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 px-4 py-10 md:px-10 lg:px-20 xl:px-40 mt-20 mb-32">
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
            @foreach ($product->images as $image)
                <li
                    class="thumbnail overflow-hidden cursor-pointer transition-transform duration-300 hover:scale-105 hover:transition-transform">
                    <img class="h-full w-full object-cover rounded-md" src="{{ $image }}" alt="Thumbnail Image">
                </li>
            @endforeach
            <li
                class="thumbnail overflow-hidden cursor-pointer transition-transform duration-300 hover:scale-105 hover:transition-transform">
                <img class="h-full w-full object-cover rounded-md"
                    src="{{ asset('images/size_guide.jpg') }}"
                    alt="Thumbnail Image">
            </li>
        </ul>

        <!-- Main Carousel -->
        <section id="main-carousel" class="splide w-full">

            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($product->images as $image)
                        <li class="splide__slide">
                            <button class="open-modal h-full w-full object-cover" data-image="{{ $image }}">
                                <img class="h-full w-full object-cover" src="{{ $image }}" alt="Main Image">
                            </button>
                        </li>
                    @endforeach
                    <li class="splide__slide">
                        <button class="open-modal h-full w-full "
                            data-image="{{ asset('images/size_guide.jpg') }}">
                            <img class="h-full w-full object-cover"
                                src="{{ asset('images/size_guide.jpg') }}"
                                alt="Main Image">
                        </button>
                    </li>
                </ul>
            </div>
        </section>
    </div>

    <div class="block md:hidden">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-zinc-50">
            {{ $product->name }}
        </h1>
        <p class="text-base md:text-lg lg:text-xl text-gray-300 mt-2">
            {{ $product->description }}
        </p>
    </div>

    <section class="splide splide-product mt-2 block lg:hidden" aria-labelledby="carousel-heading">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($product->images as $image)
                    <li class="splide__slide">
                        <img class="h-full w-full object-cover" src="{{ $image }}" alt="Main Image">
                    </li>
                @endforeach
                <li class="splide__slide">
                    <img class="h-full w-full object-cover"
                        src="{{ asset('images/size_guide.jpg') }}"
                        alt="Main Image">
                        {{-- https://cdn.shopify.com/s/files/1/0593/4894/2931/files/Sizes_Image_1024x1024.webp?v=1712768521 --}}
                </li>

            </ul>
        </div>
    </section>

    <!-- Product Details -->
    <div class="w-full mt-8 md:mt-0 text-center md:text-left px-4 md:px-8 lg:px-12 xl:px-16">
        <div class="hidden md:block">

            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-zinc-50 ">
                {{ $product->name }}
            </h1>
            <p class="text-base md:text-lg lg:text-xl text-gray-300 mt-2">
                {{ $product->description }}
            </p>
        </div>

        {{-- Price --}}
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-zinc-50 mt-8 text-start">{{ $product->price }} EGP
            <s class="text-xl md:text-2xl lg:text-3xl font-normal text-gray-400">500 EGP</s>
        </h1>

        {{-- Frame Color --}}
        <div x-data="{ selectedColor: @entangle('frame_color') }">
            <h1 class="mt-8 text-gray-300 font-bold text-start">Frame Color:
                <span class="text-zinc-50" x-text="selectedColor"></span>
            </h1>
            <div class="flex mt-2 flex-wrap gap-2">
                <button :class="{ 'bg-red-500 border-red-500': selectedColor === 'RED' }"
                    @click="selectedColor = 'RED'" class="text-zinc-50 px-4 py-2 rounded-xl border border-white">
                    RED
                </button>
                <button :class="{ 'bg-blue-500 border-blue-500': selectedColor === 'BLUE' }"
                    @click="selectedColor = 'BLUE'" class="text-zinc-50 px-4 py-2 rounded-xl border border-white">
                    BLUE
                </button>
                <button :class="{ 'bg-black border-black': selectedColor === 'BLACK' }"
                    @click="selectedColor = 'BLACK'" class="text-zinc-50 px-4 py-2 rounded-xl border border-white">
                    BLACK
                </button>
            </div>
        </div>

        {{-- Frame Size --}}
        <div x-data="{ selectedSize: @entangle('frame_size') }">
            <h1 class="mt-8 text-gray-300 font-bold text-start">Frame Size:
                <span class="text-zinc-50" x-text="selectedSize"></span>
            </h1>
            <div class="flex mt-2 flex-wrap gap-2">
                <button
                    :class="{
                        'bg-white border-white text-gray-600': selectedSize === '10x30',
                        'bg-transparent border-gray-300 text-zinc-50': selectedSize !== '10x30'
                    }"
                    @click="selectedSize = '10x30'" class="px-4 py-2 rounded-xl border">
                    10x30
                </button>
                <button
                    :class="{
                        'bg-white border-white text-gray-600': selectedSize === '40x50',
                        'bg-transparent border-gray-300 text-zinc-50': selectedSize !== '40x50'
                    }"
                    @click="selectedSize = '40x50'" class="px-4 py-2 rounded-xl border">
                    40x50
                </button>
                <button
                    :class="{
                        'bg-white border-white text-gray-600': selectedSize === '30x20',
                        'bg-transparent border-gray-300 text-zinc-50': selectedSize !== '30x20'
                    }"
                    @click="selectedSize = '30x20'" class="px-4 py-2 rounded-xl border">
                    30x20
                </button>
            </div>
        </div>

        {{-- Quantity --}}
        <div x-data="{ quantity: @entangle('quantity') }">
            <label for="counter-input" class="mt-8 text-gray-300 font-bold block text-start">Quantity:
                <span class="text-zinc-50" x-text="quantity"></span>
            </label>
            <div class="relative flex items-center mt-2">
                <button type="button" @click="quantity = Math.max(1, quantity - 1)"
                    class="flex-shrink-0 bg-gray-700 hover:bg-gray-600 border-gray-600 inline-flex items-center justify-center border border-gray-600 rounded-md h-8 w-8 focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <i class="fa fa-minus text-white" aria-hidden="true"></i>
                </button>
                <input type="text" x-model="quantity"
                    class="flex-shrink-0 text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[3rem] text-center"
                    readonly />
                <button type="button" @click="quantity = quantity + 1"
                    class="flex-shrink-0 bg-gray-700 hover:bg-gray-600 border-gray-600 inline-flex items-center justify-center border border-gray-600 rounded-md h-8 w-8 focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <i class="fa fa-plus text-white" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        {{-- Add to Cart & Wishlist --}}
        <div class="flex md:flex-row gap-4 mt-8">
            <button
                class="px-8 py-4 transition-all duration-300 bg-[#251f81] hover:bg-[#352e9b] border border-transparent hover:border-white/50 rounded-xl text-zinc-50 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>Add To Cart</span>
            </button>
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
