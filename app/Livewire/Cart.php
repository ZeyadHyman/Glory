<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart as CartItem;

class Cart extends Component
{
    public $cartItems = [];

    public function mount()
    {
        $this->loadCartItems();
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function removeAll()
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->delete();
        } else {
            session()->forget('cart');
        }

        $this->loadCartItems();
        $this->dispatch('sessionUpdated');
    }

    public function removeItem($productId)
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->delete();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
            }
        }

        $this->loadCartItems();
        $this->dispatch('sessionUpdated');
    }

    private function loadCartItems()
    {
        if (Auth::check()) {
            $this->cartItems = CartItem::where('user_id', Auth::id())->get();
        } else {
            $this->cartItems = collect(session()->get('cart', []));
        }
    }
}
