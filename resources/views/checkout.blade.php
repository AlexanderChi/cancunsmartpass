@extends('layouts.app')

@section('content')
<section class="pb-5 ">
    <div class="w3l-teams-32-main w3l-index-block4 ">
        <div class="w3l-breadcrumb">
            <div class="features-bg">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-7 text-left feature-unit">
                            <div class="card-body">
                                <h5 class="title-buy text-center"><strong>Book tours</strong></h5>
                            </div>
                            <div class="card-body ml-5 mr-5">
                                <h6 class="card-title mt-1 mb-2" style="font-weight: bold">Customer information</h6>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">Name</label>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter your Name" name="first_name"
                                            value="{{ old('first_name') }}" required autocomplete="first_name">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter your Last Name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cell phone</label>
                                            <input type="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="Enter your Cell phone" name="tel" value="{{ old('tel') }}" required autocomplete="tel">
                                            @error('tel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Country</label>
                                            <input type="text" class="form-control @error('country') is-invalid @enderror" placeholder="Enter your Country" name="country" value="{{ old('country') }}" required autocomplete="country">
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">City</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" placeholder="Enter your City" name="city" value="{{ old('city') }}" required autocomplete="city">
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <h6 class="card-title pt-5" style="font-weight: bold"> SELECT YOUR PAYMENT METHOD </h6>

                                <!-- PayPal -->
                                <div class="accordion-item mb-1 border">
                                    <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                        <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapsePP" aria-expanded="false">

                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label pt-1" for="payment1">
                                                {{-- <img src="{{ asset('assets/images/pay-paypalbilling.png') }}" title="Tarjeta de Crédito o Débito" alt=""> --}}
                                                {{-- <br> --}}
                                                Paypal Agreement
                                            </label>
                                        </div>
                                    </h2>
                                    <div id="collapsePP" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionPayment" style="">
                                        <div class="accordion-body">
                                            <div class="px-2 col-lg-12 mb-3">
                                                {{-- @foreach ($tours as $tour) --}}
                                                    <form id="formulario_pago"action="{{ route('payment') }}" method="POST">
                                                        @csrf

                                                        <!-- Datos de la actividad Paypal -->
                                                        <input id="nombre_paypal" type="hidden" name="nombre">
                                                        <input id="email_paypal" type="hidden" name="email">
                                                        <input id="tel_paypal" type="hidden" name="tel">
                                                        <input id="fecha_paypal" type="hidden" name="fecha">
                                                        <input id="adultos_paypal" type="hidden" name="adultos">
                                                        <input id="menores_paypal" type="hidden" name="menores">

                                                        <!-- Datos de la actividad -->
                                                        {{-- <input id="pase_nombre" type="hidden" name="pase_nombre" value="<?php echo $row['tour_nombre']; ?>" >
                                                        <input id="tour_id" type="hidden" name="id_tour" value="<?php echo $id; ?>">
                                                        <input id="destino" type="hidden" name="destino" value="<?php echo $row['tour_destino']; ?>"> --}}

                                                        <input type="hidden" id="first_name" name="first_name">
                                                        <input type="hidden" id="last_name" name="last_name">
                                                        <input type="hidden" id="email" name="email">
                                                        <input type="hidden" id="tel" name="tel">
                                                        <input type="hidden" id="country" name="country">
                                                        <input type="hidden" id="city" name="city">
                                                        <input type="hidden" id="precio_pase" name="precio_pase" value="29.99">
                                                        <input type="hidden" id="precio_personaextra" name="precio_personaextra" value="9.99">
                                                        {{-- <div id="paypal-button-container"></div>  --}}
                                                        <button type="submit" class="w-full">
                                                            Pay with paypal
                                                        </button>

                                                    </form>
                                                {{-- @endforeach --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Stripe -->
                                <div class="accordion-item mb-1 border">
                                    <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                        <div class="form-check" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">

                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                            <label class="form-check-label" for="payment2">
                                                {{-- <img src="{{ asset('assets/images/pay-braintree.png') }}" title="Tarjeta de Crédito o Débito" alt=""> --}}
                                                {{-- <br> --}}
                                                Debit or Credit Card
                                            </label>

                                        </div>
                                    </h2>
                                    <div class="collapse" id="collapseExample">
                                        <div class="accordion-body">
                                            <form id="#">
                                            {{-- <form id=" payment-form"> --}}
                                                <div id="card-element"><!--Stripe.js injects the Card Element--></div>
                                                <button id="submit">
                                                    <div class="spinner hidden" id="spinner"></div>
                                                    <span id="button-text">Pay now</span>
                                                </button>
                                                <p id="card-error" role="alert"></p>
                                                <p class="result-message hidden">
                                                    Payment succeeded, see the result in your
                                                    <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Stripe-->
                            </div>
                        </div>
                        {{-- RESUMEN DE LA COMPRA --}}
                        <!-- RESUMEN DE LA COMPRA -->
                        <div class="col-md-5 ">
                            <div class="feature-unit ">

                                <div class="card-body">
                                    <h5 class="title-buy text-center">SUMMARY OF PURCHASE</h5>
                                </div>

                                @if (count(Cart::getContent()))
                                <div class="col-sm-12">
                                    <table id="tours-table" class="table table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                {{-- <th>id</th> --}}
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>accion</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-left">
                                            @foreach (Cart::getContent() as $item)
                                                <tr>
                                                    {{-- <td>{{ $item->id }}</td> --}}
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->price }} usd</td>
                                                    <td>
                                                        <form action="{{ route('cart.removeitem') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                            <button type="submit" class="btn btn-link btn-sm text-danger"><i class="uil uil-trash-alt"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                    <!-- TOTAL A PAGAR -->
                                    <form action="">
                                        <div class="row pb-4">
                                            <p class="col-md-12 mt-1 text-right" style="font-size: 18px; color: #DA0071; font-weight: bold">
                                                Total:
                                                <span class="pl-3" id="total">$0.00 USD</span>
                                            </p>
                                        </div>
                                        <div class="col-md py-4">
                                            <button type="submit" class="btn btn-block"
                                                style="background: linear-gradient(180deg, rgba(77,77,77,1) 0%, rgba(2,2,2,1) 50%); color:#fff">
                                                Pagar
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <h5 class="title-buy text-center p-4">Your cart is empty, add your favorite activities!</h5>

                                    <div class="pb-4"></div>
                                    <a href="{{ route('actividades') }}" type="submit" class="btn btn-block"
                                        style="background: linear-gradient(180deg, rgba(77,77,77,1) 0%, rgba(2,2,2,1) 50%); color:#fff">
                                        View activities
                                    </a>

                                @endif

                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/stripe.css') }}" /> --}}

@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    {{-- <script src="{{ asset('assets/js/client.js') }}" defer></script> --}}

    <script>
        {{-- incremental de persona extra --}}
        $(document).ready(function () {
            $('.increment-btn').click(function (e) {
                e.preventDefault();

                var inc_value = $('.addperson-input').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value < 10 )
                {
                    value++;
                    $('.addperson-input').val(value);
                }
            });

            $('.decrement-btn').click(function (e) {
                e.preventDefault();

                var des_value = $('.addperson-input').val();
                var value = parseInt(des_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value > 0 )
                {
                    value--;
                    $('.addperson-input').val(value);
                }
            });
        });

    </script>
    <script type="text/javascript" src="{{ asset('assets/js/booking.js') }}"></script>
    <script>
        $(function () {
          $("#tours-table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
    </script>

    {{-- PAGO CON PAYPAL --}}
    {{-- <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}"></script>
    <script>
        paypal.Buttons({

          // Sets up the transaction when a payment button is clicked
          createOrder: (data, actions) => {
            return actions.order.create({
              purchase_units: [{
                amount: {
                  value: '77.44' // Can also reference a variable or function
                }
              }]
            });
          },
          // Finalize the transaction after payer approval
          onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
              // Successful capture! For dev/demo purposes:
              //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              //const transaction = orderData.purchase_units[0].payments.captures[0];
              alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
              // When ready to go live, remove the alert and show a success message within this page. For example:
              // const element = document.getElementById('paypal-button-container');
              // element.innerHTML = '<h3>Thank you for your payment!</h3>';
              // Or go to another URL:  actions.redirect('thank_you.html');
            });
          }
        }).render('#paypal-button-container');
      </script> --}}

@endpush
