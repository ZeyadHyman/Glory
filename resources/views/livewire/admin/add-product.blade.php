<div class="flex justify-center items-center">
    @section('pageTitle', 'Add New Product')
    <div class="mt-10 w-1/2 rounded-xl py-10 px-12 border border-white/50 shadow-xl bg-[#13212E]">
        <form wire:submit.prevent="addProduct">
            <h1 class="text-zinc-50 text-3xl font-bold mb-10">Add New Product</h1>

            <!-- Name and Category  -->
            <div class="flex space-x-5">
                <div class="relative z-0 w-full mb-8 group">
                    <input autocomplete="off" type="text" name="name" wire:model="name" placeholder=" "
                        class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Name
                    </label>
                </div>

                <div class="relative z-0 w-full mb-8 group">
                    <select name="category" wire:model="category"
                        class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option class="text-slate-800" value="" selected>Select a category</option>
                        <option class="text-slate-800" value="players">Player</option>
                        <option class="text-slate-800" value="clubs">Clubs</option>
                        <option class="text-slate-800" value="t-shirt">T-shirt</option>
                        <option class="text-slate-800" value="movies">Movies & Series</option>
                        <option class="text-slate-800" value="cars">Cars</option>
                        <option class="text-slate-800" value="anime">Anime</option>
                    </select>
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Category
                    </label>
                </div>
            </div>

            <!-- Description Input -->
            <div class="relative z-0 w-full mb-8 group">
                <input autocomplete="off" type="text" name="description" wire:model="description" placeholder=" "
                    class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                <label
                    class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Description
                </label>
            </div>

            <!-- Price and Discount Inputs -->
            <div class="flex space-x-5">
                <div class="relative z-0 w-full mb-8 group">
                    <input autocomplete="off" type="text" name="price" wire:model="price" placeholder=" "
                        class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Price (EGP)
                    </label>
                </div>

                <div class="relative z-0 w-full mb-8 group">
                    <input autocomplete="off" type="text" name="discount" wire:model="discount" placeholder=" "
                        class="block py-2.5 px-3 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-600 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Discount (%) <span class="text-xs ml-2 text-red-500">*optionally</span>
                    </label>
                </div>
            </div>

            <!-- Frame Sizes and Colors -->
            <div class="flex space-x-10 mb-8">
                <!-- Frame Sizes -->
                <div class="flex-1">
                    <h1 class="text-xl font-semibold text-zinc-50 mb-4 border-b-2 border-gray-300 pb-2">Frame Sizes</h1>
                    <div class="flex items-center mb-4">
                        <input id="select_all_sizes" type="checkbox" wire:model="selectAllSizes"
                            wire:click="toggleSizes"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded" />
                        <label for="select_all_sizes" class="ml-2 text-gray-400 text-sm">Select All Sizes</label>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach (['small', 'medium', 'large', 'xlarge'] as $size)
                            <div class="flex items-center space-x-2">
                                <input id="size_{{ $size }}" type="checkbox" name="frame_sizes[]"
                                    value="{{ $size }}" wire:model="frame_sizes"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"
                                    @if (in_array($size, $frame_sizes)) checked @endif />
                                <label for="size_{{ $size }}"
                                    class="text-gray-400 text-sm capitalize">{{ $size }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Frame Colors -->
                <div class="flex-1">
                    <h1 class="text-xl font-semibold text-zinc-50 mb-4 border-b-2 border-gray-300 pb-2">Frame Colors
                    </h1>
                    <div class="flex items-center mb-4">
                        <input id="select_all_colors" type="checkbox" wire:model="selectAllColors"
                            wire:click="toggleColors"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded" />
                        <label for="select_all_colors" class="ml-2 text-gray-400 text-sm">Select All Colors</label>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach (['red', 'blue', 'green', 'black', 'white'] as $color)
                            <div class="flex items-center space-x-2">
                                <input id="color_{{ $color }}" type="checkbox" name="frame_colors[]"
                                    value="{{ $color }}" wire:model="frame_colors"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"
                                    @if (in_array($color, $frame_colors)) checked @endif />
                                <label for="color_{{ $color }}"
                                    class="text-gray-400 text-sm capitalize">{{ $color }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="flex space-x-10">
                <div class="flex flex-col space-y-4 mb-8">
                    <label for="images" class="text-white">Upload Images</label>
                    <input id="images" type="file" wire:model="images" multiple
                        class="w-full border-gray-300 rounded-lg focus:ring-blue-500 text-zinc-50">

                    @error('images.*')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>



            <!-- Submit -->
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                Add Product
            </button>
        </form>
    </div>
</div>
