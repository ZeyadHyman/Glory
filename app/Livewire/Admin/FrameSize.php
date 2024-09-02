<?php

namespace App\Livewire\Admin;

use App\Models\FrameSize as ModelsFrameSize;
use Livewire\Component;

class FrameSize extends Component
{
    public $sizes;
    public $newSize;

    public function mount()
    {
        $this->sizes = ModelsFrameSize::all();
    }

    public function addSize()
    {
        if ($this->newSize) {
            ModelsFrameSize::create(['name' => $this->newSize]);
            $this->sizes = ModelsFrameSize::all();
            $this->newSize = '';
        }
    }

    public function deleteSize($id)
    {
        ModelsFrameSize::find($id)?->delete();
        $this->sizes = ModelsFrameSize::all();
    }

    public function deleteAll()
    {
        ModelsFrameSize::query()->delete();
        $this->sizes = ModelsFrameSize::all(); 
    }

    public function render()
    {
        return view('livewire.admin.frame-size')->layout('layouts.app');
    }
}
