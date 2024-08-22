<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;
    public $relatedProducts;
    public $quantity = 0;

   
    public function render()
    {  
        $this->relatedProducts = Product::where('category', $this->product->category)->where('id', '!=', $this->product->id)->inRandomOrder()->take(8)->get();
        return view('livewire.product-details');
    }
}
