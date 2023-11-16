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
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Styles -->
        @livewireStyles
      </head>
      <body>
      <div class="font-sans bg-white antialiased">
        <div>
          {{-- <form id="checkoutForm" method="POST" action="{{route('payment.charge')}}">
              @csrf
              <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                      data-key="{{config('services.omise.public_key')}}"
                      data-amount="{{$amount}}"
                      data-currency="THB"
                      data-frame-label="KSN Engineering"
                      data-other-payment-methods="mobile_banking_bbl,mobile_banking_kbank,mobile_banking_ktb,promptpay,internet_banking"
                      data-default-payment-method="credit_card">
              </script>
          </form> --}}
        
            <div class="flex flex-col justify-center items-center h-screen rounded-lg p-3">
              <div class="rounded-lg p-3 border-2 border-zinc-400">
                <img src="{{asset('assets/images/logo.png')}}" class="w-20 h-20 mb-4 mx-auto"/>
                <p class="p-3 border-2 border-zinc-400 rounded-lg my-2">You must pay on {{$amount/100}} THB</p>
                <form id="checkoutForm" method="POST" action="{{route('payment.charge')}}" class="mb-3 mt-6">
                    @csrf
                    <input type="hidden" name="omiseToken">
                    <input type="hidden" name="omiseSource">
                    <input type="hidden" name="amount" value="{{$amount}}">
                    <button type="submit" id="checkoutButton" class="w-full text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 duration-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Checkout here!</button>
                </form>
              </div>
            </div>
              
              <script type="text/javascript" src="https://cdn.omise.co/omise.js">
              </script>
              
              <script>
                OmiseCard.configure({
                  publicKey: {!! json_encode(config('services.omise.public_key'))!!}
                });
              
                var button = document.querySelector("#checkoutButton");
                var form = document.querySelector("#checkoutForm");
              
                button.addEventListener("click", (event) => {
                  event.preventDefault();
                  OmiseCard.open({
                    amount: {!!json_encode($amount )!!},
                    currency: "THB",
                    defaultPaymentMethod: "credit_card",
                    otherPaymentMethods: "mobile_banking_bbl,mobile_banking_kbank,mobile_banking_ktb,promptpay,internet_banking",
                    frameLabel: "KSN Engineering",
                    onCreateTokenSuccess: (nonce) => {
                        
                        if (nonce.startsWith("tokn_")) {
                            form.omiseToken.value = nonce;
                        } else {
                            form.omiseSource.value = nonce;
                        };
                      form.submit();
                    },
                    onFormClosed: () => {
                        /* Handler on form closure. */
                    },
                  });
                });
              </script>
        </div>    
      </div>
        @livewireScripts
    </body>
</html>