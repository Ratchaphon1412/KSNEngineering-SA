<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

        <!-- unicons CDN -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="{{ asset('vendor/basement/basement.bundle.min.css') }}">

        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="relative">
            <div class="bg-white">
                <div>
                    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex items-baseline justify-between border-b border-gray-200 py-6">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900">Task</h1>
                    </div>

                <section aria-labelledby="products-heading" class="pb-24 pt-6">
                    <h2 id="products-heading" class="sr-only">Products</h2>

                    <div class="grid grid-cols-1 gap-y-10 lg:grid-cols-4 h-fit">
                        <div class="block mr-6">
                            <ul role="list" class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                                @role('sale')
                                    <li>
                                        <div class="flex items-center justify-center mt-5 font-semibold">
                                            <div class="w-9/12">
                                                <a href="{{ route('detail.repair.view',['repair'=>$repair]) }}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                                    <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                    <span class="relative text-black group-hover:text-white">
                                                        View Detail repair
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center justify-center mt-5 font-semibold">
                                            <div class="w-9/12">
                                                <a href="{{ route('repair.edit.view',['repair'=>$repair]) }}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                                    <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                    <span class="relative text-black group-hover:text-white">
                                                        Manage Repair
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    @if($repair->task()->get()[0]->todo_date)
                                        <li>
                                        
                                            <button  type="submit" data-modal-target="purchaseModal" data-modal-toggle="purchaseModal" class="my-2 p-2 w-full relative inline-flex items-center justify-center overflow-hidden text-sm font-medium text-gray-900 rounded-3xl group bg-gradient-to-br from-blue-200 via-green-400 to-red-200 group-hover:from-blue-200 group-hover:via-green-400 group-hover:to-green-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-green-400">
                                                <span class="w-full text-lg font-semibold relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-3xl group-hover:bg-opacity-0">
                                                    Purchase Order
                                                </span>
                                            </button>
                                        </li>
                                        <li>
                                            @if($repair->quotation)
                                            <button  type="submit" data-modal-target="payModal" data-modal-toggle="payModal" class="my-2 p-2 w-full relative inline-flex items-center justify-center overflow-hidden text-sm font-medium text-gray-900 rounded-3xl group bg-gradient-to-br from-blue-200 via-green-400 to-red-200 group-hover:from-blue-200 group-hover:via-green-400 group-hover:to-green-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-green-400">
                                                <span class="w-full text-lg font-semibold relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-3xl group-hover:bg-opacity-0">
                                                    Payment
                                                </span>
                                            </button>
                                            @endif
                                        </li>
                                    @endif
                                @endrole
                            @role('technician')
                            <li>
                                <div class="flex items-center justify-center mt-5 font-semibold">
                                    <div class="w-9/12">
                                        <a href="{{ route('detail.repair.view',['repair'=>$repair]) }}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                            <span class="relative text-black group-hover:text-white">
                                                View Detail repair
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </li>  
                            <li>                                    
                                <div class="flex items-center justify-center mt-5 font-semibold">
                                    <div class="w-9/12">
                                        <a href="{{ route('task.edit.view',['repair'=>$repair]) }}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                            <span class="relative text-black group-hover:text-white">
                                                Manage
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                @if($repair->task()->get()[0]->todo_date)
                                <div class="flex items-center justify-center mt-5 font-semibold">
                                    <div class="w-9/12">
                                        <button  type="submit" data-modal-target="purchaseModal" data-modal-toggle="purchaseModal" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                            <span class="relative text-black group-hover:text-white">
                                                Purchase Order
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                @endif
                         
                            </li>
                            <li>
                                {{-- @if($repair->quotation)
                                <button  type="submit" data-modal-target="payModal" data-modal-toggle="payModal" class="my-2 p-2 w-full relative inline-flex items-center justify-center overflow-hidden text-sm font-medium text-gray-900 rounded-3xl group bg-gradient-to-br from-blue-200 via-green-400 to-red-200 group-hover:from-blue-200 group-hover:via-green-400 group-hover:to-green-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-green-400">
                                    <span class="w-full text-lg font-semibold relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-3xl group-hover:bg-opacity-0">
                                        Payment
                                    </span>
                                </button>
                                @endif --}}
                                {{-- @endif --}}
                                
                            </li>
                            @endrole
                            {{-- @role('technician')
                            <li>
                                
                                <div class="flex items-center justify-center mt-5 font-semibold">
                                    <div class="w-9/12">
                                        <a href="{{ route('task.edit.view',['repair'=>$repair]) }}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6"> Edit Task</a>
                                    </div>
                                </div>
                                   
                            </li>
                            @endrole --}}
                                <li>
                                    @role(['sale','technician'])
                                    <div class="flex items-center justify-center mt-5 font-semibold">
                                        <div class="w-9/12">
                                            <a href="{{route('product.quotation.create',['repair'=>$repair])}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                <span class="relative text-black group-hover:text-white">
                                                    Quatation
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    @endrole
                                </li>
                                <li>
                                    @role('sale')
                                    <div class="flex items-center justify-center mt-5 font-semibold">
                                        <div class="w-9/12">
                                            <a href="{{ route('repair.payment.view',['repair'=>$repair]) }}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                                <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                <span class="relative text-black group-hover:text-white">
                                                    Payment
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    @endrole
                                </li>
                                <li>
                                    @role('technician')
                                    @if($repair->quotation && ($repair->quotation->grand_total == $repair->amount ))
                                    <div class="flex items-center justify-center mt-5 font-semibold">
                                        <div class="w-9/12">
                                            <button  type="submit" data-modal-target="doneModal" data-modal-toggle="doneModal" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                <span class="relative text-black group-hover:text-white">
                                                    Done
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                    @endrole
                                </li>
                                <li>
                                    @role('sale')
                                    <div class="flex items-center justify-center mt-5 font-semibold">
                                        <div class="w-9/12">
                                            <button  type="submit" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                <span class="relative text-black group-hover:text-white">
                                                    Delete
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    @endrole
                                </li>
                            </ul>
                        </div>
                        <!-- Product grid -->
                        <div class="lg:col-span-3">
                            <!-- Your content -->
                            {{ $slot }}
                        </div>
                    </div>
                </section>
                </main>
            </div>
            </div>
            </main>
            <x-footer/>
            
            @auth
            @role(['admin','user','technician','sale'])
                <x-basement::chat-box />
                
            @endrole
        @endauth
           
          
        </div>
   
        <script src="{{ asset('vendor/basement/basement.bundle.min.js') }}"></script>
        @stack('modals')

        @livewireScripts

    </body>
</html>