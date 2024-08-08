<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AdminMainContent extends Component
{
    public $activeTab = 'dashboard';

    protected $listeners = ['tabChanged' => 'handleTabChanged'];

    public function handleTabChanged($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.components.admin-main-content');
    }
}
