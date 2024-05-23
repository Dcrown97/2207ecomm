@extends('layouts.pagefront')

@section('title', 'cart')
@section('cart', 'active')

@section('content')

    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                        <h1 class="page-title">Cart</h1>
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li class="current"><span>Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div class="main-content-wrapper">
        <div class="page-content-inner ptb--80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-md--50">
                        <form class="cart-form" action="#">
                            <div class="row g-0">
                                <div class="col-12">
                                    <div class="table-content table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th class="text-start">Product</th>
                                                    <th>price</th>
                                                    <th>quantity</th>
                                                    <th>total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="product-remove text-start"><a href="#"><i
                                                                class="flaticon flaticon-cross"></i></a></td>
                                                    <td class="product-thumbnail text-start">
                                                        <img src="./zakas/assets/img/products/prod-10-70x88.jpg"
                                                            alt="Product Thumnail">
                                                    </td>
                                                    <td class="product-name text-start wide-column">
                                                        <h3>
                                                            <a href="product-details.html">Super skinny blazer</a>
                                                        </h3>
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="product-price-wrapper">
                                                            <span class="money">$49.00</span>
                                                        </span>
                                                    </td>
                                                    <td class="product-quantity">
                                                        <div class="quantity">
                                                            <input type="number" class="quantity-input" name="qty"
                                                                id="qty-1" value="1" min="1">
                                                        </div>
                                                    </td>
                                                    <td class="product-total-price">
                                                        <span class="product-price-wrapper">
                                                            <span class="money">$49.00</span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 border-top pt--20 mt--20">
                                <div class="col-sm-6">
                                    <div class="coupon">
                                        <input type="text" id="coupon" name="coupon" class="cart-form__input"
                                            placeholder="Coupon Code">
                                        <button type="submit" class="cart-form__btn">Apply Coupon</button>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-sm-end">
                                    <button type="submit" class="cart-form__btn">Clear Cart</button>
                                    <button type="submit" class="cart-form__btn">Update Cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-collaterals">
                            <div class="cart-totals">
                                <h5 class="font-size-14 font-bold mb--15">Cart totals</h5>
                                <div class="cart-calculator">
                                    <div class="cart-calculator__item">
                                        <div class="cart-calculator__item--head">
                                            <span>Subtotal</span>
                                        </div>
                                        <div class="cart-calculator__item--value">
                                            <span>$196.00</span>
                                        </div>
                                    </div>
                                    <div class="cart-calculator__item">
                                        <div class="cart-calculator__item--head">
                                            <span>Shipping</span>
                                        </div>
                                        <div class="cart-calculator__item--value">
                                            <span>Flat rate: $20.00</span>
                                            <div class="shipping-calculator-wrap">
                                                <a href="#shipping_calculator" class="expand-btn">Calculate Shipping</a>
                                                <form id="shipping_calculator"
                                                    class="form shipping-calculator-form hide-in-default">
                                                    <div class="form__group">
                                                        <select id="calc_shipping_country" name="calc_shipping_country"
                                                            class="nice-select form__input--select form__input--2">
                                                            <option value="">Select a country…</option>
                                                            <option value="AF">Afghanistan</option>
                                                            <option value="AL">Albania</option>
                                                            <option value="DZ">Algeria</option>
                                                        </select>
                                                    </div>

                                                    <div class="form__group">
                                                        <select id="calc_shipping_district" name="calc_shipping_district"
                                                            class="nice-select form__input--select form__input--2">
                                                            <option value="">Select a District…</option>
                                                            <option>BARISAL</option>
                                                            <option>BHOLA</option>
                                                            <option>BANDARBAN</option>
                                                            <option>BRAHMANBARIA</option>
                                                        </select>
                                                    </div>

                                                    <div class="form__group mb--10 mb-sm--15">
                                                        <input type="text" name="calc_shipping_city"
                                                            id="calc_shipping_city" class="form__input form__input--2"
                                                            placeholder="Town / City">
                                                    </div>

                                                    <div class="form__group mb--10 mb-sm--15">
                                                        <input type="text" name="calc_shipping_zip"
                                                            id="calc_shipping_zip" class="form__input form__input--2"
                                                            placeholder="Postcode / Zip">
                                                    </div>

                                                    <div class="form__group">
                                                        <input type="submit" value="Update Totals"
                                                            class="btn-submit btn-submit--small">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-calculator__item order-total">
                                        <div class="cart-calculator__item--head">
                                            <span>Total</span>
                                        </div>
                                        <div class="cart-calculator__item--value">
                                            <span class="product-price-wrapper">
                                                <span class="money">$226.00</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-fullwidth btn-bg-red btn-color-white btn-hover-2"
                                onclick="
                                    event.preventDefault();
                                    document.getElementById('checkout').submit()">
                                Proceed To Checkout
                            </a>
                            <form class="form-inline" id="checkout" method="post" action="{{ route('checkout') }}"
                                role="form">
                                @csrf
                                <input type="hidden" name="product" id="order-details" value="">
                                <input type="hidden" name="ship" id="shipping-details" value="">
                                <input type="hidden" name="coupon" id="cou" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->

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

