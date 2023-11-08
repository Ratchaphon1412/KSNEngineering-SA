<x-app-layout>
<div class="flex items-center justify-center mt-5 font-semibold">
    <div class="w-9/12">
        <a href="{{route('show.company.view')}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-2xl shadow my-6">
            <div class="absolute inset-0 w-3 bg-green-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
            <span class="relative text-black group-hover:text-white ">Create company</span>
        </a>    
    </div>
</div>
    <div class="h-sreen w-full">
        <div class="flex flex-row justify-center items-center mx-auto h-full w-full p-12">
           <div class="flex  items-start w-full gap-2">
                @livewire('search-company')
                @livewire('form-repair')
     
           </div>
          </div>
     
     
     
     </div>
    
  
    


</x-app-layout>