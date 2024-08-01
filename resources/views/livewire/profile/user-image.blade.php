<?php
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\SocialLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Volt\Component;

new class extends Component {
    use WithFileUploads;

    public string $user_image = '';
    public $profile_image = null;

    public function mount()
    {
        
        if (Auth::user()) {
            $userId = Auth::id();
            $exists = SocialLogin::where('user_id', $userId)->exists();
            $imageChanged = Auth::user()->profile_image_changed;

            if ($imageChanged) {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image));
            } elseif ($exists) {
                $this->user_image = Auth::user()->profile_image;
            } else {
                $this->user_image = asset('storage/profile_images/' . (Auth::user()->profile_image));
            }
        }
    }

    public function updateProfileImage(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'profile_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($user->profile_image) {
            Storage::delete('public/profile_images/' . $user->profile_image);
        }

        $path = $validated['profile_image']->store('profile_images', 'public');
        $user->profile_image = basename($path);
        $user->profile_image_changed = true;
        $user->save();

        $this->dispatch('profile-image-updated');
        $this->mount();
    }

    public function deleteProfileImage(): void
    {
        $user = Auth::user();

        if ($user->profile_image) {
            Storage::delete('public/profile_images/' . $user->profile_image);
            $user->profile_image = null;
            $user->profile_image_changed = true;
            $user->save();
        }

        $this->dispatch('profile-image-deleted');
        $this->mount();
    }
};
?>
<section>
    <style>
        /* Keyframes for the loading bar animation */
        @keyframes loading {
            0% {
                width: 0%;
            }
            20% {
                width: 20%;
            }
            40% {
                width: 40%;
            }
            65% {
                width: 65%;
            }
            80% {
                width: 80%;
            }
            100% {
                width: 97%;
            }

        }

        .loading-bar {
            width: 0%;
            height: 5px;
            margin-left: 5px;
            background-color: #4CAF50;
            animation: loading 3s ease-in-out;
        }
    </style>
    <form wire:submit.prevent="updateProfileImage" class="space-y-6">
        <div class="flex justify-between">
            <div>
                <h2 class="text-xl font-bold text-gray-100">
                    {{ __('Profile Image') }}
                    <p class="mt-1 text-sm text-gray-400">
                        {{ __("Update your account's profile image.") }}
                    </p>
                </h2>

                <div class="relative">
                    <input wire:model="profile_image"
                        class=" block w-full text-sm text-gray-400 border mt-4 border-gray-600 rounded-lg cursor-pointer bg-gray-700"
                        type="file">

                    <!-- Loading Bar -->
                    <div  wire:loading wire:target="profile_image" class="loading-bar h-1 absolute top-0 rounded-full ">
                    </div>
                </div>

                <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />

                <div class="flex items-center gap-4 mt-5">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (Auth::user()->profile_image)
                        <button wire:click.prevent="deleteProfileImage"
                            class="underline text-sm text-gray-400 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Delete Profile Image') }}
                        </button>
                    @endif

                    <x-action-message class="me-3" on="profile-image-updated">
                        {{ __('Saved.') }}
                    </x-action-message>

                    <x-action-message class="me-3" on="profile-image-deleted">
                        {{ __('Deleted.') }}
                    </x-action-message>
                </div>
            </div>
            <div>
                @if (Auth::user()->profile_image)
                    <img src="{{ $user_image }}" alt="Profile Image"
                        class="w-32 h-32 hidden sm:block object-cover rounded-xl">
                @endif
            </div>
        </div>
    </form>
</section>
