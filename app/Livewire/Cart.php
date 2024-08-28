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
        $components = explode('-', $productId);
        $productIdValue = $components[0];
        $frameSize = $components[1] ?? null;
        $frameColor = $components[2] ?? null;

        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())
                ->where('product_id', $productIdValue)
                ->when($frameSize, function ($query, $frameSize) {
                    return $query->where('frame_size', $frameSize);
                })
                ->when($frameColor, function ($query, $frameColor) {
                    return $query->where('frame_color', $frameColor);
                })
                ->delete();
        } else {
            $cart = session()->get('cart', []);
            $cartKey = $productIdValue . '-' . ($frameSize !== null ? $frameSize . '-' : '') . ($frameColor !== null ? $frameColor : '');
            if (isset($cart[$cartKey])) {
                unset($cart[$cartKey]);
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
