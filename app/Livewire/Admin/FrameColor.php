<?php

namespace App\Livewire\Admin;

use App\Models\FrameColor as ModelsFrameColor;
use Livewire\Component;

class FrameColor extends Component
{
    public $colors;
    public $newColor;

    public function mount()
    {
        $this->colors = ModelsFrameColor::all();
    }

    public function addColor()
    {
        if ($this->newColor) {
            ModelsFrameColor::create(['name' => $this->newColor]);
            $this->colors = ModelsFrameColor::all();
            $this->newColor = '';
        }
    }

    public function deleteColor($id)
    {
        ModelsFrameColor::find($id)?->delete();
        $this->colors = ModelsFrameColor::all();
    }

    public function deleteAll()
    {
        ModelsFrameColor::query()->delete();
        $this->colors = ModelsFrameColor::all();
    }

    public function render()
    {
        return view('livewire.admin.frame-color')->layout('layouts.app');
    }
}
