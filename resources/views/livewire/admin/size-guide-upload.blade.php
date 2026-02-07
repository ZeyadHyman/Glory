<div x-data="{ loading: false }" class="container flex flex-col items-center justify-center max-w-xl px-4 py-8 mx-auto">

    <section class="w-full p-8 rounded-lg shadow-lg bg-slate-800">
        @section('pageTitle', 'Edit Size Guide Image')

        <h1 class="flex items-center justify-center mb-6 space-x-4 text-3xl font-extrabold text-gray-100">
            <i class="text-3xl text-blue-500 fas fa-upload"></i>
            <span>Edit Size Guide Image</span>
        </h1>

        @if (session()->has('message'))
            <div
                class="flex items-center p-4 mb-6 space-x-3 text-green-800 bg-green-100 border border-green-300 rounded-lg">
                <i class="text-xl text-green-600 fas fa-check-circle"></i>
                <span>{{ session('message') }}</span>
            </div>
        @endif

        @error('sizeGuideImage')
            <div class="flex items-center p-4 mb-6 space-x-3 text-red-800 bg-red-100 border border-red-300 rounded-lg">
                <i class="text-xl text-red-600 fas fa-exclamation-circle"></i>
                <span>{{ $message }}</span>
            </div>
        @enderror

        <div class="relative mb-6">
            @if ($sizeGuideImage && !is_string($sizeGuideImage))
                <img class="object-fill w-full h-full rounded-lg" src="{{ $sizeGuideImage->temporaryUrl() }}"
                    alt="Size Guide Image">
            @else
                <img class="object-fill w-full h-full rounded-lg"
                    src="{{ asset('storage/images/assets/size_guide.jpg') }}?v={{ time() }}" alt="Size Guide Image">
            @endif
            <div
                class="absolute top-0 px-4 py-2 text-xs font-semibold rounded-tl-lg rounded-br-lg bg-black/50 text-zinc-50">
                Current
            </div>
        </div>



        <form wire:submit.prevent="test">
            <div>
                <label for="sizeGuideImage"
                    class="flex items-center block mb-3 space-x-3 text-lg font-semibold text-gray-300">
                    <i class="text-xl text-gray-300 fas fa-image"></i>
                    <span>Size Guide Image</span>
                </label>
                <input required type="file" id="sizeGuideImage" wire:model="sizeGuideImage" @change="loading = true"
                    class="block w-full px-3 py-2 text-sm text-gray-800 transition duration-150 ease-in-out border border-gray-600 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-600" />
            </div>


            <div class="flex items-center justify-end w-full">
                <button type="submit"
                    class="flex items-center justify-end px-6 py-2 mt-6 space-x-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Upload
                </button>
            </div>
        </form>
    </section>
</div>
