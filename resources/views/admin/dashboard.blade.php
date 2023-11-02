<x-app-layout>
    <div class="grid md:grid-cols-2">
        <div>
            <div class="bg-white shadow-lg rounded-lg border border-slate-200 my-9 mx-4 h-fit">
                <header class="px-5 py-4 border-b border-slate-100">
                    <h2 class="font-semibold text-slate-800 ">Customers</h2>
                </header>
                    <div class="p-3">
                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                            <!-- Table header -->
                            <div class="flex justify-between">
                                <div class="ml-3 pb-3 px-4 pt-2 text-lg tracking-wide rounded-t-xl text-slate-400 bg-slate-100">
                                    จำนวน user ในระบบ  
                                    {{ $users->count() }} คน
                                </div>
                                <div class="ml-3 pb-3 px-4 pt-2 text-lg tracking-wide rounded-t-xl text-slate-400 bg-slate-100">
                                    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                                        {{ __('Create new user') }}
                                    </x-nav-link>
                                </div>
                            </div>
                            <thead class="text-xs font-semibold uppercase text-slate-400 bg-slate-100">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Name</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Email</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">role</div>
                                    </th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm divide-y divide-slate-100">
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-100">
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                    <img class="rounded-full" src="{{ $user->profile_photo_url }}" width="40" height="40" alt="No image" />
                                                </div>
                                                <div class="font-medium text-slate-800">{{ $user->name }}</div>
                                            </div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-left">{{ $user->email }}</div>
                                        </td>
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="text-lg">user</div>
                                        </td>
                                    </tr>
                                @endforeach                                                                        
                            </tbody>
                        </table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        
            <div class="bg-white shadow-lg rounded-lg border border-slate-200 my-9 mx-4">
                <header class="px-5 py-4 border-b border-slate-100">
                    <h2 class="font-semibold text-slate-800 ">Product</h2>
                </header>
                    <div class="p-3">
                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <!-- Table header -->
                                <div class="flex justify-between">
                                    <div class="ml-3 pb-3 px-4 pt-2 text-lg tracking-wide rounded-t-xl text-slate-400 bg-slate-100">
                                        ชนิดของ product ในระบบ  
                                        {{ $products->count() }}
                                    </div>
                                    <div class="ml-3 pb-3 px-4 pt-2 text-lg tracking-wide rounded-t-xl text-slate-400 bg-slate-100">
                                        <x-nav-link href="{{ route('create') }}" :active="request()->routeIs('create')">
                                            {{ __('Create product') }}
                                        </x-nav-link>
                                    </div>
                                </div>
                                <thead class="text-xs font-semibold uppercase text-slate-400 bg-slate-100">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Product Name</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Price</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Amount</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">detele</div>
                                        </th>
                                    </tr>
                                </thead>
                                <!-- Table body -->
                                <tbody class="text-sm divide-y divide-slate-100">
                                    @foreach($products as $product)
                                    
                                    <tr class="hover:bg-gray-100">
                                        <td class="p-2 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <!-- <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                                    <img class="rounded-full" src="{{ $product->post_image }}" width="40" height="40" alt="No image" />
                                                </div> -->
                                                    <a href="{{ route('kanban', ['product' => $product]) }}">
                                                        <div class="font-medium text-slate-800">{{ $product->name }}</div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">{{ $product->price }}</div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-lg">{{ $product->amount }}</div>
                                            </td>
                                            <td class="p-2 whitespac-nowrap">
                                                <form action="{{route('deleteProduct', ['product' => $product])}}" method="POST">
                                                    @csrf
                                                    <button class="bg-red-600 p-2 text-black rounded-xl">detele</button>
                                                </form>
                                            </td>    
                                    </tr>
                                    @endforeach                                                                        
                                </tbody>
                            </table>
                        </div>
                        {{$products->links()}}
                    </div>
                </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg border border-slate-200 my-9 mr-4">

        </div>
    </div>
    
    
    
</x-app-layout>