<x-app-layout>
    @section('pageTitle', 'Admin Dashboard')

    <div class="flex">
        <!-- Side Panel -->
        @livewire('components.admin-side-panel')

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-6">
            @livewire('components.admin-main-content')
        </div>
    </div>
</x-app-layout>
