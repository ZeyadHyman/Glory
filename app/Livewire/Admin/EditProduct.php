<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\FrameColor;
use App\Models\FrameSize;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{
    use WithFileUploads;

    public $productId;
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
    public $image;
    public $images = [];
    public $newImages = [];
    public $selectAllSizes = false;
    public $selectAllColors = false;

    public function mount($productId)
    {
        $this->productId = $productId;
        $product = Product::findOrFail($this->productId);

        $this->name = $product->name;
        $this->category_id = $product->category_id;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->discount = $product->discount;
        $this->frame_sizes = $product->frame_sizes ?? [];
        $this->frame_colors = $product->frame_colors ?? [];
        $this->images = is_array($product->images) ? $product->images : json_decode($product->images, true) ?? [];
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


    public function removeImage($index)
    {
        $imagePath = $this->images[$index];

        unset($this->images[$index]);
        $this->images = array_values($this->images);

        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        $product = Product::findOrFail($this->productId);
        $product->images = json_encode($this->images);
        $product->save();

        $this->mount($this->productId);
    }

    public function makeCover($index)
    {
        $coverImage = $this->images[$index];
        unset($this->images[$index]);
        array_unshift($this->images, $coverImage);

        $product = Product::findOrFail($this->productId);
        $product->images = json_encode($this->images);
        $product->save();
        session()->flash('message', 'Cover Image Edited Successfully.');
        $this->mount($this->productId);
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|max:255',
            'description' => 'nullable|string|max:500',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'frame_sizes' => 'nullable|array',
            'frame_colors' => 'nullable|array',
            'newImages.*' => 'nullable|image',
        ]);

        $product = Product::findOrFail($this->productId);

        if ($this->newImages) {
            foreach ($this->newImages as $newImage) {
                $imagePath = $newImage->store('images/posters', 'public');
                $this->images[] = $imagePath;
            }
            $this->newImages = [];
        }

        $product->update([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'price' => $this->price,
            'discount' => $this->discount,
            'frame_sizes' => $this->frame_sizes,
            'frame_colors' => $this->frame_colors,
            'images' => json_encode($this->images),
        ]);

        session()->flash('message', 'Product updated successfully.');
    }


    public function render()
    {
        $this->categories = Category::get();
        $this->sizes = FrameSize::get();
        $this->colors = FrameColor::get();
        return view('livewire.admin.edit-product')->layout('layouts.app');
    }
}
