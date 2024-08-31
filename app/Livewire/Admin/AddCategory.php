<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddCategory extends Component
{
    use WithFileUploads;

    public $name;
    public $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'image' => 'required|image',
    ];

    public function addCategory()
    {
        $this->validate();

        $imagePath = $this->image->store('images/categories', 'public');

        Category::create([
            'name' => $this->name,
            'image' => $imagePath,
        ]);

        $this->reset(['name', 'image']);

        return redirect()->route('adminDashboard')->with('activeTab', 'categories');
    }

    public function render()
    {
        return view('livewire.admin.add-category')->layout('layouts.app');
    }
}
