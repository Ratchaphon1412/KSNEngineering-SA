<x-employee-layout>
<div class="h-full flex items-center justify-center">
        @if($repairs)
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Detail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stage
                        </th>
                        <th scope="col" class="px-6 py-3">
                            more
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($repairs as $repair)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <a href="{{ route('detail.repair.view',['repair'=>$repair]) }}">
                                <div>
                                    <img class="w-48 object-none h-48" src="{{asset('storage/repairs/'.$repair->image)}}">
                                </div>
                            </a>
                        </th>
                        <td class="px-6 py-4">
                            <a href="{{ route('detail.repair.view',['repair'=>$repair]) }}">
                                <h5 class="text-gray-900 font-semibold text-2xl tracking-tight mb-2">{{ $repair->name }}</h5>
                            </a>
                            <p class="font-normal text-white bg-blue-500 rounded-lg px-6 py-2 text-gray-700 mb-3 ">Company: {{ $repair->company()->get()[0]->name }}</p>
                        </td>
                        <td class="px-6 py-4">
                            @if($repair->task()->get()[0]->todo_date)
                                <div class="flex bg-amber-300 p-1 rounded-lg">
                                    <p class="font-normal text-gray-700 my-3 mx-4">Todo date: {{$repair->task()->get()[0]->todo_date}}</p>
                                </div>
                            @endif
                            @if($repair->task()->get()[0]->stage)
                                <div class="flex bg-amber-300 p-1 rounded-lg">
                                    <p class="font-normal text-gray-700 my-3 mx-4">Stage: {{$repair->task()->get()[0]->stage}}</p>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="grid items-center justify-end">
                                <a href="{{ route('detail.repair.view',['repair'=>$repair]) }}" class="rounded-r-lg group relative px-8 py-1 overflow-hidden bg-white text-xl shadow my-6">
                                    <div class="absolute inset-0 w-3 bg-blue-500 transition-all duration-[250ms] ease-out group-hover:w-full rounded-r-lg"></div>
                                    <span class="relative text-black group-hover:text-white ">View</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="flex flex-col justify-center items-center px-4 md:px-0 h-[50vh] md:w-full md:h-full border-2 rounded-xl text-black text-4xl tracking-wide drop-shadow">
                No one has received a repair request yet.
            </div>
        @endif
    </div>
</x-employee-layout>