<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;
    public $relatedProducts;
    public $quantity = 1;
    public $frame_size;
    public $frame_color;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        $image = is_array($this->product->images) ? json_encode($this->product->images) : $this->product->images;

        if (Auth::check()) {
            $userId = Auth::id();
            $existingCartItem = Cart::where('user_id', $userId)
                ->where('product_id', $this->product->id)
                ->where('frame_size', $this->frame_size)
                ->where('frame_color', $this->frame_color)
                ->first();

            if ($existingCartItem) {
                $existingCartItem->quantity += $this->quantity;
                $existingCartItem->image = $image;
                $existingCartItem->save();
            } else {
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $this->product->id,
                    'quantity' => $this->quantity,
                    'name' => $this->product->name,
                    'price' => $this->product->price,
                    'discount' => $this->product->discount ?? 0.00,
                    'frame_size' => $this->frame_size,
                    'frame_color' => $this->frame_color,
                    'image' => $image,
                ]);
            }


            session()->flash('message', 'Product updated in your cart successfully!');
        } else {
            $cart = session()->get('cart', []);
            $cartKey = $this->product->id . '-' . $this->frame_size . '-' . $this->frame_color;

            if (isset($cart[$cartKey])) {
                $cart[$cartKey]['quantity'] += $this->quantity;
                $cart[$cartKey]['image'] = $image;
            } else {
                $cart[$cartKey] = [
                    'product_id' => $this->product->id,
                    'name' => $this->product->name,
                    'price' => $this->product->price,
                    'discount' => $this->product->discount ?? 0.00,
                    'quantity' => $this->quantity,
                    'frame_size' => $this->frame_size,
                    'frame_color' => $this->frame_color,
                    'image' => $image,
                ];
            }

            session()->put('cart', $cart);
            session()->flash('message', 'Product added to cart successfully!');
        }

        $this->dispatch('sessionUpdated');
        return redirect()->route('cart');
    }

    public function render()
    {
        $this->relatedProducts = Product::where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('livewire.product-details');
    }
}
