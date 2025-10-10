@extends('layouts.app')
@section('content')
<!-- end navbar -->
<header class="slider mt-5">
    <div class="main-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide-image" data-background="{{ asset('assets/images/slide01.jpg') }}"></div>
                <!-- end slide-image -->
                <div class="container">
                    <h1>Transport & <br>
                        Logistics</h1>
                    <p>Take the complexity out of customs Freight Solutions <br>
                        with customs brokerage services</p>
                    <a href="{{ route('services')}}">COURIER SERVICE</a>
                </div>
                <!-- end container -->
            </div>
            <!-- end swiper-slide -->
            <div class="swiper-slide">
                <div class="slide-image" data-background="{{ asset('assets/images/slide02.jpg') }}"></div>
                <!-- end slide-image -->
                <div class="container">
                    <h1>Quickest & Safe <br>
                        Delivery</h1>
                    <p>Take the complexity out of customs Freight Solutions <br>
                        with customs brokerage services</p>
                    <a href="{{ route('services')}}">DISCOVER ALL</a>
                </div>
                <!-- end container -->
            </div>
            <!-- end swiper-slide -->
            <div class="swiper-slide">
                <div class="slide-image" data-background="{{ asset('assets/images/slide03.jpg') }}"></div>
                <!-- end slide-image -->
                <div class="container">
                    <h1>Allways <br>
                        Trustable</h1>
                    <p>Take the complexity out of customs Freight Solutions <br>
                        with customs brokerage services</p>
                    <a href="{{ route('about')}}">MORE ABOUT US</a>
                </div>
                <!-- end container -->
            </div>
            <!-- end swiper-slide -->
        </div>
        <!-- end swiper-wrapper -->
        <div class="controls">
            <div class="button-prev"><i class="lni lni-chevron-left"></i>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="60" height="60" viewBox="0 0 30 30" xml:space="preserve">
                    <circle fill="none" stroke="#fff" stroke-width="1" cx="15" cy="15" r="15"></circle>
                </svg>
            </div>
            <!-- end button-prev -->
            <div class="swiper-pagination"></div>
            <!-- end swiper-pagination -->
            <div class="button-next"><i class="lni lni-chevron-right"></i>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="60" height="60" viewBox="0 0 30 30" xml:space="preserve">
                    <circle fill="none" stroke="#fff" stroke-width="1" cx="15" cy="15" r="15"></circle>
                </svg>
            </div>
            <!-- end button-next -->
        </div>
        <!-- end controls -->
    </div>
    <!-- end main-slider -->
</header>
<!-- end slider -->
<div class="section-note">
    <div class="container">
        <h6> <strong>PaxRuta Logistics Facilities</strong> & Technical Support to Continue Operations as
            Essential Services</h6>
    </div>
    <!-- end container -->
</div>
<!-- end section-note -->
<section class="content-section no-top-spacing">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <figure class="video-thumb"> <img src="{{ asset('assets/images/video-thumb.jpg') }}" alt="Image"> <a
                        href="videos/video01.mp4" data-fancybox>Play Button</a> </figure>
                <!-- end video-thumb -->
            </div>
            <!-- end col-5 -->
            <div class="col-lg-7">
                <form action="{{ route('shipments.track-shipment') }}" method="POST">
                    @csrf
                    <div class="track-shipping-form">
                        <div class="inner" id="track-order">
                            <h3>Track your shipment</h3>
                            <div class="form-group half">
                                <input type="radio" checked name="tracking_number">
                                Tracking number
                            </div>
                            <div class="form-group">
                                <input type="text" name="tracking_number" placeholder="Shipping Number" required>
                            </div>
                            <div class="form-group">
                                <button type="submit"><i class="lni lni-search-alt"></i> TRACK</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- end col-7 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end content-section -->
<section class="content-section no-spacing">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="side-content">
                    <h2>Worldwide Logistics,
                        Air Freight Forwarding,
                        Road Haulage.</h2>
                    <p>PaxRuta Logistics is a leading third party contract logistics company
                        based in the Midlands, Australia. We specialise in providing
                        supply-chain warehousing and transport services throughout the
                        Australia and Worldwide.</p>
                    <a href="{{ route('services')}}" class="custom-button">Discover All Solutions</a>
                </div>
                <!-- end side-content -->
            </div>
            <!-- end col-7 -->
            <div class="col-lg-5">
                <figure class="side-image"> <img src="{{ asset('assets/images/side-image01.jpg') }}" alt="Image">
                </figure>
                <!-- end side-image -->
            </div>
            <!-- end col-5 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end content-section -->
