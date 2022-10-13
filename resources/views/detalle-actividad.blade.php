@extends('layouts.app')

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
                                    <p class="cp-text">Actividad de medio día</p>
                                    <div class="row mt-3">
                                        <div class="col-md-9">
                                            <h4 class="card-title text-left" style="font-weight: bold">Chichén Itzá tour clásico desde Cancun and Playa del Carmen</h4>
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
                                    <p class="cp-text">Adulto: <span class="price-dolar">US$ 70,00</span><span class="price-discount"> US$ 40,00</span></p>
                                    <p class="cp-text">Menor: <span class="price-dolar">US$ 35,00</span><span class="price-discount"> US$ 40,00</span></p>
                                </div>
                                <div class="mt-5 m-4">
                                    <p>Conduce tu propia lancha rápida para dos, a través de la <span style="color: #DA0071; font-weight: bold">serlva de manglares</span>
                                        e intenta ver algunas de las especies de aves que ahí habitan. Después te refrescarás en las aguas cristalinas de Punta Nizuc.
                                        Con el equipo de snorkel podrás observar corales, peces y hasta algunas estatuas sumergidas.
                                    </p>
                                </div>
                                <hr>
                                <div class="mt-5 m-4">
                                    <h6 style="color: #DA0071; font-weight: bold">INCLUYE</h6>
                                    <p>° Guia e instrucciones</p>
                                    <p>° Paseo en barco hasta el lugar de snorkel</p>
                                    <p>° Tour de snorkel con equipo</p>
                                    <p>° Tubo de snorkel gratis</p>
                                    <p>° Agua embotellada</p>
                                    <p>° Lockers y regaderas</p>
                                </div>
                                <hr>
                                <div class="mt-5 m-4">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <!-- Seccion Calendario -->
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" STYLE="color: #DA0071; font-weight: bold">VIAJEROS CON PASE</h4>
                                    <div class="wrapper-btnplus">
                                        <p class="card-text pl-4 pr-5">Adultos</p>
                                        <button class="menos">-</button>
                                        <span class="num">01</span>
                                        <button class="plus">+</button>
                                    </div>
                                    <div class="wrapper-btnplus">
                                        <p class="card-text pl-4 pr-5">Menores</p>
                                        <button class="menos">-</button>
                                        <span class="num">01</span>
                                        <button class="plus">+</button>
                                    </div>
                                    <h4 class="card-title mt-4" STYLE="color: #DA0071; font-weight: bold">ESCOGE TUS FECHAS</h4>

                                    <form action="#">
                                        <div class="row form-group">
                                            <label for="date" class="col-sm-4 col-form-label">FECHAS</label>
                                            <div class="col-sm-4">
                                                <div class="input-group date" id="datepicker">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-append">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <!-- Seccion En mi Maleta -->
                            <div class="card mt-5" style=" border-color: #DA0071">
                                <div class="card-body">
                                    <i class="fa fa-suitcase fa-3x m-3 mt-5" style="color: #DA0071"></i>
                                    <h4 class="card-title" STYLE="color: #DA0071; font-weight: bold">EN MI MALETA</h4>
                                        <h6 style="font-weight: bold">Jungle Tour</h6>
                                    <p class="cp-text">Adulto: 2x <span class="price-dolar">US$ 70,00</span><span class="price-discount"> US$ 40,00</span></p>
                                    <p class="cp-text">Menor: 2x <span class="price-dolar">US$ 35,00</span><span class="price-discount"> US$ 40,00</span></p>

                                    <hr>
                                    <p class="cp-text mt-4" style="font-weight: bold"> Fechas</p>
                                    <p>Jue, 14 de Junio de 2022</p>
                                </div>
                                <div class="card-body">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p style="color: #DA0071; font-weight: bold">Total</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p style="color: #DA0071; font-weight: bold">$60.00 USD</p>
                                        </div>
                                    </div>
                                </div>
                                <div class=" pl-5 m-4" style="background: #F8F7F7">
                                    <P class="mt-2 m-2" style="font-weight: bold">Estás ahorrando $45.00 USD</P>
                                    <em class="m-4 mb-3" style="color: #DA0071; ">¡Un ahorro del 42%!</em>
                                </div>
                                <div class="search-right m-5">
                                    <a href="#" class="btn button-style" title="search">RESERVAR</a>
                                </div>
                            </div>

                            <!-- Seccion Necesitas Ayuda -->
                            <div class="card mt-5" style=" background: #00000029">
                                <div class="card-body">
                                    <h3 class="card-title mt-4" STYLE="color: #DA0071; font-weight: bold">¿NECESITAS AYUDA?</h3>
                                    <P class="mt-4" style="font-weight: bold">Llamada gratuita USA y Canadá</P>
                                    <p style="color: #DA0071; font-weight: bold">1-866-210-12-36</p>

                                    <p class="mt-4" style="font-weight: bold">Demás Países</p>
                                    <p style="color: #DA0071; font-weight: bold">+52 (554 166 3092)</p>
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
