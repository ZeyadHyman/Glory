<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Wishlist as ModelsWishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Wishlist extends Component
{
    public function render()
    {
        $userId = Auth::id();
        $wishlist_products = ModelsWishlist::where('user_id', $userId)->get();
        $products = [];
        foreach ($wishlist_products as $wishlist_product) {
            $product = Product::where('id', $wishlist_product->id)->first();
            array_push($products, $product);
        }

        return view('livewire.wishlist', [
            'products' => $products
        ]);
    }

    public function remove($id)
    {

        ModelsWishlist::where('id', $id)->delete();

        $this->render();

        $this->dispatch('wishlistUpdated');
    }
}
