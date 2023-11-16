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
    <form id="checkoutForm" method="POST" action="{{route('payment.charge')}}">
        @csrf
        <input type="hidden" name="omiseToken">
        <input type="hidden" name="omiseSource">
        <button type="submit" id="checkoutButton">Checkout</button>
      </form>
      
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
                alert("Hello! I am an alert box!!");
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