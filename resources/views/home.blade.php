<x-app-layout>

    @section('pageTitle', 'Home')

    <div class="bg-gray-800 rounded-xl mx-52 my-5 p-5">
        <livewire:home.hero />
        <livewire:home.recently_added />
        <livewire:home.most-popular />
        <livewire:home.category />
    </div>
    
</x-app-layout>
