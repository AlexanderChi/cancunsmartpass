@extends('layouts.app')

@section('meta-title', $tour->nombre)
@section('meta-description', $tour->desc)

@section('content')
<section class="">
    <div class="w3l-teams-32-main w3l-index-block4 mb-5" >
        <div class="w3l-breadcrumb">
            <div class="features-bg">
                <div class="container">
                    <div class="row">
                        <!-- Seccion INFO -->
                        <div class="col-md-6 text-left">
                            <div class=" feature-unit" >
                                <div class="card-body">
                                    <p class="cp-text">{{ $tour->category->name ?? ""}}</p>
                                    <div class="row mt-3">
                                        <div class="col-md-9">
                                            <h4 class="card-title text-left" style="font-weight: bold">{{ $tour->name }}</h4>
                                        </div>
                                        <div class="col-md-3 icon-suitcase-details">
                                            <i class="fa fa-suitcase fa-3x" style="color: #DA0071"></i>
                                        </div>
                                    </div>
                                </div>
                                @if($tour->photos->count() === 1)
                                    <img class="img-fluid" src="{{ $tour->photos->first()->url }}" alt="" style="padding-top: 15px; padding-left: 15px; padding-right: 15px; border-radius:23px">
                                @endif
                                <div class="price-discount mt-3 m-4">
                                    <p class="cp-text">Adult: <span class="price-dolar">US$ {{ $tour->PRAD }}</span><span class="price-discount"> US$ {{ $tour->PRAD }}</span></p>
                                    <p class="cp-text">Menor: <span class="price-dolar">US$ {{ $tour->PRMD }}</span><span class="price-discount"> US$ {{ $tour->PRMD }}</span></p>
                                </div>
                                <div class="mt-5 m-4">
                                    <p>{!! $tour->desc_eng !!}</p>
                                </div>
                                <hr>
                                <div class="mt-5 m-4">
                                    <h6 style="color: #DA0071; font-weight: bold">INCLUDES</h6>
                                    <p>{!! $tour->incluye_eng !!}</p>
                                </div>
                                <hr>
                                {{-- <div class="mt-5 m-4">
                                    <h6 style="color: #DA0071; font-weight: bold">RESTRICCIONES</h6>
                                    <p style="font-weight: bold">Los participantes deberán</p>
                                    <p>tener al menos 18 años para conducir</p>
                                    <p>Tener entre 5 y 65 años (precio de niño aplica entre 5 y 11 años)</p>
                                    <p>Saber nadar</p>

                                    <p class="mt-4" style="font-weight: bold">Esta actividad no está permitida:</p>
                                    <p>Durante el embarazo</p>
                                    <p>Bajo la influencia de drogas o alcohol</p>

                                    <p class="mt-4" style="font-weight: bold">No incluido en el tour:</p>
                                    <p>Pickup desde su hotel</p>
                                    <p>Fotos y videos</p>
                                    <p>Cuota de preservación de arrecifes($15usd por persona)</p>
                                </div> --}}
                                <div class="mt-5 m-4">
                                    <h6 style="color: #DA0071; font-weight: bold">MEETING POINT</h6>
                                    <p>{!! $tour->pickup_eng !!}</p>
                                </div>
                                <hr>
                                <div class="mt-5 m-4">
                                    <h6 style="color: #DA0071; font-weight: bold">RECOMMENDATION</h6>
                                    <p>{!! $tour->recomendacion_eng !!}</p>
                                </div>
                                <hr>
                                <div class="mt-5 m-4">
                                    <h6 style="color: #DA0071; font-weight: bold">EXTRA INFORMATION</h6>
                                    <p>{!! $tour->extra_eng !!}</p>
                                </div>
                                <hr>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- seccion botton| -->
                            <div class="card pt-5" style=" border-color: #DA0071">
                                <div class="m-2 py-3 justify-content-between">
                                    <p class="cp-text">Adult: <span class="price-discount">{{ $tour->PRAD }} $USD</span></p>
                                    <p class="cp-text">Menor: </span><span class="price-discount">{{ $tour->PRMD }} $USD</span></p>
                                </div>
                                <div class="pt-5 pb-5">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                        {{-- <input type="submit" name="btn_tour" class="btn button-style" value="Agregar carrito"> --}}
                                        <button type="submit" name="btn_tour" class="btn btn-sm button-style ">
                                            <span class="material-symbols-outlined icon-button">add_shopping_cart</span>
                                            Add Cart
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Seccion Necesitas Ayuda -->
                            <div class="card mt-5" style=" background: #00000029">
                                <div class="card-body">
                                    <h4 class="card-title mt-4" STYLE="color: #DA0071; font-weight: bold">DO YOU NEED HELP?</h4>
                                    <P class="mt-4" style="font-weight: bold">Free call or WhatsApp</P>
                                    <p style="color: #DA0071; font-weight: bold">+52 (998) 240 5281</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
