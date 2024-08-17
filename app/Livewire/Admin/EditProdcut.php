<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class EditProdcut extends Component
{
    public $productId;
    public $product;

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->product = Product::findorfail($this->productId);
    }

    public function render()
    {
        return view('livewire.admin.edit-prodcut', [
            'product' => $this->product
        ])->layout('layouts.app');
    }
}
