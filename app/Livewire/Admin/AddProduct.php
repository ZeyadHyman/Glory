<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\FrameColor;
use App\Models\FrameSize;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $categories;
    public $sizes;
    public $colors;
    public $category_id;
    public $description;
    public $price;
    public $discount;
    public $frame_sizes = [];
    public $frame_colors = [];
    public $images = [];
    public $CoverImage;
    public $selectAllSizes = false;
    public $selectAllColors = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'category_id' => 'required',
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
        $imagePaths[] = $this->CoverImage->store('images/Posters', 'public');
        foreach ($this->images as $image) {
            $imagePaths[] = $image->store('images/Posters', 'public');
        }

        $data['images'] = json_encode($imagePaths);

        $product = Product::create($data);

        $this->reset();

        return redirect()->route('product-details', [
            'productId' => $product->id,
        ]);
    }



    public function toggleSizes()
    {
        if ($this->selectAllSizes) {
            $this->frame_sizes = $this->sizes->pluck('name')->toArray(); 
        } else {
            $this->frame_sizes = [];
        }
    }

    public function toggleColors()
    {
        if ($this->selectAllColors) {
            $this->frame_colors = $this->colors->pluck('name')->toArray(); 
        } else {
            $this->frame_colors = [];
        }
    }

    public function render()
    {
        if (Category::first()) {
            $this->categories = Category::get();
        }
        if (FrameSize::first()) {
            $this->sizes = FrameSize::get();
        }
        if (FrameColor::first()) {
            $this->colors = FrameColor::get();
        }        
        return view('livewire.admin.add-product')->layout('layouts.app');
    }
}
