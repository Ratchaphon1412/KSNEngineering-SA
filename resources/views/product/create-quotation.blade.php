<x-app-layout>
    <div class="flex justify-center w-full min-h-screen mx-auto p-8">
        <div class="flex flex-row items-start w-full gap-0">
            
           <div class=" w-full flex flex-col justify-center p-12 m-4">
                @livewire('search-company',['toggle'=>true])
                <div class="mt-4 mb-4">
                    <h1 class="text-xl font-semibold"> Select Company</h1>
                </div>
                <div class="">
                    <livewire:card-company  />
                </div>
                @livewire('quotation-calculate')


                
           </div>
           <div class="w-full ">
            @livewire('search-product')
            @livewire('quotation-form')
           </div>
        </div>
    </div>

</x-app-layout>