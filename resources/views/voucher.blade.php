@extends('layouts.app')

@section('content')

<div class="step-three w3l-breadcrumb">
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
                            <h6 class="text-left" style="color: white">{{ $payment->payment_id ?? ""}}</h6>
                            <h6 class="text-left" style="color: white">Alexander Chi</h6>
                        </div>
                    </div>
                    <p style="color: white">CancunPass 2.2 +1</p>
                </div>
            </div>
        </div>
    </div>
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
