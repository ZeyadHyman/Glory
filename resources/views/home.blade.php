<x-app-layout>
    <livewire:home.hero />

    @section('pageTitle', 'Home')
    <div class="bg-[#13212E] lg:rounded-xl lg:mx-32 flex flex-col lg:gap-5 lg:mt-10">
        <livewire:home.recently_added />
        <livewire:home.players />
        <livewire:home.clubs />
        <livewire:home.tshirts />
        <livewire:home.movies />
        <livewire:home.cars />
        <livewire:home.anime />
        <livewire:home.category />
    </div>

</x-app-layout>
