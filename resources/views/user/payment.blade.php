<x-app-layout>
    <div class="text-center">
        <h1 class="font-extrabold text-xl pt-8">Hai selezionato il seguente piano:</h1>

        @if(session('warning'))
        <div id="alert-4" class="flex items-center p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('warning') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-4" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
            </button>
          </div>
        @endif

        <form id="payment-form" method="POST" action="{{ route('user.makePayment') }}" class="row">
            @csrf
            @method('POST')

            <div class="col-md-6 position-relative">
                <div>
                  @if ( $sponsorship->plan_name == 'Base')
                    <h2 class="py-0.5 px-0.5 rounded uppercase font-bold my-2 mx-auto w-14 bg-blue-500 text-white hover:bg-white hover:text-blue-500 transition-colors">
                      {{ $sponsorship->plan_name }}
                    </h2>
                  @elseif ($sponsorship->plan_name == 'Premium')
                      <h2 class="py-0.5 px-0.5 rounded uppercase font-bold my-2 mx-auto w-24 bg-amber-400 text-white hover:bg-white hover:text-amber-400 transition-colors">
                          {{ $sponsorship->plan_name }}
                      </h2>
                  @elseif ($sponsorship->plan_name == 'Platino')
                      <h2 class="py-0.5 px-0.5 rounded uppercase font-bold my-2 mx-auto w-24 bg-rose-200 text-platinum-500 hover:bg-gray-500 hover:text-rose-200 transition-colors">
                          {{ $sponsorship->plan_name }}
                      </h2>  
                  @endif

                    <h6 style="font-weight:300;color:#8b8e93;">Il tuo profilo risulterà in evidenza per:<br> <strong style="color:#3782e8;font-size:20px;font-weight:600;">{{ $sponsorship->duration_time }} ore</strong>  </h6>
                    <p class="font-bold">al fantastico prezzo di 
                      @if ($sponsorship->price == 2.99)
                            <em class="badge-blue">{{ $sponsorship->price }}€</em>
                      @elseif ($sponsorship->price == 5.99)
                          <em class="badge-gold">{{ $sponsorship->price }}€</em>
                      @elseif ($sponsorship->price == 9.99)
                          <em class="badge-platinum">{{ $sponsorship->price }}€</em>
                      @endif
                    </p>

                    <div id="dropin-container"></div>
                </div>
            </div>
            <div class="w-8/12 m-auto md:w-7/12 lg:w-6/12 xl:w-5/12" >
                <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"
                    data-braintree-dropin-authorization="{{ $clientToken }}"></script>

                <button type="submit-button" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center bd_btn">Procedi con il pagamento</button>
            </div>

            <input type="hidden" class="form-control" name="sponsorship" value="{{ $sponsorship }}">
            <input type="hidden" id="nonce" name="payment_method_nonce" value="fake-valid-nonce"/>
        </form>

</x-app-layout>

<style lang="scss" scoped>
  em.badge-blue {
            display: inline-block;
            padding: 5px 7px;
            background-color: blue;
            color: white;
            font-weight: bold;
            border-radius: 20px;
            text-transform: uppercase;
        }
        em.badge-gold {
            display: inline-block;
            padding: 5px 7px;
            --tw-bg-opacity: 1;
            background-color: rgb(251 191 36 / var(--tw-bg-opacity));;
            color: white;
            font-weight: bold;
            border-radius: 20px;
            text-transform: uppercase;
        }
        em.badge-platinum {
            display: inline-block;
            padding: 5px 7px;
            --tw-bg-opacity: 1;
            background-color: rgb(254 205 211 / var(--tw-bg-opacity));
            color: black
            color: white;
            font-weight: bold;
            border-radius: 20px;
            text-transform: uppercase;
        }


</style>