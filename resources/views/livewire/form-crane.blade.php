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

        <div class="mb-5">
            <label for="price" class="mb-3 block text-base font-medium text-[#07074D]">
                Warranty
            </label>
            
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
                </div>
                <input datepicker id="datepickerId" wire:model="waranty"  type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                
            </div>
            @error('waranty')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror

        </div>
        <div class="mb-6 pt-4">
            @if($selectedCompany)
          
              
                <livewire:card-company :company="$selectedCompany"  wire:key="{{$selectedCompany}}"/>
                <input type="text" class="hidden" wire:model="company_id"  wire:key="{{$selectedCompany->id}}"  >
            @else
                <div class="card card-side  shadow-xl">
                    
                    <div class="card-body">
                    <p class="text-black text-md ">Please select company</p>
                    </div>
                    @error('company_id')
                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                    
                </div>
            @endif
    
    
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