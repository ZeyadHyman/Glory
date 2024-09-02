<div class="bg-[#13212E]  md:rounded-xl mt-5 p-5">
    @if ($Products)
        <h1 class="text-zinc-50 font-bold text-2xl md:text-3xl mb-5 ">
            Recently Added
        </h1>

        <section class="splide mt-2" id="splide-added" aria-labelledby="carousel-heading">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($Products as $product)
                        @php
                            if (is_string($product->images)) {
                                $product->images = json_decode($product->images, true);
                            }
                        @endphp
                        <li class="splide__slide mr-5 text-center text-zinc-50 place-content-center group">
                            <div class="relative h-full">
                                <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}"
                                    class="rounded-xl h-full w-full object-cover ">
                                <div
                                    class="absolute top-2 right-2 rounded-xl bg-black/50 text-zinc-50 text-xs md:text-sm p-2 z-[1]">
                                    {{ $product->category->name }}
                                </div>
                                <div
                                    class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-80 rounded-xl text-center text-zinc-50 opacity-0 transition-opacity duration-500 ease-in-out group-hover:opacity-100">
                                    <h1
                                        class="mt-16 mb-2 text-base md:text-md font-bold group-hover:text-md group-hover:md:text-xl transition-all">
                                        {{ $product->name }}
                                    </h1>
                                    <a href="{{ route('product-details', ['productId' => $product->id]) }}"
                                        class="bg-[#e30613] rounded p-2 text-sm transition-transform duration-500 ease-in-out group-hover:scale-110">
                                        Order Now
                                    </a>
                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif
</div>
