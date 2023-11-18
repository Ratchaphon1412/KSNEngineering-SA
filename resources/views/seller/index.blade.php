<x-app-layout>



<div>
    <div class="flex flex-1 items-center justify-center p-6">
        <div class="w-full max-w-lg">
        </div>
    </div>
</div>

@role('technician')
<div class="flex items-center justify-center mt-5 font-semibold">
    <div class="w-9/12">
        <a href="{{route('repair.mywork', ['user'=>Auth::user() ])}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-2xl shadow my-6">
            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
            <span class="relative text-black group-hover:text-white ">My Repair</span>
        </a>    
    </div>
</div>
@endrole


@role('sale')
<div class="flex items-center justify-center mt-5 font-semibold">
    <div class="w-9/12">
        <a href="{{route('seller.repair.view')}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-2xl shadow my-6">
            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
            <span class="relative text-black group-hover:text-white ">Create Repair</span>
        </a>    
    </div>
</div>
<div class="flex items-center justify-center mt-5 font-semibold">
    <div class="w-9/12">
        <a href="{{route('seller.InProcess.view')}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-2xl shadow my-6">
            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
            <span class="relative text-black group-hover:text-white ">InProcess Repair</span>
        </a>    
    </div>
</div>
@endrole
<div class="flex items-center justify-center mt-5 font-semibold">
    <div class="w-9/12">
        <a href="{{route('show.repair.view')}}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-2xl shadow my-6">
            <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
            <span class="relative text-black group-hover:text-white ">Repair</span>
        </a>    
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
                    @if($repair->task()->get()[0]->todo_date)
                    <div class="flex bg-amber-300 p-1 rounded-lg">
                        <p class="font-normal text-gray-700 my-3 ml-4">Todo date: {{$repair->task()->get()[0]->todo_date}}</p>
                    </div>
                    @endif
                    @if($repair->task()->get()[0]->stage)
                    <div class="flex bg-amber-300 p-1 rounded-lg">
                        <p class="font-normal text-gray-700 my-3 ml-4">Stage: {{$repair->task()->get()[0]->stage}}</p>
                    </div>
                    @endif
                    <div class="flex bg-blue-300 p-1 mt-3 rounded-lg">
                        
                        <form action="{{ route('repair.team.edit',['task'=>$repair->task()->get()[0]]) }}" method="POST" enctype="multipart/form-data">
                            @csrf        
                            <div class="flex ">
                                <p class=" text-gray-900 px-3 py-2.5 text-center mr-2 my-2 dark:text-white">Team:</p>
                                
                                @if (Auth::user()->hasRole('manager'))
                                <select id="selected" name="selected" class="mr-8 px-3 my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="0">delete Team</option>
                                    @foreach ($teams as $team)
                                   
                                    @if($team == $repair->task()->get()[0]->team)
                                        <option selected value="{{ $team->id }}">{{ $team->name }}</option>
                                    @else
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endif
                                    
                                    @endforeach
                                </select>
                                <button type="submit"
                                    class=" text-white bg-green-400 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 my-2 ">
                                    change
                                </button>
                                @else
                                    @if($repair->task()->get()[0]->team)
                                    <p class=" text-gray-900 px-3 py-2.5 text-center mr-2 my-2 dark:text-white">{{ $repair->task()->get()[0]->team->name }}</p>
                                    @endif
                                @endif
                            </div>
                        </form>
                    </div>
                    


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
    
</x-app-layout>
