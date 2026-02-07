<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class SizeGuideUpload extends Component
{
    use WithFileUploads;

    public $sizeGuideImage;

    public function test()
    {
        $filename = 'size_guide.jpg';
        $path = $this->sizeGuideImage->storeAs('images/assets', $filename, 'public');
        session()->flash('message', 'Size guide image uploaded successfully.');
        $this->reset('sizeGuideImage');
    }

    public function render()
    {
        return view('livewire.admin.size-guide-upload')->layout('layouts.app');
    }
}
