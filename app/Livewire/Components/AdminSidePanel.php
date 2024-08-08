<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AdminSidePanel extends Component
{
    public $activeTab = 'dashboard';

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
        $this->dispatch('tabChanged', $tab); // Emit the event to notify other components
    }

    public function render()
    {
        return view('livewire.components.admin-side-panel');
    }
}
