@extends('layouts.front')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
@endsection

@section('title', 'Shop')
@section('shop', 'active')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shop Now</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        @if (!empty($category))
                            <a href="#">{{ $category }}<span class="lnr lnr-arrow-right"></span></a>
                        @endif
                        <a href="/shop">Shop</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Browse Categories</div>
                    <ul class="main-categories">
                        @foreach ($cats as $cat)
                            <li class="main-nav-list"><a href="/shop?cat={{ $cat->name }}"><span
                                        class="lnr lnr-arrow-right"></span>{{ $cat->name }}<span
                                        class="number">({{ count($cat->products->where('posted', 1)) }})</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    {{--                    <form> --}}
                    <div class="sorting">
                        <select onchange="sorted();" id="sorted">
                            <option value="">Default sorting</option>
                            <option value="asc">Default sorting</option>
                            <option value="desc">Default sorting</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto" onchange="sizing();" id="sizing">
                        <select>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                        </select>
                    </div>
                    <div class="pagination">
                        <a href="#" class="prev-arrow"><i class="fa fa-spinner" aria-hidden="true"></i></a>
                    </div>
                    <div class="pagination">
                        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                        <a href="#">6</a>
                        <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @php($count = 1)
                        @foreach ($products as $product)
                            <!-- single product -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img src="{{ asset('/img/products/' . $product->images[0]->file_path) }}"
                                        alt="{{ $product->name }}" height="200px">
                                    <div class="product-details">
                                        <h6><a class="text-dark"
                                                href="{{ route('product.view', $product->name) }}">{{ $product->name }}</a>
                                        </h6>
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
                                                            id="product{{ $count }}" value="{{ $product->name }}">
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
                                                                data: {product: product, size: size, _token: '{{ csrf_token() }}', _method: 'POST' },
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
                                            <a href="{{ route('product.view', $product->name) }}" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">View</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php($count++)
                        @endforeach
                    </div>
                </section>
                <!-- End Best Seller -->
                {{ $products->links('front-pagination') }}
                <!-- End Filter Bar -->
            </div>
        </div>
    </div>

    @if (!empty($wishlist))
        <!-- Start related-product Area -->
        <section class="related-product-area section_gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Your Wishlist</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach ($wishlist as $wish)
                                <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                    <div class="single-related-product d-flex">
                                        <a href="#"><img
                                                src="{{ asset('/img/products/' . $wish->images[0]->file_path) }}"
                                                alt="{{ $wish->name }}" height="100px"></a>
                                        <div class="desc">
                                            <a href="#" class="title">{{ $wish->name }}</a>
                                            <div class="price">
                                                <h6>
                                                    @if ($wish->sizes->isNotEmpty())
                                                        @if (session('currency') == 'Naira')
                                                            ₦{{ number_format($wish->sizes[0]->cost_ngn, 2) }}
                                                        @else
                                                            ${{ number_format($wish->sizes[0]->cost_dol) }}
                                                        @endif
                                                    @endif
                                                </h6><br>
                                                <a href="#" type="button" class="text-warning"
                                                    onclick="
                                            event.preventDefault();
                                            var product = '{{ $wish->name }}';
                                            $.ajax({
                                            type: 'POST',
                                            url: '{{ route('wishlist.delete') }}',
                                            data: {product: product, _token: '{{ csrf_token() }}', _method: 'DELETE', },
                                            _method: 'DELETE',
                                            '_token': '{{ csrf_token() }}',
                                            success: function( data ) {
                                            // alert('Product added to cart')
                                            }
                                            });
                                        "><small>Remove</small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End related-product Area -->
    @endif

@endsection

@section('script')
    {{--    <script src="{{ asset('/frontend/js/jquery.nice-select.min.js') }}"></script> --}}
@endsection