<section class="content-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                    <div class="inner">
                        <figure><img src="{{ asset('assets/images/icon01.png') }}" alt="Image"></figure>
                        <h6>Leadership</h6>
                        <p>Experts who have extensive,
                            hands-on experience in supply
                            chain management</p>
                        <a href="#" class="custom-link">Connect with an Expert</a>
                    </div>
                    <!-- end inner -->
                </div>
                <!-- end icon-box -->
            </div>
            <!-- end col-4 -->
            <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                    <div class="inner">
                        <figure><img src="{{ asset('assets/images/icon02.png') }}" alt="Image"></figure>
                        <h6>Technology</h6>
                        <p>innovative and varied use of
                            technology on the road, ocean,
                            railways, in the air.</p>
                        <a href="#" class="custom-link">Connect with an Expert</a>
                    </div>
                    <!-- end inner -->
                </div>
                <!-- end icon-box -->
            </div>
            <!-- end col-4 -->
            <div class="col-lg-4 col-md-6">
                <div class="icon-box">
                    <div class="inner">
                        <figure><img src="{{ asset('assets/images/icon03.png') }}" alt="Image"></figure>
                        <h6>Solution</h6>
                        <p>Global leaders in intermodal,
                            less-than-truckload, supply
                            chain management. </p>
                        <a href="#" class="custom-link">Connect with an Expert</a>
                    </div>
                    <!-- end inner -->
                </div>
                <!-- end icon-box -->
            </div>
            <!-- end col-4 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end content-section -->
<section class="content-section" data-background="#f9f7ef">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <!-- <figure><img src="{{ asset('assets/images/paxruta logo.png') }}" alt="Image"></figure> -->
                    <h2>Global supply chain solutions</h2>
                    <p>Dedicated specialists taking care of your products</p>
                </div>
                <!-- end section-title -->
            </div>
            <!-- end col-12 -->
            <div class="col-lg-3">
                <div class="solution-box">
                    <figure><img src="{{ asset('assets/images/solution-image01.jpg') }}" alt="Image">
                        <figcaption> <small>Solutions</small>
                            <h6>Food & Beverage</h6>
                            <a href="{{ route('services')}}">Discover More</a>
                        </figcaption>
                    </figure>
                </div>
                <!-- end solution-box -->
            </div>
            <!-- end col-3 -->
            <div class="col-lg-3">
                <div class="solution-box">
                    <figure><img src="{{ asset('assets/images/solution-image02.jpg') }}" alt="Image">
                        <figcaption> <small>Solutions</small>
                            <h6>Global 4PL</h6>
                            <a href="{{ route('services')}}">Discover More</a>
                        </figcaption>
                    </figure>
                </div>
                <!-- end solution-box -->
            </div>
            <!-- end col-3 -->
            <div class="col-lg-6">
                <div class="solution-box">
                    <figure><img src="{{ asset('assets/images/solution-image03.jpg') }}" alt="Image">
                        <figcaption> <small>Solutions</small>
                            <h6>Consumer Packaged Goods</h6>
                            <a href="{{ route('services')}}">Discover More</a>
                        </figcaption>
                    </figure>
                </div>
                <!-- end solution-box -->
            </div>
            <!-- end col-6 -->
            <div class="col-lg-4 offset-lg-2">
                <div class="solution-box">
                    <figure><img src="{{ asset('assets/images/solution-image04.jpg') }}" alt="Image">
                        <figcaption> <small>Solutions</small>
                            <h6>Transportation</h6>
                            <a href="{{ route('services')}}">Discover More</a>
                        </figcaption>
                    </figure>
                </div>
                <!-- end solution-box -->
            </div>
            <!-- end col-4 -->
            <div class="col-lg-4">
                <div class="solution-box">
                    <figure><img src="{{ asset('assets/images/solution-image05.jpg') }}" alt="Image">
                        <figcaption> <small>Solutions</small>
                            <h6>Retails</h6>
                            <a href="{{ route('services')}}">Discover More</a>
                        </figcaption>
                    </figure>
                </div>
                <!-- end solution-box -->
            </div>
            <!-- end col-3 -->
            <div class="col-lg-2">
                <div class="solution-button"> <a href="{{ route('services')}}"><i class="lni lni-chevron-right"></i></a>
                    <small>DISCOVER<br>
                        ALL SOLUTIONS</small>
                </div>
                <!-- end solution-button -->
            </div>
            <!-- end col-2 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end content-section -->
