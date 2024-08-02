<?php

namespace App\Livewire\Components;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class CartWishlistCount extends Component
{
    public $wishlist_count = 0;
    public $cart_count = 0;
    public function render()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $this->wishlist_count = Wishlist::where('user_id', $userId)->count();
            $this->cart_count = Cart::where('user_id', $userId)->count();
        }

        return view('livewire.components.cart-wishlist-count');
    }
}


