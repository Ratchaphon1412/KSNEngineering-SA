<div>
 
        <!-- Sub total -->
    <div class=" h-full w-full rounded-lg border bg-white p-6 m-12 shadow-md   ">
        <div class="mb-2 flex justify-between">
            <p class="text-gray-700">Subtotal</p>
            <p class="text-gray-700">{{$total}}</p>
        </div>
        <div class="flex justify-between">
            <p class="text-gray-700">Discount</p>
           
            <div>
                <input type="number" id="discunt" wire:model.live="discount" min="0" max="100" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5  " placeholder="Discount" >
            </div>    
            
            
        </div>
        <hr class="my-4" />
        <div class="flex justify-between">
            <p class="text-lg font-bold">Total</p>
            <div class="">
            <p class="mb-1 text-lg font-bold">{{$grandTotal}} THB</p>
            <p class="text-sm text-gray-700">including VAT</p>
            </div>
        </div>
    

    
        <button wire:click="checkout" class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
    </div>
</div>
