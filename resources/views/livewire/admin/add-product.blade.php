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
                        <option class="text-slate-800" value="player">Player</option>
                        <option class="text-slate-800" value="clubs">Clubs</option>
                        <option class="text-slate-800" value="t-shirt">T-shirt</option>
                        <option class="text-slate-800" value="movies_series">Movies & Series</option>
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
            <div class="flex space-x-10">
                <div class="flex flex-col space-y-4 mb-8">
                    <h1 class="w-full border-gray-300 rounded-lg focus:ring-blue-500 text-zinc-50">Frame Sizes</h1>
                    <div class="flex items-center mb-2">
                        <input id="select_all_sizes" type="checkbox" wire:model="selectAllSizes"
                            wire:click="toggleSizes"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded">
                        <label for="select_all_sizes" class="ml-2 text-gray-400">Select All Sizes</label>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center">
                            <input id="size_small" type="checkbox" name="frame_sizes[]" value="small"
                                wire:model="frame_sizes"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded"
                                @if (in_array('small', $frame_sizes)) checked @endif>
                            <label for="size_small" class="ml-2 text-gray-400">Small</label>
                        </div>
                        <div class="flex items-center">
                            <input id="size_medium" type="checkbox" name="frame_sizes[]" value="medium"
                                wire:model="frame_sizes"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded"
                                @if (in_array('medium', $frame_sizes)) checked @endif>
                            <label for="size_medium" class="ml-2 text-gray-400">Medium</label>
                        </div>
                        <div class="flex items-center">
                            <input id="size_large" type="checkbox" name="frame_sizes[]" value="large"
                                wire:model="frame_sizes"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded"
                                @if (in_array('large', $frame_sizes)) checked @endif>
                            <label for="size_large" class="ml-2 text-gray-400">Large</label>
                        </div>
                        <div class="flex items-center">
                            <input id="size_xlarge" type="checkbox" name="frame_sizes[]" value="xlarge"
                                wire:model="frame_sizes"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded"
                                @if (in_array('xlarge', $frame_sizes)) checked @endif>
                            <label for="size_xlarge" class="ml-2 text-gray-400">Extra Large</label>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col space-y-4 mb-8">
                    <h1 class="w-full border-gray-300 rounded-lg focus:ring-blue-500 text-zinc-50">Frame Colors</h1>
                    <div class="flex items-center mb-2">
                        <input id="select_all_colors" type="checkbox" wire:model="selectAllColors"
                            wire:click="toggleColors"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded">
                        <label for="select_all_colors" class="ml-2 text-gray-400">Select All Colors</label>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center">
                            <input id="color_red" type="checkbox" name="frame_colors[]" value="red"
                                wire:model="frame_colors"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded"
                                @if (in_array('red', $frame_colors)) checked @endif>
                            <label for="color_red" class="ml-2 text-gray-400">Red</label>
                        </div>
                        <div class="flex items-center">
                            <input id="color_blue" type="checkbox" name="frame_colors[]" value="blue"
                                wire:model="frame_colors"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded"
                                @if (in_array('blue', $frame_colors)) checked @endif>
                            <label for="color_blue" class="ml-2 text-gray-400">Blue</label>
                        </div>
                        <div class="flex items-center">
                            <input id="color_green" type="checkbox" name="frame_colors[]" value="green"
                                wire:model="frame_colors"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded"
                                @if (in_array('green', $frame_colors)) checked @endif>
                            <label for="color_green" class="ml-2 text-gray-400">Green</label>
                        </div>
                        <div class="flex items-center">
                            <input id="color_black" type="checkbox" name="frame_colors[]" value="black"
                                wire:model="frame_colors"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded"
                                @if (in_array('black', $frame_colors)) checked @endif>
                            <label for="color_black" class="ml-2 text-gray-400">Black</label>
                        </div>
                        <div class="flex items-center">
                            <input id="color_white" type="checkbox" name="frame_colors[]" value="white"
                                wire:model="frame_colors"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 rounded"
                                @if (in_array('white', $frame_colors)) checked @endif>
                            <label for="color_white" class="ml-2 text-gray-400">White</label>
                        </div>
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
