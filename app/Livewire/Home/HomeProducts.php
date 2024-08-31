<?php

namespace App\Livewire\Home;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class HomeProducts extends Component
{
    use WithPagination;

    public $perPage = 4;
    public $categories;
    public $products = [];

    public function loadMore()
    {
        $this->perPage += 3;
        $this->loadProducts();
    }

    public function loadProducts()
    {
        foreach ($this->categories as $category) {
            $this->products[$category->name] = Product::where('category_id', $category->id)
                ->take($this->perPage)
                ->get();
        }
    }

    public function render()
    {
        $this->categories = Category::all();
        $this->loadProducts();
        return view('livewire.home.home-products');
    }
}
