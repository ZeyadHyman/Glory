<x-app-layout>

    @section('pageTitle', 'Home')
    <div class="bg-[#13212E] md:rounded-xl md:mx-32 flex flex-col md:gap-20 md:mt-10">
        <livewire:home.hero />
        <livewire:home.recently_added />
        <livewire:home.most-popular />
        <livewire:home.category />
    </div>

</x-app-layout>
