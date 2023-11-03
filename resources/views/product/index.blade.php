<x-guest-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('product') }}
                
            </h2>
          
        </div>

    </x-slot>
    <div class="w-full">
        @livewire('search-product')
    </div>

    <div class="grid grid-cols-3 container mx-auto">
        @foreach($products as $product)
            <x-card :product="$product" />
        @endforeach
    </div>

   
</x-guest-layout>