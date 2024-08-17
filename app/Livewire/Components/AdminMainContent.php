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
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    protected $listeners = ['tabChanged' => 'handleTabChanged'];

    public function updateItem($userId)
    {
        $user = User::find($userId);
        if ($this->newUserRole) {
            $user->role = $this->newUserRole;
            $user->save();
        }

        $this->resetPage();
    }

    public function sortingBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }

        $this->render();
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
            $data = $query->orderBy($this->sortBy, $this->sortDirection)->paginate(8);
        }

        if ($this->activeTab == 'users') {
            $query = User::query();

            if ($this->search) {
                $query->where('name', 'like', '%' . $this->search . '%');
            }

            $data = $query->orderBy('role')->paginate(8);
        }

        return view('livewire.components.admin-main-content', [
            'data' => $data,
        ]);
    }
}
