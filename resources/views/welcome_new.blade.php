@extends('layouts.newfront')

@section('home', 'active')
@section('title', 'Welcome')
<style>
    /* Default styles for large screens */
    .responsive-background {
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
    }

    /* Styles for mobile screens */
    @media (max-width: 767px) {
        .responsive-background {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            /* Reset background-size */
        }
    }
</style>

@section('content')

    <!-- Main Content Wrapper Start -->
    <div class="main-content-wrapper">
        <!-- Slider area Start -->
        <section class="homepage-slider-wrapper mb--100">
            <div class="zakas-element-carousel homepage-slider nav-style-2 nav-vertical-center nav-space-100"
                data-slick-options='{
                    "autoplay": true
                }'
                style="background-color: #E3BC9A">
                <div class="item">
                    <div class="single-slide slider-height-2 d-flex align-items-center responsive-background"
                        style="background-image: url({{ asset('/img/CROPPED3.png') }});">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-8">
                                    <div class="slider-content text-center">
                                        <h1 class="heading__primary color--white mb--30">
                                            <span class="heading__primary--sub" data-animation="fadeInUp"
                                                data-duration=".4s" data-delay=".7s">Simple.Colourful.Classy</span>
                                            <span class="heading__primary--main" data-animation="fadeInUp"
                                                data-duration=".4s" data-delay="1s">For Everyday Woman!</span>
                                        </h1>
                                        <a href="/shop" class="btn" data-animation="fadeInUp" data-duration=".4s"
                                            data-delay="1.2s">Shop Now <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="item">
                    <div class="single-slide slider-height-2  d-flex align-items-center responsive-background"
                        style="background-image: url({{ asset('/img/CROPPED1.png') }}); ">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-8">
                                    <div class="slider-content text-center">
                                        <h1 class="heading__primary color--white mb--30">
                                            <span class="heading__primary--sub" data-animation="fadeInUp"
                                                data-duration=".4s" data-delay=".7s">Simple.Colourful.Classy</span>
                                            <span class="heading__primary--main" data-animation="fadeInUp"
                                                data-duration=".4s" data-delay="1s">For Everyday Woman!</span>
                                        </h1>
                                        <a href="/shop" class="btn" data-animation="fadeInUp" data-duration=".4s"
                                            data-delay="1.2s">Shop Now <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="item">
                    <div class="single-slide slider-height-2 d-flex align-items-center responsive-background"
                        style="background-image: url({{ asset('/img/hero-bgT2.png') }});">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-8">
                                    <div class="slider-content text-center">
                                        <h1 class="heading__primary color--white mb--30">
                                            <span class="heading__primary--sub" data-animation="fadeInUp"
                                                data-duration=".4s" data-delay=".7s">Simple.Colourful.Classy</span>
                                            <span class="heading__primary--main" data-animation="fadeInUp"
                                                data-duration=".4s" data-delay="1s">For Everyday Woman!</span>
                                        </h1>
                                        <a href="/shop" class="btn" data-animation="fadeInUp" data-duration=".4s"
                                            data-delay="1.2s">Shop Now <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide slider-height-2 d-flex align-items-center responsive-background"
                        style="background-image: url({{ asset('/img/CROPPED4.png') }});">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-8">
                                    <div class="slider-content text-center">
                                        <h1 class="heading__primary color--white mb--30">
                                            <span class="heading__primary--sub" data-animation="fadeInUp"
                                                data-duration=".4s" data-delay=".7s">Simple.Colourful.Classy</span>
                                            <span class="heading__primary--main" data-animation="fadeInUp"
                                                data-duration=".4s" data-delay="1s">For Everyday Woman!</span>
                                        </h1>
                                        <a href="/shop" class="btn" data-animation="fadeInUp" data-duration=".4s"
                                            data-delay="1.2s">Shop Now <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide slider-height-2 d-flex align-items-center responsive-background"
                        style="background-image: url({{ asset('/img/CROPPED5.png') }});">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-8">
                                    <div class="slider-content text-center">
                                        <h1 class="heading__primary color--white mb--30">
                                            <span class="heading__primary--sub" data-animation="fadeInUp"
                                                data-duration=".4s" data-delay=".7s">Simple.Colourful.Classy</span>
                                            <span class="heading__primary--main" data-animation="fadeInUp"
                                                data-duration=".4s" data-delay="1s">For Everyday Woman!</span>
                                        </h1>
                                        <a href="/shop" class="btn" data-animation="fadeInUp" data-duration=".4s"
                                            data-delay="1.2s">Shop Now <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Slider area End -->

        <!-- Banner Area Start -->
        <div class="banner-area mb--95 mb-sm--95">
            <div class="container-fluid p-0">
                <div class="row gutter-40">
                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $cat)
                            <div class="col-md-4 mb-sm--50">
                                <div class="banner-box">
                                    <div class="banner-inner banner-hover-2 banner-info-over-img banner-info-center">
                                        <figure class="banner-image">
                                            <img src="{{ asset('/img/categories/' . $cat->image) }}"
                                                alt="{{ $cat->name }}">
                                        </figure>
                                        <div class="banner-info">
                                            <div class="banner-info--inner text-center">
                                                {{-- <p class="banner-title-1 color--white mb--20">Up Coming Discount</p> --}}
                                                <p class="banner-title-3 color--white mb--10">{{ $cat->name }}</p>
                                                <a href="/shop?cat={{ $cat->name }}"
                                                    class="btn btn-no-bg btn-color-white">Shop Now <i
                                                        class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                        <a href="/shop?cat={{ $cat->name }}" class="banner-link"></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    {{-- <div class="col-md-4 mb-sm--50">
                        <div class="banner-box">
                            <div class="banner-inner banner-hover-2 banner-info-over-img banner-info-center">
                                <figure class="banner-image">
                                    <img src="./zakas/assets/img/banner/banner-18.jpg" alt="Banner">
                                </figure>
                                <div class="banner-info">
                                    <div class="banner-info--inner text-center">
                                        <p class="banner-title-1 color--white mb--20">Up Coming Discount</p>
                                        <p class="banner-title-3 color--white mb--10">Accessories You Want</p>
                                        <a href="shop.html" class="btn btn-no-bg btn-color-white">Shop Now <i
                                                class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                                <a href="shop.html" class="banner-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-sm--50">
                        <div class="banner-box">
                            <div class="banner-inner banner-hover-2 banner-info-over-img banner-info-center">
                                <figure class="banner-image">
                                    <img src="./zakas/assets/img/banner/banner-19.jpg" alt="Banner">
                                </figure>
                                <div class="banner-info">
                                    <div class="banner-info--inner text-center">
                                        <p class="banner-title-1 color--white mb--20">Up Coming Discount</p>
                                        <p class="banner-title-3 color--white mb--10">Deep Olive Scarf</p>
                                        <a href="shop.html" class="btn btn-no-bg btn-color-white">Shop Now <i
                                                class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                                <a href="shop.html" class="banner-link"></a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Banner Area End -->

        <!-- Product Area Start -->
        <section class="product-area mb--100 mb-sm--50">
            <div class="container">
                <div class="row justify-content-center mb--50">
                    <div class="col-xl-6 text-center">
                        <h2 class="heading__secondary mb--10">New Arrival</h2>
                        <p>Lorem og elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut </p>
                    </div>
                </div>
                <div class="row">
                    @if (!empty($latestProducts))
                        @foreach ($latestProducts as $product)
                            <div class="col-md-6 mb-sm--50">
                                <div class="zakas-product product-style-2 h-100">
                                    <div class="product-inner">
                                        <figure class="product-image">
                                            <a href="{{ route('product.view', $product->name) }}">
                                                <img src="{{ asset('/img/products/' . $product->images[0]->file_path) }}"
                                                    alt="{{ $product->name }}">
                                            </a>
                                        </figure>
                                        <div class="product-info">
                                            <div class="zakas-product-action mb--25">
                                                <div class="product-action d-flex justify-content-center">
                                                    <div class="product-size">
                                                        <a href="#" class="action-btn">
                                                            <span class="current">XL</span>
                                                        </a>
                                                        <div class="product-size-swatch">
                                                            <span class="product-size-swatch-btn variation-btn">
                                                                L
                                                            </span>
                                                            <span class="product-size-swatch-btn variation-btn">
                                                                M
                                                            </span>
                                                            <span class="product-size-swatch-btn variation-btn">
                                                                S
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <a href="/wishlist" class="action-btn">
                                                        <i class="flaticon flaticon-like"></i>
                                                    </a>
                                                    <a href="{{ route('product.view', $product->name) }}"
                                                        class="action-btn quick-view">
                                                        <i class="flaticon flaticon-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <h3 class="product-title mb--15">
                                                <a
                                                    href="{{ route('product.view', $product->name) }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="product-price-wrapper mb--30">
                                                <span class="money">$80</span>
                                                <span class="money-separator">-</span>
                                                <span class="money">$200</span>
                                            </div>
                                            <a href="/cart" class="btn btn-small btn-bg-sand btn-color-dark">Add
                                                To
                                                Cart</a>
                                        </div>
                                        <span class="product-badge">Hot</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!-- Product Area End -->

        <!-- Banner Area Start -->
        <div class="banner-area mb--95">
            <div class="zakas-element-carousel home-08-banner-01 nav-vertical-center nav-hover-2 nav-space-100"
                data-slick-options='{
                    "slidesToShow": 1,
                    "slidesToScroll": 1,
                    "centerMode": true,
                    "centerPadding": "25%",
                    "infinite": true,
                    "autoplay": true
                }'
                data-slick-responsive= '[
                    {"breakpoint":575, "settings": {
                        "centerMode": false,
                        "centerPadding": "0%"
                    }}
                ]'>
                <div class="item">
                    <div class="banner-item">
                        <figure>
                            <img src="{{ asset('/img/video-bg1.jpg') }}" alt="Banner">
                        </figure>
                        <div class="banner-overlay">
                            <a href="https://vimeo.com/944501961?share=copy" class="video-popup">
                                <img src="./zakas/assets/img/icons/play.png" alt="Play Button">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="banner-item">
                        <figure>
                            <img src="{{ asset('/img/video-bg2.jpg') }}" alt="Banner">
                        </figure>
                        <div class="banner-overlay">
                            <a href="https://vimeo.com/944503081?share=copy" class="video-popup">
                                <img src="./zakas/assets/img/icons/play.png" alt="Play Button">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="banner-item">
                        <figure>
                            <img src="{{ asset('/img/video-bg3.jpg') }}" alt="Banner">
                        </figure>
                        <div class="banner-overlay">
                            <a href="https://vimeo.com/944522593?share=copy" class="video-popup">
                                <img src="./zakas/assets/img/icons/play.png" alt="Play Button">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->

        <!-- Product Tab Area Start -->
        <section class="product-tab-area mb--40">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-tab tab-style-2 tab-style-2-1">
                            <div class="nav nav-tabs product-tab__head mb--50" id="product-tab" role="tablist">
                                @if (isset($allcategories))
                                    @foreach ($allcategories as $index => $cats)
                                        <button type="button"
                                            class="nav-item nav-link product-tab__link @if ($index === 0) active @endif"
                                            id="nav-new-tab" data-bs-toggle="tab"
                                            data-bs-target="#tab-{{ $index + 1 }}" role="tab"
                                            aria-controls="nav-new" aria-selected="true">
                                            <span> {{ $cats->name }}</span>
                                        </button>
                                    @endforeach
                                @endif
                            </div>
                            <div class="tab-content" id="new-arrival-tab-content">
                                @if (isset($allcategories))
                                    @foreach ($allcategories as $index => $cat)
                                        <div class="tab-pane fade show  @if ($index === 0) active @endif"
                                            id="tab-{{ $index + 1 }}" role="tabpanel" aria-labelledby="nav-new-tab">
                                            <div class="row">
                                                @php
                                                    $products = $cat->products()->latest()->take(8)->get();
                                                @endphp
                                                @foreach ($products as $product)
                                                    <div class="col-xl-3 col-lg-4 col-sm-6 mb--50">
                                                        <div class="zakas-product">
                                                            <div class="product-inner">
                                                                <figure class="product-image">
                                                                    <a href="product-details.html">
                                                                        <img src="{{ asset('/img/products/' . $product->images[0]->file_path) }}"
                                                                            alt="{{ $product->name }}">
                                                                    </a>
                                                                    <div class="zakas-product-action">
                                                                        <div class="product-action d-flex">
                                                                            <div class="product-size">
                                                                                <a href="#" class="action-btn">
                                                                                    <span class="current">XL</span>
                                                                                </a>
                                                                                <div class="product-size-swatch">
                                                                                    <span
                                                                                        class="product-size-swatch-btn variation-btn">
                                                                                        L
                                                                                    </span>
                                                                                    <span
                                                                                        class="product-size-swatch-btn variation-btn">
                                                                                        M
                                                                                    </span>
                                                                                    <span
                                                                                        class="product-size-swatch-btn variation-btn">
                                                                                        S
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-color">
                                                                                <a href="#" class="action-btn">
                                                                                    <span
                                                                                        class="current abbey">Abbey</span>
                                                                                </a>
                                                                                <div class="product-color-swatch">
                                                                                    <span
                                                                                        class="product-color-swatch-btn blue variation-btn">
                                                                                        Blue
                                                                                    </span>
                                                                                    <span
                                                                                        class="product-color-swatch-btn copper variation-btn">
                                                                                        Copper
                                                                                    </span>
                                                                                    <span
                                                                                        class="product-color-swatch-btn old-rose variation-btn">
                                                                                        Old Rose
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <a href="/wishlist" class="action-btn">
                                                                                <i class="flaticon flaticon-like"></i>
                                                                            </a>
                                                                            <a data-bs-toggle="modal"
                                                                                data-bs-target="#productModal"
                                                                                class="action-btn quick-view">
                                                                                <i class="flaticon flaticon-eye"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </figure>
                                                                <div class="product-info">
                                                                    <h3 class="product-title mb--15">
                                                                        <a
                                                                            href="product-details.html">{{ $product->name }}</a>
                                                                    </h3>
                                                                    <div class="product-price-wrapper mb--30">
                                                                        @if ($product->sizes->isNotEmpty())
                                                                            <span class="money">
                                                                                ₦{{ number_format($product->sizes[0]->cost_ngn, 2) }}</span>
                                                                            <span class="money-separator">-</span>
                                                                            <span class="money">
                                                                                ${{ number_format($product->sizes[0]->cost_dol) }}</span>
                                                                        @endif
                                                                    </div>
                                                                    <a href="/cart"
                                                                        class="btn btn-small btn-bg-sand btn-color-dark">Add
                                                                        To
                                                                        Cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Tab Area End -->

        <!-- Instagram Area Start -->
        <section class="instagram-area mb--100 mb-sm--50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="instagram-feed">
                            <div class="instagram-feed-heading">
                                <h4>Follow Us On</h4>
                                <a href="#">@instagram</a>
                            </div>
                            <div class="row g-0">
                                <?php $s = 0; ?>
                                @foreach ($images as $image)
                                    @if ($s <= 3)
                                        <div class="col-md-2 col-4">
                                            <div class="instagram-item">
                                                <a class="instagram-image" href="#">
                                                    <img src="{{ asset('/img/products/' . $image->file_path) }}"
                                                        alt="{{ $image->product->name }}">
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Instagram Area End -->

        <!-- Method area Start -->
        <section class="method-area mb--100 mb-sm--50">
            <div class="container">
                <div class="row gutter-75 gutter-xl-30">
                    <div class="col-md-3 mb-sm--50">
                        <div class="method-box-2 text-center pt--35 pb--30">
                            <h4>Fastest Delivery</h4>
                            <p>We deliver quickly to your door step with no issue</p>
                            <i class="flaticon flaticon-paper-plane"></i>
                        </div>
                    </div>
                    <div class="col-md-3 mb-sm--50">
                        <div class="method-box-2 text-center pt--35 pb--30">
                            <h4>Quality Guaranteed</h4>
                            <p>With us you are guaranteed the highest quality</p>
                            <i class="flaticon flaticon-present"></i>
                        </div>
                    </div>
                    {{-- <div class="col-md-3 mb-sm--50">
                        <div class="method-box-2 text-center pt--35 pb--30">
                            <h4>24/7 Support</h4>
                            <p>Our staff are available to provide support anytime</p>
                            <i class="flaticon flaticon-two-circling-arrows"></i>
                        </div>
                    </div> --}}
                    <div class="col-md-3 mb-sm--50">
                        <div class="method-box-2 text-center pt--35 pb--30">
                            <h4>Secure Payment</h4>
                            <p>All payments on our platforms are secure</p>
                            <i class="flaticon flaticon-paper-plane"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Method area End -->

    </div>
    <!-- Main Content Wrapper End -->


@endsection
