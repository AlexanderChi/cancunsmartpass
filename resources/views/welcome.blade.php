@extends('layouts.app')

@section('content')
    <!-- //Seccion Banner  -->
    <section id="home" class="w3l-banner">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-7 banner-left pt-md-0 text-center">
                    <div class="container">
                        <h3 class="mb-sm-4 mb-3 title " style="color: #DA0071">
                            A PASS FOR<br>
                            <span class="text-js"> ADVENTURE</span>
                        </h3>
                        <p class="sub-title mt-2 text-normal cp-text m-5">With Cancun Smart Pass you get up to  <span
                                class="text-pink">70% discount </span> on activities to do in Cancun and the Riviera Maya </p>
                        <div class="mt-md-5 mt-4 mb-lg-0 mb-4">
                            <a href="#includes" class="btn button-style">
                                Learn more
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 banner-right mt-md-0" style="margin: 0; padding: 0;">
                    <img class="img-fluid" src="{{ asset('assets/images/b1.png') }}" alt=" ">
                </div>
            </div>
        </div>
    </section>
    <!-- //end seccion banner -->
    <hr>
    <!--  //seccion que es-->
    <section class=" py-md-5 py-4" id="includes">
        <div class="container pb-2">
            <div class="row align-items-center">
                <div class="col-lg-6 left-wthree-img pr-lg-4">
                    <img src="{{ asset('assets/images/cancunsmartpass.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 about-right-faq align-self mb-lg-0 mb-5 pl-xl-5">
                    <h3 class="title-big mb-3">What is Cancun Smart Pass?</h3>
                    <p class="sub-title mt-2 text-normal cp-text">It is the digital pass for 2 adults and 2 children for 7 days that you can activate in a period of 365 days, with which you will have access to the most fun activities in the Mexican Caribbean.</p>

                    @foreach ($passes as $item)
                    <div class="text-center m-5">
                        <div class="title-main text-center mx-auto mb-md-4">
                            <p class="price-pass"> By Only <span class="text-pink"> ${{ $item->price }} </span><span class="price-pass-money">USD</span></p>
                            <p>+ Extra person for only ${{ $item->extra_person }}USD</p>

                        </div>
                    </div>
                    @endforeach

                    <div class="mt-md-5 mt-4 mb-lg-0 mb-4">
                        @if (Auth::check())
                            @foreach ($passes as $item)
                                {{-- <form action="{{ route('pass.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="pass_id" value="{{ $item->id }}">
                                    <input type="submit" name="btn_pass" class="btn button-style" value="Obtener mi Cancun Smart Pass">
                                </form> --}}
                                <a href="{{ route('buy-pass') }}" class="btn button-style">
                                    Buy my Cancun Smart Pass
                                </a>

                            @endforeach
                        @else
                            <a href="{{ route('register') }}" class="btn button-style">
                                Buy my Cancun Smart Pass
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  //Fin section que es-->
    <!-- //seccion de beneficios -->
    <div class="w3l-index-block4">
        <div class="features-bg">
            <div class="container-fluid text-center" style="background: #F4F2F2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 about-right-faq align-self mb-lg-0 mb-5 pl-xl-5 m-5">
                            <h3 class="title-big mb-3">Your pass benefits</h3>
                        </div>
                        <div class="col-lg-4 features15-col-text">
                            <div class="features15-info">
                                <img class="csp-icon" src="{{ asset('assets/icons/icono-familia.svg') }}" alt="Family Icon">
                            </div>
                            <div class="features15-para m-4">
                                <h4 class="text-pink  mb-3">1. Get discounts for your entire family</h4>
                                <p class="cp-text ">With Cancun Smart Pass you will have up to 70% discount on all activities</p>
                            </div>
                        </div>
                        <div class="col-lg-4 features15-col-text">
                            <div class="features15-info">
                                <img class="csp-icon-bote" src="{{ asset('assets/icons/icono-bote.svg') }}" alt="Lncha Icon">
                            </div>
                            <div class="features15-para m-4">
                                <h4 class="text-pink mb-3">2. More than +100 tours to do</h4>
                                <p class="cp-text ">Experiences for all the members of your family, extreme, aquatic, cultural, nocturnal, among others..
                                <br><strong>¡Your vacation will not be the same!</strong>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 features15-col-text">
                            <div class="features15-info">
                                <img class="csp-icon-calendar" src="{{ asset('assets/icons/Calendar.svg') }}" alt="Calendar Icon">
                            </div>
                            <div class="features15-para m-4">
                                <h4 class="text-pink mb-3">3. Enjoy your 7-day Cancun Smart Pass</h4>
                                <p class="cp-text ">Purchase your pass today, activate it the day of your first activity and get access to our discounts on all our tours.</p>
                                @if (Auth::check())
                                    <a href="{{ route('buy-pass') }}" style="color: #DA0071; text-decoration: underline;">¡Buy Now!</a>
                                @else
                                    <a href="{{ route('register') }}" style="color: #DA0071; text-decoration: underline;">¡Buy Now!</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Fin seccion de beneficios -->
    <!-- //Seccion como obtenerlo-->
    <div class="w3l-index-block4 pb-5">
        <div class="features-bg pb-lg-5 pt-lg-4 py-4">
            <div class="container">
                <div class="col-lg-12 features15-col-text">
                    <div class="title-main text-center mx-auto mb-md-4">
                        <h3 class="title-big" style="color: #DA0071; font-weight: bold">How to get it?</h3>
                        <hr>
                    </div>
                    <div class="row text-center">
                        {{-- <div class="col-lg-4 col-md-4 features15-col-text">
                            <div class="features15-para">
                                <img src="assets/images/numero-1.png" alt="2" width="45px">
                                <p class="cp-text pb-4 pt-2">Regístrate</p>
                                <div class="search-right">
                                    <a href="{{ route('register') }}" class="btn button-style-more" title="search">Registrate</a>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-6 col-md-4 features15-col-text">
                            <div class="features15-para">
                                <img src="assets/images/numero-2.png" alt="2" width="45px">
                                <p class="cp-text pb-4 pt-2">Buy your Cancun Smart Pass</p>
                                <div class="search-right">
                                    @if (Auth::check())
                                        <a href="{{ route('buy-pass') }}" class="btn button-style-more" title="search">I want it</a>
                                    @else
                                        <a href="{{ route('register') }}" class="btn button-style-more" title="search">I want it</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 features15-col-text">
                            <div class="features15-para">
                                <img src="assets/images/numero-3.png" alt="2" width="45">
                                <p class="cp-text pb-4 pt-2">Book your favorite activities </p>
                                <div class="search-right">
                                    @if (Auth::check())
                                        <a href="{{ route('actividades') }}" class="btn button-style-more" title="search">See activities</a>
                                    @else
                                        <a href="#login" class="btn button-style-more" title="search">See activities</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // Fin seccion como funciona-->
    <!-- //seccion de tours -->
    <section class="w3l-teams-32-main w3l-index-block4 container-fluid mb-5">
        <div class="features-bg">
            <div class="container">
                <div class="row">
                    <div class="title-main text-center mx-auto mb-md-4">
                        <h3 class="title-big" style="color: #DA0071; font-weight: bold">The best tours</h3>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    @foreach ($tours as $tour)
                        <div class="col-lg-4 mt-4">
                            <div class="column-19 feature-unit">
                                <div class="box">
                                    @if($tour->photos->count() === 1)
                                        <a href="tour/{{ $tour->url }}">
                                            <div class="ribbon ribbon-top-left"><span>${{ $tour->PRAD }} USD</span></div>
                                            {{-- <img class="img img-thumbnail-home" src="{{ $tour->photos->first()->url }}" alt="" > --}}
                                            <img class="img-primary" src="{{ $tour->photos->first()->url }}" alt="" >
                                            <div class="justify-content-end d-flex" >
                                                <img class="best-price" src="{{ asset('assets/images/best-price-guarantee-golden.png') }}" alt="">
                                            </div>
                                        </a>
                                    {{-- <div class="ribbon ribbon-bottom-right"><span>ribbon</span></div> --}}
                                    @endif
                                </div>
                                <p class="sm-text-10 m-2">{{ $tour->category->name ?? ""}}</p>
                                <h4 class="m-2 mb-3" style="font-weight: bold">{{ $tour->name }}</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/images/marcas_competencia.png') }}" alt="" style="width: 150px">
                                    </div>
                                    <div class="col-6">
                                        <div class="search-right pt-4">
                                            {{-- <span class="pt-2 price-dolar" >$59 USD</span><br> --}}
                                            <span class="pt-2 price-dolar" >${{ $tour->PRMD }} USD</span><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width: 110px" class="ml-2 p-2 pt-2">
                                    </div>
                                    <div class="col-6">
                                        <span class="price-discount p-2 pt-2">${{ $tour->PRAD }} USD</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- //Fin seccion de tours -->

    <!-- //seccion newsletter -->
    <section class="footer-suscription">
        <p class="suscription-title ">Subscribe to our newsletter</p>
        <form action="{{ route('newsletter') }}" class="suscription-form" method="POST">
            {{ csrf_field() }}

            <input type="email" name="email" placeholder="Enter your email" aria-label="Enter your email" class="input input-with-icon subscription-form_input">
            <span class="subscription-form_icon"></span>
            <button type="submit" class="btn btn_2 subscription-form_submit">Subscribe</button>
        </form>
        <p class="subscription-disclaimer">By clicking on the button, you accept the <a class="subscription-disclaimer-link" href="#" target="_blank">Privacy Policy</a> y <a class="subscription-disclaimer-link" href="{{ route('terminosycondiciones') }}" target="_blank">Terms and Conditions</a></p>
    </section>
    <!-- //Fin Seccion newsletter -->

@endsection
