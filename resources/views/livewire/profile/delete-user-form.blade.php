
<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;
use App\Models\SocialLogin;

new class extends Component {
    public string $password = '';
    public bool $exists = true;

    public function mount()
    {
        if (Auth::user()) {
            $userId = Auth::id();
            $exists = SocialLogin::where('user_id', $userId)->exists();
        }
    }

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        if (!$this->exists) {
            $this->validate([
                'password' => ['required', 'string', 'current_password'],
            ]);
        } else {
            $userId = Auth::id();        
            SocialLogin::where('user_id', $userId)->delete();
        }

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
};


?>

@php
    $exists = true;

    if (Auth::user()) {
        $userId = Auth::id();
        $exists = SocialLogin::where('user_id', $userId)->exists();
    }

@endphp
<section class="space-y-6 ">
    <header>
        <h2 class="text-xl font-bold text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6">

            <h2 class="text-xl font-bold text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
            </p>

            @if (!$exists)
                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                    <x-text-input wire:model="password" id="password" name="password" type="password"
                        class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            @endif

            <div class="mt-6 flex">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
