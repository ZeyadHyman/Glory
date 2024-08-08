<?php

namespace App\Livewire;

use Livewire\Component;

class ProductDetails extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.product-details');
    }
}
