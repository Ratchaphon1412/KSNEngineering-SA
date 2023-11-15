<x-detail-layout :repair="$repair">
            <div class="flex justify-center">
                <div class="flex justify-between w-full">
                    <div class="w-full mb-16 mt-8">
                        <h1 class="text-xl font-bold mt-4 mb-4">Repair ID :  {{ str_pad($repair->id, 6, '0', STR_PAD_LEFT) }}</h1>
                        <div class="grid grid-cols-2 md:grid-cols-2 gap-4 place-items-center">
                            @if($repair->image)
                            <div>
                                <img class="h-auto max-w-full rounded-lg" src="{{asset('storage/repairs/' . $repair->image )}}" alt="">
                            </div>
                            @endif

                        <div>
                                <h1 class="text-xl font-bold ">{{$repair->name}}</h1>
                                <p class="block font-medium text-sm text-gray-700">{{$repair->description}} </p>

                        </div>

                        </div>

                        <h1 class="text-xl font-bold mt-4 mb-4">Task</h1>
                        <div class="grid grid-cols-2 md:grid-cols-2 gap-4 place-items-center">
                        
                        
                        @foreach ($repair->task()->get()[0]->images as $image)
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="{{asset('storage/uploads/' . $image->path)}}" alt="">
                        </div>
                        
                            @endforeach 

                        </div>
                        
                        
                    </div>
                    
                    <div class="flex flex-col w-1/2 ml-16 mt-8">
                        {{-- <div class="flex flex-col w-full p-4 rounded-lg bg-white outline outline-blue-400">
                            <div class="text-xl font-semibold my-2">{{ $repair->name }}</div>
                            <div class="text-lg font-medium my-2">Company: <div class="font-normal bg-blue-200 rounded-lg px-4">{{ $repair->company()->get()[0]->name }}</div></div>
                            <div class="text-lg font-medium my-2">Name: <div class="font-normal bg-blue-200 rounded-lg px-4">{{ $repair->name }}</div></div>
                            <div class="text-lg font-medium my-2">Detail: <div class="font-normal bg-blue-200 rounded-lg px-4 py-2">{{ $repair->description }}</div></div>
                            
                        </div> --}}
                        <div class="flex flex-col w-full p-4 rounded-lg ">
                            <div class="text-xl font-semibold my-2"> Company</div>
                            <livewire:card-company :company="$repair->company()->first()"/>
                        </div>

                        <div class="mt-5 flex flex-col w-full p-4 rounded-lg bg-white outline outline-zinc-200">
                            <div class="text-3xl font-semibold my-2 border-b-2 text-black">Task</div>
                            <div class="text-base font-medium my-2 text-black">
                                Stage: 
                                <div class="font-normal bg-zinc-200 rounded-lg p-3 text-zinc-600 mt-3">
                                    {{ $repair->task->stage }}
                                </div>
                            </div>
                            <div class="text-base font-medium my-2 text-black">
                                description: 
                                <div class="font-normal bg-zinc-200 rounded-lg p-3 text-zinc-600 mt-3">
                                    {{ $repair->task->description }}
                                </div>
                            </div>
                            @if($repair->task->user)
                                <div class="text-base font-medium my-2 text-black">
                                    crane technician: 
                                    <div class="font-normal bg-zinc-200 rounded-lg p-3 text-zinc-500 mt-3">
                                        {{ $repair->task->user->name }}
                                    </div>
                                </div>
                            @endif
                            <div class="outline-zinc-400 outline outline-2 p-4 mt-4 rounded-md">
                                <div class="my-2"><div class="font-medium text-zinc-600">Todo date</div>
                                @if($repair->task()->get()[0]->todo_date)
                                <div class="text-sm"><i class="fa-solid fa-circle" style="color: green"></i> {{$repair->task()->get()[0]->todo_date}}</div></div>
                                @else
                                <div class="text-sm text-zinc-600 mt-3"><i class="fa-solid fa-circle" style="color: green"></i> It hasn't been dated yet. </div></div>

                                @endif
                            </div>
                            
                        </div>

                        @livewire('payment-view')

                        <div id="purchaseModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-teal-600 via-sky-400 to-cyan-500">
                                            Purchase order
                                        </h1>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="purchaseModal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    @if($repair->purchase_order)
                                        <div>
                                            <img class="h-auto max-w-full rounded-lg" src="{{asset('storage/uploads/' . $repair->purchase_order)}}" alt="">
                                        </div>
                                    @else
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <div class="py-20 bg-white px-2">
                                            <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                                                <div class="md:flex">
                                                    <div class="w-full p-3">
                                                        <div class="relative border-dotted h-48 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                                            <div class="absolute">
                                                                <div class="flex flex-col items-center">
                                                                    <i class="fa fa-folder-open fa-4x text-blue-700"></i>
                                                                    <!-- <span class="block text-gray-400 font-normal">Select file video here</span> -->
                                                                    <form action="{{ route('purchase.add',['repair'=>$repair]) }}" method="POST" enctype="multipart/form-data" class="w-10/12">
                                                                    @csrf
                                                                    <input type="file" name="image" id="inputImage" accept="image/*" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="font-xl" id="previewsImg-con" style="display: none">
                                        Preview Image
                                        <div class="mt-2 gap-1 flex justify-center items-center" id="preview-image">

                                        </div>
                                    </div>
                                    @endif
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="purchaseModal" type="button" class="text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">close</button>
                                        @if(!$repair->purchase_order)    
                                        <button type="submit" class="right-5 absolute flex-2 rounded-full bg-green-600 text-white antialiased font-bold hover:bg-green-800 px-12 py-2">Add</button>
                                        @endif
                                    </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="payModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-teal-600 via-sky-400 to-cyan-500">
                                            Payment
                                        </h1>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="payModal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <div class="py-20 bg-white px-2">
                                            <div class="flex justify-center items-center">
                                                <div class="w-3/4">
                                                    @if($repair->quotation)
                                                <p class="text-4xl text-gray-900 dark:text-white">Balance: {{ $repair->amount }} / {{ $repair->quotation->grand_total }}</p>
                                                    @endif
                                                <form action="{{ route('add.amount',['repair'=>$repair]) }}" method="POST" enctype="multipart/form-data" class="w-10/12">
                                                @csrf
                                                @if($repair->quotation)     
                                                    <input type="number" name="amount" id="amount" step="0.0001" value="{{$repair->amount}}" min="0" max="{{ $repair->quotation->grand_total }}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please enter a number">
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="payModal" type="button" class="text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">close</button>
                                        @if($repair->quotation)   
                                        <button type="submit" class="right-5 absolute flex-2 rounded-full bg-green-600 text-white antialiased font-bold hover:bg-green-800 px-12 py-2">Add</button>
                                        @endif
                                    </form>
                                        
                                    

                                    </div>
                                </div>
                            </div>
                        </div>


                        
                        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="border rounded-lg bg-white shadow relative max-w-sm">
                                <div class="flex justify-end p-2">
                                    <button  data-modal-hide="defaultModal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </button>
                                </div>

                                <div class="p-6 pt-0 text-center">
                                    <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this repair?</h3>
                                    <form action="{{ route('delete.repair',['repair'=>$repair]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf        
                                        <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                            Yes, I'm sure
                                        </button>
                                        
                                        
                                        <button data-modal-hide="defaultModal" type="button"
                                            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                                            No, cancel
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Done stage repair -->
                        <div id="doneModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="fixed z-10 inset-0 overflow-y-auto">
                                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 transition-opacity">
                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                    </div>
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                                    <div
                                        class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                        <div class="sm:flex sm:items-start">
                                            <div
                                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                                <svg class="h-6 w-6 text-green-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                    Done work
                                                </h3>
                                                <div class="mt-2">
                                                    <p class="text-sm leading-5 text-gray-500">
                                                        Are you sure you want to Done this repair?
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                            <form action="{{ route('done.repair',['repair'=>$repair]) }}" method="POST" enctype="multipart/form-data" class="w-10/12">
                                                @csrf         
                                                <button type="submit"
                                                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                    Accept
                                                </button>
                                            </form>
                                            </span>
                                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                                <button type="button" data-modal-hide="doneModal"
                                                    class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                    Cancel
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>




                    </div>
                </div>
                        
            </div>
            <div class="mt-4 w-full flex justify-center items-center ">
                <div>
                    @if ($repair->quotation->quotation_pdf)
                    <div class="flex flex-col justify-center w-full p-4 rounded-lg ">
                        <div class="text-xl font-semibold my-2"> Quotation </div>
                        <iframe src="{{$repair->quotation->quotation_pdf}}" width="1800" height="1600">
                    </div>
                        
                    @endif
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
