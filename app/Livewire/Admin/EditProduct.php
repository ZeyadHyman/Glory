<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{
    use WithFileUploads;

    public $productId;
    public $name;
    public $category;
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
        $this->category = $product->category;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->discount = $product->discount;
        $this->frame_sizes = $product->frame_sizes ?? [];
        $this->frame_colors = $product->frame_colors ?? [];
        $this->images = is_array($product->images) ? $product->images : json_decode($product->images, true) ?? [];
    }

    public function toggleSizes()
    {
        $this->frame_sizes = $this->selectAllSizes ? ['small', 'medium', 'large', 'xlarge'] : [];
    }

    public function toggleColors()
    {
        $this->frame_colors = $this->selectAllColors ? ['red', 'blue', 'green', 'black', 'white'] : [];
    }

    public function deleteImage($index)
    {
        $imagePath = $this->images[$index];

        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        array_splice($this->images, $index, 1);

        $product = Product::findOrFail($this->productId);
        $product->images = json_encode($this->images);
        $product->save();
    }


    public function updateProduct()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:0|max:100',
            'frame_sizes' => 'array',
            'frame_colors' => 'array',
            'newImages.*' => 'nullable|image',
        ]);

        $product = Product::findOrFail($this->productId);

        $product->name = $this->name;
        $product->category = $this->category;
        $product->description = $this->description;
        $product->price = $this->price;
        $product->discount = $this->discount;
        $product->frame_sizes = $this->frame_sizes;
        $product->frame_colors = $this->frame_colors;

        if ($this->newImages) {
            $imagePaths = $this->images;
            foreach ($this->newImages as $image) {
                $imagePaths[] = $image->store('images/posters', 'public');
            }
            $product->images = json_encode($imagePaths);
        } else {
            $product->images = json_encode($this->images);
        }

        $product->save();

        session()->flash('message', 'Product updated successfully.');
        return redirect()->route('product-details', [
            'productId' => $product->id,
        ]);
    }

    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.app');
    }
}
