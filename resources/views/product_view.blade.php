@extends('layouts.front')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <style>


        .product-image {
            max-width: 100%;
            height: auto;
            width: 100%;
        }

        .product-image-thumbs {
            -ms-flex-align: stretch;
            align-items: stretch;
            display: -ms-flexbox;
            display: flex;
            margin-top: 2rem;
        }

        .product-image-thumb {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.075);
            border-radius: 0.25rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            display: -ms-flexbox;
            display: flex;
            margin-right: 1rem;
            max-width: 7rem;
            padding: 0.5rem;
        }

        .product-image-thumb img {
            max-width: 100%;
            height: auto;
            -ms-flex-item-align: center;
            align-self: center;
        }

        .product-image-thumb:hover {
            opacity: .5;
        }

        .star {
            visibility:hidden;
            font-size:30px;
            cursor:pointer;
        }
        .star:before {
            content: "\2606";
            position: absolute;
            visibility:visible;
        }
        .star:checked:before {
            content: "\2605";
            position: absolute;
        }

        element.style {
            display: inline-block;
            max-height: 72px;
            overflow: hidden;
            position: relative;
        }
        .s_product_text p {
             padding-top: 0px !important;
             margin-top: 20px !important;
             margin-bottom: 0px !important;
        }
    </style>
@endsection

