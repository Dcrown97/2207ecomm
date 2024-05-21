<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('/frontend/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('/frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/main.css') }}">
    <style>

        .header_area .navbar .nav .nav-item:hover .nav-link, .header_area .navbar .nav .nav-item.active .nav-link {
            color: #bb9354 !important;
        }
        .cart-icon {
            font-size: 0.6em !important;
            line-height: 1em !important;
            background: #bb9354 !important;
            vertical-align: middle !important;
            margin-bottom: 2em !important;
        }
        .currency {
            position: fixed;
            z-index: 1000000000;
            bottom: 30%;
            right: 0;
            color: #fff;
            background-color: #a58043;
            border-color: #ffffff;
            font-size: 0.8rem;
            border-radius: 0;
        }
        .currency:hover {
            background-color: #a58859;
            color: #fff;
            border-color: #ffffff;
        }
    </style>
    @yield('style')
</head>

<body>

<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/"><img src="{{ asset('/img/tbally-logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item  @yield('home')"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item @yield('shop')"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
                        <li class="nav-item @yield('story')"><a class="nav-link" href="{{ route('story') }}">Our Story</a></li>
                        <li class="nav-item @yield('login')"><a href="{{ route('login') }}" class="nav-link">Sign In</a></li>
                        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item @yield('cart')">
                            <a href="/cart" class="cart">
                                <span class="ti-bag"></span>
                                @if(\Illuminate\Support\Facades\Auth::user() != null)
                                    @if(\Illuminate\Support\Facades\Auth::user()->carts->isNotEmpty())
                                        <span class="badge cart-icon">{{ Auth::user()->carts->count() }}</span>
                                    @endif
                                @else
                                    @if(\Illuminate\Support\Facades\Session::has('cart'))
                                    <span class="badge cart-icon">{{ count(Session::get('cart')) }}</span>
                                    @endif
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
{{--    <div class="search_input" id="search_input_box">--}}
{{--        <div class="container">--}}
{{--            <form class="d-flex justify-content-between">--}}
{{--                <input type="text" class="form-control" id="search_input" placeholder="Search Here">--}}
{{--                <button type="submit" class="btn"></button>--}}
{{--                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
</header>
<!-- End Header Area -->
@include('partials.success')
@include('partials.errors')
@yield('content')


<!-- start footer Area -->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>
                        2207bytbally is a women’s fashion retailer founded by Tolu Bally in November 2016.
                        2207bytbally is known for its signature bold approach to colours, form-fitting tailored pieces, simple and yet classy fashion.

                        The designs are youthful, colourful and versatile, making the outfits wearable for women with a busy and active lifestyle.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-5 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site was created by<a href="https://ftsl-ng.com" target="_blank"> Flyte Technologies and Solutions LTD</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</footer>
<div class="toast" id="toast_alert" role="alert" aria-live="assertive" aria-atomic="true"></div>
<style>
    .toast {
        position: fixed;
        z-index: 100000000000;
        bottom: 2%;
        left: 2%;
        padding: 1em;
        background: #faf9ff;
        border-radius: 8px;
        max-height: 100px;
    }
    .currency-list {
        background-color: #a58043;
        text-align: center;
        text-transform: uppercase;
    }
    .currency-list > li{
        color: #fff;
        border-bottom: 1px solid #fff;
    }
    .currency-list > li:hover{
        background-color: #fff;
        border-bottom: 1px solid #a58043;
        color: #a58043;
    }
    .currency-list > li a{
        color: #fff;
    }
    .currency-list > li:hover a{
        color: #a58043;
    }
    .currency-list > li a:hover, .currency-list > .active {
        color: #a58043;
    }
   .currency-list .active {
       background-color: #fff;
    }
   .currency-list > .active a {
        color: #a58043
    }
</style>
<a href="/" class="btn btn-xs currency" data-toggle="modal" data-target="#setCur">@if(session('currency') == 'Naira') NGN @else USD @endif</a>
<!-- /.add product -->
<div class="modal fade" id="setCur">
    <div class="modal-dialog modal-sm">
        <!-- form start -->
        <div class="modal-content">
            <ul class="currency-list">
                <li>Select Currency</li>
                <li @if(session('currency') == 'Naira') class="active" @endif><a href="{{ route('currency', 'ngn') }}">Nigerian Niara (NGN)</a></li>
                <li @if(session('currency') != 'Naira') class="active" @endif><a href="{{ route('currency', 'dol') }}" >US DOLLARS (USD)</a></li>
            </ul>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End footer Area -->

<script src="{{ asset('/frontend/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="{{ asset('/frontend/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('/frontend/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('/frontend/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('/frontend/js/nouislider.min.js') }}"></script>
<script src="{{ asset('/frontend/js/countdown.js') }}"></script>
<script src="{{ asset('/frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/frontend/js/owl.carousel.min.js') }}"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.map_api_key') }}"></script>
<script src="{{ asset('/frontend/js/gmaps.min.js') }}"></script>
<script src="{{ asset('/frontend/js/main.js') }}"></script>

@yield('script')
<script type="text/javascript">
    function ajax() {
        $.ajax({
            type: 'GET',
            url: '{{ route('pop') }}',
            complete: function( response ) {
                if(response.status === 200){
                    $('#toast_alert').html(response.responseJSON.html).show();
                    setTimeout(function() { $("#toast_alert").hide(); }, 10000);
                }
            }
        });
    };

    var ajax_call = ajax();

    var interval = 1000 * 60; // where X is your every X minutes

    setInterval(ajax, 60000);
    $(window).load(function() {
        ajax();
    });
</script>
</body>

</html>
