<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Wishlist as ModelsWishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Wishlist extends Component
{
    public $products = [];

    public function render()
    {
        $this->products = [];

        if (Auth::check()) {
            $userId = Auth::id();
            $wishlist_products = ModelsWishlist::where('user_id', $userId)->pluck('product_id');
            foreach ($wishlist_products as $productId) {
                $product = Product::find($productId);
                if ($product) {
                    $this->products[] = $product;
                }
            }
        } else {
            $wishlistProductIds = Session::get('wishlist', []);
            foreach ($wishlistProductIds as $productId) {
                $product = Product::find($productId);
                if ($product) {
                    $this->products[] = $product;
                }
            }
        }

        return view('livewire.wishlist', [
            'products' => $this->products
        ]);
    }

    public function remove($id)
    {
        if (Auth::check()) {
            ModelsWishlist::where('user_id', Auth::id())->where('product_id', $id)->delete();
        } else {
            $wishlist = Session::get('wishlist', []);
            $wishlist = array_diff($wishlist, [$id]);
            Session::put('wishlist', $wishlist);
        }

        $this->render();
        $this->dispatch('wishlistSessionUpdated');
    }
}
