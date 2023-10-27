<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('product') }}
                
            </h2>
            <a href="{{ route('create') }}" class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-orange-400 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-orange-600 ">
                <span>Create</span>
            </a>
        </div>

    </x-slot>

    <x-card name="hello" status="loading" price="500" />
</x-app-layout>