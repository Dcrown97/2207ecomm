@extends('layouts.front')

@section('style')
    <link rel="stylesheet" href="{{ asset('/plugins/select2/css/select2.min.css') }}"></link>
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
                        <a href="/shop">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            @if(Auth::user() == null)
            <div class="returning_customer mb-4" >
                <div class="check_title">
                    <h2>Returning Customer? <a data-toggle="collapse" href="#signin" role="button" aria-expanded="false" aria-controls="signin">Click here to login</a></h2>
                </div>
                <div class="collapse" id="signin">
                    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
                        customer, please proceed to the Billing & Shipping section.</p>
                    <form class="row contact_form" action="#">
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="name" name="name">
                            <span class="placeholder" data-placeholder="Username or Email"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="password" class="form-control" id="password" name="password">
                            <span class="placeholder" data-placeholder="Password"></span>
                        </div>
                        <div class="col-md-12 form-group">
                            <button class="primary-btn">login</button>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option" name="selector">
                                <label for="f-option">Remember me</label>
                            </div>
                            <a class="lost_pass" href="#">Lost your password?</a>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @if(null == $products['coupon'] && empty($products['coupon']))
            <div class="cupon_area" id="coupon_area">
                <div class="check_title">
                    <h2>Have a coupon? <a data-toggle="collapse" href="#coupon" role="button" aria-expanded="false" aria-controls="coupon">Click here to enter your code</a></h2>
                </div>
                <div class="collapse" id="coupon">
                    <input type="text" id="code" placeholder="Enter coupon code">
                    <a class="tp_btn" href="#" onclick="apply_coupon()" >Apply Coupon</a>
                </div>
            </div>
            @endif
            <div class="billing_details">
                <form class="contact_form" id="payment" action="#" method="post">
                    <input type="hidden" name="coupon" id="cou" value="@if(null != $products['coupon'] && !empty($products['coupon'])) {{$products['coupon']}} @endif">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="first" name="first" required>
                                    <span class="placeholder" data-placeholder="First name"></span>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="last" name="last" required>
                                    <span class="placeholder" data-placeholder="Last name"></span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Company name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" id="number" name="phone" placeholder="Phone number">
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" required>
                                    <span class="placeholder" data-placeholder="Email Address"></span>
                                </div>
                                <div class="col-md-4 form-group ">
                                    <select name="country" class="countries form-control" id="countryId" required>
                                        <option value="">Select Country</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group p_star">
                                    <select name="state" class="states  form-control" id="stateId" required>
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group p_star">
                                    <select class="cities form-control" name="city" id="cityId" >
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="add1" name="street1" required>
                                    <span class="placeholder" data-placeholder="Address line 01"></span>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" class="form-control" id="add2" name="street2" placeholder="Address line 02">
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="text" class="form-control" id="zip" name="postal" placeholder="Postcode/ZIP">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <input type="checkbox" id="f-option2" name="selector">
                                        <label for="f-option2">Create an account?</label>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h3>Shipping Details</h3>
                                        <input type="checkbox" id="f-option3" data-toggle="collapse" href="#address2" role="button" aria-expanded="false" aria-controls="address2">
                                        <label for="f-option3">Ship to a different address?</label>
                                    </div>
                                </div>
                                <div class="row collapse" id="address2">
                                    <div class="col-md-6 form-group p_star">
                                        <input type="text" class="form-control" id="first_ship" name="first_ship">
                                        <span class="placeholder" data-placeholder="First name"></span>
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <input type="text" class="form-control" id="last_ship" name="last_ship">
                                        <span class="placeholder" data-placeholder="Last name"></span>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" id="company_ship" name="company_ship" placeholder="Company name">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" id="number_ship" name="phone_ship" placeholder="Phone number">
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <input type="text" class="form-control" id="email_ship" name="email_ship">
                                        <span class="placeholder" data-placeholder="Email Address"></span>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <select class="form-control" name="country_ship" id="country" style="width: 100% !important;">
                                            <option value="">Select Country</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group p_star">
                                        <select class="form-control w-100" name="state_ship" id="state" style="width: 100% !important;">
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8 form-group p_star">
                                        <input type="text" class="form-control" id="city_ship" name="city_ship">
                                        <span class="placeholder" data-placeholder="Town/City"></span>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" class="form-control" id="zip_ship" name="postal_ship" placeholder="Postcode/ZIP">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="add1_ship" name="street1_ship">
                                        <span class="placeholder" data-placeholder="Address line 01"></span>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="add2_ship" name="street2_ship">
                                        <span class="placeholder" data-placeholder="Address line 02"></span>
                                    </div>
                                </div>
                                <div class="row w-100">
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control" name="note" id="message" rows="1" placeholder="Order Notes"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Your Order</h2>
                                <ul class="list">
                                    @php( $cur = (session('currency') == 'Naira')? '₦': '$' )
                                    <li><a href="#">Product <span>Total</span></a></li>
                                    <?php
                                    $total = 0;
                                    $sub = 0;
                                    foreach($products['items'] as $item):
                                        $sub += ($item['item']['cost'] * $item['item']['qty']);
                                        ?>
                                    <li><a href="#">{{ $item['item']['name'] }}<span class="middle">x {{ $item['item']['qty'] }}</span> <span class="last">{{$cur. number_format($item['item']['cost'], 2)}}</span></a></li>
                                    <?php
                                    endforeach;
                                    $total = $sub + $products['shipping'];
                                    ?>
                                </ul>
                                <ul class="list list_2">
                                    <li><a href="#">Subtotal <span>{{$cur. number_format($sub, 2)}}</span></a></li>
                                    <li><a href="#">Shipping <span>{{$cur. number_format($products['shipping'], 2)}}</span></a></li>
                                    @if(null != $products['coupon'] && !empty($products['coupon']))
                                        <li><a href="#">Coupon <span>-{{$cur. number_format($products['coupon_amt'], 2)}}</span></a></li>
                                        @php( $total -= $products['coupon_amt'])
                                    @else
                                        <li style="display: none" id="coup_val"></li>
                                    @endif
                                    <li>
                                        <a href="#">Total
                                            @if(null != $products['coupon'] && !empty($products['coupon']))
                                            <span>{{$cur. number_format($total, 2)}}</span>
                                            @else
                                                <span id="total_val">{{ $cur . number_format($total, 2)}}</span>
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option4" name="selector" required>
                                    <label for="f-option4">I’ve read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                </div>
                                <button type="submit" class="primary-btn" >Proceed to Paypal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

