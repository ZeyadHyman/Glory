<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Actions\Logout;
use App\Models\SocialLogin;

class DesktopNavigation extends Component
{
    public string $user_image = '';

    #[On('profile-image-updated')]
    #[On('profile-image-deleted')]
    public function mount()
    {
        if (Auth::user()) {
            $userId = Auth::id();
            $exists = SocialLogin::where('user_id', $userId)->exists();
            $imageChanged = Auth::user()->profile_image_changed;

            if ($imageChanged) {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            } elseif ($exists) {
                $this->user_image = Auth::user()->profile_image ?: '';
            } else {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image ?: ''));
            }
        }
    }

    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/');
    }
}
