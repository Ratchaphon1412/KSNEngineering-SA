<x-app-layout>

    <div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
    <header class="px-5 py-4 border-b border-slate-100">
        <h2 class="font-semibold text-slate-800 ">Customers</h2>
    </header>
    <div class="p-3">
        
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <!-- Table header -->
                <thead class="text-xs font-semibold uppercase text-slate-400 bg-slate-50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Name</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Email</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">xxx</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-slate-100">
                    @foreach($users as $user)
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <!-- <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                        <img class="rounded-full" src="{{ asset('images/user-36-05.jpg') }}" width="40" height="40" alt="Alex Shatov" />
                                    </div> -->
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
    
    </div>
</div>
</x-app-layout>