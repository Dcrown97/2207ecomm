@extends('layouts.pagefront')

@section('title', 'Shop')
@section('shop', 'active')

@section('content')

    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                        <h1 class="page-title">Shop</h1>
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li class="current"><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div class="main-content-wrapper">
        <div class="shop-page-wrapper shop-fullwidth ptb--80">
            <div class="container">
                <div class="row mb--50">
                    <div class="col-12">
                        <div class="shop-toolbar">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-md--50 mb-xs--10">
                                    <div
                                        class="shop-toolbar__left d-flex align-items-sm-center align-items-start flex-sm-row flex-column">
                                        <div class="product-view-mode mr--50 mr-xs--0">
                                            <a class="active" href="#" data-target="grid">
                                                <img src="./zakas/assets/img/icons/grid.png" alt="Grid">
                                            </a>
                                            <a href="#" data-target="list">
                                                <img src="./zakas/assets/img/icons/list.png" alt="Grid">
                                            </a>
                                        </div>
                                        <p class="product-pages">Showing 1–20 of 42 results</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div
                                        class="shop-toolbar__right d-flex justify-content-lg-end justify-content-start flex-sm-row flex-column">
                                        <div class="product-categories mb-xs--15 mr--50 mr-xs--0">
                                            <form action="/shop">
                                                <select class="product-categories__select nice-select" name="cat"
                                                    id="categorySelect">
                                                    <option value="">Select Categories</option>
                                                    <option value="all">All Categories</option>
                                                    @foreach ($cats as $cat)
                                                        <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </div>
                                        <div class="product-ordering">
                                            <a href="/shop?cat={{ $cat->name }}"></a>
                                            <select class="product-ordering__select nice-select">
                                                <option value="0">Default Sorting</option>
                                                <option value="1">Relevance</option>
                                                <option value="2">Name, A to Z</option>
                                                <option value="3">Name, Z to A</option>
                                                <option value="4">Price, low to high</option>
                                                <option value="5">Price, high to low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid shop-products">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="product-tab-content">
                            <div class="tab-pane fade show active" id="nav-all">
                                <div class="row xxl-block-grid-6 grid-space-20">
                                    @php($count = 1)
                                    @foreach ($products as $product)
                                        <div class="col-xl-3 col-md-4 col-sm-6 mb--50">
                                            <div class="zakas-product">
                                                <div class="product-inner">
                                                    <figure class="product-image">
                                                        <a href="{{ route('product.view', $product->name) }}">
                                                            <img src="{{ asset('/img/products/' . $product->images[0]->file_path) }}"
                                                                alt="Products">
                                                        </a>
                                                        <div class="zakas-product-action">
                                                            <div class="product-action d-flex">
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
                                                        <span class="product-badge">New</span>
                                                    </figure>
                                                    <div class="product-info">
                                                        <h3 class="product-title mb--15">
                                                            <a
                                                                href="{{ route('product.view', $product->name) }}">{{ $product->name }}</a>
                                                        </h3>
                                                        <div class="product-price-wrapper mb--30">
                                                            <span class="money">
                                                                @if ($product->sizes->isNotEmpty())
                                                                    @if (session('currency') == 'Naira')
                                                                        ₦{{ number_format($product->sizes[0]->cost_ngn, 2) }}
                                                                    @else
                                                                        ${{ number_format($product->sizes[0]->cost_dol) }}
                                                                    @endif
                                                                @endif
                                                            </span>
                                                            {{-- <span class="money-separator">-</span>
                                                            <span class="money">$200</span> --}}
                                                        </div>
                                                        <a href="/cart"
                                                            class="btn btn-small btn-bg-sand btn-color-dark">Add
                                                            To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="zakas-product-list">
                                                <div class="product-inner">
                                                    <figure class="product-image">
                                                        <a href="{{ route('product.view', $product->name) }}">
                                                            <img src="{{ asset('/img/products/' . $product->images[0]->file_path) }}"
                                                                alt="Products">
                                                        </a>
                                                        <div class="product-thumbnail-action">
                                                            <a href="{{ route('product.view', $product->name) }}"
                                                                class="action-btn quick-view">
                                                                <i class="flaticon flaticon-eye"></i>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                    <div class="product-info">
                                                        <h3 class="product-title mb--25">
                                                            <a
                                                                href="{{ route('product.view', $product->name) }}">{{ $product->name }}</a>
                                                        </h3>
                                                        <div class="zakas-product-action-list mb--20">
                                                            <div class="product-size mb--25">
                                                                <div class="product-size-swatch">
                                                                    <span class="product-size-swatch-btn variation-btn">
                                                                        XL
                                                                    </span>
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
                                                        </div>
                                                        <div class="product-price-wrapper mb--15 mb-sm--10">
                                                            <span class="money">
                                                                @if ($product->sizes->isNotEmpty())
                                                                    @if (session('currency') == 'Naira')
                                                                        ₦{{ number_format($product->sizes[0]->cost_ngn, 2) }}
                                                                    @else
                                                                        ${{ number_format($product->sizes[0]->cost_dol) }}
                                                                    @endif
                                                                @endif
                                                            </span>
                                                            {{-- <span class="money-separator">-</span>
                                                            <span class="money">$200</span> --}}
                                                        </div>
                                                        {{-- <p class="product-short-description mb--20">
                                                            Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at
                                                            egestas
                                                            magna molestie a. Proin ac ex maximus, ultrices justo eget,
                                                            sodales
                                                            orci. Aliquam egestas libero ac turpis pharetra
                                                        </p> --}}
                                                        <div class="zakas-product-action-list d-flex">
                                                            <a href="/cart"
                                                                class="btn btn-small btn-bg-sand btn-color-dark">Add To
                                                                Cart</a>
                                                            <a href="/wishlist" class="ml--20 action-btn">
                                                                <i class="flaticon flaticon-like"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php($count++)
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <nav class="pagination-wrap mt--35 mt-md--25">
                            <ul class="pagination">
                                <li><a href="#" class="prev page-number"><i
                                            class="fa fa-angle-double-left"></i></a></li>
                                <li><span class="current page-number">1</span></li>
                                <li><a href="#" class="page-number">2</a></li>
                                <li><a href="#" class="page-number">3</a></li>
                                <li><a href="#" class="next page-number"><i
                                            class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper End -->

    <script>
        document.getElementById('categorySelect').addEventListener('change', function() {
            if (this.value == 'all') {
                window.location.href = '/shop';
            } else {
                this.form.submit();
            }
        });
    </script>

@endsection
