<div class="h-sreen w-full">
    <div class="flex flex-row justify-center items-center mx-auto h-full w-full p-12">
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
        
                      @foreach ($products as $product )
                   
                         <div class="w-full h-10 flex items-center gap-x-2 hover:border border-gray-400 rounded-lg p-4"  wire:key="{{$product->id}}" >
                               <!-- Image container -->
                               <span class="w-7 h-7">
                                  <img src="{{$product->post_image}}" alt="">
                               </span>
                               <p class="font-medium text-base text-black">{{$product->name}}</p>
                               
                         </div>
                         
                      @endforeach
                      
                      @if($products)
                         {{ $products->links() }}
                      
                      @endif
 
 
                   
                   
                   </section>
 
                </div>
             </div>
           </div>

       </div>
      </div>
 
 
 
 </div>