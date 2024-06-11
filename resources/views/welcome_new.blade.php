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
                }' style="background-color: gray">
                <div class="item">
                    <div class="single-slide slider-height-2 d-flex align-items-center responsive-background"
                        style="background-image: url({{ asset('/img/2207-3.png') }});">
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
                        style="background-image: url({{ asset('/img/2207-2.png') }});">
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
                        style="background-image: url({{ asset('/img/2207-1.png') }});">
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
                </div> --}}
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
                        {{-- {{ dd($latestProducts) }} --}}
                        @php($count = 1)
                        @foreach ($latestProducts as $product)
                            {{-- <div class="col-sm-6 mb-sm--50">
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

                                                    <a onclick="addToWishlist('{{ $product->name }}')"
                                                        class="action-btn">
                                                        <i class="flaticon flaticon-like"></i>
                                                    </a>
                                                    <a href="{{ route('product.view', $product->name) }}"
                                                        class="action-btn quick-view">
                                                        <i class="flaticon flaticon-eye"></i>
                                                    </a>
                                                </div>
                                                <select name="size" id="size{{ $count }}"
                                                    style="width: 150px; border: 0.5px solid gray; border-radius: 5px">
                                                    <option value="">Select Size</option>
                                                    @foreach ($product->sizes as $size)
                                                        <option value="{{ $size->id }}">Size:
                                                            {{ $size->size . $size->measure }}; Price:
                                                            @if (session('currency') == 'Naira')
                                                                ₦{{ number_format($size->cost_ngn, 2) }}
                                                            @else
                                                                ${{ number_format($size->cost_dol) }}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <h3 class="product-title mb--15">
                                                <a
                                                    href="{{ route('product.view', $product->name) }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="product-price-wrapper mb--30" style="color: white">
                                                @if ($product->sizes->isNotEmpty())
                                                    @if (session('currency') == 'Naira')
                                                        ₦{{ number_format($product->sizes[0]->cost_ngn, 2) }}
                                                    @else
                                                        ${{ number_format($product->sizes[0]->cost_dol) }}
                                                    @endif
                                                @endif
                                            </div>
                                            <input type="hidden" name="product" id="product{{ $count }}"
                                                value="{{ $product->name }}">
                                            <a onclick="addToCart('product{{ $count }}', 'size{{ $count }}', 'pop-show', {{ $count }})"
                                                class="btn btn-small btn-bg-sand btn-color-dark">
                                                Add To Cart
                                            </a>
                                        </div>
                                        <span class="product-badge">Hot</span>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-sm-6 mb-sm-4">
                                <div class="card h-100">
                                    <a href="{{ route('product.view', $product->name) }}">
                                        <img src="{{ asset('/img/products/' . $product->images[0]->file_path) }}"
                                            class="card-img-top" alt="{{ $product->name }}">
                                    </a>
                                    {{-- <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <h5 class="card-title fs-4">{{ $product->name }}</h5>
                <div class="product-price-wrapper mb-3">
                    @if ($product->sizes->isNotEmpty())
                        <span class="text-muted fs-5">
                            @if (session('currency') == 'Naira')
                                ₦{{ number_format($product->sizes[0]->cost_ngn, 2) }}
                            @else
                                ${{ number_format($product->sizes[0]->cost_dol) }}
                            @endif
                        </span>
                    @endif
                </div>
            </div>
            <div class="mb-3">
                <select class="form-select mb-3" name="sizes" id="size{{ $count }}">
                    <option value="">Select Size</option>
                    @foreach ($product->sizes as $size)
                        <option value="{{ $size->id }}">
                            Size: {{ $size->size . $size->measure }};
                            Price:
                            @if (session('currency') == 'Naira')
                                ₦{{ number_format($size->cost_ngn, 2) }}
                            @else
                                ${{ number_format($size->cost_dol) }}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a onclick="addToWishlist('{{ $product->name }}')" class="btn btn-outline-secondary">
                    <i class="flaticon flaticon-like"></i>
                </a>
                <a data-bs-toggle="modal" data-bs-target="#productModal" class="btn btn-outline-secondary">
                    <i class="flaticon flaticon-eye"></i>
                </a>
            </div>
            <a onclick="addToCart('product{{ $count }}', 'size{{ $count }}', 'pop-show', {{ $count }})"
               class="btn btn-primary w-100">Add To Cart</a>
        </div> --}}
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <h5 class="card-title fs-4">{{ $product->name }}</h5>
                                        <select class="form-select mb-3" name="sizes" id="size{{ $count }}">
                                            <option value="">Select Size</option>
                                            @foreach ($product->sizes as $size)
                                                <option value="{{ $size->id }}">
                                                    Size: {{ $size->size . $size->measure }};
                                                    Price: @if (session('currency') == 'Naira')
                                                        ₦{{ number_format($size->cost_ngn, 2) }}
                                                    @else
                                                        ${{ number_format($size->cost_dol) }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="d-flex justify-content-center mt-4" style="height: 20px">
                                            @if ($product->sizes->isNotEmpty())
                                                <span class="text-muted fs-4">
                                                    @if (session('currency') == 'Naira')
                                                        ₦{{ number_format($product->sizes[0]->cost_ngn, 2) }}
                                                    @else
                                                        ${{ number_format($product->sizes[0]->cost_dol) }}
                                                    @endif
                                                </span>
                                            @endif
                                            <a onclick="addToWishlist('{{ $product->name }}')" class="action-btn mt-2">
                                                <i class="flaticon flaticon-like"></i>
                                            </a>
                                            <a data-bs-toggle="modal" data-bs-target="#productModal"
                                                class="action-btn quick-view">
                                                <i class="flaticon flaticon-eye"></i>
                                            </a>
                                        </div>

                                        <hr>
                                        <input type="hidden" name="product" id="product{{ $count }}"
                                                value="{{ $product->name }}">
                                        <a onclick="addToCart('product{{ $count }}', 'size{{ $count }}', 'pop-show', {{ $count }})"
                                            class="btn btn-small btn-primary w-100">Add To Cart</a>
                                    </div>
                                    <span class="product-badge">Hot</span>
                                </div>
                            </div>

                            <?php $count++; ?>
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
                            <div class="nav nav-tabs product-tab__head mb--50" id="product-tab" role="tablist" style="display: flex; flex-direction:row">
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
                                            <div class="row ">
                                                @php($count = 1)
                                                @foreach ($cat->products as $product)
                                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-6 mb-4">
                                                        <div class="card h-100">
                                                            <img src="{{ asset('/img/products/' . $product->images[0]->file_path) }}"
                                                                class="card-img-top" alt="{{ $product->name }}">
                                                            <div
                                                                class="card-body d-flex flex-column justify-content-center">
                                                                <h5 class="card-title fs-4">{{ $product->name }}</h5>
                                                                <select class="form-select mb-3" name="sizes"
                                                                    id="size2{{ $count }}">
                                                                    <option value="">Select Size</option>
                                                                    @foreach ($product->sizes as $size)
                                                                        <option value="{{ $size->id }}">
                                                                            Size: {{ $size->size . $size->measure }};
                                                                            Price: @if (session('currency') == 'Naira')
                                                                                ₦{{ number_format($size->cost_ngn, 2) }}
                                                                            @else
                                                                                ${{ number_format($size->cost_dol) }}
                                                                            @endif
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="d-flex justify-content-center mt-4"
                                                                    style="height: 20px">
                                                                    @if ($product->sizes->isNotEmpty())
                                                                        <span class="text-muted fs-4">
                                                                            @if (session('currency') == 'Naira')
                                                                                ₦{{ number_format($product->sizes[0]->cost_ngn, 2) }}
                                                                            @else
                                                                                ${{ number_format($product->sizes[0]->cost_dol) }}
                                                                            @endif
                                                                        </span>
                                                                    @endif
                                                                    <a onclick="addToWishlist('{{ $product->name }}')"
                                                                        class="action-btn mt-2">
                                                                        <i class="flaticon flaticon-like"></i>
                                                                    </a>
                                                                    <a data-bs-toggle="modal"
                                                                        data-bs-target="#productModal"
                                                                        class="action-btn quick-view">
                                                                        <i class="flaticon flaticon-eye"></i>
                                                                    </a>
                                                                </div>

                                                                <hr>
                                                                <input type="hidden" name="product" id="product2{{ $count }}"
                                                value="{{ $product->name }}">
                                                                <a onclick="addToCart('product2{{ $count }}', 'size2{{ $count }}', 'pop-show', {{ $count }})"
                                                                    class="btn btn-small btn-primary w-100">Add To Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php $count++; ?>
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
                            <div class="row g-0 justify-content-center">
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
                <div class="row gutter-75 gutter-xl-30 justify-content-center">
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
                    <div class="col-md-3 mb-sm--50">
                        <div class="method-box-2 text-center pt--35 pb--30">
                            <h4>Exclusive Designs</h4>
                            <p>Discover unique and trendy fashion items</p>
                            <i class="flaticon flaticon-two-circling-arrows"></i>
                        </div>
                    </div>
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
