<x-checkout-layout>
    @vite(['resources/js/qralert.js'])
    <div class="flex flex-row justify-center items-center h-screen w-screen">
        <input type="hidden" id="qrcode" value="{{$qrcode}}" data-charge-id="{{$id}}"/>
        <input type="hidden" id="pay" value="{{$pay}}"/>
        
        <div>
            <!-- <p class="text-center">Scan the QR code to pay</p> -->
            {{--- <img src="{{$qrcode}}" alt="" class="h-1/2 w-1/2"> ---}}
        </div>
       
    </div>
    {{--- 
        {{$create_at}}
        {{$expires_at}}
    ---}}
</x-checkout-layout>