@extends('layouts.front')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
@endsection

@section('title', 'cart')
@section('Confirmation', 'active')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Confirmation</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/shop">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Confirmation</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Order Details Area =================-->
    <section class="order_details section_gap">
        <div class="container">
            <h3 class="title_confirmation">
                @if($sales->status == 'success')
                    Thank you. Your order has been received.
                @elseif($sales->status == 'pending')
                    <span class="text-warning">Your Order is pending</span>
                @else
                    <span class="text-danger">Order status: {{ $sales->status }}</span>
                @endif
            </h3>
            <div class="row order_d_inner">
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Order Info</h4>
                        <ul class="list">
                            <li><a href="#"><span>Reference Code</span> : {{ $sales->ref }}</a></li>
                            <li><a href="#"><span>Date</span> : {{ date('d M, Y h:i A', strtotime($sales->updated_at)) }}</a></li>
                            <li><a href="#"><span>Coupon</span> : {{ ($sales->coupon != null)? $sales->coupon : 'None' }}</a></li>
                            <li><a href="#"><span>Total</span> : {{ ($sales->currency == 'Naira')? '₦':'$' }}{{ number_format($sales->total, 2) }}</a></li>
{{--                            <li><a href="#"><span>Payment method</span> : Check payments</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Billing Address</h4>
                        <ul class="list">
                            @php( $bill = $sales->address->where('type', 'billing'))
                            <li><a href="#"><span>Street</span> : {{ $bill[0]->street1 }}</a></li>
                            <li><a href="#"><span>City</span> : {{ $bill[0]->city. ', '. $bill[0]->state }}</a></li>
                            <li><a href="#"><span>Country</span> : {{ $bill[0]->country }}</a></li>
                            <li><a href="#"><span>Postcode </span> : {{ $bill[0]->postal }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Shipping Address</h4>
                        <ul class="list">
                            @php( $ship = $sales->address->where('type', 'shipping'))
                            <li><a href="#"><span>Street</span> : {{ $ship[1]->street1 }}</a></li>
                            <li><a href="#"><span>City</span> : {{ $ship[1]->city. ', '. $ship[1]->state }}</a></li>
                            <li><a href="#"><span>Country</span> : {{ $ship[1]->country }}</a></li>
                            <li><a href="#"><span>Postcode </span> : {{ $ship[1]->postal }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="order_details_table">
                <h2>Order Details</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php( $sub = 0)
                        @foreach($sales->items as $product)
                            @php($sub += $product->price)
                        <tr>
                            <td>
                                <p>{{ $product->product }}</p>
                            </td>
                            <td>
                                <h5>x {{ $product->quantity }}</h5>
                            </td>
                            <td>
                                <p>{{ ($sales->currency == 'Naira')? '₦':'$' }}{{ number_format($product->price, 2) }}</p>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                <h4>Subtotal</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>{{ ($sales->currency == 'Naira')? '₦':'$' }}{{ number_format($sub, 2) }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Shipping</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>@if($sales->loc != null){{ $sales->loc->location }}: {{ ($sales->currency == 'Naira')? '₦'. number_format($sales->loc->cost_ngn, 2):'$'.number_format($sales->loc->cost_dol, 2) }} @else Pick up @endif</p>
                            </td>
                        </tr>
                        @if($sales->coupon != null)
                        <tr>
                            <td>
                                <h4>Discount</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>@if($sales->cou != null)-{{ ($sales->currency == 'Naira')? '₦'. number_format($sales->cou->cost_ngn, 2):'$'.number_format($sales->cou->cost_dol, 2) }} @else Pick up @endif</p>
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>{{ ($sales->currency == 'Naira')? '₦':'$' }}{{ number_format($sales->total, 2) }}</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Order Details Area =================-->

@endsection

@section('script')
    <script src="{{ asset('/frontend/js/jquery.nice-select.min.js') }}"></script>
@endsection

