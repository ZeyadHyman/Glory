<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\SocialLogin;
use App\Models\Wishlist;

class MobileNavigation extends Component
{
    public string $user_image = '';
    public $wishlist_count = 0;
    public $cart_count = 0;
    public $cart_count_session;
    public $wishlist_count_session;

    #[On('profile-image-updated')]
    #[On('profile-image-deleted')]
    public function mount()
    {
        $cart = Session::get('cart', []);
        $this->cart_count_session = count($cart);

        $wishlist = Session::get('wishlist', []);
        $this->wishlist_count_session = count($wishlist);

        if (Auth::user()) {
            $userId = Auth::id();
            $exists = SocialLogin::where('user_id', $userId)->exists();
            $imageChanged = Auth::user()->profile_image_changed;
            $this->wishlist_count = Wishlist::where('user_id', $userId)->count();
            $this->cart_count = Cart::where('user_id', $userId)->count();

            if ($imageChanged) {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            } elseif ($exists) {
                $this->user_image = Auth::user()->profile_image ?: '';
            } else {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            }
        }
    }

    #[On('wishlistUpdated')]
    public function getCartAndWishlist()
    {
        if (Auth::user()) {
            $userId = Auth::id();
            $exists = SocialLogin::where('user_id', $userId)->exists();
            $imageChanged = Auth::user()->profile_image_changed;
            $this->wishlist_count = Wishlist::where('user_id', $userId)->count();
            $this->cart_count = Cart::where('user_id', $userId)->count();

            if ($imageChanged) {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            } elseif ($exists) {
                $this->user_image = Auth::user()->profile_image ?: '';
            } else {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            }
        }
    }
}
