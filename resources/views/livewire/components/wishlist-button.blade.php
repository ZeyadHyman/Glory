<div class="absolute place-self-end mt-1 text-xl flex items-center justify-center text-center md:text-sm p-2 z-[1]">
    {{-- 
    @if (Auth::check())
        @if ($product->in_wishlist)
            <button wire:click="toggleWishlist({{ $product->id }})"
                class="opacity-100 h-10 w-10 mr-1 rounded-full bg-black/40 group-hover:border-none group-hover:bg-black/50">
                <i class="fa fa-heart text-red-600" aria-hidden="true"></i>
            </button>
        @else
            <button wire:click="toggleWishlist({{ $product->id }})"
                class="opacity-0 group-hover:opacity-100 h-10 w-10 duration-500 ease-in-out translate-y-full group-hover:translate-y-0 mr-0 group-hover:mr-1 transition-all rounded-full bg-black/50">
                <i class="fa-regular fa-heart" aria-hidden="true"></i>
            </button>
        @endif
    @else
        @if ($product->in_session_wishlist)
            <button wire:click="toggleWishlistSession({{ $product->id }})"
                class="opacity-100 h-10 w-10 mr-1 rounded-full bg-black/40 group-hover:border-none group-hover:bg-black/50">
                <i class="fa fa-heart text-red-600" aria-hidden="true"></i>
            </button>
        @else
            <button wire:click="toggleWishlistSession({{ $product->id }})"
                class="opacity-0 group-hover:opacity-100 h-10 w-10 duration-500 ease-in-out translate-y-full group-hover:translate-y-0 mr-0 group-hover:mr-1 transition-all rounded-full bg-black/50">
                <i class="fa-regular fa-heart" aria-hidden="true"></i>
            </button>
        @endif
    @endif --}}


</div>
