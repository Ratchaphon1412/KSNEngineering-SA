<x-detail-layout :repair="$repair">
@vite(['resources/js/sweetalert.js'])
<div class="text-black">
    
    <div class="flex justify-between m-5">
        <p class="m-2">name : {{$repair->name}}</p>
        <input id="repair" name="repair" type="hidden" value="{{$repair->id}}"/>
        <input id="balance" name="balance" type="hidden" value="{{$balance}}"/>
        <p class="m-2">payment status : {{$repair->payment_status}}</p>
        @if ($balance > 0)
        <button id="createBtn" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-2 focus:outline-none">create payment</button>
        @else
        <button  class="text-white bg-gray-600 hover:bg-gray-800  font-medium rounded-lg text-sm p-2 focus:outline-none">create payment</button>
        @endif
    </div>
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
                @foreach ($repair->payments as $payment)
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
        <div>
            Payment Total {{$repair->amount}}
            
        </div>
        <div>
            Balance {{$balance}}
            </div>
        <div>
           Grand Total {{$repair->Quotation->grand_total}}
        </div>
       

    </div>

</div>

</x-detail-layout>