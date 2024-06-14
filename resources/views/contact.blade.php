@extends('layouts.front')

@section('style')

@endsection

@section('title', 'Contact Us')
@section('contact', 'active')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Contact Us</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Contact</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap_bottom">
        <div class="container">
            <div id="mapBox" class="mapBox" data-lat="6.431594704380219" data-lon="3.465167246025882" data-zoom="13" data-info="Jazz 38 TF Kuboye road by pinnacle gas station Lekki"
                 data-mlat="6.431594704380219" data-mlon="3.465167246025882">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Lekki, Lagos State Nigeria</h6>
                            <p>Jazz 38 TF Kuboye road by pinnacle gas station Lekki</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="tel:07059375558">07059375558</a></h6>
                            <p>Mon to Fri 9am to 6 pm, <br>10am to 2pm Sat</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="mailTo:2207bytbally@gmail.com">2207bytbally@gmail.com</a></h6>
                            <p>We are always here for you!</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-clock"></i>
                            <h6><a href="mailTo:2207bytbally@gmail.com">Working Hours: </a></h6>
                            <p>Mon to Fri 9am to 6 pm, <br>10am to 2pm Sat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="{{ route('post.contact') }}" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-6">
                            @csrf
                            @if(\Illuminate\Support\Facades\Auth::user() == null)
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Phone Number'">
                            </div>
                            @endif
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="primary-btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->

@endsection

@section('script')

@endsection
