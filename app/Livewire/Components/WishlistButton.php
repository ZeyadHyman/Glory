<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistButton extends Component
{
    public $product;
    public function toggleWishlist($productId)
    {
        $userId = Auth::id();

        $wishlistItem = Wishlist::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($wishlistItem) {
            $wishlistItem->delete();
        } else {
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'created_at' => now()
            ]);
        }

        $this->dispatch('wishlistUpdated');
        $this->mount();
    }

    public function toggleWishlistSession($productId)
    {
        $wishlist = Session::get('wishlist', []);

        if (!in_array($productId, $wishlist)) {
            Session::push('wishlist', $productId);
        } else {
            $wishlist = array_diff($wishlist, [$productId]);
            Session::put('wishlist', $wishlist);
        }

        Session::save();
        $this->dispatch('wishlistSessionUpdated');
        $this->mount();
    }

    public function mount()
    {
        return view('livewire.components.wishlist-button', [
            'product' => $this->product
        ]);
    }
}
