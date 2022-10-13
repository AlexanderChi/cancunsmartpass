<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('meta-title', config('app.name') . " | Pase a descuentos")</title>
    <meta name="description" content="@yield('meta-description', 'Con tu pase tendrás acceso a descuentos')">
    <link rel="shortcut icon" href="{{ asset('assets/icons/icono-logo.svg') }}" type="image/x-icon">
    <!-- google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @stack('styles')
    <!-- //google-fonts -->
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-starter.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <script src="https://kit.fontawesome.com/8d51d095c7.js" crossorigin="anonymous"></script>
</head>
<body>
<!--header-->
<header id="site-header" class="fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg stroke">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('assets/images/logo_brand.png') }}" alt="Your logo" title="Your logo" />
            </a>
            <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-lg-auto">
                    @guest
                        <li class="nav-item {{ request()->is('nosotros') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('nosotros') }}">About us</a>
                        </li>
                        <li class="search-right">
                            <a href="#login" class="btn button-style" title="login">{{ __('Login') }}</a>
                            <div id="login" class="pop-overlay">
                                <div class="popup">
                                    <div class="container-login">
                                        <div class="">
                                            <div class="form login">
                                                <span class="title-lg">Login</span>

                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf

                                                    <div class="input-field">
                                                        <input id="email"
                                                            type="email"
                                                            name="email"
                                                            class="password @error('email') is-invalid @enderror"
                                                            placeholder="Enter your password"
                                                            value="{{ old('email') }}"
                                                            required
                                                            autocomplete="email"
                                                            autofocus>
                                                        <i class="uil uil-envelope icon"></i>

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="input-field">
                                                        <input id="password"
                                                            type="password"
                                                            name="password"
                                                            class="password @error('password') is-invalid @enderror"
                                                            placeholder="Enter your password"
                                                            required
                                                            autocomplete="email"
                                                            autofocus>
                                                        <i class="uil uil-lock icon"></i>
                                                        <i class="uil uil-eye-slash showHidePw"></i>

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="checkbox-text ">
                                                        <div class="checkbox-content">
                                                            <input type="checkbox"
                                                            id="remember"
                                                            name="remember"
                                                            {{ old('remember') ? 'checked' : '' }}>
                                                            <label for="remember" class="text">{{ __('Remember Me') }}</label>
                                                        </div>

                                                        @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}" class="text">{{ __('Forgot Your Password?') }}</a>
                                                        @endif
                                                    </div>
                                                    <div class="input-field button">
                                                        <button class="button-cmp" type="submit">{{ __('Login') }}</button><br>
                                                        {{-- <input type="button" value="{{ __('Login') }}"> --}}
                                                    </div>
                                                </form>

                                                <div class="login-signup">
                                                    <span class="text"> Not a memer?
                                                        <a href="{{ route('register') }}" class="text signup-link">Register Now</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="close" href="#close">×</a>
                            </div>
                            <!-- //end login -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/images/mexico.png') }}" alt="Estados Unidos" width="25">
                                EN
                            </a>
                        </li>

                    @else

                        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('index') }}"><i class="uil uil-estate"></i></a>
                        </li>
                        <li class="nav-item {{ request()->is('nosotros') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('nosotros') }}">About us</a>
                        </li>
                        <li class="nav-item {{ request()->is('actividades') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('actividades') }}">Activities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link position-relative " href="{{ route('cart.checkout') }}" style="padding-top: 7px;" id="cart-btn">
                                <span class="material-symbols-outlined">
                                    shopping_cart
                                </span>
                                @if(count(Cart::getContent()))
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="color: #f2f2f2">
                                        {{ count(Cart::getContent()) }}
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/images/mexico.png') }}" alt="Estados Unidos" width="25">
                                EN
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="uil uil-sign-out-alt"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        {{-- Carrito de compra --}}
        {{-- <div class="shopping-cart">
            <div class="box-cart">
                <i class="fas fa-trash"></i>
                <img src="{{ asset('assets/images/team1.jpg') }}" alt="">
                <div class="content">
                    <h6>Titluto de Tour</h6>
                    <span class="price">US $90.00</span>
                </div>
            </div>
            <div class="box-cart">
                <i class="fas fa-trash"></i>
                <img src="{{ asset('assets/images/team1.jpg') }}" alt="">
                <div class="content">
                    <h6>Pueblo Mágico Izamal + Cenote Yokdzonot + Tsukán</h6>
                    <span class="price">US $90.00</span>
                </div>
            </div>
            <div class="box-cart">
                <i class="fas fa-trash"></i>
                <img src="{{ asset('assets/images/team1.jpg') }}" alt="">
                <div class="content">
                    <h6>Pueblo Mágico Izamal + Cenote Yokdzonot + Tsukán</h6>
                    <span class="price">US $90.00</span>
                </div>
            </div>
            <a href="#" class="btn-cart" >Ir al carrito</a>
        </div> --}}
    </div>
