<x-app-layout>

    
 <div class="flex flex-row  mx-auto p-4 ">

    {{-- @livewire('search-company') --}}
    @livewire('form-crane',['repair'=> $repair])
    
 </div>



</x-app-layout>