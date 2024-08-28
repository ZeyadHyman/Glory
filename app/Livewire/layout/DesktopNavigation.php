<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Actions\Logout;
use App\Models\SocialLogin;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class DesktopNavigation extends Component
{
    public string $user_image = '';
    public $search = '';
    public Collection $searchedProducts;

    #[On('profile-image-updated')]
    #[On('profile-image-deleted')]
    #[On('sessionUpdated')]
    public function mount()
    {
        $this->searchedProducts = new Collection();
        
        if (Auth::user()) {
            $userId = Auth::id();
            $exists = SocialLogin::where('user_id', $userId)->exists();
            $imageChanged = Auth::user()->profile_image_changed;
            if (!$imageChanged && $exists) {     
                $this->user_image = Auth::user()->profile_image ?: '';
            } else {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            }
        }
    }
    
    public function render()
    {
        if ($this->search) {
            $this->searchedProducts = Product::where('name', 'like', '%' . $this->search . '%')->get();
        }

        return view('livewire.layout.desktop-navigation', [
            'searchedProducts' => $this->searchedProducts,
        ]);
    }

    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/');
    }
}