@endsection

@section('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{ asset('/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('/js/countries.js') }}"></script>
    <script src="//geodata.solutions/includes/countrystatecity.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        $(document).ready(function() {
            $('#countryId').select2({
                placeholder: 'Select country'
            });
            $('#stateId').select2({
                placeholder: 'Select State'
            });
            $('#cityId').select2({
                placeholder: 'Select City'
            });
            $('#country').select2({
                placeholder: 'Select Country'
            });
            $('#state').select2({
                placeholder: 'Select State'
            });
            $('#form').validate({ // initialize the plugin
                rules: {
                    first: {
                        required: true
                    },
                    last: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    country: {
                        required: true
                    },
                    state: {
                        required: true
                    },
                    city: {
                        required: true
                    },
                    street1: {
                        required: true
                    },
                    selector: {
                        required: true
                    }
                }
            });
        });
        function apply_coupon(){
            event.preventDefault();
            var coupon = document.getElementById('code').value;
            $.ajax({
                type: 'POST',
                url: '{{ route('coupon') }}',
                data: {coupon, _token: '{{ csrf_token() }}', _method: 'POST' },
                _method: 'POST',
                '_token': '{{ csrf_token() }}',
                complete: function( response ) {
                    if(response.status === 200){
                        $('#coupon_area').html('');
                        var amt = response.responseJSON.amt;
                        $('#coupon-box').html('<div class="check_title"><h2>Coupon Added</h2></div>').show();
                        $('#coup_val').html('<a href="#">Coupon <span>-'+ amt + '</span></a>').show();
                        var total_val = $('#total_val').text();
                        var new_tot = Number(total_val.replace(/[^0-9.-]+/g,"")) - Number(amt.replace(/[^0-9.-]+/g,""));
                        $('#total_val').text('{{$cur}}' + new_tot.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,'));
                        document.getElementById('cou').value = response.responseJSON.code;
                    }
                },
                error: function (){
                    alert('Coupon does not exist or expired');
                }
            });
        }
        function uuidv4(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }
        var request;
        $('#payment').on('submit', function(e){
            e.preventDefault();
            if (request) {
                request.abort();
            }
            var $form = $(this);
            var first = document.getElementById("first").value;
            var last = document.getElementById("last").value;
            var $inputs = $form.find("input, select, button, textarea");
            var serializedData = $form.serialize();
            $inputs.prop("disabled", true);
            var total = @if(null != $products['coupon'] && !empty($products['coupon'])) {{ $total * 100 }}
                        @else Number($("#total_val").text().replace(/[^0-9.-]+/g,"")) * 100 @endif;
            var products = <?php echo json_encode($products) ?>;
            var prod_array = JSON.stringify(products);
            var ref = uuidv4(8) + '-' + first.substr(0, 1) + last.substr(0, 1) + '-' + total;
            $.ajax({
                type: "POST",
                url: '{{ route('payment') }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: serializedData + '&total=' + total + '&products=' + prod_array + '&ref=' + ref,
                _method: 'POST',
                '_token': '{{ csrf_token() }}',
                success: function( data ) {
                    let handler = PaystackPop.setup({
                        key: '{{ config("app.paystack_key") }}', // Replace with your public key
                        email: document.getElementById("email").value,
                        amount: total,
                        currency:"{{ (Session::get('currency') == 'Naira')? 'NGN': 'USD' }}",
                        ref, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                        // label: "Optional string that replaces customer email"
                        onClose: function () {
                            alert('Window closed.');
                        },
                        callback: function (response) {
                            window.location.href = window.location.origin + "/confirm?ref="+ref;
                        }
                    });
                    handler.openIframe();
                }
            });
        });
        populateCountries("country", "state");
    </script>
@endsection
