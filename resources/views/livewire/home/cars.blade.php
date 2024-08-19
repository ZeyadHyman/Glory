<div class="bg-[#13212E] md:rounded-xl mt-5 p-5">
    <div class="flex justify-between items-center">
        <h1 class="text-zinc-50 font-bold text-2xl md:text-3xl mb-5 ">
            Cars
        </h1>
        <a href="{{ route('products-by-category', ['category' => 'cars']) }}"
            class="block lg:hidden mb-5 border-white border text-white px-4 py-2 rounded hover:border-[#275f38] hover:text-white/50 transition duration-300">
            View All
        </a>
    </div>

    {{-- Desktop Version --}}
    <div class="hidden lg:flex flex-wrap justify-center gap-5 w-full ">
        @foreach ($products as $product)
            @php
                $product->images = json_decode($product->images);
            @endphp

            <div class="rounded-xl flex flex-col text-zinc-50 shadow-xl group relative w-1/5 h-auto ">
                <div class="relative h-full">
                    <img src={{ asset('storage/' . $product->images[0]) }} alt="{{ $product->name }}"
                        class="rounded-xl h-full w-full object-cover">
                </div>
                <div
                    class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-80 rounded-xl text-center text-zinc-50 opacity-0 transition-opacity duration-500 ease-in-out group-hover:opacity-100 ">
                    <h1
                        class="mt-16 mb-2 text-base md:text-md font-bold group-hover:text-md group-hover:md:text-xl transition-all group-hover:transition-all">
                        {{ $product->name }}
                    </h1>
                    <a href={{ route('product-details', ['productId' => $product->id]) }}
                        class="bg-[#e30613] rounded p-2 text-sm transition-transform duration-500 ease-in-out group-hover:scale-110">
                        Order Now
                    </a>
                </div>
                <div
                    class="absolute mt-3 opacity-0 group-hover:opacity-100 duration-500 ease-in-out translate-y-full group-hover:translate-y-0  ml-0 group-hover:ml-4 transition-all rounded-xl bg-black/50 text-zinc-50 text-xs md:text-sm p-2 z-[1]">
                    {{ $product->category }}
                </div>
                @livewire('components.wishlist-button', ['product' => $product])

            </div>
        @endforeach
    </div>

    <!-- Load More Button -->
    <div class="mt-5 hidden lg:flex justify-end">
        @if ($products->count() < 5)
            <button
                class="border-white border text-white px-4 py-2 rounded hover:border-[#27445f] hover:text-white/50 transition duration-300"
                wire:click="loadMore" wire:loading.class="opacity-50" wire:loading.attr="disabled">
                Load More
            </button>
        @else
            <a href="{{ route('products-by-category', ['category' => 'cars']) }}"
                class="hidden lg:block border-white border text-white px-4 py-2 rounded hover:border-[#275f38] hover:text-white/50 transition duration-300">
                View All
            </a>
        @endif
    </div>

    {{-- Mobile Version --}}
    <section class="splide splide-cars mt-2 block lg:hidden" aria-labelledby="carousel-heading">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($products as $product)
                    <li class="splide__slide mr-5 text-center text-zinc-50 place-content-center ">
                        <div class="rounded-xl flex flex-col text-zinc-50 shadow-xl group relative w-full ">
                            <div class="relative h-full">
                                <img src={{ asset('storage/' . $product->images[0]) }} alt="{{ $product->name }}"
                                    class="rounded-xl h-full w-full object-cover">
                            </div>
                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-80 rounded-xl text-center text-zinc-50 opacity-0 transition-opacity duration-500 ease-in-out group-hover:opacity-100 ">
                                <h1
                                    class="mt-16 mb-2 text-base md:text-md font-bold group-hover:text-md group-hover:md:text-xl transition-all group-hover:transition-all">
                                    {{ $product->name }}
                                </h1>
                                <a href={{ route('product-details', ['productId' => $product->id]) }}
                                    class="bg-[#e30613] rounded p-2 text-sm transition-transform duration-500 ease-in-out group-hover:scale-110">
                                    Order Now
                                </a>
                            </div>
                            <div
                                class="absolute mt-3 opacity-0 group-hover:opacity-100 duration-500 ease-in-out translate-y-full group-hover:translate-y-0  ml-0 group-hover:ml-4 transition-all rounded-xl bg-black/50 text-zinc-50 text-xs md:text-sm p-2 z-[1]">
                                {{ $product->category }}
                            </div>
                            @livewire('components.wishlist-button', ['product' => $product])
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</div>
