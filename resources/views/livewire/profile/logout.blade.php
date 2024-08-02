<?php

use Livewire\Volt\Component;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/');
    }
};
?>
<section class="p-5">
    <div class="flex flex-wrap justify-between items-center">
        <h1 class="text-base text-zinc-50 font-bold flex-grow">Logout From Your Account</h1>
        <button wire:click="logout" class="text-center rounded-md bg-red-500 text-zinc-50 py-2 px-4 mt-2 sm:mt-0">
            {{ __('Log Out') }}
        </button>
    </div>
</section>

