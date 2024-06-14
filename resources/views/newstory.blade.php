@extends('layouts.pagefront')

@section('title', 'Our Story')
@section('story', 'active')

@section('content')

    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                        <h1 class="page-title">Our Story</h1>
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li class="current"><span>Our Story</span></li>
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
                    <div class="col-12">
                        <article class="blog blog-style-2 blog-list mb--50">
                            <div class="blog-media">
                                <figure class="">
                                    <a href="single-post-image.html">
                                        <img src="{{ asset('/img/tbally-logo.png') }}" alt="Blog">
                                    </a>
                                </figure>
                            </div>
                            <div class="blog-info">
                                <h2 class="blog-title">
                                    <a href="#"><strong>About 2207byTBally</strong></a>
                                </h2>
                                <div class="blog-content mb--25">
                                    <p>Is a women’s fashion retailer founded by Tolu Bally in November 2016. We're know
                                        for our signature bold approach to colours, form-fitting tailored pieces, simple and
                                        yet classy fashion.The designs are youthful, colourful and versatile, making the
                                        outfits wearable for women with a busy and active lifestyle.<br><br>
                                        The outfits are tailored by a family of designers with years of experience in
                                        designing and tailoring for women. Fitted outfit is
                                        for the everyday woman, who takes pride in her appearance, and values her stylistic
                                        expression; all designs are put together with her in mind.
                                        Currently, 2207byTbally serve customers in the UK, US, Canada, Nigeria and other
                                        countries in Europe and Africa.</p>
                                </div>
                            </div>
                        </article>
                        <article class="blog blog-style-2 blog-list mb--50">
                            <div class="blog-media">
                                <figure class="">
                                    <a href="single-post-image.html">
                                        <img src="{{ asset('/img/FCF1259-Edit-240x300.jpg') }}" alt="Blog">
                                    </a>
                                </figure>
                            </div>
                            <div class="blog-info">
                                <h2 class="blog-title">
                                    <a href="#"><strong>About Tolu Bally</strong></a>
                                </h2>
                                <div class="blog-content mb--25">
                                    <p> <strong>Tolu Bally</strong> was born in Nigeria but she moved her life to the united
                                        kingdom to complete her studies.<br>

                                        She graduated from the University of East London with a Psychosocial studies
                                        degree.<br><br>

                                        During her time in the UK, her passion for business and fashion was conceived and
                                        this inspired her to start selling clothes from the booth of her car. She had always
                                        had a strong fashion sense which made her an unofficial stylist for family and
                                        friends. Later on, a significant event helped shape her path to starting her own
                                        fashion brand.<br><br>

                                        She had a light bulb moment after the birth of her son. She wanted to build
                                        something that could be passed on as a legacy to her son. She knew she had to focus
                                        on something she loved doing and this was fashion.<br><br>

                                        2207byTbally was not the first business she started. She opened her first boutique
                                        after moving back to Nigeria but had to close down shop because of inflationary
                                        pressures in the country. However, this was not a deterrent for her. She decided to
                                        try again and gave birth to 2207byTbally, a women’s fashion retail brand for every
                                        woman. She revised her business model, focusing on growing marketing trend of social
                                        media and the business has grown YoY since it started.<br></p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper End -->

@endsection
