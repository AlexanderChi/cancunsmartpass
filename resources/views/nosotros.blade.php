@extends('layouts.app')

@section('content')
{{-- <section id="home" class="w3l-banner py-5">
    <div class="container pt-5 pb-md-4">
        <div class="row align-items-center">
            // seccion para el video
        </div>
    </div>
</section> --}}
<!-- about section -->
    <section class="w3l-text-6 py-5" id="about">
        <div class="text-6-mian py-md-4 py-3">
            <div class="container">
                <div class="row top-cont-grid align-items-center">
                    <div class="col-lg-6 text-6-info mb-lg-0 mb-4 pl-lg-5">
                        <h6>Who are we?</h6>
                        <h2 class="title-big">Who are we?</h2>
                        <p>We are the digital pass that allows you to enjoy the most popular tours in the Mexican Caribbean with up to 70% discount.
                            <br><strong>¡Enjoy your vacations, saving money!</strong>
                        </p>
                    </div>
                    <div class="col-lg-6 left-img pr-lg-4">
                        <img src="{{ asset('assets/images/cancunsmartpass.png') }}" alt="" class="img-responsive img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //about section -->
<div class="w3l-index-block4">
    <div class="container-fluid" style="background: var(--gray);  height: 500px;">
        <div class="container">
            <div class="features15-col-text">
                <div class="title-main text-center mx-auto ">
                    <h3 class="title-big pt-5" style="font-weight: 600">OUR OBJECTIVE</h3>

                    <p class="cp-text m-4" style="text-align: justify">Our commitment is to provide you with the best high quality service at the best price, the ideal mix to enjoy Cancun and the Riviera Maya. We are committed to provide you with moments of fun and entertainment through our wide range of activities. Generating unforgettable moments of fun and entertainment for all our visitors through unique experiences.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="w3l-teams-32-main w3l-index-block4 text-center">
    <div class="features-bg">
        <div class="container">
            <div class="col-lg-12 features15-col-text">
                <div class="title-main text-center mx-auto mb-md-4 pt-5">
                    <h3 class="title-big" >How do I get my digital pass?</h3>
                    <hr>
                </div>
                <div class="row text-center">
                    <div class="col-md-12 text-left">
                        <div class=" " style="padding: 0rem 1rem">
                            <div class="card-body" style="display: inline-flex;">
                                <img src="{{ asset('assets/images/numero-1.png') }}" alt="" style="width: 35px">
                                <p class="ml-4">Register for an account. If you have an account, log in.
                                </p>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class=" " style="padding: 0rem 1rem">
                                <div class="card-body" style="display: inline-flex;">
                                    <img src="{{ asset('assets/images/numero-2.png') }}" alt="" style="width: 35px">
                                    <p class="ml-4">Click on the button <strong>"Buy my Cancun Smart Pass"</strong> to purchase your Cancun Smart Pass.</p><br>
                                    <p> Add an extra person for only $9.99 USD</p>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class=" " style="padding: 0rem 1rem">
                                <div class="card-body" style="display: inline-flex;">
                                    <img src="{{ asset('assets/images/numero-3.png') }}" alt="" style="width: 35px">
                                    <p class="ml-4">Enter your personal information and select your payment method.</p>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class=" " style="padding: 0rem 1rem">
                                <div class="card-body" style="display: inline-flex;">
                                    <img src="{{ asset('assets/images/numero-3.png') }}" alt="" style="width: 35px">
                                    <p class="ml-4">Youre done! Now enjoy your Cancun Smart Pass benefits.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="w3l-index-block4 pb-5">
    <div class="features-bg pb-lg-5 pt-lg-4 py-4">
        <div class="container">
            {{-- <div class=" features15-col-text">
                <div class="title-main text-center mx-auto mb-md-4">
                    <h3 class="title-big">LO QUE DICEN NUESTROS CLIENTES</h3>
                    <hr>
                </div>
                <div class=" swiper" style="display: flex; align-items:center; justify-content:center">
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">
                            <div class="card swiper-slide" >
                                <div class="image-content">
                                    <span class="overlay"></span>

                                    <div class="card-image">
                                        <img src="{{ asset('admin/img/avatar.png') }}" alt="" class="card-img">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <h3 class="name">Alexander Chi</h3>
                                    <p class="description">Mi mejor experiencia fue maravilllosa, me divertí mucho con
                                        toda mi familia al mejor costo.</p>
                                </div>
                            </div>
                            <div class="card swiper-slide" style="width: 18rem;">
                                <div class="image-content">
                                    <span class="overlay"></span>

                                    <div class="card-image">
                                        <img src="{{ asset('admin/img/avatar.png') }}" alt="" class="card-img">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <h2 class="name">Alexander Chi</h2>
                                    <p class="description">Mi mejor experiencia fue maravilllosa, me divertí mucho con
                                        toda mi familia al mejor costo.</p>
                                </div>
                            </div>
                            <div class="card swiper-slide" style="width: 18rem;">
                                <div class="image-content">
                                    <span class="overlay"></span>

                                    <div class="card-image">
                                        <img src="{{ asset('admin/img/avatar.png') }}" alt="" class="card-img">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <h2 class="name">Alexander Chi</h2>
                                    <p class="description">Mi mejor experiencia fue maravilllosa, me divertí mucho con
                                        toda mi familia al mejor costo.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-button-next swiper-navBtn"></div>
                    <div class="swiper-button-prev swiper-navBtn"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
