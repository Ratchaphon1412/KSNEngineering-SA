
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="flex items-center justify-center pt-10">
        <!-- Author: FormBold Team -->
        <div class="mx-auto w-full max-w-[550px] bg-white">
            <form class="py-4 px-9" wire:submit.prevent="save">
                <div class="mb-5">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Product Name
                    </label>
                    <input type="text" id="name" wire:model="name" placeholder="name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="price" class="mb-3 block text-base font-medium text-[#07074D]">
                        Price
                    </label>
                    <input type="text" id="price" wire:model="price" placeholder="price" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="amount" class="mb-3 block text-base font-medium text-[#07074D]">
                        Amount
                    </label>
                    <input type="text" id="amount" wire:model="amount" placeholder="Amount" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
                        Description
                    </label>
                    <textarea type="text" id="description" wire:model="description" placeholder="Detail" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" ></textarea>
                </div>

                <div class="mb-6 pt-4">
                    <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                        Upload Product Picture
                    </label>

                    <div class="mb-8">
                        <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-6" id="dropzone">
                            <input type="file" id="inputImage" wire:model="images" multiple class="absolute inset-0 w-full h-full opacity-0 z-50" onchange="readURL(this)"/>
                            <div class="text-center">
                                <img class="mx-auto h-12 w-12" src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">

                                <h3 class="mt-2 text-sm font-medium text-gray-900">
                                    <label for="file-upload" class="relative cursor-pointer">
                                        <span>Drag and drop</span>
                                        <span class="text-indigo-600"> or browse</span>
                                        <span>to upload</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                </h3>
                                <p class="mt-1 text-xs text-gray-500">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            </div>
                            <div class="grid grid-cols-2">
                                @if ($images)
                                    @foreach($images as $image)
                                        <img src="{{ $image->temporaryUrl() }}">
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none duration-300 hover:bg-orange-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
