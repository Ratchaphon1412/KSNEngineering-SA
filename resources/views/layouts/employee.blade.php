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
            <main >
            @role(['technician','sale'])
                <div class="bg-white">
                    <div>
                        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
                            <h1 class="text-4xl font-bold tracking-tight text-gray-900">Task</h1>
                        </div>

                        <section aria-labelledby="products-heading" class="pb-24 pt-6">
                            <h2 id="products-heading" class="sr-only">Products</h2>

                            <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                                <!-- Filters -->
                                <form class="block">
                                    <h3 class="sr-only">Categories</h3>
                                    <ul role="list" class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                                    <li>
                                    @role('technician')
                                        <div class="flex items-center justify-center mt-5 font-semibold">
                                            <div class="w-9/12">
                                                <a href="{{route('repair.mywork', ['user'=>Auth::user() ])}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                                    <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                    <span class="relative text-black group-hover:text-white ">My Repair</span>
                                                </a>    
                                            </div>
                                        </div>
                                    @endrole
                                    @role('sale')
                                    <div class="flex items-center justify-center mt-5 font-semibold">
                                        <div class="w-9/12">
                                            <a href="{{route('seller.repair.view')}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                                <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                <span class="relative text-black group-hover:text-white ">Create Repair</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center mt-5 font-semibold">
                                        <div class="w-9/12">
                                            <a href="{{route('seller.InProcess.view')}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                                <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                <span class="relative text-black group-hover:text-white ">InProcess Repair</span>
                                            </a>    
                                        </div>
                                    </div>
                                    @endrole
                                    </li>
                                    <li>
                                        <div class="flex items-center justify-center mt-5 font-semibold">
                                            <div class="w-9/12">
                                                <a href="{{route('show.repair.view')}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-lg shadow my-6">
                                                    <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                                    <span class="relative text-black group-hover:text-white ">Repair</span>
                                                </a>    
                                            </div>
                                        </div>
                                    </li>
                                    </ul>
                                </form>
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
            @else
                {{ $slot }}
            @endrole
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