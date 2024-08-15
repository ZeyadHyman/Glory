<?php

namespace App\Livewire\Home;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Cars extends Component
{
    use WithPagination;

    public $perPage = 4;
    public $page = 1;

    public function loadMore()
    {
        $this->perPage += 3;
    }

    public function render()
    {
        $userId = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $userId)->pluck('product_id')->toArray();
        $sessionWishlist = Session::get('wishlist', []);
        
        $products = Product::where('category', 'cars')
        ->orWhere('category', 'series')
        ->paginate($this->perPage);


        $products->getCollection()->transform(function ($product) use ($wishlistProductIds, $sessionWishlist) {
            $product->in_wishlist = in_array($product->id, $wishlistProductIds);
            $product->in_session_wishlist = in_array($product->id, $sessionWishlist);
            return $product;
        });

        return view('livewire.home.cars', [
            'products' => $products,
        ]);
    }
}
