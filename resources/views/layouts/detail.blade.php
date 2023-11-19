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
                                                <a href="{{ route('show.repair.view') }}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                                    <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                    <span class="relative text-black group-hover:text-white">
                                                        Repair
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center justify-center mt-5 font-semibold">
                                            <div class="w-9/12">
                                                <a href="{{ route('detail.repair.view',['repair'=>$repair]) }}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                                    <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                    <span class="relative text-black group-hover:text-white">
                                                        Detail Task
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
                                            <div class="flex items-center justify-center mt-5 font-semibold">
                                                <div class="w-9/12">
                                                    <button  type="submit" data-modal-target="purchaseModal" data-modal-toggle="purchaseModal" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow ">
                                                        <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                        <span class="relative text-black group-hover:text-white">
                                                            Purchase Order
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                        
                                    @endif
                                @endrole
                            @role('technician')
                            <li>
                                <div class="flex items-center justify-center mt-5 font-semibold">
                                    <div class="w-9/12">
                                        <a href="{{route('repair.mywork', ['user'=>Auth::user() ])}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                            <span class="relative text-black group-hover:text-white ">My Repair</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center justify-center mt-5 font-semibold">
                                    <div class="w-9/12">
                                        <a href="{{ route('detail.repair.view',['repair'=>$repair]) }}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                            <span class="relative text-black group-hover:text-white">
                                                Detail Task
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
                                                Manage Task
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center justify-center mt-5 font-semibold">
                                    <div class="w-9/12">
                                        <button  type="submit" data-modal-target="teanModal" data-modal-toggle="teamModal" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow ">
                                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                            <span class="relative text-black group-hover:text-white">
                                                Team
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="flex items-center justify-center mt-5 font-semibold">
                                    <div class="w-9/12">
                                        <button  type="submit" data-modal-target="teanModal" data-modal-toggle="teamModal" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow ">
                                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                            <span class="relative text-black group-hover:text-white">
                                                Finish the repair
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            @endrole
                            
                                <li>
                                    @role(['sale','technician'])
                                    <div class="flex items-center justify-center mt-5 font-semibold">
                                        <div class="w-9/12">
                                            <a href="{{route('product.quotation.create',['repair'=>$repair])}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                <span class="relative text-black group-hover:text-white">
                                                    Quotation
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

                        <div id="purchaseModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-teal-600 via-sky-400 to-cyan-500">
                                            Purchase order
                                        </h1>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="purchaseModal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    @if($repair->purchase_order)
                                        <div>
                                            <img class="h-auto max-w-full rounded-lg" src="{{asset('storage/uploads/' . $repair->purchase_order)}}" alt="">
                                        </div>
                                    @else
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <div class="py-20 bg-white px-2">
                                            <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                                                <div class="md:flex">
                                                    <div class="w-full p-3">
                                                        <div class="relative border-dotted h-48 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                                            <div class="absolute">
                                                                <div class="flex flex-col items-center">
                                                                    <i class="fa fa-folder-open fa-4x text-blue-700"></i>
                                                                    <!-- <span class="block text-gray-400 font-normal">Select file video here</span> -->
                                                                    <form action="{{ route('purchase.add',['repair'=>$repair]) }}" method="POST" enctype="multipart/form-data" class="w-10/12">
                                                                    @csrf
                                                                    <input type="file" name="image" id="inputImage" accept="image/*" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="font-xl" id="previewsImg-con" style="display: none">
                                        Preview Image
                                        <div class="mt-2 gap-1 flex justify-center items-center" id="preview-image">
                                    
                                        </div>
                                    </div>
                                    @endif
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="purchaseModal" type="button" class="text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">close</button>
                                        @if(!$repair->purchase_order)    
                                        <button type="submit" class="right-5 absolute flex-2 rounded-full bg-green-600 text-white antialiased font-bold hover:bg-green-800 px-12 py-2">Add</button>
                                        @endif
                                    </form>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($repair->task()->get()[0]->team)
                        <div id="teamModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class=" bg-white rounded-lg shadow dark:bg-gray-700">
                                     <!-- Modal header -->
                                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-teal-600 via-sky-400 to-cyan-500">
                                            Team Member: {{ $repair->task()->get()[0]->team->name }}        
                                        </h1>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="teamModal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <div class=" bg-white px-2">
                                            <div class="flex flex-wrap">
                                                @foreach ($repair->task()->get()[0]->team->users as $user)
                                                <div class="w-1/3 mt-2 mb-2">
                                                    <div class="bg-amber-200 rounded-xl ml-2 p-2">
                                                        <p class="text-xl text-gray-900 dark:text-white p-2 rounded-xl bg-amber-300">{{ $user->name }}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>


                                    <!-- Modal footer -->
                                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="teamModal" type="button" class="text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif


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