<?php

namespace App\Livewire\Home;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Football extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $page = 1;

    public function loadMore()
    {
        $this->perPage += 5;
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
        $this->render();
    }

    public function render()
    {
        $userId = Auth::id();
        $wishlistProductIds = Wishlist::where('user_id', $userId)->pluck('product_id')->toArray();

        $products = Product::where('category', 'football')
            ->paginate($this->perPage);

        $products->getCollection()->transform(function ($product) use ($wishlistProductIds) {
            $product->in_wishlist = in_array($product->id, $wishlistProductIds);
            return $product;
        });

        return view('livewire.home.football', [
            'products' => $products,
        ]);
    }
}
