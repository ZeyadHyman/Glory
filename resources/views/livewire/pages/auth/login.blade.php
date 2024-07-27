<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        try {
            $this->form->authenticate();

            Session::regenerate();

            Session::flash('success', 'Logged in successfully.');

            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', 'Invalid email or password.');

            $this->redirect(route('login', absolute: false), navigate: true);
        }
    }
}; ?>

<div>

    @section('pageTitle', 'Login')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto w-full lg:h-[80vh] lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-white">
            <i class="fa fa-user mr-2" aria-hidden="true"></i>
            Glory
        </a>
        @if (session()->has('success') || session()->has('error'))
            <div
                class="{{ session()->has('error') ? 'bg-red-500' : 'bg-green-500' }} text-white p-2 rounded-t-full w-full md:w-1/2 lg:w-1/3 text-center">
                {{ session('success') ?? session('error') }}
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 bg-gray-800 rounded-b-lg shadow dark:border dark:border-gray-700">
            @else
                <div class="w-full md:w-1/2 lg:w-1/3 bg-gray-800 rounded-lg shadow dark:border dark:border-gray-700">
        @endif

        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl">
                Log in to your account
            </h1>
            <form class="space-y-4 md:space-y-6" wire:submit="login">
                {{-- Email --}}
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-white">
                        <i class="fa fa-envelope mr-1" aria-hidden="true"></i>
                        Your email
                    </label>
                    <input type="email" name="email" id="email" wire:model='form.email'
                        class="bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="example@example.com" required>

                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-white">
                        <i class="fa fa-lock mr-1" aria-hidden="true"></i>
                        Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        wire:model='form.password'
                        class="bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>


                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div>
                        <label for="remember" class="inline-flex items-center">
                            <input wire:model="form.remember" id="remember" type="checkbox"
                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-blue-600 hover:text-blue-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800"
                            href="{{ route('password.request') }}" wire:navigate>
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>


                {{-- Login --}}
                <button type="submit"
                    class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <span wire:loading.remove wire:target="login">Log in</span>
                    <span wire:loading wire:target="login">
                        <svg aria-hidden="true"
                            class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-300"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </span>
                </button>


                <p class="text-sm font-light text-gray-400">
                    Don’t have an account yet?
                    <a href={{ route('register') }} class="font-medium text-blue-500 hover:underline">Register</a>
                </p>
            </form>
        </div>
    </div>
</div>
