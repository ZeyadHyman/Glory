<x-app-layout>
    @section('pageTitle', 'Home')
    
    <livewire:home.hero />

    <div class="bg-[#13212E] lg:rounded-xl lg:mx-32 flex flex-col lg:gap-5 lg:mt-10">
        <livewire:home.recently-added />
        <livewire:home.home-products />
        <livewire:home.category />
    </div>
</x-app-layout>
