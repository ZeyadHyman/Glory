<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditCategory extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $newImage;
    public $categoryId;

    public function mount($categoryId)
    {
        $this->categoryId = $categoryId;
        $category = Category::findOrFail($this->categoryId);

        $this->name = $category->name;
        $this->image = $category->image;
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'newImage' => 'nullable|image',
        ]);

        $category = Category::findOrFail($this->categoryId);

        if ($this->newImage) {
            $newImagePath = $this->newImage->store('images/categories', 'public');
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $category->image = $newImagePath;
        }

        $category->name = $this->name;
        $category->save();

        session()->flash('message', 'Category updated successfully.');
        return redirect()->route('adminDashboard')->with('activeTab', 'categories');
    }

    public function render()
    {
        return view('livewire.admin.edit-category')->layout('layouts.app');
    }
}
