<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('home', absolute: false), navigate: true);

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="flex justify-center items-center w-full h-[80vh]">
    @section('pageTitle', 'Email Verification')

    <div class="w-full mx-5 md:w-1/2 lg:w-1/3 bg-[#1d364a50] rounded-lg shadow dark:border dark:border-gray-700 ">
        <div class="p-6 space-y-4 sm:p-8">
            @if (!auth()->user()->hasVerifiedEmail())
                <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl">
                    Verify Your Email
                </h1>
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <x-primary-button wire:click="sendVerification">
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>

                    <button wire:click="logout" type="submit"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Log Out') }}
                    </button>
                </div>
            @else
                <div class="flex flex-col">
                    <h1 class="text-lg font-semibold leading-tight tracking-tight text-white md:text-lg">
                        <i class="fa fa-check mr-2 text-green-400 text-xl font-bold" aria-hidden="true"></i>
                        Your Email is Verified
                    </h1>
                    <p class="mt-4 text-gray-300">
                        Your journey to celebrate legends begins now. Explore our exclusive collection and bring the
                        glory of legends home! </p>
                    <a href="{{ route('home') }}"
                        class="px-5 py-3 bg-red-500 text-zinc-50 rounded-xl text-sm mt-6 text-center">
                        Return To Home Page
                    </a>
                </div>

        </div>
    </div>
    @endif
</div>
