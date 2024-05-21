<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome - 2207BYTBALLY</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('/img/tbally-logo.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('/img/tbally-logo.png') }}">

    <!-- ************************* CSS Files ************************* -->

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./zakas/assets/css/bootstrap.css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./zakas/assets/css/vendor.css">

    <!-- style css -->
    <link rel="stylesheet" href="./zakas/assets/css/main.css">

</head>

<body>

    <!-- Preloader Start -->
    <div class="zakas-preloader active">
        <div class="zakas-preloader-inner h-100 d-flex align-items-center justify-content-center">
            <div class="zakas-child zakas-bounce1"></div>
            <div class="zakas-child zakas-bounce2"></div>
            <div class="zakas-child zuka-bounce3"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Main Wrapper Start -->
    <div class="wrapper">
        <!-- Header Start -->
        <header class="header header-transparent">
            <div class="header-inner fixed-header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-9 col-3">
                            <nav class="main-navigation">
                                <div class="site-branding">
                                    <a href="index.html" class="logo">
                                        <figure class="logo--transparent">
                                            <img src="{{ asset('/img/tbally-logo.png') }}" alt="Logo">
                                        </figure>
                                        <figure class="logo--normal">
                                            <img src="{{ asset('/img/tbally-logo.png') }}" alt="Logo">
                                        </figure>
                                    </a>
                                </div>
                                <div class="mainmenu-nav d-none d-lg-block">
                                    <ul class="mainmenu white-color">
                                        <li class="mainmenu__item menu-item-has-children active">
                                            <a href="/" class="mainmenu__link">
                                                <span class="mm-text">Home</span>
                                            </a>
                                        </li>
                                        <li class="mainmenu__item menu-item-has-children">
                                            <a href="{{ route('shop') }}" class="mainmenu__link">
                                                <span class="mm-text">Shop</span>
                                            </a>
                                        </li>
                                        <li class="mainmenu__item menu-item-has-children">
                                            <a href="{{ route('story') }}" class="mainmenu__link">
                                                <span class="mm-text">Our Story</span>
                                            </a>
                                        </li>
                                        <li class="mainmenu__item menu-item-has-children">
                                            <a href="{{ route('login') }}" class="mainmenu__link">
                                                <span class="mm-text">Sign In</span>
                                            </a>
                                        </li>
                                        <li class="mainmenu__item">
                                            <a href="/contact" class="mainmenu__link">
                                                <span class="mm-text">Contact</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-9 text-end">
                            <ul class="header-toolbar white-color">
                                <li class="header-toolbar__item">
                                    <a href="wishlist.html" class="header-toolbar__btn">
                                        <i class="flaticon flaticon-like"></i>
                                    </a>
                                </li>
                                <li class="header-toolbar__item mini-cart-item">
                                    <a href="#miniCart" class="header-toolbar__btn toolbar-btn mini-cart-btn">
                                        <i class="flaticon flaticon-shopping-cart"></i>
                                        <sup class="mini-cart-count">2</sup>
                                    </a>
                                </li>
                                <li class="header-toolbar__item user-info">
                                    <a href="#" class="header-toolbar__btn">
                                        <i class="flaticon flaticon-user"></i>
                                    </a>
                                    <ul class="user-info-menu">
                                        <li>
                                            <a href="my-account.html">My Account</a>
                                        </li>
                                        <li>
                                            <a href="cart.html">Shopping Cart</a>
                                        </li>
                                        <li>
                                            <a href="checkout.html">Check Out</a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html">Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="order-tracking.html">Order tracking</a>
                                        </li>
                                        <li>
                                            <a href="compare.html">compare</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="header-toolbar__item">
                                    <a href="#searchForm" class="header-toolbar__btn toolbar-btn">
                                        <i class="flaticon flaticon-search"></i>
                                    </a>
                                </li>
                                <li class="header-toolbar__item d-lg-none">
                                    <a href="#" class="header-toolbar__btn menu-btn">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-menu white-color"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->

        @include('partials.success')
        @include('partials.errors')
        @yield('content')

        <!-- Footer Start-->
        <footer class="footer">
            <div class="footer-top ptb--50">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 text-center">
                            <div class="footer-widget mb--50">
                                <div class="textwidget">
                                    <img src="{{ asset('/img/tbally-logo.png') }}" alt="Logo">
                                </div>
                            </div>
                            <div class="footer-widget mb--50 pb--1">
                                <ul class="footer-menu">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Terms &amp; Conditions</a></li>
                                    <li><a href="#">Policy</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="footer-widget">
                                <!-- Social Icons Start Here -->
                                <ul class="social">
                                    <li class="social__item">
                                        <a href="#" target="_blank" rel="noopener"
                                            class="social__link google-plus">
                                            <span>Instagram</span>
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="#" target="_blank" rel="noopener"
                                            class="social__link facebook">
                                            <span>Facebook</span>
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="#" target="_blank" rel="noopener"
                                            class="social__link pinterest">
                                            <span>LinkedIn</span>
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="#" target="_blank" rel="noopener"
                                            class="social__link twitter">
                                            <span>twitter</span>
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Social Icons End Here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom border-top ptb--25">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-sm-6 text-sm-start text-center mb-xs--10">
                            <p class="copyright-text"> Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This site was created by<a
                                    href="https://ftsl-ng.com" target="_blank"> Flyte Technologies and Solutions
                                    LTD</a>
                            </p>
                        </div>
                        <div class="col-sm-6 text-sm-end text-center">
                            <figure>
                                <img src="./zakas/assets/img/others/payment.png" alt="payment">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End-->
    </div>

    <!-- ************************* JS Files ************************* -->
    <!-- jQuery JS -->
    <script src="./zakas/assets/js/vendor.js"></script>
    <!-- Main JS -->
    <script src="./zakas/assets/js/main.js"></script>
</body>

</html>
