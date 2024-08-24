<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use App\Models\Cart;
use App\Models\SocialLogin;
use App\Models\Wishlist;
use App\Livewire\Actions\Logout;


class MobileNavigation extends Component
{
    public string $user_image = '';
    public $wishlist_count = 0;
    public $cart_count = 0;
    public $cart_count_session = 0;
    public $wishlist_count_session = 0;

    #[On('profile-image-updated')]
    #[On('profile-image-deleted')]
    #[On('wishlistSessionUpdated')]
    #[On('sessionUpdated')]
    public function mount()
    {
        $this->updateSessionCounts();
        $this->updateUserData();
    }

    #[On('wishlistUpdated')]
    public function getCartAndWishlist()
    {
        $this->updateUserData();
    }

    private function updateSessionCounts()
    {
        $cart = Session::get('cart', []);
        $this->cart_count_session = count($cart);

        $wishlist = Session::get('wishlist', []);
        $this->wishlist_count_session = count($wishlist);
    }

    private function updateUserData()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $this->wishlist_count = Wishlist::where('user_id', $userId)->count();
            $this->cart_count = Cart::where('user_id', $userId)->count();

            $exists = SocialLogin::where('user_id', $userId)->exists();
            $imageChanged = Auth::user()->profile_image_changed;

            if ($imageChanged || !$exists) {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            } else {
                $this->user_image = Auth::user()->profile_image ?: '';
            }
        }
    }
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/');
    }
    public function render()
    {
        return view('livewire.layout.mobile-navigation');
    }
}
