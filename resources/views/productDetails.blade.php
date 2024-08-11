<x-app-layout>
    @section('pageTitle', $productName)

    @livewire('product-details', ['product' => $product])
</x-app-layout>