<section class="content-section no-spacing">
    <div class="container">
        <div class="row align-items-center no-gutters">
            <div class="col-lg-6">
                <div class="side-services">
                    <h6>Services</h6>
                    <h2>Quality delivered <br>
                        as standard </h2>
                    <ul>
                        <li><a href="{{ route('services')}}">Forwarding <i class="lni lni-chevron-right"></i></a></li>
                        <li><a href="{{ route('services')}}">Supply Chain <i class="lni lni-chevron-right"></i></a></li>
                        <li><a href="{{ route('services')}}">Outsourcing <i class="lni lni-chevron-right"></i></a></li>
                        <li><a href="{{ route('services')}}">Technology <i class="lni lni-chevron-right"></i></a></li>
                    </ul>
                    <a href="{{ route('services')}}" class="custom-link">View All Services</a>
                </div>
                <!-- end side-services -->
            </div>
            <!-- end col-6 -->
            <div class="col-lg-6">
                <figure class="side-image full-right">
                    <div class="info-box">
                        <figure><img src="{{ asset('assets/images/icon-infobox.png') }}" alt="Image"></figure>
                        <p>Personnel deliver bespoke
                            solutions that are designed
                            to increase speed to market, <strong>simplify inventory</strong> management,
                            streamline product flow and
                            drive down costs.</p>
                    </div>
                    <!-- end info-box -->
                    <img src="{{ asset('assets/images/side-image02.jpg') }}" alt="Image">
                </figure>
            </div>
            <!-- end col-6 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end content-section -->
<section class="content-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="counter-box"> <span class="odometer" data-count="175" data-status="yes">0</span>
                    <h6>Operating centeres worldwide</h6>
                </div>
                <!-- end counter-box -->
            </div>
            <!-- end col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="counter-box"> <span class="odometer" data-count="120" data-status="yes">0</span>
                    <h6>Countries
                        Worldwide</h6>
                </div>
                <!-- end counter-box -->
            </div>
            <!-- end col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="counter-box"> <span class="odometer" data-count="62" data-status="yes">0</span><span
                        class="symbol">K</span>
                    <h6>Logistics
                        Professionals</h6>
                </div>
                <!-- end counter-box -->
            </div>
            <!-- end col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="counter-box"> <span class="odometer" data-count="150" data-status="yes">0</span><span
                        class="symbol">K</span>
                    <h6>containers of freight</h6>
                </div>
                <!-- end counter-box -->
            </div>
            <!-- end col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="counter-box"> <span class="odometer" data-count="29" data-status="yes">0</span><span
                        class="symbol">K</span>
                    <h6>Project delivery
                        vehicles</h6>
                </div>
                <!-- end counter-box -->
            </div>
            <!-- end col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="counter-box"> <span class="odometer" data-count="15" data-status="yes">0</span><span
                        class="symbol">K</span>
                    <h6>sq.ft of
                        warehousing</h6>
                </div>
                <!-- end counter-box -->
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end content-section -->
<section class="content-section dark-overlay" data-background="{{ asset('assets/images/section-bg-01.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-bar">
                    <h2>We are now Logistics <br>
                        Industry Limited</h2>
                    <p>We’re one of the Australia leading shipping and logistics providers.</p>
                    <!-- <a href="#" class="custom-button">Get A Quote</a> <a href="#" class="light-button">Estimate
                        cost</a> -->
                </div>
                <!-- end cta-bar -->
            </div>
            <!-- end col-12 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end content-section -->

<!-- end content-section -->


@endsection