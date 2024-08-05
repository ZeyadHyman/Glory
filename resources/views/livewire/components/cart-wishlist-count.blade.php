<?php

use Illuminate\Support\Facades\Session;

$cart = Session::get('cart', []);
$cart_count_session = count($cart);

$wishlist = Session::get('wishlist', []);
$wishlist_count_session = count($wishlist);
?>

<div>

    {{-- Desktop Version --}}
    <div class="hidden lg:flex items-center {{ $wishlist_count ? 'space-x-3 ' : 'space-x-2' }}">
        @if ($wishlist_count || $wishlist_count_session)
            <i class="fa-solid fa-heart text-xl md:text-2xl text-red-600 relative ">
                <span
                    class="absolute -top-2 -right-2 w-5 h-5 flex items-center justify-center bg-cyan-900 text-xs rounded-full text-zinc-50">
                    @auth
                        {{ $wishlist_count }}
                    @else
                        {{ $wishlist_count_session }}
                    @endauth
                </span>
            </i>
        @else
            <i class="fa-regular fa-heart text-xl md:text-2xl text-cyan-900"></i>
        @endif
        <i class="fa fa-cart-shopping text-xl md:text-2xl text-cyan-900 relative px-3" aria-hidden="true">
            <span
                class="absolute -top-2 right-1 w-5 h-5 flex items-center justify-center bg-cyan-900 text-zinc-50 text-xs rounded-full">
                @auth
                    {{ $cart_count }}
                @else
                    {{ $cart_count_session }}
                @endauth
            </span>
        </i>
    </div>

</div>
