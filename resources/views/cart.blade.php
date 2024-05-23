@extends('layouts.front')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
@endsection

@section('title', 'cart')
@section('cart', 'active')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/shop">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            @if (!empty($carts))
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:2%"></th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($w = 1)
                                @php($total = 0)
                                <script type="text/javascript">
                                    var total = 0;
                                    let cart = [];
                                </script>
                                <?php $cur = session('currency') == 'Naira' ? '₦' : '$'; ?>
                                @foreach ($carts as $item)
                                    <?php $total += session('currency') == 'Naira' ? $item->cost_ngn : $item->cost_dol; ?>
                                    <script type="text/javascript">
                                        total += parseFloat('{{ session('currency') == 'Naira' ? $item->cost_ngn : $item->cost_dol }}')
                                        cart.push({
                                            id: {{ $item->id }},
                                            quantity: 1,
                                            loc: ''
                                        });
                                    </script>
                                    <tr>
                                        <td>
                                            <a type="button" class="btn btn-xs text-danger" title="remove item from list"
                                                onclick="var result = confirm('Are you very sure you want to remove this Item from the cart?');
                                        if(result){
                                        event.preventDefault();
                                        document.getElementById('delete-cart{{ $w }}').submit();
                                        }
                                        ">
                                                <small>X</small>
                                            </a>
                                            <form id="delete-cart{{ $w }}" action="{{ route('delete.cart') }}"
                                                method="post" style="display:none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="size" value="{{ $item->id }}">
                                            </form>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset('/img/products/' . $item->product->images[0]->file_path) }}"
                                                        width="50px" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $item->product->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>
                                                @if (session('currency') == 'Naira')
                                                    {{ $cur }}{{ number_format($item->cost_ngn, 2) }}
                                                @else
                                                    {{ $cur }}{{ number_format($item->cost_dol) }}
                                                @endif
                                            </h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <input type="text" name="qty" id="sst{{ $w }}"
                                                    maxlength="12" value="1" title="Quantity:" class="input-text qty">
                                                <button
                                                    onclick="
                                            var result = document.getElementById('sst{{ $w }}');
                                            var sst = result.value;
                                            if( !isNaN( sst ) &amp;&amp; sst < {{ $item->quantity }})  {
                                                result.value++;
                                            }
                                            var amt = parseFloat('<?php
                                            if (session('currency') == 'Naira') {
                                                echo $item->cost_ngn;
                                            } else {
                                                echo $item->cost_dol;
                                            }
                                            ?>');
                                            var tot = amt * result.value;
                                            total = (total + tot) - (amt * (result.value - 1));
                                            cart = cart.map(item => {
                                                if(item.id === {{ $item->id }}) {
                                                    return {...item, quantity: +result.value}
                                                } else return item;
                                            });
                                            document.getElementById('order-details').value = JSON.stringify(cart);
                                            var lst = tot.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
                                            $('#price{{ $w }}').text(lst);
                                            $('#total').text(total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,'));
                                            return false;
                                            "
                                                    class="increase items-count" type="button"><i
                                                        class="lnr lnr-chevron-up"></i></button>
                                                <button
                                                    onclick="
                                            var result = document.getElementById('sst{{ $w }}');
                                            var sst = result.value;
                                            if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;
                                            var amt = parseFloat('<?php
                                            if (session('currency') == 'Naira') {
                                                echo $item->cost_ngn;
                                            } else {
                                                echo $item->cost_dol;
                                            }
                                            ?>');
                                            var tot = amt * result.value;
                                            total = (total - tot) + (amt * (result.value - 1));
                                            cart = cart.map(item => {
                                                if(item.id === {{ $item->id }}) {
                                                return {...item, quantity: +result.value}
                                                } else return item;
                                            });
                                            var lst = tot.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
                                            $('#price{{ $w }}').text(lst);
                                            $('#total').text(total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,'));
                                            return false;
                                            "
                                                    class="reduced items-count" type="button"><i
                                                        class="lnr lnr-chevron-down"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <h5><?php
                                            echo $cur;
                                            echo '<span id="price' . $w . '">';
                                            if (session('currency') == 'Naira') {
                                                echo number_format($item->cost_ngn, 2);
                                            } else {
                                                echo number_format($item->cost_dol, 2);
                                            }
                                            echo '</span>';
                                            ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <?php $w++; ?>
                                @endforeach
                                <tr class="bottom_button" id="coupon-box">
                                    <td></td>
                                    <td>
                                        {{--                                <a class="gray_btn" href="#">Update Cart</a> --}}
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="cupon_text d-flex align-items-center">
                                            <input type="text" id="coupon" placeholder="Coupon Code">
                                            <a class="primary-btn" href="#" onclick="apply_coupon()">Apply</a>
                                            <a class="gray_btn" href="#">Close Coupon</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>
                                            <?php
                                            echo $cur;
                                            echo '<span id="total"><script>document.write(total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"))</script>';
                                            echo '</span>';
                                            ?>
                                        </h5>
                                    </td>
                                </tr>
                                <tr class="shipping_area">
                                    <td></td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        {{--                                <h5>Shipping</h5> --}}
                                    </td>
                                    <td>
                                        <div class="shipping_box">
                                            <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                            <select class="shipping_select" id="shipping"
                                                onchange="handleSelectChange(event)">
                                                <option value="">Store Pickup</option>
                                                @foreach ($locs as $loc)
                                                    <option value="{{ $loc->location }}">{{ $loc->location }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td></td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn" href="/shop">Continue Shopping</a>
                                            <a class="primary-btn" href="#"
                                                onclick="
                                    event.preventDefault();
                                    document.getElementById('checkout').submit()">Proceed
                                                to checkout</a>
                                            <form class="form-inline" id="checkout" method="post"
                                                action="{{ route('checkout') }}" role="form">
                                                @csrf
                                                <input type="hidden" name="product" id="order-details" value="">
                                                <input type="hidden" name="ship" id="shipping-details" value="">
                                                <input type="hidden" name="coupon" id="cou" value="">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="alert alert-success" role="alert">
                    You have no products in your cart at the moment. Click <a href="/shop">here</a> to continue shopping
                </div>
            @endif
        </div>
    </section>
    <!--================End Cart Area =================-->

@endsection

@section('script')
    <script src="{{ asset('/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script type="text/javascript">
        document.getElementById('order-details').value = JSON.stringify(cart);

        function handleSelectChange(event) {

            // if you want to support some really old IEs, add
            event = event || window.event;

            var selectElement = event.target;

            var value = selectElement.value;
            // to support really old browsers, you may use
            selectElement.value || selectElement.options[selectElement.selectedIndex].value;
            document.getElementById('shipping-details').value = value;

        }

        function apply_coupon() {
            event.preventDefault();
            var coupon = document.getElementById('coupon').value;
            $.ajax({
                type: 'POST',
                url: '{{ route('coupon') }}',
                data: {
                    coupon,
                    _token: '{{ csrf_token() }}',
                    _method: 'POST'
                },
                _method: 'POST',
                '_token': '{{ csrf_token() }}',
                complete: function(response) {
                    if (response.status === 200) {
                        $('#coupon-box').html('');
                        var amt = response.responseJSON.amt;
                        $('#coupon-box').html('<td></td><td></td><td></td><td><h5>Coupon</h5></td><td><h5>-' +
                            amt + '</h5></td>').show();
                        document.getElementById('cou').value = response.responseJSON.code;
                    }
                },
                error: function() {
                    alert('Coupon does not exist or expired');
                }
            });
        }
    </script>
@endsection
