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
        
        Session::flush();
        
        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    @section('pageTitle', 'Registration')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto w-full xl:h-[90vh]">
        <div class="w-full md:w-1/2 lg:w-1/3 bg-[#1d364a50] rounded-lg shadow dark:border dark:border-gray-700">
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
                            placeholder="Zeyad Hyman" required>
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
                        class="mt-5 w-full text-white bg-[#0b2031] hover:bg-[#223849] transition-all focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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
                         text-sm text-gray-300 hover:text-gray-400 hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-gray-800"
                            href="{{ route('login') }}">
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

                {{-- Google icon --}}
                <h1 class="text-sm font-light text-gray-400 my-2">Sign Up with </h1>
                <div class="flex">
                    <a href="/socialite/google"
                        class="py-2 px-4 md:mr-5 flex justify-center items-center bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 focus:ring-gray-500 focus:ring-offset-gray-200 w-full transition ease-in duration-200 text-center text-sm md:text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                        <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24"
                            width="20">
                            <path
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                fill="#4285F4" />
                            <path
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                fill="#34A853" />
                            <path
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                fill="#FBBC05" />
                            <path
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                fill="#EA4335" />
                            <path d="M1 1h22v22H1z" fill="none" />
                        </svg>
                        Google
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
