<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $category;
    public $description;
    public $price;
    public $discount;
    public $frame_sizes = [];
    public $frame_colors = [];
    public $images = []; // Array of files
    public $selectAllSizes = false;
    public $selectAllColors = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'category' => 'required|string',
        'description' => 'required|string|max:1000',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric|min:0|max:100',
        'frame_sizes' => 'array',
        'frame_colors' => 'array',
        'images.*' => 'image'
    ];

    public function addProduct()
    {
        $data = $this->validate();

        $imagePaths = [];
        foreach ($this->images as $image) {
            $imagePaths[] = $image->store('images/Posters', 'public');
        }

        Product::create(array_merge($data, ['images' => json_encode($imagePaths)]));

        $this->reset();

        session()->flash('message', 'Product added successfully!');
    }

    public function toggleSizes()
    {
        if ($this->selectAllSizes) {
            $this->frame_sizes = ['small', 'medium', 'large', 'xlarge'];
        } else {
            $this->frame_sizes = [];
        }
    }

    public function toggleColors()
    {
        if ($this->selectAllColors) {
            $this->frame_colors = ['red', 'blue', 'green', 'black', 'white'];
        } else {
            $this->frame_colors = [];
        }
    }

    public function render()
    {
        return view('livewire.admin.add-product')->layout('layouts.app');
    }
}
