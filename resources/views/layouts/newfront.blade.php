<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome - 2207BYTBALLY</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('/img/bytbally.jpeg') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('/img/bytbally.jpeg') }}">

    <!-- ************************* CSS Files ************************* -->

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./zakas/assets/css/bootstrap.css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./zakas/assets/css/vendor.css">

    <!-- style css -->
    <link rel="stylesheet" href="./zakas/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <style>
        @media (max-width: 767px) {
            .mobile-style {
                margin-left: 120px;
            }
        }
    </style>

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
                                    <a href="/" class="logo">
                                        <figure class="logo--transparent">
                                            <img src="{{ asset('/img/bytbally.jpeg') }}" class="d-none d-lg-block"
                                                style="height: 40px; border-radius:10px; margin:10px" alt="Logo">
                                        </figure>
                                        <figure class="logo--normal">
                                            <img src="{{ asset('/img/bytbally.jpeg') }}" class="d-none d-lg-block"
                                                style="height: 40px" alt="Logo">
                                        </figure>
                                    </a>
                                </div>
                                <div class="mainmenu-nav d-none d-lg-block">
                                    <ul class="mainmenu white-color">
                                        <li class="mainmenu__item menu-item-has-children">
                                            <a href="{{ route('shop') }}" class="mainmenu__link">
                                                <span class="mm-text">Shop All</span>
                                            </a>
                                        </li>
                                        {{-- @if ($allcategories->isNotEmpty())
                                            @foreach ($allcategories as $cat)
                                                <li class="mainmenu__item menu-item-has-children">
                                                    <a href="/shop?cat={{ $cat->name }}" class="mainmenu__link">
                                                        <span class="mm-text">{{ $cat->name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif --}}

                                        {{-- <li class="mainmenu__item menu-item-has-children active">
                                            <a href="index.html" class="mainmenu__link">
                                                <span class="mm-text">Product Categories</span>
                                            </a>
                                            <ul class="megamenu two-column">
                                                <li>
                                                    <ul>
                                                        @if ($allcategories->isNotEmpty())
                                                            @foreach ($allcategories as $cat)
                                                                <li>
                                                                    <a href="/shop?cat={{ $cat->name }}">
                                                                        <span class="mm-text">{{ $cat->name }}</span>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li> --}}

                                        <li class="mainmenu__item menu-item-has-children">
                                            <a href="shop.html" class="mainmenu__link">
                                                <span class="mm-text">Shop</span>
                                            </a>
                                            <ul class="megamenu col-lg-12 row" style="width: 90rem">
                                                @if ($allcategories->isNotEmpty())
                                                    @foreach ($allcategories as $cat)
                                                        <li class="col-lg-3 menu-item-has-children">
                                                            <a class="megamenu-title" href="#">
                                                                <span class="mm-text">{{ $cat->name }}</span>
                                                            </a>
                                                            <ul>
                                                                @foreach ($cat->products as $product)
                                                                    <li>
                                                                        <a href="shop-fullwidth.html">
                                                                            <span
                                                                                class="mm-text">{{ $product->name }}</span>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            <hr>
                                                        </li>
                                                        {{-- </div> --}}
                                                    @endforeach
                                                    {{-- </div> --}}
                                                @endif
                                                {{-- <li>
                                                    <a class="megamenu-title" href="#">
                                                        <span class="mm-text">Shop List</span>
                                                    </a>
                                                    <ul>
                                                        <li>
                                                            <a href="shop-list.html">
                                                                <span class="mm-text">Full Width</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-list-sidebar.html">
                                                                <span class="mm-text">Left Sidebar</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-list-right-sidebar.html">
                                                                <span class="mm-text">Right Sidebar</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a class="megamenu-title" href="#">
                                                        <span class="mm-text">Product Details</span>
                                                    </a>
                                                    <ul>
                                                        <li>
                                                            <a href="product-details.html">
                                                                <span class="mm-text">Tab Style 1</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-tab-style-2.html">
                                                                <span class="mm-text">Tab Style 2</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-tab-style-3.html">
                                                                <span class="mm-text">Tab Style 3</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-gallery-left.html">
                                                                <span class="mm-text">Gallery Left</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-gallery-right.html">
                                                                <span class="mm-text">Gallery Right</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-sticky-left.html">
                                                                <span class="mm-text">Sticky Left</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a class="megamenu-title" href="#">
                                                        <span class="mm-text">Product Details</span>
                                                    </a>
                                                    <ul>
                                                        <li>
                                                            <a href="product-details-sticky-right.html">
                                                                <span class="mm-text">Sticky Right</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-slider-box.html">
                                                                <span class="mm-text">Slider Box</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-slider-full-width.html">
                                                                <span class="mm-text">Slider Box Full Width</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-affiliate.html">
                                                                <span class="mm-text">Affiliate Proudct</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-variable.html">
                                                                <span class="mm-text">Variable Proudct</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="product-details-group.html">
                                                                <span class="mm-text">Group Product</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li> --}}
                                            </ul>
                                        </li>

                                        <li class="mainmenu__item menu-item-has-children">
                                            <a href="/contact" class="mainmenu__link">
                                                <span class="mm-text">Custom Outfit</span>
                                            </a>
                                        </li>
                                        <li class="mainmenu__item menu-item-has-children">
                                            <a href="#" class="mainmenu__link">
                                                <span class="mm-text">Sales</span>
                                            </a>
                                        </li>
                                        <li class="mainmenu__item menu-item-has-children">
                                            <a href="#" class="mainmenu__link">
                                                <span class="mm-text">Information & Help</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="#">
                                                        <span class="mm-text">Appointment and services </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/contact">
                                                        <span class="mm-text">Customer Service </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('story') }}">
                                                        <span class="mm-text">About us </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-9 text-end mobile-style">
                            <ul class="header-toolbar white-color">
                                <li class="header-toolbar__item">
                                    <a href="/wishlist" class="header-toolbar__btn">
                                        <i id="flaticon-like" class="flaticon flaticon-like"></i>
                                    </a>
                                </li>
                                <li class="header-toolbar__item mini-cart-item">
                                    {{-- <a href="#miniCart" class="header-toolbar__btn toolbar-btn mini-cart-btn">
                                        <i class="flaticon flaticon-shopping-cart"></i>
                                        <sup class="mini-cart-count">2</sup>
                                    </a> --}}
                                    <a href="/cart" onclick="window.location='/cart' "
                                        class="header-toolbar__btn toolbar-btn mini-cart-btn">
                                        <i class="flaticon flaticon-shopping-cart"></i>
                                        @if (Auth::check())
                                            @if (\Illuminate\Support\Facades\Auth::user()->carts->isNotEmpty())
                                                <sup id="mini-cart-count"
                                                    class="mini-cart-count">{{ Auth::user()->carts->count() }}</sup>
                                            @endif
                                        @else
                                            @if (\Illuminate\Support\Facades\Session::has('cart'))
                                                <sup id="mini-cart-count"
                                                    class="mini-cart-count">{{ count(Session::get('cart')) }}</sup>
                                            @else
                                                <sup id="mini-cart-count" class="mini-cart-count">0</sup>
                                            @endif
                                        @endif

                                    </a>
                                </li>
                                <li class="header-toolbar__item user-info">
                                    <a href="#" class="header-toolbar__btn">
                                        <i class="flaticon flaticon-user"></i>
                                    </a>
                                    <ul class="user-info-menu">
                                        <li>
                                            <a href="#">My Account</a>
                                        </li>
                                        <li>
                                            <a href="/cart">Shopping Cart</a>
                                        </li>
                                        <li>
                                            <a href="checkout.html">Check Out</a>
                                        </li>
                                        <li>
                                            <a href="/wishlist">Wishlist</a>
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
                                        {{-- <i class="flaticon flaticon-search"></i> --}}
                                        @if (session('currency') == 'Naira')
                                            {{-- <i class="fa fa-naira"></i> --}}
                                            {{-- <i class="fa-solid fa-naira-sign"></i> --}}
                                            <i class="fa fa-money"></i>
                                        @else
                                            <i class="fa fa-dollar"></i>
                                        @endif
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

        <!-- Searchform Popup Start -->
        <div class="searchform__popup" id="searchForm">
            <a href="#" class="btn-close"><i class="flaticon flaticon-cross"></i></a>
            <div class="searchform__body">
                <form class="searchform">
                    <ul class="currency-list">
                        <li>Select Currency</li>
                        <hr>
                        <hr>
                        <li @if (session('currency') == 'Naira') class="active" @endif><a
                                href="{{ route('currency', 'ngn') }}" style="color: blue">Nigerian Niara (NGN)</a>
                        </li>
                        <hr>
                        <li @if (session('currency') != 'Naira') class="active" @endif><a
                                href="{{ route('currency', 'dol') }}" style="color: blue">US DOLLARS (USD)</a></li>
                    </ul>
                </form>
            </div>
        </div>
        <!-- Searchform Popup End -->

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
                                    <img height="20%" src="{{ asset('/img/bytbally.jpeg') }}" alt="Logo">
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
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="#" target="_blank" rel="noopener"
                                            class="social__link facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="#" target="_blank" rel="noopener"
                                            class="social__link pinterest">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="#" target="_blank" rel="noopener"
                                            class="social__link twitter">
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
                        {{-- <div class="col-sm-6 text-sm-end text-center">
                            <figure>
                                <img src="./zakas/assets/img/others/payment.png" alt="payment">
                            </figure>
                        </div> --}}
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

    <script type="text/javascript">
        updateWishlistCount();

        function ajax() {
            $.ajax({
                type: 'GET',
                url: '{{ route('pop') }}',
                complete: function(response) {
                    if (response.status === 200) {
                        $('#toast_alert').html(response.responseJSON.html).show();
                        setTimeout(function() {
                            $("#toast_alert").hide();
                        }, 10000);
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

        function toastAlert(text, type = 'success') {
            let backgroundColor;
            let className;

            switch (type) {
                case 'success':
                    backgroundColor = 'linear-gradient(to right, #00b09b, #96c93d)';
                    className = 'success';
                    break;
                case 'error':
                    backgroundColor = 'linear-gradient(to right, #ff5f6d, #ffc371)';
                    className = 'error';
                    break;
                case 'warning':
                    backgroundColor = 'linear-gradient(to right, #f6d365, #fda085)';
                    className = 'warning';
                    break;
                default:
                    backgroundColor = 'linear-gradient(to right, #00b09b, #96c93d)';
                    className = 'success';
            }

            Toastify({
                text: `${text}`,
                className: className,
                style: {
                    background: backgroundColor,
                }
            }).showToast();
        }


        function addToCart(productId, sizeId, popoverClass, count) {
            event.preventDefault();
            $(`.${popoverClass}${count}`).popover('hide');

            var product = document.getElementById(productId).value;
            var size = document.getElementById(sizeId).value;

            if (!size) {
                toastAlert('Error adding product to cart, Please select a size', 'error');
                return;
            }

            $.ajax({
                type: 'POST',
                url: '{{ route('cart.add') }}',
                data: {
                    product: product,
                    size: size,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    toastAlert('Product added to cart', 'success');
                    updateCartCount();
                }
            });
        }


        function updateCartCount() {
            $.ajax({
                type: 'GET',
                url: '{{ route('cart.count') }}',
                success: function(data) {
                    $('#mini-cart-count').text(data.count);
                },
                error: function() {
                    console.error('Failed to update cart count');
                }
            });
        }

        function updateWishlistCount() {
            $.ajax({
                type: 'GET',
                url: '{{ route('wishlist.count') }}',
                success: function(data) {
                    var wishlistIcon = $('#flaticon-like');
                    if (data.count > 0) {
                        wishlistIcon.addClass('text-danger');
                    } else {
                        wishlistIcon.removeClass('text-danger');
                    }
                },
                error: function() {
                    console.error('Failed to update wishlist count');
                }
            });
        }


        function addToWishlist(productName) {
            $.ajax({
                type: 'POST',
                url: '{{ route('wishlist.add') }}',
                data: {
                    product: productName,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    updateWishlistCount()
                    toastAlert('Product added to wishlist', 'success');
                },
                error: function(error) {
                    toastAlert('Failed to add product to wishlist', 'error');
                }
            });
        }
    </script>
</body>

</html>
