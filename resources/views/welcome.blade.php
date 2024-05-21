@extends('layouts.front')

@section('home', 'active')
@section('title', 'Welcome')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
@endsection

@section('content')

    <style>
        .add-btn {
            height: auto !important;
            width: auto !important;
            line-height: 52px;
            text-align: center;
            border-radius: 20%;
            box-shadow: 0 10px 20px rgb(255 108 0 / 20%);
            padding: 1%;
            color: #fff;
        }

        .popover {
            width: 304px;
            max-width: 100%;
        }

        .img-fluid {
            width: 100%;
            height: auto;
            aspect-ratio: 97/100;
        }
    </style>
    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start" style="overflow-y: hidden">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h4>Simple.Colourful.Classy</h4>
                                    <h2>For The Everyday Woman!</h2>
                                    <p>2207bytbally is known for its signature bold approach to colours, form-fitting
                                        tailored pieces, simple and yet classy fashion.</p>
                                    <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href="">Shop Now</a>
                                        {{--                                        <span class="add-text text-uppercase">Add to Bag</span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 offset-sm-2">
                                <div class="banner-img">
                                    <img src="" alt="">
                                    <div id="demo" class="carousel slide" data-ride="carousel">
                                        <!-- The slideshow -->
                                        <div class="carousel-inner" style="margin-top: 35% !important">
                                            <div class="carousel-item active ">
                                                <img src="{{ asset('/img/1.png') }}" alt="Los Angeles">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('/img/2.png') }}" alt="Los Angeles">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('/img/3.png') }}" alt="Los Angeles">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('/img/4.png') }}" alt="Los Angeles">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-slide -->
                        <div class="row single-slide">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h4>Simple.Colourful.Classy</h4>
                                    <h2>For The Everyday Woman!</h2>
                                    <p>2207bytbally designs are youthful, colourful and versatile, making the outfits
                                        wearable for women with a busy and active lifestyle.</p>
                                    <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href="">Shop Now</a>
                                        {{--                                        <span class="add-text text-uppercase">Add to Bag</span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img src="" alt="">
                                    <div id="demo" class="carousel slide" data-ride="carousel">
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active ">
                                                <img src="{{ asset('/img/1.png') }}" alt="Los Angeles">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('/img/2.png') }}" alt="Los Angeles">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('/img/3.png') }}" alt="Los Angeles">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('/img/4.png') }}" alt="Los Angeles">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <!-- start features Area -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('/frontend/img/features/f-icon1.png') }}" alt="">
                        </div>
                        <h6>Fastest Delivery</h6>
                        <p>We deliver quickly to your door step</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('/frontend/img/features/f-icon2.png') }}" alt="">
                        </div>
                        <h6>Quality Guaranteed</h6>
                        <p>With us you are guaranteed the highest quality</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('/frontend/img/features/f-icon3.png') }}" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                        <p>Our staff are available to provide support anytime</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('/frontend/img/features/f-icon4.png') }}" alt="">
                        </div>
                        <h6>Secure Payment</h6>
                        <p>All payments on our platforms are secure</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->

    @if ($categories->isNotEmpty())
        <!-- Start category Area -->
        <section class="category-area">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($categories as $cat)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid" src="{{ asset('/img/categories/' . $cat->image) }}"
                                    alt="{{ $cat->name }}">
                                <a href="/shop?cat={{ $cat->name }}">
                                    <div class="deal-details">
                                        <h6 class="deal-title">{{ $cat->name }}</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End category Area -->
    @endif

    @if (!empty($cats))

        <!-- start product Area -->
        <section class="@if (count($cats) > 1) owl-carousel active-product-area @endif section_gap">
            @php($count = 1)
            @foreach ($cats as $cat)
                @if (count($cat) > 0)
                    <!-- single product slide -->
                    <div class="single-product-slider">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <div class="section-title">
                                        <h1>{{ $cat[0]->category->name }}</h1>
                                        <p>Latest Products</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($cat as $product)
                                    <!-- single product -->
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-product">
                                            <img class="img-fluid"
                                                src="{{ asset('/img/products/' . $product->images[0]->file_path) }}"
                                                alt="{{ $product->name }}">
                                            <div class="product-details">
                                                <h6>{{ $product->name }}</h6>
                                                <div class="price">
                                                    <h6>
                                                        @if ($product->sizes->isNotEmpty())
                                                            @if (session('currency') == 'Naira')
                                                                ₦{{ number_format($product->sizes[0]->cost_ngn, 2) }}
                                                            @else
                                                                ${{ number_format($product->sizes[0]->cost_dol) }}
                                                            @endif
                                                        @endif
                                                    </h6>
                                                </div>
                                                <div class="prd-bottom">

                                                    <a href="#" class="pop-show{{ $count }} social-info"
                                                        onclick="
                                            event.preventDefault();
                                            $('.pop-show{{ $count }}').popover({
                                            container: 'body',
                                            html: true,
                                            content: function() {
                                            return $('.pop-inn{{ $count }}').html();
                                            }
                                            });"
                                                        title="Select Size">

                                                        <p class="hover-text">add to bag</p>
                                                        <span class="ti-bag"></span>
                                                    </a>
                                                    @if ($product->sizes->isNotEmpty())
                                                        <div id="popover-form" class="pop-inn{{ $count }}"
                                                            style="display: none">
                                                            <form class="form-inline" id="add_card_{{ $count }}"
                                                                role="form">
                                                                @csrf
                                                                <input type="hidden" name="product"
                                                                    id="product{{ $count }}"
                                                                    value="{{ $product->name }}">
                                                                <div class="form-group">
                                                                    <select name="size" id="size{{ $count }}">
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
                                                                    <button type="button" class="btn btn-warning"
                                                                        onclick="
                                                            event.preventDefault();
                                                            $('.pop-show{{ $count }}').popover('hide');
                                                            var product = document.getElementById('product{{ $count }}').value;
                                                            var size = document.getElementById('size{{ $count }}').value;
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: '{{ route('cart.add') }}',
                                                                data: {product: product, size: size, _token: '{{ csrf_token() }}' },
                                                                _method: 'POST',
                                                                '_token': '{{ csrf_token() }}',
                                                                success: function( data ) {
                                                                    alert('Product added to cart')
                                                                }
                                                            });
                                                        "><span
                                                                            class="ti-bag"></span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    @endif
                                                    <a href="" class="social-info"
                                                        onclick="
                                            event.preventDefault();
                                            var product = '{{ $product->name }}';
                                            $.ajax({
                                            type: 'POST',
                                            url: '{{ route('wishlist.add') }}',
                                            data: {product: product, _token: '{{ csrf_token() }}' },
                                            _method: 'POST',
                                            '_token': '{{ csrf_token() }}',
                                            success: function( data ) {
                                            alert('Product added to wishlist')
                                            }
                                            });
                                            ">
                                                        <span class="lnr lnr-heart"></span>
                                                        <p class="hover-text">Wishlist</p>
                                                    </a>
                                                    <a href="{{ route('product.view', $product->name) }}"
                                                        class="social-info">
                                                        <span class="lnr lnr-move"></span>
                                                        <p class="hover-text">View</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $count++; ?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </section>
        <!-- end product Area -->
    @endif

    <!-- Start category Area -->
    <section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <?php $s = 0; ?>
                        @foreach ($images as $image)
                            @if ($s <= 3)
                                <div class="col-lg-3 col-md-3">
                                    <div class="single-deal">
                                        <div class="overlay"></div>
                                        <img class="" src="{{ asset('/img/products/' . $image->file_path) }}"
                                            alt="{{ $image->product->name }}" style="max-height: 100px !important">
                                        <a href="{{ asset('/img/products/' . $image->file_path) }}" class="img-pop-up"
                                            target="_blank">
                                            <div class="deal-details">
                                                <h6 class="deal-title">{{ $image->product->name }}</h6>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php $s++; ?>
                            @endif
                        @endforeach
                    </div>
                </div>
                @if (count($images) == 5)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-deal">
                            <div class="overlay"></div>
                            <img class="" src="{{ asset('/img/products/' . $images[4]->file_path) }}"
                                alt="{{ $images[4]->product->name }}" style="max-height: 220px !important">
                            <a href="{{ asset('/img/products/' . $images[4]->file_path) }}" class="img-pop-up"
                                target="_blank">
                                <div class="deal-details">
                                    <h6 class="deal-title">{{ $images[4]->product->name }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End category Area -->

@endsection

@section('script')
    <script src="{{ asset('/frontend/js/jquery.nice-select.min.js') }}"></script>
@endsection
