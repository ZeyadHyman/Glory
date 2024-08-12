<?php

namespace App\Livewire\Components;

use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMainContent extends Component
{
    use WithPagination;

    public $search = '';
    public $newUserRole;
    public $userData;
    public $activeTab = 'products';
    protected $listeners = ['tabChanged' => 'handleTabChanged'];

    public function updateItem($userId)
    {
        $user = User::find($userId);
        $user->role = $this->newUserRole;
        $user->save();
        $this->resetPage();
    }


    public function handleTabChanged($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage();
    }

    public function handleSearching()
    {
        $this->resetPage();
    }
    public function deleteItem($id)
    {
        if ($this->activeTab == 'products') {
            Product::findorfail($id)->delete();
        }

        if ($this->activeTab == 'users') {
            User::findorfail($id)->delete();
        }

        $this->render();
    }

    public function render()
    {
        $data = collect();

        if ($this->activeTab == 'products') {
            $query = Product::query();

            if ($this->search) {
                $query->where('name', 'like', '%' . $this->search . '%');
            }

            $data = $query->paginate(8);
        }

        if ($this->activeTab == 'users') {
            $query = User::query();

            if ($this->search) {
                $query->where('name', 'like', '%' . $this->search . '%');
            }

            $data = $query->paginate(8);
        }

        return view('livewire.components.admin-main-content', [
            'data' => $data,
        ]);
    }
}
