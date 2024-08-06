<?php

namespace App\Livewire\Home;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Tshirts extends Component
{
    use WithPagination;

    public $perPage = 6;
    public $page = 1;

    public function loadMore()
    {
        $this->perPage += 3;
    }

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

    }

    public function render()
    {
        $userId = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $userId)->pluck('product_id')->toArray();
        $sessionWishlist = Session::get('wishlist', []);

        $products = Product::where('category', 't-shirts')
            ->paginate($this->perPage);

        $products->getCollection()->transform(function ($product) use ($wishlistProductIds, $sessionWishlist) {
            $product->in_wishlist = in_array($product->id, $wishlistProductIds);
            $product->in_session_wishlist = in_array($product->id, $sessionWishlist);
            return $product;
        });

        return view('livewire.home.tshirts', [
            'products' => $products,
        ]);
    }
}
