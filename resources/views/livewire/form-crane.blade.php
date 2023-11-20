<div class="mx-auto w-full max-w-[550px] bg-white">
    <form class="py-4 px-9" wire:submit.prevent="save">
        <div class="mb-5">
            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                Crane Name
            </label>
            <input type="text" id="name" wire:model.live="name" placeholder="name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            @error('name')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>  

        <div class="mb-5">

            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" wire:model.live="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Write your thoughts here..."></textarea>
            @error('description')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
        </div>





        <div class="mb-6 pt-4">
            <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                Upload Crane Picture Profile
            </label>

            <div class="mb-8">
                <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-6" id="dropzone">
                    <input type="file" id="inputImage" wire:model.live="image"  class="absolute inset-0 w-full h-full opacity-0 z-50"  />
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
                </div>
                @error('image')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
            </div>
            
            @if ($image)
                <img src="{{$image->temporaryUrl()}}" alt="">
            @endif
        </div>


        <div class="mb-6 pt-4">
            <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                Upload Crane Picture More
            </label>
            <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-6" id="dropzone">
                <input type="file" wire:model.live="images" multiple class="absolute inset-0 w-full h-full opacity-0 z-50"  />
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
                @error('images')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
            </div>
        </div>

        @if ($images)
            @foreach ($images as $imagetemp)

                <img src="{{$imagetemp->temporaryUrl()}}" alt="">

            @endforeach
        @endif

        
        <button type="submit" class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none duration-300 hover:bg-orange-600">
            Save
        </button>
        
    </form>
</div>