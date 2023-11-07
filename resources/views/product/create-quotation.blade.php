<x-app-layout>
    <div class="flex justify-center w-full min-h-screen mx-auto p-8">
 
    
        <div class="flex flex-row items-start w-full gap-0">
      
        
           
           <div class=" w-full flex flex-col justify-center p-12 m-4">
                 
                <div class="max-w-xl mx-auto flex justify-center items-center flex-col gap-2">
                            <h1 class="font-semibold text-xl text-gray-800 leading-tight"> Quotation</h1>
                    <h2 class="font-mediam text-xl text-gray-800 leading-tight">
                        Quotation ID : {{ str_pad($repair->quotation->id, 6, '0', STR_PAD_LEFT) }}
                        
                    </h2>
                </div>
                {{-- @livewire('search-company',['toggle'=>true,'companySelected'=>$repair->company]) --}}
                <div class="mt-4 mb-4">
                    <h1 class="text-xl font-semibold"> Select Company</h1>
                </div>
                <div class="">
                    @if ($repair->company)
                    <livewire:card-company :company="$repair->company" />
                    @else
                    <livewire:card-company  />
                    @endif
                </div>
                @livewire('quotation-calculate',['repair'=> $repair])


                
           </div>
           <div class="w-full ">
            
            @livewire('search-product')
            @livewire('quotation-form',['quotation'=>$repair->quotation])
           </div>
        </div>
    </div>

</x-app-layout>