<x-checkout-layout>
    @if($status == 'success')
        <div class="bg-lime-600 py-[2%] text-center text-xl text-white tracking-wide">
            {{$status}}
        </div>
        <div class="flex flex-col justify-center items-center">
            <svg fill="#22C55E" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" enable-background="new 0 0 52 52" xml:space="preserve" stroke="#22C55E" class="w-10 h-10 mx-auto mt-10"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M26,2C12.7,2,2,12.7,2,26s10.7,24,24,24s24-10.7,24-24S39.3,2,26,2z M39.4,20L24.1,35.5 c-0.6,0.6-1.6,0.6-2.2,0L13.5,27c-0.6-0.6-0.6-1.6,0-2.2l2.2-2.2c0.6-0.6,1.6-0.6,2.2,0l4.4,4.5c0.4,0.4,1.1,0.4,1.5,0L35,15.5 c0.6-0.6,1.6-0.6,2.2,0l2.2,2.2C40.1,18.3,40.1,19.3,39.4,20z"></path> </g></svg>
            <p class="my-10 text-center">Thank you for payment</p>
            <a href="{{ route('dashboard') }}" class="text-center p-3 bg-sky-500 text-white rounded-lg mb-10">Press to go home page</a>
            <p class="text-2xl mb-5">The order was successful!</p>
            <p class="text-2xl mb-10">Thank you for trusting in ordering products and services with us.</p>
        </div>
    @else
        <div class="bg-red-600 py-[2%] text-center text-xl text-white tracking-wide">
            {{$status}}
        </div>
        <div class="flex flex-col justify-center items-center">
            <svg viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" fill="#DC2626" class="w-10 h-10 mx-auto mt-10"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill-rule="evenodd"> <path d="M0 7a7 7 0 1 1 14 0A7 7 0 0 1 0 7z"></path> <path d="M13 7A6 6 0 1 0 1 7a6 6 0 0 0 12 0z" fill="#FFF" style="fill: var(--svg-status-bg, #fff);"></path> <path d="M7 5.969L5.599 4.568a.29.29 0 0 0-.413.004l-.614.614a.294.294 0 0 0-.004.413L5.968 7l-1.4 1.401a.29.29 0 0 0 .004.413l.614.614c.113.114.3.117.413.004L7 8.032l1.401 1.4a.29.29 0 0 0 .413-.004l.614-.614a.294.294 0 0 0 .004-.413L8.032 7l1.4-1.401a.29.29 0 0 0-.004-.413l-.614-.614a.294.294 0 0 0-.413-.004L7 5.968z"></path> </g> </g></svg>
            <p class="my-10 text-center">Sorry for payment</p>
            <a href="{{ route('dashboard') }}" class="text-center p-3 bg-sky-500 text-white rounded-lg mb-10">Press to go home page</a>
            <p class="text-2xl mb-5">The order was unsuccessful!</p>
            <p class="text-2xl mb-10">Please wipe your payment method again.</p>
        </div>
    @endif
</x-checkout-layout>