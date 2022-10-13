@extends('layouts.app')

@section('content')
<section class="pb-5 ">
    <div class="w3l-teams-32-main w3l-index-block4 ">
        <div class="w3l-breadcrumb">
            <div class="features-bg">
                <div class="container ">
                    <form id="formPayment" action="{{ route('pay') }}" method="POST">
                    @csrf

                        <div class="row">
                            <div class="col-md-7 text-left feature-unit">
                                <div class="card-body">
                                    <h5 class="title-buy text-center"><strong>Buy Cancun Smart Pass</strong></h5>
                                </div>
                                <div class="card-body ml-5 mr-5">

                                    <h6 class="card-title mt-1 mb-2" style="font-weight: bold">Customer information</h6>
                                    {{-- @foreach ($users as $user) --}}


                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first_name">Name</label>
                                                <input type="text"
                                                    name="PassName" class="form-control @error('PassName') is-invalid @enderror"
                                                    placeholder="Enter yout name"
                                                    aria-describedby="helpId"
                                                    required
                                                    autocomplete="PassName"
                                                    autofocus
                                                    value="{{ old('PassName', auth()->user()->name) }}">

                                                @error('PassName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Last Name</label>
                                                <input type="text"
                                                    class="form-control @error('PassLastName') is-invalid @enderror"
                                                    placeholder="Enter your LastName"
                                                    name="PassLastName"
                                                    value="{{ old('PassLastName') }}"
                                                    autocomplete="PassLastName"
                                                    required>

                                                @error('PassLastName')
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
                                                <input type="email"
                                                    class="form-control @error('PassEmail') is-invalid @enderror"
                                                    placeholder="Enter you email"
                                                    name="PassEmail"
                                                    value="{{ old('PassEmail', auth()->user()->email) }}"
                                                    required
                                                    autocomplete="PassEmail">
                                                @error('PassEmail')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Cell phone</label>
                                                <input type="tel"
                                                    class="form-control @error('PassPhone') is-invalid @enderror"
                                                    placeholder="Enter your cell phone"
                                                    name="PassPhone"
                                                    value="{{ old('PassPhone') }}"
                                                    autocomplete="PassPhone"
                                                    required>

                                                @error('PassPhone')
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
                                                <input type="text"
                                                    class="form-control @error('PassCountry') is-invalid @enderror"
                                                    placeholder="Enter your country"
                                                    name="PassCountry"
                                                    value="{{ old('PassCountry') }}"
                                                    autocomplete="PassCountry"
                                                    required>

                                                @error('PassCountry')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">City</label>
                                                <input type="text"
                                                    class="form-control @error('PassCity') is-invalid @enderror"
                                                    placeholder="Enter your city"
                                                    name="PassCity" value="{{ old('PassCity') }}"
                                                    autocomplete="PassCity"
                                                    required>

                                                @error('PassCity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span id="etiqueta_perosnaextra">Add extra person: <span id="">$9.99 USD</span> </span>
                                            <input id="ExtraPerson"
                                                class="form-control mb-3"
                                                type="number"
                                                min="0"
                                                max="10"
                                                value="0"
                                                name="PassExtraPerson"
                                                onchange="sumar(this.value);">
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <label id="etiqueta_perosnaextra">Currency </label>
                                            <select name="currency" id="custom-select" class="custom-select" required>
                                                @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->iso }}">
                                                        {{ strtoupper($currency->iso) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                    </div>
                                    {{-- @endforeach --}}
                                    <h6 class="card-title pt-5" style="font-weight: bold"> SELECT YOUR PAYMENT METHOD </h6>

                                    <div class="row mt-3">
                                        <label>Select the desired paymet platform:</label>
                                        <div class="form-group" id="toggler">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                @foreach ($paymentPlatforms as $paymentPlatform)
                                                    <label class="btn btn-outline-secondary rounded m-2 p-1"
                                                            data-target="#{{ $paymentPlatform->name }}Collapse"
                                                            data-toggle="collapse">

                                                        <input type="radio"
                                                            name="payment_platform"
                                                            value="{{ $paymentPlatform->name }}"
                                                            required>

                                                        <img src="{{ asset($paymentPlatform->image) }}" class="img-thumbnail">
                                                    </label>
                                                @endforeach
                                            </div>
                                            @foreach ($paymentPlatforms as $paymentPlatform)
                                                <div id="{{ $paymentPlatform->name }}Collapse" class="collapse" data-parent="#toggler">
                                                    @includeIf('components.' .strtolower($paymentPlatform->name) . '-collapse')
                                                </div>
                                            @endforeach
                                        </div>
                                        {{-- <button class="btn btn-primary" id="payButton" style="background: green">Pay now</button> --}}
                                    </div>

                                    <!-- PayPal -->
                                    {{-- <div class="accordion-item mb-1 border">
                                        <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                            <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapsePP" aria-expanded="false">

                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                <label class="form-check-label pt-1" for="payment1">
                                                    <img src="{{ asset('assets/images/pay-paypalbilling.png') }}" title="Tarjeta de Crédito o Débito" alt="">
                                                    <br>
                                                    Paypal Agreement
                                                </label>
                                            </div>
                                        </h2>
                                        <div id="collapsePP" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionPayment" style="">
                                            <div class="accordion-body">
                                                <div class="px-2 col-lg-12 mb-3">

                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <!-- Stripe -->
                                    <div class="accordion-item mb-1 border">
                                        <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                            <div class="form-check" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">

                                                <input class="form-check-input" type="radio" name="pago" value="stripe">
                                                <label class="form-check-label" for="payment2">
                                                    <img src="{{ asset('assets/images/pay-braintree.png') }}" title="Tarjeta de Crédito o Débito" alt="">
                                                    <br>
                                                    Debit or Credit Card
                                                </label>

                                            </div>
                                        </h2>
                                        <div class="collapse" id="collapseExample">
                                            <div class="accordion-body">
                                                <form id="#">
                                                <form id=" payment-form">
                                                    <div id="stripe-container" class="text-left">
                                                        <label for="card-element">
                                                            Credit or debit card
                                                        </label>
                                                        <div class="col-md-10 mt-3 mb-3" id="card-element">
                                                            <!-- A Stripe Element will be inserted here. -->
                                                        </div>
                                                        <button id="pagar_stripe" class="btn btn-success">Pay with card</button>

                                                        <!-- Used to display form errors. -->
                                                        <div class="col-md-12" id="card-errors" role="alert"></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Stripe--> --}}
                                </div>
                            </div>
                            {{-- RESUMEN DE LA COMPRA --}}
                            <!-- SUMMARY OF PURCHASE -->
                            <div class="col-md-5 ">
                                <div class="feature-unit ">
                                    <div class="card-body">
                                        <h5 class="title-buy text-center"><strong>Summary of purchase</strong></h5>
                                    </div>
                                    @foreach ($cancunsmartpass as $pass)

                                    <div class=" m-4">
                                        <!-- compra cancun pass -->
                                        <div class="row">
                                            <div class="justify-content-beetween">
                                                <span id="etiqueta_paquete">{{ $pass->name }}</span>
                                                <span id="subtotal_paquete">{{ $pass->price }} $USD</span>
                                            </div>
                                        </div>
                                        <!-- Persona extra -->
                                        <div class="row">
                                            <div class="justify-content-beetween">
                                                <span id="etiqueta_subtotal_personaextra">Extra personal pass:</span>
                                                <span id="subtotal_personaextra">0.00 $USD</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- TOTAL A PAGAR -->
                                        <div class="row pb-4">
                                            <p class="col-md-12 mt-1 text-right" style="font-size: 18px; color: #DA0071; font-weight: bold">
                                                Total:
                                                <span class="pl-3" id="total" name="total">29.99 $USD</span>
                                            </p>
                                        </div>
                                        <div class="feature-unit" style="padding: 1.2rem .3rem">
                                            <div class="card-body" style="display: inline-flex;">
                                                <img src="{{ asset('assets/icons/check-icon.svg') }}" alt="">
                                                <p class="ml-4">Tyou will have access to purchase all the activities at  list list
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md py-4">
                                            {{-- <button type="submit" class="btn btn-block"
                                                style="background: linear-gradient(180deg, rgba(77,77,77,1) 0%, rgba(2,2,2,1) 50%); color:#fff">
                                                Pagar
                                            </button> --}}
                                            <button id="payButton"
                                                type="submit"
                                                class="btn btn-block"
                                                style="background: linear-gradient(180deg, rgba(77,77,77,1) 0%, rgba(2,2,2,1) 50%); color:#fff">
                                                Pay now
                                            </button>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <input id="total_pago" name="total_pago" type="hidden" />
                        <input id="moneda" name="currency" type="hidden" value="USD"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/stripe.css') }}" />

@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    {{-- <script src="{{ asset('assets/js/client.js') }}" defer></script> --}}

    <script type="text/javascript" src="{{ asset('assets/js/booking.js') }}"></script>
    {{-- <script type="text/javascript">
        //Atributos por defecto de los métodos de pago
        $("#paypal-button-container").css("display","none");
        $("#stripe-container").css("display","none");

        //Mostrar método de pago dependiendo de input radio seleccionado
        function mostrar(dato){

            if (dato === 'paypal') {

                $("#paypal-button-container").css("display","block");
                $("#stripe-container").css("display","none");

            }else {
                $("#paypal-button-container").css("display","none");
            }


            }

        }
    </script> --}}

@endpush
