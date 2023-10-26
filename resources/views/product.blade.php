<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('product') }}
        </h2>
    </x-slot>
    <x-card name="hello" status="loading" price="500"/>
</x-app-layout>