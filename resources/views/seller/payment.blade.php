<x-detail-layout :repair="$repair">
@vite(['resources/js/sweetalert.js'])
<div class="text-black">
    
    <div class="flex justify-between m-5">
        <p class="m-2">name : {{$repair->name}}</p>
        <button id="createBtn" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-2 focus:outline-none">create payment</button>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="uppercase px-6 py-3">
                        amount
                    </th>
                    <th scope="col" class="uppercase px-6 py-3">
                        details
                    </th>
                    <th scope="col" class="uppercase px-6 py-3">
                        type
                    </th>
                    <th scope="col" class="uppercase px-6 py-3">
                        created at
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        100.00 THB
                    </th>
                    <td class="px-6 py-4">
                        test test
                    </td>
                    <td class="px-6 py-4">
                        One time use
                    </td>
                    <td class="px-6 py-4">
                        Nov 15, 2023
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

</x-detail-layout>