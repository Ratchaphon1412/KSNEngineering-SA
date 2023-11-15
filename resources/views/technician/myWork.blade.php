<x-employee-layout>



<div>
    <div class="flex flex-1 items-center justify-center p-6">
        <div class="w-full max-w-lg">
            <p class="text-gray-900 text-7xl text-center dark:text-white">My repair</p>
        </div>
    </div>
</div>


<div class="h-full flex items-center justify-center my-8">
    <div class="grid gap-y-10 grid-cols-3 w-9/12" id="eventTable">
        @foreach ($repairs as $repair)
        <div class="max-w-2xl mx-auto">
            <div class="transform outline outline-2 outline-blue-400 bg-white transition duration-300 hover:scale-105 w-96 bg-white shadow-md border border-gray-200 rounded-lg max-w-sm ">
                <a href="{{ route('detail.repair.view',['repair'=>$repair]) }}">
                    <div>
                        <img class="w-full object-none h-48" src="https://cdn.hswstatic.com/gif/gears-1.jpg">
                    </div>
                </a>
                <div class="p-5">
                    <a href="{{ route('detail.repair.view',['repair'=>$repair]) }}">
                        <h5 class="text-gray-900 font-semibold text-2xl tracking-tight mb-2">{{ $repair->name }}</h5>
                    </a>
                    <p class="font-normal text-white bg-blue-500 rounded-lg px-6 py-2 text-gray-700 mb-3 ">Company: {{ $repair->company()->get()[0]->name }}</p>
                    <div class="flex bg-amber-300 p-1 rounded-lg">
                        <p class="font-normal text-gray-700 my-3 ml-4">Todo date: {{$repair->task()->get()[0]->todo_date}}</p>
                    </div>
                    </a>


                    <div class="grid items-center justify-end">
                        <a href="{{ route('detail.repair.view',['repair'=>$repair]) }}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-xl shadow my-6">
                            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                            <span class="relative text-black group-hover:text-white ">View</span>
                        </a>
                    </div>
                </div>
            </div>    
        </div>
        @endforeach
    
    </div>
</div>
    
</x-employee-layout>
