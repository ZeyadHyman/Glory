<?php

namespace App\Livewire\Home;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{

    public $categories;

    public function render()
    {

        $this->categories = ModelsCategory::get();
        return view('livewire.home.category');
    }
}
