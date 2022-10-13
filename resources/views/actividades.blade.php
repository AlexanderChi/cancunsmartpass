@extends('layouts.app')

@section('content')
    <section id="home" class="w3l-banner-act">
        <div class="cp-banner-content">
            <div class="container pt-5 pb-md-4">
                <div class="row align-items-center">
                    <div class="col-md-6 banner-left pt-md-0 pt-5 text-center">
                        <h3 class="mb-sm-4 mb-3 title ">
                            IN CANCUN THERE IS
                            <span class="text-js"> ALWAYS SOMETHING TO DO</span>
                        </h3>
                        <div class="mt-md-5 mt-4 mb-lg-0 mb-4">
                            <!--<a class="btn button-style" href="about.html"><i class="fas fa-circle-arrow-down"></i></a>-->
                            <a class="btn button-style-banner" href="about.html"><i class="fa-solid fa-arrow-down-long fa-2x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w3l-teams-32-main w3l-index-block4 container-fluid mb-5" style="background: #F4F2F2">
        <div class="features-bg">
            <div class="container">

                {{-- ACTIVIDADES DE DÍA COMPLETO--}}
                <div class="row">
                    <div class="col-md-8 title-main mx-auto m-5 mt-lg-5">
                        <h3 class="title-big" style="font-weight: bold; color: #DA0071">FULL-DAY ACTIVITIES</h3>
                    </div>
                    <div class="col-md-4 title-main text-center mx-auto m-5 mt-lg-5">
                        <a href="{{ route('diacompleto') }}" style="color: #DA0071; font-size: 2.4vh">VIEW ALL</a>
                    </div>

                    @foreach ($adc as $tour)
                            <div class="col-lg-4">
                                <div class="column-19  feature-unit">
                                    <a href="tour/{{ $tour->url }}">
                                        @if($tour->photos->count() === 1)
                                            {{-- <img class="img img-thumbnail-home" src="{{ $tour->photos->first()->url }}" alt=""> --}}
                                            <img class="img-fluid" src="{{ $tour->photos->first()->url }}" alt="">
                                        @endif
                                    </a>
                                    <p class="sm-text-10 m-2">{{ $tour->category->name ?? "" }}</p>
                                    <h4 class="m-2" style="font-weight: bold">{{ $tour->name }}</h4>
                                    <p class="m-2">$ {{ $tour->PRAD }} USD</p>
                                    <div class="m-2 py-3 justify-content-between d-flex">

                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                            {{-- <input type="submit" name="btn_tour" class="btn button-style" value="Agregar carrito"> --}}
                                            <button type="submit" name="btn_tour" class="btn btn-sm button-style ">
                                                <span class="material-symbols-outlined icon-button">add_shopping_cart</span>
                                                Add to cart
                                            </button>
                                        </form>
                                        {{-- <a href="#" class="btn button-style " title="Add cart">
                                            <span class="material-symbols-outlined icon-button">add_shopping_cart</span>
                                            Añadir
                                        </a> --}}
                                        <div class="">
                                            <a href="tour/{{ $tour->url }}" class="btn button-style-more">More details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>

                {{-- ACTIVIDADES DE MEDIO DÍA--}}

                <div class="row">
                    <div class="col-md-8 title-main mx-auto m-5 mt-lg-5">
                        <h3 class="title-big" style="font-weight: bold; color: #DA0071">HALF-DAY ACTIVITIES </h3>
                    </div>
                    <div class="col-md-4 title-main text-center mx-auto m-5 mt-lg-5">
                        <a href="{{ route('mediodia') }}" style="color: #DA0071; font-size: 2.4vh">VIEW ALL</a>
                    </div>
                    @foreach ($amd as $tour)

                        <div class="col-lg-4">
                            <div class="column-19  feature-unit">
                                <a href="tour/{{ $tour->url }}">
                                    @if($tour->photos->count() === 1)
                                        {{-- <img class="img img-thumbnail-home" src="{{ $tour->photos->first()->url }}" alt=""> --}}
                                        <img class="img-fluid" src="{{ $tour->photos->first()->url }}" alt="">
                                    @endif
                                    <p class="sm-text-10 m-2">{{ $tour->category->name ?? "" }}</p>
                                    <h4 class="m-2" style="font-weight: bold">{{ $tour->name }}</h4>
                                </a>
                                <div class="m-2 py-3 justify-content-between d-flex">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                        {{-- <input type="submit" name="btn_tour" class="btn button-style" value="Agregar carrito"> --}}
                                        <button type="submit" name="btn_tour" class="btn btn-sm button-style ">
                                            <span class="material-symbols-outlined icon-button">add_shopping_cart</span>
                                            Add to cart
                                        </button>
                                    </form>
                                    {{-- <a href="#" class="btn button-style " title="Add cart">
                                        <span class="material-symbols-outlined icon-button">add_shopping_cart</span>
                                        Añadir
                                    </a> --}}
                                    <div class="">
                                        <a href="tour/{{ $tour->url }}" class="btn button-style-more">More details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Actividades Nocturnas--}}

                <div class="row">
                    <div class="col-md-8 title-main mx-auto m-5 mt-lg-5">
                        <h3 class="title-big" style="font-weight: bold; color: #DA0071">EVENING ACTIVITIES</h3>
                    </div>
                    <div class="col-md-4 title-main text-center mx-auto m-5 mt-lg-5">
                        <a href="{{ route('nocturno') }}" style="color: #DA0071; font-size: 2.4vh; ">VIEW ALL</a>
                    </div>

                    @foreach ($an as $tour)
                        <div class="col-lg-4">
                            <div class="column-19  feature-unit">
                                <a href="tour/{{ $tour->url }}">
                                    @if($tour->photos->count() === 1)
                                        <img class="img-fluid" src="{{ $tour->photos->first()->url }}" alt="">
                                    @endif
                                    <p class="sm-text-10 m-2">{{ $tour->category->name ?? "" }}</p>
                                    <h4 class="m-2" style="font-weight: bold">{{ $tour->name }}</h4>
                                </a>
                                <div class="m-2 py-3 justify-content-between d-flex">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                        {{-- <input type="submit" name="btn_tour" class="btn button-style" value="Add to cart carrito"> --}}
                                        <button type="submit" name="btn_tour" class="btn btn-sm button-style ">
                                            <span class="material-symbols-outlined icon-button">add_shopping_cart</span>
                                            Add to cart
                                        </button>
                                    </form>
                                    <div class="">
                                        <a href="tour/{{ $tour->url }}" class="btn button-style-more">More details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

