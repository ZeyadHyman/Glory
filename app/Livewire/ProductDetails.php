<?php

namespace App\Livewire;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetails extends Component
{
    public $product;
    public $quantity = 0;

   
    public function render()
    {
        return view('livewire.product-details');
    }
}
