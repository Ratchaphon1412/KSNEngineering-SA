<div>
    
    <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
        <img src="{{$product->post_image}}" alt="product-image" class="w-full rounded-lg sm:w-40" />
        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
          <div class="mt-5 sm:mt-0">
            <h2 class="text-lg font-bold text-gray-900">{{$product->name}}</h2>
            <p class="mt-1 text-xs text-gray-700 font-bold">{{$product->type}}</p>
            <p class="mt-1 text-xs text-gray-700 line-clamp-2">{{$product->description}}</p>
            <p class="text-sm">{{$product->price}} THB</p>
            
          </div>
          <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
            <div class="flex items-center border-gray-100">
              <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50" wire:click="decrease"> - </span>
              <input class="h-8 w-8 border bg-white text-center text-black text-xs outline-none" type="text" value="{{$quantity}}" min="1" max="999" />
              <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50" wire:click="increase"> + </span>
            </div>
            <div class="flex items-center space-x-4">
              <p class="text-sm">{{$total}} THB</p>
              <svg wire:click="removeItem" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </div>
          </div>
        </div>
      </div>
</div>
