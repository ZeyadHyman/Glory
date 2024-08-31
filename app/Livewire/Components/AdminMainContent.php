<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMainContent extends Component
{
    use WithPagination;

    public $search = '';
    public $userRole;
    public $userData;
    public $activeTab;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $openEditModal = false;

    #[On('tabChanged')]
    public function handleTabChanged($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage();
    }

    public function updateUserRole($userId)
    {
        $user = User::find($userId);
        if ($this->userRole) {
            $user->role = $this->userRole;
            $user->save();
        }
        $this->openEditModal = false;
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

    public function handleSearching()
    {
        $this->resetPage();
    }

    public function deleteItem($id)
    {
        if ($this->activeTab == 'products') {
            Product::findorfail($id)->delete();
        }


        if ($this->activeTab == 'categories') {
            $category = Category::findOrFail($id);
            $category->products()->delete();
            $category->delete();
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
            $data = $query->orderBy($this->sortBy, $this->sortDirection)->with('category')->paginate(8);
        }

        if ($this->activeTab == 'users') {
            $query = User::query();

            if ($this->search) {
                $query->where('name', 'like', '%' . $this->search . '%');
            }

            $data = $query->orderBy('role')->paginate(8);
        }

        if ($this->activeTab == 'categories') {
            $query = Category::query();

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
