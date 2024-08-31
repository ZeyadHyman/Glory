<?php

namespace App\Livewire\Home;

use App\Models\Product;
use Livewire\Component;

class RecentlyAdded extends Component
{
    public $Products;

    public function render()
    {

        $this->Products = Product::with('category')->first()->take(10)->get();
        return view('livewire.home.recently-added');
    }
}
