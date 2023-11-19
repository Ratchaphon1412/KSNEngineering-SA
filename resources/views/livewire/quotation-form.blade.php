<div>
 
    <div class=" pt-4 overflow-y-scroll h-full overflow-x-hidden w-full bg-white">
        <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
        <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0 ">
          <div class="rounded-lg md:w-full ">
            @foreach ($cart as $item)
               
                <livewire:card-items-quotation :product="$item" wire:key="{{$item->id}}"/> 
            @endforeach
           
      

            
          </div>
        </div>
      </div>
     
</div>
