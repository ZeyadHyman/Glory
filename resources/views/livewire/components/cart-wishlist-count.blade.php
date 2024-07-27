<div class="flex items-center {{ $wishlist_count ? 'space-x-3 ' : 'space-x-2' }}">
    @if ($wishlist_count)
        <i class="fa-solid fa-heart text-2xl text-red-600 relative">
            <span class="absolute -top-2 -right-2 w-5 h-5 flex items-center justify-center bg-cyan-900 text-xs rounded-full text-zinc-50">
                {{ $wishlist_count }}
            </span>
        </i>
    @else
        <i class="fa-regular fa-heart text-2xl text-cyan-900"></i>
    @endif
    <i class="fa fa-cart-shopping text-2xl text-cyan-900 relative" aria-hidden="true">
        <span class="absolute -top-2 -right-2 w-5 h-5 flex items-center justify-center bg-cyan-900 text-zinc-50 text-xs rounded-full">
            {{ $cart_count }}
        </span>
    </i>
</div>
