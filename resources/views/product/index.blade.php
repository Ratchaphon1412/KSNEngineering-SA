<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('product') }}
                
            </h2>
            @livewire('search-product')
        </div>

    </x-slot>

    <div class="grid grid-cols-3 container mx-auto">
        @foreach($products as $product)
            <x-card :product="$product" />
        @endforeach
    </div>

   
</x-app-layout>