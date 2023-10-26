<div>
    <div class="w-full h-full flex flex-col items-center justify-center">
        <div class="w-11/12 md:w-8/12 xl:w-1/2 h-auto p-5 rounded-3xl bg-white flex flex-col">
           <!-- First section (search bar container) -->
           <section class="w-full h-10 flex items-center">
              <!-- Search icon container -->
              <span class="w-10 h-full hidden md:flex items-center">
                 <i class="uil uil-search-alt text-xl text-blue-800"></i>
              </span>
              <!-- Input -->
              <input  wire:model.live="search" type="search"  class="w-full h-full font-medium md:pl-2 focus:outline-none searchInput rounded-lg px-4 mx-4"
                 placeholder="Search what you want ...">
              <!-- Search button -->
              <button
                 class="w-28 h-full bg-blue-800 flex justify-center items-center rounded-2xl text-white font-medium">Search</button>
           </section>
           <!-- Second section (results container) -->
           <section class="w-full h-auto  flex-col gap-y-2 mt-8 resultsContainer">

            @foreach ($items as $item )
                <div class="w-full h-10 flex items-center gap-x-2">
                    <!-- Image container -->
                    <span class="w-7 h-7">
                        <img src="" alt="">
                    </span>
                    <p class="font-medium text-base text-black">{{$item->name}}</p>
                </div>

            @endforeach
            
           </section>
        </div>
</div>