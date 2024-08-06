<?php

namespace App\Livewire\Components;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;


class CartWishlistCount extends Component
{
    public $wishlist_count = 0;
    public $cart_count = 0;
    public $cart_count_session;
    public $wishlist_count_session;

    #[On('wishlistUpdated')]
    #[On('wishlistSessionUpdated')]
    public function render()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $this->wishlist_count = Wishlist::where('user_id', $userId)->count();
            $this->cart_count = Cart::where('user_id', $userId)->count();
        } else {
            $cart = Session::get('cart', []);
            $this->cart_count_session = count($cart);

            $wishlist = Session::get('wishlist', []);
            $this->wishlist_count_session = count($wishlist);
        }

        return view('livewire.components.cart-wishlist-count');
    }
}
