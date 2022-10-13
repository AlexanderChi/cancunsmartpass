@extends('layouts.app')

@section('content')

{{-- <section style="background-color: #E6E6E6" class="pb-5"> --}}
<section class="pb-5">
    <div class="w3l-teams-32-main w3l-index-block4 ">
        <div class="w3l-breadcrumb">
            <div class="features-bg">
                <div class="container ">
                    <form method="POST" action="#" class="form-buy">
                        {{-- <!-- Progress Barr --> --}}
                        <div class="container-progressbar">
                            <div class="progressbar ">
                                <div class="progress" id="progress"></div>
                                <div class="progress-step progress-step-active" data-title="product Selectetd"></div>
                                <div class="progress-step" data-title="order Summary"></div>
                                <div class="progress-step" data-title="Completed"></div>
                            </div>
                        </div>
                        {{-- --- Step section 1 --- --}}
                        @if($currentStep === 1)
                        <div class="step-one form-step-active mb-5">
                            <div class="row">
                                <!-- Seccion INFO -->
                                <div class="col-md-7 text-left">
                                    <div class=" feature-unit" style="padding: 0rem 1rem">
                                        <div class="card-body" style="display: inline-flex;">
                                            <img src="{{ asset('assets/icons/check-icon.svg') }}" alt="">
                                            <p class="ml-4">Tendrás acceso para comprar todas las actividades a precio
                                                de
                                                lista
                                            </p>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <div class=" feature-unit" style="padding: 0rem 1rem">
                                            <div class="card-body" style="display: inline-flex;">
                                                <img src="{{ asset('assets/icons/check-icon.svg') }}" alt="">
                                                <p class="ml-4">Válido por 2 adultos y 2 menores* Puedes adquirir un
                                                    pase
                                                    para
                                                    una persona extra por $9.99USD</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <div class=" feature-unit" style="padding: 0rem 1rem">
                                            <div class="card-body" style="display: inline-flex;">
                                                <img src="{{ asset('assets/icons/check-icon.svg') }}" alt="">
                                                <p class="ml-4">Tienes un año a partir de tu fecha de compra para
                                                    realizar
                                                    tu
                                                    primera reserva.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <div class=" feature-unit" style="padding: 0rem 1rem">
                                            <div class="card-body" style="display: inline-flex;">
                                                <img src="{{ asset('assets/icons/check-icon.svg') }}" alt="">
                                                <p class="ml-4">Tu pase te permitirá comprar y reservar actividades por
                                                    7
                                                    días a
                                                    partir de la primera fecha reservada..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ORDER DETAIL -->
                                <div class="col-md-5 ">
                                    <div class="feature-unit ">
                                        <div class="card-body">
                                            <h5 class="title-buy text-center">CANCUN PASS <br> FAMILIAR 2.2</h5>
                                            <p class="cp-price-ng">$29.99 <span>USD</span></p>
                                            <hr style="width: 18vh;">
                                        </div>

                                        <div class="">
                                            <!-- Producto seleccionado -->
                                            <div class="row g-1 pb-3">
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form9Example1">
                                                            Producto seleccionado
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <select name="product" id="product" class="form-control" style="border: 1px solid #DA0071">
                                                            @foreach ($products as $product => $prod)
                                                                <option value="">
                                                                    <option value="{{ $prod }}" selected>
                                                                        {{ $prod }}
                                                                    </option>
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Persona extra -->
                                            <div class="row g-5">
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form9Example3">
                                                            Persona extra
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <select class="form-control"
                                                                name="person"
                                                                autocomplete="status"
                                                                autofocus>
                                                            <option value="">Agregar persona extra</option>
                                                            @foreach ($persons as $person => $per)
                                                                <option value="{{ $per }}" >
                                                                        {{ $per }}
                                                                    </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-5">
                                                <a class="btns btn-netx btn-dark btn-lg m-5" style="background: linear-gradient(180deg, rgba(77,77,77,1) 0%, rgba(2,2,2,1) 50%);">
                                                    Siguiente
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- --- Step section 2 --- --}}
                        @if($currentStep === 2)
                        <div class="step-two ">
                            <div class="row">
                                <div class="col-md-7 text-left feature-unit">
                                    <div class="card-body">
                                        <h5 class="title-buy text-center">REGISTRO</h5>
                                    </div>
                                    <div class="card-body ml-5 mr-5">
                                        <h6 class="card-title mt-4 mb-4" style="font-weight: bold">INFORMACIÓN PERSONAL</h6>
                                        <div class="row mb-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nombre</label>
                                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Ingresa Nombre" name="first_name"
                                                    value="old('first_name') }}">
                                                    @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Apellido</label>
                                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Ingresa Apellido" name="last_name" value="{{ old('last_name') }}">
                                                    @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Correo</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingresa Correo" name="email" value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Celular</label>
                                                    <input type="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="Ingresa numero celular" name="tel" value="{{ old('tel') }}">
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
                                                    <label for="">País</label>
                                                    <input type="text" class="form-control @error('country') is-invalid @enderror" placeholder="Ingresa País" name="country" value="{{ old('country') }}">
                                                    @error('country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Cuidad</label>
                                                    <input type="text" class="form-control @error('city') is-invalid @enderror" placeholder="Ingresa Ciudad" name="city" value="{{ old('city') }}">
                                                    @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="card-title mt-4 mb-4" style="font-weight: bold">SEGURIDAD DE LA CUENTA </h6>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Contraseña</label>
                                                    <input type="text" class="form-control @error('password') is-invalid @enderror" placeholder="Ingresa Contraseña" name="password"  required autocomplete="new-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Confirmar contraseña</label>
                                                    <input type="text" class="form-control" placeholder="Ingresa de nuevo su contraseña" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="card-title" style="font-weight: bold"> SELECCIONA TU MÉTODO DE PAGO </h6>
                                        <!-- PayPal -->
                                        <div class="accordion-item mb-1 border">
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
                                                    <div class="px-2 col-lg-6 mb-3">
                                                        <label class="form-label">Email address</label>
                                                        <input type="email" class="form-control">
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
                                                        <img src="{{ asset('assets/images/pay-braintree.png') }}" title="Tarjeta de Crédito o Débito" alt="">
                                                        <br>
                                                        Debit or Credit Card
                                                    </label>

                                                </div>
                                            </h2>
                                            <div class="collapse" id="collapseExample">
                                                <div class="accordion-body">
                                                    <form id=" payment-form">
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
                                        <hr>
                                        <button type="submit" class="btns btn-netx btn-dark btn-lg m-5"
                                                    style="background: linear-gradient(180deg, rgba(77,77,77,1) 0%, rgba(2,2,2,1) 50%); color:#fff">
                                                    COMPLETAR COMPRA
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="feature-unit ">
                                        <div class="card-body">
                                            <h5 class="title-buy text-center pb-5">RESUMEN DE LA COMPRA</h5>
                                        </div>

                                        <div class=" m-4">
                                            <div class="row g-3 pb-3">
                                                <div class="col-sm-7">
                                                    <!-- Name input -->
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form9Example1">
                                                            Cancún Pass Familiar 2.2
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <!-- Email input -->
                                                    <div class="form-outline text-left">
                                                        <label class="form-label" for="form9Example1">
                                                            $29.99USD
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Gutter g-5 -->
                                            <div class="row g-3 pb-3">
                                                <div class="col-sm-7">
                                                    <!-- Name input -->
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form9Example1">
                                                            Pase personal extra
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <!-- Email input -->
                                                    <div class="form-outline text-left">
                                                        <label class="form-label" for="form9Example1">
                                                            $9.99USD
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row g-3 pb-3">
                                                <div class="col-sm-7">
                                                    <!-- Name input -->
                                                    <div class="form-outline">
                                                        <h6 style="color: #DA0071; font-weight: bold">TOTAL</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <!-- Email input -->
                                                    <div class="form-outline text-left">
                                                        <h6 style="color: #DA0071; font-weight: bold">$39.98USD</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" feature-unit" style="padding: 1rem 1rem">
                                                <div class="card-body" style="display: inline-flex;">
                                                    <img src="{{ asset('assets/icons/check-icon.svg') }}" alt="">
                                                    <p class="ml-4">Tendrás acceso para comprar todas las actividades a
                                                        precio de
                                                        lista
                                                    </p>
                                                </div>
                                            </div>
                                            {{-- <div class="pt-5">
                                                <a type="submit" class="btns btn-prev btn-dark btn-lg m-5"
                                                    style="background: linear-gradient(180deg, rgba(77,77,77,1) 0%, rgba(2,2,2,1) 50%); color:#fff">
                                                    Anterior
                                                </a>
                                                <a type="submit" class="btns btn-netx btn-dark btn-lg m-5"
                                                    style="background: linear-gradient(180deg, rgba(77,77,77,1) 0%, rgba(2,2,2,1) 50%); color:#fff">
                                                    Pagar
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- --- Step section 3 Voucher--- --}}
                        @if($currentStep === 3)
                        <div class="step-three ">
                            <div class="row feature-unit">
                                <!-- Seccion INFO -->
                                <div class="col-md-7 text-left ">

                                    <div class="card-body">
                                        <h5 class="title-buy text-center">¡LISTO YA TIENES TU PASE!</h5>
                                    </div>
                                    <div class="card-body ml-5 mr-5">
                                        <h6 class="card-title text-center" style="font-weight: bold">
                                            ESTOS SON TUS DATOS REGISTRADOS
                                        </h6>
                                    </div>
                                    <div class="card-body ml-5 mr-5">
                                        <div class="m-3">
                                            <span class="detail-bold">Nombre:</span>
                                            <span>Alexander</span>
                                            <span class="detail-bold">Apellido:</span>
                                            <span>Chi</span>
                                        </div>
                                        <div class="m-3">
                                            <span class="detail-bold">Correo electronico:</span>
                                            <span>sistemas@altustours.com</span>
                                        </div>
                                        <div class="m-3">
                                            <span class="detail-bold">Celular:</span>
                                            <span>+52 998 484 6819</span>
                                        </div>
                                        <div class="m-3">
                                            <span class="detail-bold">País:</span>
                                            <span>México</span>
                                            <span class="detail-bold">Cuidad:</span>
                                            <span>Cancún</span>
                                        </div>
                                        <div class="m-3">
                                            <span class="detail-bold">Metodo de pago:</span>
                                            <span>Stripe</span>
                                        </div>
                                        <div class="m-3">
                                            <span class="detail-bold">Nombre de titular:</span>
                                            <span>Alexander Tzuc Chi</span>
                                        </div>
                                        <div class="m-3">
                                            <span class="detail-bold">Número de tarjeta:</span>
                                            <span>xxxx-xxxx-xxxx-xx61</span>
                                        </div>
                                        <div class="m-3">
                                            <span class="" style="color: #DA0071">Editar</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="card" style="background: #DA0071; border-radius: 25px">
                                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                            <img src="assets/images/qr1.png" class="img-fluid m-4"
                                                style="border-radius: 20px" />

                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h6 class="text-right" style="color: white">ID:</h6>
                                                    <h6 class="text-right" style="color: white">USER:</h6>
                                                </div>
                                                <div class="col-md-7">
                                                    <h6 class="text-left" style="color: white">202206300001</h6>
                                                    <h6 class="text-left" style="color: white">Alexander Chi</h6>
                                                </div>
                                            </div>
                                            <p style="color: white">CancunPass 2.2 +1</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="action-buttons d-fex justify-content-between bg-white pt-2 pb-2">
                            <div></div>
                            <button type="submit" class="btn btn-md btn-secondary">Atras</button>
                            <button type="submit" class="btn btn-md btn-success">Siguiente</button>
                            <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="container-fluid" style="background-color: #DA0071;">
                    <div class="p-5" style="display: flex; justify-content: center; align-items: center;">
                        <h2 class="title-big m-3" style="color: #fff; font-weight: bold">Explora y reserva las mejores
                            actividades</h2>
                        <a href="{{ route('actividades') }}" class="btn button-style-wt " title="search"> {{ __('VER
                            ACTIVIDADES')
                            }}</a>
                    </div>
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
    <script src="{{ asset('assets/js/client.js') }}" defer></script>

@endpush
