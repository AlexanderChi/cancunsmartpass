@extends('layouts.app')

@section('content')
<section id="home" class="w3l-banner-an">
    <div class="cp-banner-content">
        <div class="container">
            <div class="align-items-center">
                <div class="col-lg-12 banner-left text-center">
                    <h3 class="mb-sm-4 mb-3 title">
                        EVENING ACTIVITIES
                    </h3>

                    <div class="mt-md-5 mt-4 mb-lg-0 mb-4">
                        <!--<a class="btn button-style" href="about.html"><i class="fas fa-circle-arrow-down"></i></a>-->
                        <a class="btn button-style-banner" href="#includes">
                            <i class="fa-solid fa-arrow-down-long fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="background-color: #F4F2F2;">
    <div class="container pt-5">
        <div class="row pb-4">
            <div class="col-lg-6">
                {{-- <div class="search-right">
                    <a href="#" class="btn btn-light mr-4" title="search">Precio</a>
                    <a href="#" class="btn btn-light" title="search">Nombre</a>
                </div> --}}
            </div>
            <div class="col-lg-6">

            </div>
        </div>
        <hr>
        @foreach ($tours as $tour)
        <div class="card mb-3" id="includes">
            <div class="row ">
                <div class="col-md-4">
                    @if($tour->photos->count() === 1)
                        <img class="img-fluid" src="{{ $tour->photos->first()->url }}" alt="" style="border-radius:23px">
                    @endif
                </div>
                <div class="col-md-7">
                    <div class="card-body ml-4">
                        <h5 class="card-title pt-5" style="font-weight: bold; margin-bottom: 1.75rem;
                        font-size: 2rem;">{{ $tour->name }}</h5>
                        <div class="content pt-2">
                            <div class="box-price">
                                <p class="card-text title">Adults:</p>
                                <p class="card-text title">Menor:</p>
                            </div>
                        </div>
                        <div class="box-price">
                            <span class="price-dolar ">US$ 70</span>
                            <span class="price-dolar">US$ 40</span>
                        </div>
                        <div class="box-price">
                            <span class="price-discount">US$ {{ $tour->PRAD }}</span>
                            <span class="price-discount">US$ {{ $tour->PRMD }}</span>
                        </div>
                        <div class="pt-4">
                            <a href="tour/{{ $tour->url }}" class="btn button-style-more btn-sm" title="search">More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <a href="/#">
                        <div class="card-body card-btn">
                            <img src="{{ asset('assets/images/maleta-blanco.png') }}" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" style="width: 35px">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
