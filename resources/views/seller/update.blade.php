<x-detail-layout :repair="$repair">
    
    <div class="flex items-center justify-center my-5">
        <div class="bg-white border border-4 rounded-lg shadow relative w-full">
            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">
                    Edit Repair
                </h3>
            </div>
            <div class="m-5">
                <livewire:card-company :company="$selectedCompany"  wire:key="{{$selectedCompany}}"/>
            </div>

            
        <div class="p-6 space-y-6">
            <form action="{{ route('repair.edit.update',['repair'=>$repair]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="flex flex-col">
                    <label class="form-label">Repair Name:</label>
                    <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('name') border-red-600 @enderror" placeholder="Enter Event Name" value="{{ $repair->name }}">
                    @error('name')
                        <small class="text-red-600">{{$message}}</small>
                    @enderror
                </div>

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-full">
                        <label for="description" class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                        <textarea rows="6" name="description" class="@error('description') border-red-600 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4">{{ $repair->description }}</textarea>
                        @error('description')
                            <span class="text-red-600">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-5 col-span-6 sm:col-span-3">
                    <div class="font-xl">
                        Image
                        <div class="w-full">
                            @if($repair->image)
                                <img src="{{asset('storage/repairs/'.$repair->image)}}" alt="Event Image" class="w-60 h-60 object-cover rounded-lg mr-2 mb-2 font-base" id="image">
                            @endif
                        </div>
                    </div>

                    <div class="font-xl" id="previewsImg-con" style="display: none">
                        Preview Image
                        <div class="mt-2 grid grid-cols-5 gap-1" id="preview-image">

                        </div>
                    </div>

                    <input type="file" name="images" id="inputImage" multiple>
                </div>


            <button type="submit" class="mt-5 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save all</button>
            </form>
        </div>

        </div>
    </div>
    
<script>
    let imgIP = document.querySelector("#inputImage");
    let previewsImgContainer = document.querySelector("#previewsImg-con");

    imgIP.addEventListener('change', (event) => {
        let totalFiles = imgIP.files.length;
        let previewContainer = document.querySelector("#preview-image");

        if (totalFiles === 0) {
            previewsImgContainer.style.display = "none";
            previewContainer.innerHTML = "";
            return;
        }

        previewsImgContainer.style.display = "block";
        previewContainer.innerHTML = "";

        for (let i = 0; i < totalFiles; i++) {
            let imgElement = document.createElement("img");
            imgElement.src = URL.createObjectURL(event.target.files[i]);
            imgElement.classList.add("w-60", "h-60", "object-cover", "rounded-lg", "mr-2", "mb-2");
            previewContainer.appendChild(imgElement);
        }
    });



</script>


    


</x-detail-layout>