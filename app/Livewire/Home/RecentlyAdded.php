<?php

namespace App\Livewire\Home;

use App\Models\Product;
use Livewire\Component;

class RecentlyAdded extends Component
{
    public $Products;

    public function render()
    {

        if (Product::first()) {
            $this->Products = Product::first()->take(10)->get();
        }
        return view('livewire.home.recently-added');
    }
}