@section('title', 'Product Details')
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
                        <a href="/shop">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Product Details</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="row s_product_inner">
                        <div class="col-12">
                            <img src="@if($product->images->isNotEmpty()) {{ asset('/img/products/'. $product->images[0]->file_path) }} @endif" class="product-image" alt="{{ $product->name }}">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            @foreach($product->images as $image)
                                <div class="product-image-thumb">
                                    <img src="{{ asset('/img/products/'.$image->file_path) }}" alt="Product Image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $product->name }}</h3>
                        <div class="tab-content" id="vert-tabs-right-tabContent">
                            <?php $i = 1; ?>
                            @foreach($product->sizes->where('quantity', '>', 0) as $size)
                                <div class="tab-pane fade @if($i == 1) show active @endif" id="value{{ $size->id }}" role="tabpanel" aria-labelledby="vert-tabs-right-home-tab{{ $size->id }}">
                                    <h2>@if(session('currency') == 'Naira') ₦{{ number_format($size->cost_ngn, 2) }} @else ${{ number_format($size->cost_dol) }} @endif</h2>
                                    <input type="hidden" class="size" id="product{{ $i }}" value="{{ $size->id }}">
                                </div>
                                <?php $i++; ?>
                            @endforeach
                        </div>
                        <ul class="list">
                            <li><a class="active" href="/shop?cat={{$product->category->name}}"><span>Category</span> : {{ $product->category->name }}</a></li>
                            <li><a href="#"><span>Availibility</span> : @if($product->sizes->where('quantity', '>', '0')->isNotEmpty())In Stock @else <span class="text-warning">Out Of Stock</span>@endif</a></li>
                            <li><span>Sizes</span> :
                                <?php $w = 1; ?>
                                <div class="btn-group-toggle nav" id="vert-tabs-tab" role="tablist" aria-orientation="horizontal">
                                @foreach($product->sizes->where('quantity', '>', 0) as $size)
                                    <label class="btn btn-default text-center" id="size{{ $size->id }}" data-toggle="pill" href="#value{{ $size->id }}" role="tab" aria-controls="tabs-home-{{$size->id}}" @if($w == 1) aria-selected="true" @else aria-selected="false" @endif >
                                        <span class="text-xl">{{ $size->size }}{{ $size->measure }}</span>
                                    </label>
                                    <?php $w++; ?>
                                @endforeach
                                </div>
                            </li>
                        </ul>
                        <p class="show-less-div">{!! $product->description !!}</p>
                        <div class="card_area d-flex align-items-center">
                            <a class="primary-btn" href="#" onclick="add_cart()">Add to Cart</a>
                            <form id="add_cart_{{$product->id}}" action="{{ route('cart.add') }}" method="post" style="display:none;">
                                {{csrf_field()}}
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            </form>
                            <a class="icon_btn" href="#" onclick="
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
                                });"><i class="lnr lnr lnr-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                       aria-selected="false">Specification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                       aria-selected="false">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                       aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    {{ $product->description }}
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @if($product->specifications->isNotEmpty())
                        <div class="table-responsive-sm">
                            <table class="table">
                                <tbody>
                                @foreach($product->specifications as $specs)
                                    <tr>
                                        <td>{{ $specs->heading }}</td>
                                        <td>{{ $specs->value }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            @if($product->comments->isNotEmpty())
                            <div class="comment_list">
                                @foreach($product->comments->reverse() as $comment)
                                <div class="review_item">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4>{{ $comment->name }}</h4>
                                            <h5>{{ date('dS M, Y h:i A') }}</h5>
                                        </div>
                                    </div>
                                    <p>{{ $comment->message }}</p>
                                </div>
                                @endforeach
                            </div>
                            @else
                                <p class="text-yellow">No comments for this product.</p>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Post a comment</h4>
                                <form class="row contact_form" action="{{ route('post.comment') }}" method="post" id="contactForm" novalidate="novalidate">
                                    @csrf
                                    <input type="hidden" name="product" value="{{ $product->name }}">
                                    @if(\Illuminate\Support\Facades\Auth::user() == null)
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="number" name="phone" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            @if($product->reviews->isNotEmpty())
                                <div class="row total_rate">
                                    <div class="col-6">
                                        <div class="box_total">
                                            <h5>Overall</h5>
                                            <h4>{{ $avr }}</h4>
                                            <h6>({{ $c }} Reviews)</h6>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="rating_list">
                                            <h3>Based on 3 Reviews</h3>
                                            <ul class="list">
                                                <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> {{ $five }}</a></li>
                                                <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> {{ $four }}</a></li>
                                                <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> {{ $three }}</a></li>
                                                <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> {{ $two }}</a></li>
                                                <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> {{ $one }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="review_list">
                                    @foreach($product->reviews as $rating)
                                    <div class="review_item">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4>{{ $rating->name }}</h4>
                                                <?php
                                                $count = $rating->rating;
                                                while ($count > 0){
                                                    echo '<i class="fa fa-star"></i>';
                                                    $count--;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <p>{{ $rating->message }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-yellow">No reviews yet!</p>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Add a Review</h4>
                                <form class="row contact_form" action="{{ route('post.review') }}" method="post" id="contactForm" novalidate="novalidate">
                                    @csrf
                                    <input type="hidden" name="product" value="{{ $product->name }}">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="star" type="radio" name="rating" value="1" title="bookmark page">
                                            <input class="star" type="radio" name="rating" value="2" title="bookmark page">
                                            <input class="star" type="radio" name="rating" value="3" title="bookmark page">
                                            <input class="star" type="radio" name="rating" value="4" title="bookmark page">
                                            <input class="star" type="radio" name="rating" value="5" title="bookmark page">
                                        </div>
                                    </div>
                                    @if(\Illuminate\Support\Facades\Auth::user() == null)
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Full name'">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="number" name="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'">
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Review" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="primary-btn">Submit Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->

    @if(!empty($related))
        <!-- Start related-product Area -->
        <section class="related-product-area section_gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Related Products</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach($related as $wish)
                                <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                    <div class="single-related-product d-flex">
                                        <a href="#"><img src="{{ asset('/img/products/'. $wish->images[0]->file_path ) }}" alt="{{ $wish->name }}" height="100px"></a>
                                        <div class="desc">
                                            <a href="{{ route('product.view', $wish->name) }}" class="title">{{ $wish->name }}</a>
                                            <div class="price">
                                                <h6>@if($wish->sizes->isNotEmpty()) @if(session('currency') == 'Naira') ₦{{ number_format($wish->sizes[0]->cost_ngn, 2) }} @else ${{ number_format($wish->sizes[0]->cost_dol) }} @endif @endif</h6><br>
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
    <script src="{{ asset('/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('/js/showmoreless.js') }}"></script>
    <script type="text/javascript">
        (function ($) {
                $('.product-image-thumb').on('click', function () {
                var image_element = $(this).find('img')
                $('.product-image').prop('src', $(image_element).attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            });
            $(function(){
                $('.show-less-div').myOwnLineShowMoreLess({
                    showLessLine: 3
                });
            });

        })(jQuery)
        // $(document).ready(function() {
            function add_cart() {
                event.preventDefault();
                var product = '{{$product->name}}';
                var size = $('.show.active > input:hidden.size').val();
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
            }
        // });
    </script>
@endsection
