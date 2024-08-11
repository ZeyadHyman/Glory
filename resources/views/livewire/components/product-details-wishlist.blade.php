<div class="flex items-center justify-start">
    @auth
        <button wire:click="toggleWishlist({{ $product_id }})"
            class="px-6 py-3 transition-all duration-300 bg-white hover:bg-white/50 border border-white rounded-xl text-zinc-50 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
            <i class="fa {{ $isInWishlist ? 'fa-heart text-red-600' : 'fa-regular fa-heart text-black' }}"
                aria-hidden="true"></i>
        </button>
    @else
        <button wire:click="toggleWishlistSession({{ $product_id }})"
            class="px-6 py-3 transition-all duration-300 bg-white hover:bg-white/50 border {{ $isInWishlist ? 'border-white' : 'border-transparent hover:border-black/50' }} rounded-xl text-zinc-50 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-[#0b1d2c] focus:ring-opacity-50">
            <i class="fa {{ $isInWishlist ? 'fa-heart text-red-600' : 'fa-regular fa-heart text-black' }}"
                aria-hidden="true"></i>
        </button>
    @endauth
</div>
