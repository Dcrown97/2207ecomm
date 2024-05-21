@extends('layouts.pagefront')

@section('title', 'Contact Us')
@section('contact', 'active')

@section('content')

    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                        <h1 class="page-title">Contact Us</h1>
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li class="current"><span>Contact Us</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div id="content" class="main-content-wrapper">
        <div class="page-content-inner pt--75">
            <div class="container">
                <div class="row pb--80">
                    <div class="col-md-7 mb-sm--30">
                        <h2 class="heading__secondary mb--50 mb-md--35 mb-sm--20">Get in touch</h2>

                        <!-- Contact form Start Here -->
                        <form class="form" action="{{ route('post.contact') }}" method="POST" id="contactForm">
                            @csrf
                            @if (\Illuminate\Support\Facades\Auth::user() == null)
                                <div class="form__group mb--20">
                                    <input type="text" id="contact_name" name="name"
                                        class="form__input form__input--2" placeholder="Your name*">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="email" id="contact_email" name="email"
                                        class="form__input form__input--2" placeholder="Email Address*">
                                </div>
                                <div class="form__group mb--20">
                                    <input type="text" id="contact_phone" name="phone"
                                        class="form__input form__input--2" placeholder="Your Phone*">
                                </div>
                            @endif
                            <div class="form__group mb--20">
                                <input type="text" id="contact_sub" name="subject" class="form__input form__input--2"
                                    placeholder="Subject*">
                            </div>
                            <div class="form__group mb--20">
                                <textarea class="form__input form__input--textarea" id="contact_message" name="message" placeholder="Message*"></textarea>
                            </div>
                            <div class="form__group">
                                <button type="submut" class="btn-submit">Send Now</button>
                            </div>
                        </form>
                        <!-- Contact form end Here -->

                    </div>
                    <div class="col-md-5 pl--50 pl-sm--30">
                        <h2 class="heading__secondary mb--50">Contact info</h2>

                        <!-- Contact info widget start here -->
                        <div class="contact-info-widget mb--45">
                            <div class="contact-info">
                                <h3 class="heading__tertiary">Lekki, Lagos State Nigeria</h3>
                                <p>Jazz 38 TF Kuboye road by pinnacle gas station Lekki</p>
                            </div>
                        </div>
                        <!-- Contact info widget end here -->

                        <!-- Contact info widget start here -->
                        <div class="contact-info-widget mb--45">
                            <div class="contact-info">
                                <h3 class="heading__tertiary">Working Hours: </h3>
                                <p>Mon to Fri 9am to 6 pm, <br>10am to 2pm Sat</p>
                            </div>
                        </div>
                        <!-- Contact info widget end here -->

                        <!-- Contact info widget start here -->
                        <div class="contact-info-widget two-column-list sm-one-column mb--45">
                            <div class="contact-info mb-sm--35">
                                <h3 class="heading__tertiary">Business Phone</h3>
                                <a href="#">07059375558</a>
                            </div>
                            <div class="contact-info">
                                <h3 class="heading__tertiary">We are always here for you!</h3>
                                <a href="mailTo:2207bytbally@gmail.com">2207bytbally@gmail.com</a>
                            </div>
                        </div>
                        <!-- Contact info widget end here -->

                        <!-- Social Icons Start Here -->
                        <ul class="social social-sharing">
                            <li class="social__item">
                                <a href="#" target="_blank" rel="noopener" class="social__link twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="#" target="_blank" rel="noopener"
                                    class="social__link google-plus">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="#" target="_blank" rel="noopener"
                                    class="social__link facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="#" target="_blank" rel="noopener"
                                    class="social__link instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- Social Icons End Here -->
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-12">
                        <iframe class="map-size"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2357.440449749992!2d3.4626195718217185!3d6.42917850866316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf5a8bf319073%3A0x6ddf3573f85b4920!2s38%20T.%20F.%20Kuboye%20Rd%2C%20Lekki%20Phase%20I%2C%20Lekki%20106104%2C%20Lagos!5e0!3m2!1sen!2sng!4v1716303926663!5m2!1sen!2sng">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Wrapper Start -->

@endsection
