<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    @section('pageTitle', 'Registration')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto w-full xl:h-[90vh]">
        <div class="w-full md:w-1/2 lg:w-1/3 bg-gray-800 rounded-lg shadow dark:border dark:border-gray-700">
            <div class="p-6 sm:p-8">
                <h1 class="text-xl mb-2 text-center font-bold leading-tight tracking-tight text-white md:text-2xl">
                    <i class="fa fa-user-plus mr-2" aria-hidden="true"></i>
                    Create Account
                </h1>
                <form wire:submit.prevent="register">
                    {{-- Name --}}
                    <div>
                        <label for="name" class="block mb-2 mt-5  text-sm font-medium text-white">
                            <i class="fa fa-user mr-1" aria-hidden="true"></i>
                            Name
                        </label>
                        <input type="text" name="name" id="name" wire:model='name'
                            class="bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Abdelrahman Hayman" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>


                    {{-- Email --}}
                    <div>
                        <label for="email" class="block mb-2 mt-5  text-sm font-medium text-white">
                            <i class="fa fa-envelope mr-1" aria-hidden="true"></i>
                            Email
                        </label>
                        <input type="email" name="email" id="email" wire:model='email'
                            class="bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="example@example.com" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>


                    {{-- Password --}}
                    <div>
                        <label for="password" class="block mb-2 mt-5  text-sm font-medium text-white">
                            <i class="fa fa-lock mr-1" aria-hidden="true"></i>
                            Password
                        </label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            wire:model='password'
                            class="bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    </div>

                    {{-- Password Confirmation --}}
                    <div>
                        <label for="password" class="block mb-2 mt-5  text-sm font-medium text-white">
                            <i class="fa fa-lock mr-1" aria-hidden="true"></i>
                            Confirm Password
                        </label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            wire:model='password_confirmation'
                            class="bg-gray-700 border border-gray-600 text-white rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    </div>

                    {{-- Register Button --}}
                    <button type="submit"
                        class="mt-5 w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <span wire:loading.remove wire:target="register">Register</span>
                        <span wire:loading wire:target="register">
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

                    <div class="my-5">
                        <a class="
                        underline text-sm text-blue-600 hover:text-blue-700  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-gray-800"
                            href="{{ route('login') }}" >
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>

                {{-- Sign Up with Gooogle or Facebook --}}
                <div class="flex items-center text-gray-400">
                    <div class="w-full h-[1px] bg-gray-400"></div>
                    <h1 class="text-md mx-5">or</h1>
                    <div class="w-full h-[1px] bg-gray-400"></div>
                </div>
                <h1 class="text-sm font-light text-gray-400 my-2">Sign Up with </h1>
                <div class="flex">
                    {{-- Google --}}
                    <a href="/socialite/google"
                        class="py-2 px-4md:mr-5 flex justify-center items-center bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-sm md:text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                        <i class="mr-2 fa-brands fa-google"></i>
                        Google
                    </a>

                    {{-- <a  href="/socialite/facebook"
                    class="py-2 px-4 ml-1 md:ml-5 flex justify-center items-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-sm md:text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                    <i class="mr-2 fa-brands fa-facebook-f"></i>
                    Facebook
                </a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
