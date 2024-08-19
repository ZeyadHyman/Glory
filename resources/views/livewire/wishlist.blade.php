<div class="mx-4 sm:mx-10 lg:mx-32 my-5 lg:my-10  mt-10 {{ count($products) == 1 ? 'h-[75vh]' : '' }}">
    @if ($products)
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-zinc-50 ">Your Wishlist</h1>
            <div class="">
                <button wire:click='removeAll'
                    class=" px-4 py-2 sm:px-8 sm:py-4 transition-all duration-300 bg-[#9e1f1f] hover:bg-[39e1f1fb7] border border-transparent hover:border-white/50 rounded-xl text-zinc-50 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                    Remove All
                </button>
            </div>
        </div>
        <div class="flex flex-col gap-5">
            @foreach ($products as $product)
                @php
                    $product->images = json_decode($product->images);
                @endphp

                <div class="flex flex-col md:flex-row gap-4 md:gap-6 items-start md:items-center">
                    <div class="w-full md:w-1/3 lg:w-1/4">
                        <img class="w-full h-auto rounded-xl" src={{ asset('storage/' . $product->images[0]) }}
                            alt="{{ $product->name }}">
                    </div>
                    <div class="flex-1 w-full h-full">
                        <h1 class="text-start text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-zinc-50 mb-2">
                            {{ $product->name }}
                        </h1>
                        <p class="text-start text-sm sm:text-base md:text-lg lg:text-xl text-gray-300 mb-4">
                            {{ $product->description }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-2 w-full h-full ">
                            <a href={{ route('product-details', ['productId' => $product->id]) }}
                                class="px-4 py-2 sm:px-8 sm:py-4 transition-all duration-300 bg-[#0e3b38] hover:bg-[#0e3b38b7] border border-transparent hover:border-white/50 rounded-xl text-zinc-50 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                                Order Now
                            </a>
                            <button wire:click="remove({{ $product->id }})"
                                class="px-4 py-2 sm:px-6 sm:py-4 transition-all duration-300 bg-white hover:bg-white/50 border border-white rounded-xl text-zinc-50 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                                <i class="fa fa-heart text-red-600 " aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full h-[1px] bg-gray-400 my-5"></div>
            @endforeach
        </div>
    @else
        <div class="flex flex-col items-center justify-center ">
            <h1 class="text-zinc-50 text-4xl text-center">Your Wishlist's Empty</h1>
            <img src="{{ asset('images/empty.png') }}" alt="" class="w-full md:w-2/5">

        </div>
        <div class="flex justify-center items-center">
            <a href="{{ route('home') }}"
                class="text-center px-4 py-2 sm:px-8 sm:py-4 transition-all duration-300 bg-[#9e1f1f] hover:bg-[39e1f1fb7] border border-transparent hover:border-white/50 rounded-xl text-zinc-50 flex items-center justify-center  gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
                Fill It out now
            </a>
        </div>
    @endif
</div>
