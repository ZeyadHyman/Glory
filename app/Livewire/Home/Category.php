<?php

namespace App\Livewire\Home;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{

    public $categories;

    public function render()
    {
        if (ModelsCategory::first()) {
            $this->categories = ModelsCategory::get();
        }
        return view('livewire.home.category');
    }
}
