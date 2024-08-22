<x-app-layout>
    @section('pageTitle', $categoryName)

    <div class="mx-4 sm:mx-10 lg:mx-32 my-5 lg:my-10 mt-10">
        <div class="flex justify-between items-center">
            <h1 class="text-zinc-50 font-bold text-2xl md:text-3xl mb-5">
                {{ $categoryName }}
            </h1>

        </div>


        <div class="flex flex-wrap justify-center gap-5">
            @foreach ($products as $product)
                @php
                    if (is_string($product->images)) {
                        $product->images = json_decode($product->images, true);
                    }
                @endphp
                <div
                    class="rounded-xl flex flex-col text-zinc-50 shadow-xl group relative w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 h-auto">
                    <div class="relative h-full">
                        <img class="w-full h-full rounded-xl object-cover"
                            src={{ asset('storage/' . $product->images[0]) }}>
                    </div>
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-80 rounded-xl text-center text-zinc-50 opacity-0 transition-opacity duration-500 ease-in-out group-hover:opacity-100">
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
                        class="absolute mt-3 opacity-0 group-hover:opacity-100 duration-500 ease-in-out translate-y-full group-hover:translate-y-0 ml-0 group-hover:ml-4 transition-all rounded-xl bg-black/50 text-zinc-50 text-xs md:text-sm p-2 z-[1]">
                        {{ $categoryName }}
                    </div>
                    @livewire('components.wishlist-button', ['product' => $product])
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