</header>
<!--//header-->
<!--Content-->
<div>
    {{-- @if (isset($errors) && $errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success">
            <ul>
                @foreach (session()->get('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    @yield('content')
</div>

<!--//Content-->
<!-- footer -->
<footer class="w3l-footer-22 position-relative">
    <div class="footer-sub">
        <div class="container">
            <div class="text-txt">
                <div class="row sub-columns">
                    <div class="col-lg-3 col-md-6 col-sm-8 sub-one-left">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('assets/images/logo_brand.png') }}" alt="" class="p-3">
                        </a>
                        <p>Discover more on our social networks:</p>
                        <div class="pt-2">
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/CancunSmartPass/" target="_blanck">
                                        <span class="fa-brands fa-facebook" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.tiktok.com/@cancunsmartpass" target="_blanck">
                                        <span class="fa-brands fa-tiktok" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/cancunsmartpass/" target="_blanck">
                                        <span class="fa-brands fa-instagram" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://api.whatsapp.com/send?phone=9982405281" target="_blanck">
                                        <span class="fa-brands fa-whatsapp" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCyGM_GpMVRZeTdrnsHdl_wQ/videos" target="_blanck">
                                        <span class="fa-brands fa-youtube" aria-hidden="true"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="pt-2">
                            <h6 class="pt-2">Payment methods</h6>
                            <div class="pt-1">
                                <ul class="social-payment">
                                    <li><a><i class="fa-brands fa-cc-visa fa-2x"></i></span></a></li>
                                    <li><a><span class="fa-brands fa-cc-mastercard fa-2x pl-2" aria-hidden="true"></span></a></li>
                                    <li><a><span class="fa-brands fa-cc-amex fa-2x pl-2" aria-hidden="true"></span></a></li>
                                    <li><a><span class="fa fa-cc-discover fa-2x pl-2" aria-hidden="true"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 sub-two-right pl-lg-5 mt-lg-0 mt-sm-5 mt-4">
                        <h6>Contact </h6>
                        <div class="column2">
                            <div class="href1">
                                <span class="fa fa-envelope-o" aria-hidden="true"></span>
                                <a href="mailto:info@cancun-pass.com">info@cancun-pass.com</a>
                            </div>
                            <div class="href1">
                                <span class="fa fa-whatsapp" aria-hidden="true"></span>
                                <a href="https://api.whatsapp.com/send?phone=+529982405281&text=Quiero%20informacion%20para%20Cancun%20Smart%20Pass" target="_blank">+52 (998) 240 5281</a>
                            </div>
                            <div class="href1">
                                <span class="fa fa-phone" aria-hidden="true"></span>
                                <a href="tel:+529983217884">+52 (998) 321 7884</a>
                            </div>
                            <div class="href1">
                                <span class="fa fa-phone" aria-hidden="true"></span>
                                <a href="tel:+529988840547">+52 (998) 884 0547</a>
                                <p class="contact-para">
                                    <a href="{{ route('nosotros') }}">¿Quiénes somos?</a>
                                </p>
                                <p class="contact-para">
                                    <a href="{{ route('faq') }}"> <strong>Frequently Asked Questions</strong> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 sub-two-right pl-lg-5 mt-lg-0 mt-sm-5 mt-4">
                        <img class="pb-2 img-footer" src="{{ asset('assets/icons/sectur.svg') }}" alt="">
                        <img class="pb-2 img-footer" src="{{ asset('assets/icons/Tripadvisor.svg') }}" alt="">
                        <div class="row">
                            <div class="col-md-12">
                                <img class="img-footer-travels" src="{{ asset('assets/images/SafeTravels@4x.png') }}" alt="">
                                <img class="img-footer-ssl" src="{{ asset('assets/images/SSL-Secure-Connection.png') }}" alt="">
                            </div>

                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-sm-6 sub-two-right mt-lg-0 mt-sm-5 mt-4"> --}}
                    <div class="col-lg-3 col-sm-6 sub-two-right pl-lg-5 mt-lg-0 mt-sm-5 mt-4">
                        <div id="TA_cdswritereviewlgvi648" class="TA_cdswritereviewlgvi">
                            <ul id="xIqkm9nodG" class="TA_links EDL7qARTIWno">
                                <li id="zjkiNMmBPMtJ" class="IkQR2ls60">
                                    <a target="_blank" href="https://www.tripadvisor.com/"><img src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_lockup_horizontal_secondary_registered.svg" alt="TripAdvisor"/></a>
                                </li>
                            </ul>
                        </div>
                        <script async src="https://www.jscache.com/wejs?wtype=cdswritereviewlgvi&amp;uniq=648&amp;locationId=23995141&amp;lang=en_US&amp;lang=en_US&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
                    </div>
                </div>
                <div class="footer_border pb-2 pt-3"></div>
                <!-- copyright -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-8 sub-one-left">
                        <div class="copyright-footer text-center">
                            <div class="container">
                                <div class="columns">
                                    <p><a href="#">Privacy Policy</a> | <a href="{{ route('terminosycondiciones') }}" target="_blank">Terms and Conditions</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-8 sub-one-left">
                        <div class="copyright-footer text-center">
                            <div class="container">
                                <div class="columns">
                                    <p>@2022 All rights reserved.<a href="https://cancun-pass.com/"
                                            target="_blank"> CancunSmartPass</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //copyright -->
            </div>
        </div>
    </div>
</footer>
<!-- //footer -->

<!-- //Js scripts -->
<!-- //move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
    <span class="fa fa-level-up" aria-hidden="true"></span>
</button>

<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
        } else {
            document.getElementById("movetop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<!-- //move top -->

<!-- //common jquery plugin -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- //common jquery plugin -->
<script>
    function autoType(elementClass, typingSpeed) {
        var thhis = $(elementClass);
        thhis.css({
            "position": "relative",
            "display": "inline-block"
        });
        thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
        thhis = thhis.find(".text-js");
        var text = thhis.text().trim().split('');
        var amntOfChars = text.length;
        var newString = "";
        thhis.text("|");
        setTimeout(function () {
            thhis.css("opacity", 1);
            thhis.prev().removeAttr("style");
            thhis.text("");
            for (var i = 0; i < amntOfChars; i++) {
                (function (i, char) {
                    setTimeout(function () {
                        newString += char;
                        thhis.text(newString);
                    }, i * typingSpeed);
                })(i + 1, text[i]);
            }
        }, 1500);
    }

    $(document).ready(function () {
        // Now to start autoTyping just call the autoType function with the
        // class of outer div
        // The second paramter is the speed between each letter is typed.
        autoType(".type-js", 200);
    });
</script>
<!-- //theme switch js (light and dark)-->

<!-- //magnific popup -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

        $('.popup-with-move-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
        });
    });
</script>
<!-- //magnific popup -->

<!-- //MENU-JS -->
<script>
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });
</script>
<!-- //MENU-JS -->

<!-- //for testimonials carousel -->
<script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
<!-- //disable body scroll which navbar is in active -->
<script>
    $(function () {
        $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
        })
    });
</script>
<!-- //disable body scroll which navbar is in active -->
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/cancunpass.js') }}"></script>
<script>
    var swiper = new Swiper(".slide-content", {
        slidesPerView: 3,
        spaceBetween: 15,
        loop: true,
        centerSlide: true,
        fade: true,
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        breakpoints:{
            0: {
                slidesPerView: 1,
            },
            520: {
                slidesPerView: 2,
            },
            950: {
                slidesPerView: 3,
            },
        },
    });
</script>
<script src="{{ asset('assets/js/cart.js') }}"></script>
<!--bootstrap-->
@stack('scripts')
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- //bootstrap-->

<!-- //Js scripts -->
</body>

</html>
