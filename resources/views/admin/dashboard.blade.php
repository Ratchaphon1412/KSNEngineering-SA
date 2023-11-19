<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-3 container mx-auto text-center my-9">
        <div class="flex justify-between bg-white p-6 mx-4 shadow-lg rounded-lg border border-slate-200">
            <div class="flex flex-col items-start">
                Users
                <p>
                    {{ $count_users }}
                </p>
            </div>
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#CBD5E1" class="w-10 h-12"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
        </div>
        <div class="flex justify-between bg-white p-6 mx-4 shadow-lg rounded-lg border border-slate-200">
            <div class="flex flex-col items-start">
                Product & Service
                <p>
                    {{ $count_products }}
                </p>
            </div>
            <svg viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#CBD5E1" class="w-10 h-12"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#CBD5E1" d="M12 6v-6h-8v6h-4v7h16v-7h-4zM7 12h-6v-5h2v1h2v-1h2v5zM5 6v-5h2v1h2v-1h2v5h-6zM15 12h-6v-5h2v1h2v-1h2v5z"></path> <path fill="#CBD5E1" d="M0 16h3v-1h10v1h3v-2h-16v2z"></path> </g></svg>
        </div>
        <div class="flex justify-between bg-white p-6 mx-4 shadow-lg rounded-lg border border-slate-200">
            <div class="flex flex-col items-start">
                payment
                <p>
                    {{$payments}}
                </p>
            </div>
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-10 h-12"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.5 9C14.5 9 13.7609 8 11.9999 8C8.49998 8 8.49998 12 11.9999 12C15.4999 12 15.5 16 12 16C10.5 16 9.5 15 9.5 15" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 7V17" stroke="#CBD5E1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#CBD5E1" stroke-width="2"></path> </g></svg>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 container mx-auto">
        <div>
            <div class="bg-white shadow-lg rounded-lg border border-slate-200 mx-4 h-fit">
                <header class="px-5 py-4 border-b border-slate-100">
                    <h2 class="font-semibold text-slate-800 ">Customers</h2>
                </header>
                    <div class="p-3">
                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                            <!-- Table header -->
                            <div class="flex justify-end">
                                <!-- <div class="ml-3 pb-3 px-4 pt-2 text-lg tracking-wide rounded-t-xl text-slate-400 bg-slate-100">
                                    จำนวน Customers ในระบบ  
                                    {{ $users->count() }} คน
                                </div> -->
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
                                            <div class="text-lg">{{$user->roles[0]->name}}</div>
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
                    <h2 class="font-semibold text-slate-800">Product and Service</h2>
                </header>
                    <div class="p-3">
                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <!-- Table header -->
                                <div class="flex justify-end">
                                    <!-- <div class="ml-3 pb-3 px-4 pt-2 text-lg tracking-wide rounded-t-xl text-slate-400 bg-slate-100">
                                        ชนิดของ product and Service ในระบบ  
                                        {{ $products->count() }}
                                    </div> -->
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
                                            <div class="font-semibold text-left">type</div>
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
                                                <div class="text-left">{{ $product->type }}</div>
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

        <!-- payment section -->
        <div class="bg-white shadow-lg rounded-lg border border-slate-200 mb-9 mx-4 h-fit">
            <header class="px-5 py-4 border-b border-slate-100">
                <h2 class="font-semibold text-slate-800 ">All Payment</h2>
            </header>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="uppercase px-6 py-3">
                                amount
                            </th>
                            <th scope="col" class="uppercase px-6 py-3">
                                method
                            </th>
                            <th scope="col" class="uppercase px-6 py-3">
                                status
                            </th>
                            <th scope="col" class="uppercase px-6 py-3">
                                created at
                            </th>
                            <th scope="col" class="uppercase px-6 py-3">
                                verify information (Manual)
                            </th>
        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transections as $payment)
                        <tr class="bg-white border-b dark:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$payment->pay}} THB
                            </th>
                            <td class="px-6 py-4">
                                {{$payment->payment_method}}
                            </td>
                            <td class="px-6 py-4">
                                {{$payment->payment_status}}
                            </td>
                            <td class="px-6 py-4">
                                {{$payment->created_at->format('M d, Y')}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{$payment->confirm_payment_uri}}">link</a>
                            </td>
                        </tr>
                        
                            
                        @endforeach
        
               
                    </tbody>
                </table>
                
               
        
            </div>
            <div class="p-4">
                {{$transections->links()}}
            </div>
        </div>
       
    </div>
</x-app-layout>