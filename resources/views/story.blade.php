@extends('layouts.front')

@section('style')

@endsection

@section('title', 'Our Story')
@section('story', 'active')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shop Now</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/story">Shop</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container pt-4 pb-5">
        <div class="row mb-5">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <img class="img-fluid" src="{{ asset('/img/tbally-logo-300x300.png') }}">
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list" style="line-height: 2.2em; font-size: 1.2em;">
                    <strong>2207bytbally</strong> is a women’s fashion retailer founded by Tolu Bally in November 2016. <br>
                    <strong>2207bytbally</strong> is known for its signature bold approach to colours, form-fitting tailored pieces, simple and yet classy fashion.<br>

                    The designs are youthful, colourful and versatile, making the outfits wearable for women with a busy and active lifestyle.<br>

                    The outfits are tailored by a family of designers with years of experience in designing and tailoring for women.<br>

                    <strong>2207byTBally</strong> fitted outfit is for the everyday woman, who takes pride in her appearance, and values her stylistic expression; all designs are put together with her in mind.
                    Currently, 2207byTbally serve customers in the UK, US, Canada, Nigeria and other countries in Europe and Africa.
                </section>
                <!-- End Best Seller -->
            <!-- End Filter Bar -->
            </div>
        </div>
        <div class="row mt-2 mb-4">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <img class="img-fluid" src="{{ asset('/img/FCF1259-Edit-240x300.jpg') }}">
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list" style="line-height: 2.2em; font-size: 1.2em;">
                    <strong>Tolu Bally</strong> was born in Nigeria but she moved her life to the united kingdom to complete her studies.<br>

                    She graduated from the University of East London with a Psychosocial studies degree.<br>

                    During her time in the UK, her passion for business and fashion was conceived and this inspired her to start selling clothes from the booth of her car. She had always had a strong fashion sense which made her an unofficial stylist for family and friends. Later on, a significant event helped shape her path to starting her own fashion brand.<br>

                    She had a light bulb moment after the birth of her son. She wanted to build something that could be passed on as a legacy to her son. She knew she had to focus on something she loved doing and this was fashion.<br>

                    2207byTbally was not the first business she started. She opened her first boutique after moving back to Nigeria but had to close down shop because of inflationary pressures in the country. However, this was not a deterrent for her. She decided to try again and gave birth to 2207byTbally, a women’s fashion retail brand for every woman. She revised her business model, focusing on growing marketing trend of social media and the business has grown YoY since it started.<br>
                </section>
                <!-- End Best Seller -->
            <!-- End Filter Bar -->
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
