<div x-data="{ loading: false }" class="container mx-auto py-8 px-4 max-w-xl flex flex-col justify-center items-center">

    <section class="w-full bg-slate-800 rounded-lg shadow-lg p-8">
        @section('pageTitle', 'Edit Size Guide Image')

        <h1 class="text-3xl font-extrabold text-gray-100 mb-6 flex items-center justify-center space-x-4">
            <i class="fas fa-upload text-blue-500 text-3xl"></i>
            <span>Edit Size Guide Image</span>
        </h1>

        @if (session()->has('message'))
            <div
                class="bg-green-100 border border-green-300 text-green-800 p-4 mb-6 rounded-lg flex items-center space-x-3">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                <span>{{ session('message') }}</span>
            </div>
        @endif

        @error('sizeGuideImage')
            <div class="bg-red-100 border border-red-300 text-red-800 p-4 mb-6 rounded-lg flex items-center space-x-3">
                <i class="fas fa-exclamation-circle text-red-600 text-xl"></i>
                <span>{{ $message }}</span>
            </div>
        @enderror

        <div class="relative mb-6">
            @if ($sizeGuideImage)
                <img class="w-full h-full object-fill rounded-lg" src="{{ $sizeGuideImage->temporaryUrl() }}"
                    alt="Size Guide Image">
            @else
                <img class="w-full h-full object-fill rounded-lg"
                    src="{{ asset('storage/images/assets/size_guide.jpg') }}" alt="Size Guide Image">
            @endif
            <div
                class="absolute top-0 bg-black/50 rounded-br-lg rounded-tl-lg px-4 py-2 text-zinc-50 text-xs font-semibold">
                Current
            </div>
        </div>



        <form wire:submit.prevent="test">
            <div>
                <label for="sizeGuideImage"
                    class="block text-lg font-semibold text-gray-300 mb-3 flex items-center space-x-3">
                    <i class="fas fa-image text-gray-300 text-xl"></i>
                    <span>Size Guide Image</span>
                </label>
                <input required type="file" id="sizeGuideImage" wire:model="sizeGuideImage" @change="loading = true"
                    class="block w-full text-sm text-gray-800 border border-gray-600 rounded-lg cursor-pointer py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-150 ease-in-out" />
            </div>


            <div class="flex items-center justify-end w-full">
                <button type="submit"
                    class="bg-blue-600  text-white px-6 py-2 mt-6 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 flex items-center justify-end space-x-2">
                    Upload
                </button>
            </div>
        </form>
    </section>
</div>
