<div class="bg-[#13212E] md:rounded-xl p-5">
    <h1 class="text-zinc-50 font-bold text-3xl md:text-4xl mb-5 ">
        T-shirts
    </h1>
    <div class="flex flex-wrap justify-center gap-3 lg:gap-5">


        @foreach ($products as $product)
            <div
                class="rounded-xl flex flex-col text-zinc-50 shadow-xl group relative w-full sm:w-1/2 md:w-1/3 lg:w-1/4 ">
                <div class="relative">
                    <img src="https://m.media-amazon.com/images/I/41X5wmuVkWL._AC_.jpg" alt="{{ $product->name }}"
                        class="rounded-xl h-full w-full object-cover">
                </div>
                <div
                    class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-80 rounded-xl text-center text-zinc-50 opacity-0 transition-opacity duration-500 ease-in-out group-hover:opacity-100 ">
                    <h1
                        class="mt-16 mb-2 text-base md:text-md font-bold group-hover:text-md group-hover:md:text-xl transition-all group-hover:transition-all">
                        {{ $product->name }}
                    </h1>
                    <button
                        class="bg-[#e30613] rounded p-2 text-sm transition-transform duration-500 ease-in-out group-hover:scale-110">
                        Order Now
                    </button>
                </div>
                <div
                    class="absolute mt-3 opacity-0 group-hover:opacity-100 duration-500 ease-in-out translate-y-full group-hover:translate-y-0  ml-0 group-hover:ml-4 transition-all rounded-xl bg-black/50 text-zinc-50 text-xs md:text-sm p-2 z-[1]">
                    T-shirts
                </div>
                @if (Auth::check())
                    @if ($product->in_wishlist)
                        <button wire:click="toggleWishlist({{ $product->id }})"
                            class="absolute place-self-end opacity-100 mt-3 mr-4 rounded-full bg-black/40 group-hover:border-none group-hover:bg-black/50 text-xl flex items-center justify-center w-10 h-10 text-center md:text-sm p-2 z-[1]">
                            <i class="fa fa-heart text-red-600" aria-hidden="true"></i>
                        </button>
                    @else
                        <button wire:click="toggleWishlist({{ $product->id }})"
                            class="absolute mt-3 place-self-end opacity-0 group-hover:opacity-100 duration-500 ease-in-out translate-y-full group-hover:translate-y-0 mr-0 group-hover:mr-4 transition-all rounded-full bg-black/50 text-xl flex items-center justify-center w-10 h-10 text-center md:text-sm p-2 z-[1]">
                            <i class="fa-regular fa-heart" aria-hidden="true"></i>
                        </button>
                    @endif
                @else
                    @if ($product->in_session_wishlist)
                        <button wire:click="toggleWishlistSession({{ $product->id }})"
                            class="absolute place-self-end opacity-100 mt-3 mr-4 rounded-full bg-black/40 group-hover:border-none group-hover:bg-black/50 text-xl flex items-center justify-center w-10 h-10 text-center md:text-sm p-2 z-[1]">
                            <i class="fa fa-heart text-red-600" aria-hidden="true"></i>
                        </button>
                    @else
                        <button wire:click="toggleWishlistSession({{ $product->id }})"
                            class="absolute mt-3 place-self-end opacity-0 group-hover:opacity-100 duration-500 ease-in-out translate-y-full group-hover:translate-y-0 mr-0 group-hover:mr-4 transition-all rounded-full bg-black/50 text-xl flex items-center justify-center w-10 h-10 text-center md:text-sm p-2 z-[1]">
                            <i class="fa-regular fa-heart" aria-hidden="true"></i>
                        </button>
                    @endif
                @endif

            </div>
        @endforeach

    </div>

    <!-- Load More Button -->
    <div class="mt-5 flex justify-end">
        <button
            class="border-white border text-white px-4 py-2 rounded hover:border-[#27445f] hover:text-white/50 transition duration-300"
            wire:click="loadMore" wire:loading.class="opacity-50" wire:loading.attr="disabled">
            Load More
        </button>
    </div>
</div>
