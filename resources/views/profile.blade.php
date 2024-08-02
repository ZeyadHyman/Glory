<?php
use App\Models\SocialLogin;

$exists = true;

if (Auth::user()) {
    $userId = Auth::id();
    $exists = SocialLogin::where('user_id', $userId)->exists();
}

?>

<x-app-layout>

    @section('pageTitle', 'profile')
    <div class="py-12 mb-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-6">

            <div class="bg-[#1d364a50] shadow-lg rounded-lg block lg:hidden">
                <div>
                    <livewire:profile.logout />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-[#1d364a50] shadow-lg rounded-lg">
                <livewire:profile.user-image />
            </div>

            <div class="p-4 sm:p-8 bg-[#1d364a50] shadow-lg rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            @if (!$exists)
                <div class="p-4 sm:p-8 bg-[#1d364a50] shadow-lg rounded-lg">
                    <div class="max-w-xl">
                        <livewire:profile.update-password-form />
                    </div>
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-[#1d364a50] shadow-lg rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
