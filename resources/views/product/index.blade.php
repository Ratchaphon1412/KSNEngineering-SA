<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('product') }}
                
            </h2>
            @livewire('search-product')
        </div>

    </x-slot>

    <x-card name="hello" status="loading" price="500" />

   
</x-app-layout>