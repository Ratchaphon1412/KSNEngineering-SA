<div class="h-sreen w-screen">
   <div class="flex flex-row justify-center items-center mx-auto h-full w-screen p-12">
      <div class="flex  items-start w-full gap-2">
          <div class="w-full  "> 
            <div class="w-full h-full flex flex-col items-center justify-center">
               <div class="w-11/12 md:w-8/12 xl:w-1/2 h-auto p-2 rounded-3xl bg-white flex flex-col">
                  <!-- First section (search bar container) -->
                  <label for="company" class="mb-2">
                   <h1 class="text-xs uppercase font-bold tracking-wide  text-gray-700">Search Company</h1>
                  </label>
                  <section  class="w-full h-10 flex items-center">
                     <!-- Search icon container -->
                     <span class="w-10 h-full hidden md:flex items-center">
                        <i class="uil uil-search-alt text-xl text-blue-800"></i>
                     </span>
                     <!-- Input -->
                     <input id="company"  wire:model.live="search" type="search"  class="w-full h-full font-medium md:pl-2 focus:outline-none searchInput rounded-lg px-4 mx-4"
                        placeholder="Search what you want ...">
                     <!-- Search button -->
                    
                  </section>
                  <!-- Second section (results container) -->
                  <section class="w-full h-auto  flex-col gap-y-2 mt-8 resultsContainer">
       
                     @foreach ($items as $item )
                  
                        <div class="w-full h-10 flex items-center gap-x-2 hover:border border-gray-400 rounded-lg p-4" wire:click.live="selectItem({{$item->id}})" wire:key="{{$item->id}}" >
                              <!-- Image container -->
                              <span class="w-7 h-7">
                                 <img src="{{$item->logo}}" alt="">
                              </span>
                              <p class="font-medium text-base text-black">{{$item->name}}</p>
                              
                        </div>
                        
                     @endforeach
                     
                     @if($items)
                        {{ $items->links() }}
                     
                     @endif

          
                  
                  
                  </section>

               </div>
            </div>
          </div>
          <div class="w-full">
           
              <form class="w-full max-w-lg">
                  <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full md:w-5/6 px-3 mb-6 md:mb-0">
                      <label for="title" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
                      Title
                      </label>
                      <input id="title" name="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="Repair Title">
                      <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                  </div>
   
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full px-3">
                      <label for="details" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
                        Details
                      </label>

                      <textarea id="details" name="details" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Write your thoughts here..."></textarea>

                      
                      <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                  </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                     <label for="image" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
                        Images
                      </label>
                     <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                           <div class="flex flex-col items-center justify-center pt-5 pb-6">
                              <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                              </svg>
                              <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                              <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                           </div>
                           <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                     </div> 
                     <img id="preview-image" class="w-full h-full mb-4 hidden" src="" alt="">


                  </div>
             
                  <div class="w-full  px-3 mb-6 md:mb-0">
                     <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                      Company
                     </label>
                     @if($selectedCompany)
                        
                        <livewire:card-company :company="$selectedCompany"  wire:key="{{$selectedCompany}}"/>
                        <input type="hidden" name="company_id" value="{{$selectedCompany}}">
                     @else
                     <div class="card card-side  shadow-xl">
                        
                        <div class="card-body">
                           <p class="text-black text-md ">Please select company</p>
                        </div>
                    </div>
                     @endif
                  </div>
                  <div class="w-full  px-3 mb-6 md:mb-0 mt-4">
              
                                    
                     <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a Crane</label>
                     @isset($selectedCompany->cranes)
                        <select id="countries" name="crane_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                           <option selected>Not Select Crane</option>
                           {{-- {{$selectedCompany->cranes}} --}}
                           @foreach ($selectedCompany->cranes as $crane)
                              <option value="{{$crane->id}}">{{$crane->name}}</option>
                           @endforeach
                           
                        
                        </select>
                     @else
                     <p class="text-gray-700 text-md text-xs tracking-wide">No Crane</p>

                     @endisset

                  </div>


                  
                 

              </form>
     
  
          </div>
      </div>
     </div>



</div>


<script>
   // Get the input element
   const inputElement = document.getElementById("dropzone-file");

   // Add an event listener to the input element
   inputElement.addEventListener("change", handleFiles, false);

   // Define the handleFiles function
   function handleFiles() {
      // Get the selected file
      const file = this.files[0];

      // Create a new FileReader object
      const reader = new FileReader();

      // Define the onload function for the FileReader object
      reader.onload = function(event) {
         // Get the image element
         const imgElement = document.getElementById("preview-image");

         // Set the source of the image element to the data URL of the selected file
         imgElement.src = event.target.result;

         // Display the uploaded image in the image container
         imgElement.classList.remove("hidden");


      };
      
      // Read the selected file as a data URL
      reader.readAsDataURL(file);
   }
</script>
