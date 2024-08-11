<?php

namespace App\Livewire\Components;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetailsWishlist extends Component
{
    public $isInWishlist = false;
    public $product_id;
    public function mount()
    {
        $userId = Auth::id();

        if ($userId) {
            $this->isInWishlist = Wishlist::where('user_id', $userId)
                ->where('product_id', $this->product_id)
                ->exists();
        } else {
            $wishlist = Session::get('wishlist', []);
            $this->isInWishlist = in_array($this->product_id, $wishlist);
        }
    }

    public function toggleWishlist($productId)
    {
        $userId = Auth::id();

        $wishlistItem = Wishlist::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($wishlistItem) {
            $wishlistItem->delete();
            $this->isInWishlist = false;
        } else {
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'created_at' => now()
            ]);
            $this->isInWishlist = true;
        }

        $this->dispatch('wishlistUpdated');
    }

    public function toggleWishlistSession($productId)
    {
        $wishlist = Session::get('wishlist', []);

        if (!in_array($productId, $wishlist)) {
            Session::push('wishlist', $productId);
            $this->isInWishlist = true;
        } else {
            $wishlist = array_diff($wishlist, [$productId]);
            Session::put('wishlist', $wishlist);
            $this->isInWishlist = false;
        }

        Session::save();
        $this->dispatch('wishlistSessionUpdated');
    }

    public function render()
    {
        return view('livewire.components.product-details-wishlist', [
            'isInWishlist' => $this->isInWishlist
        ]);
    }
}
