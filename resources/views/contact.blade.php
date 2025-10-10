@extends('layouts.app')
@section('content')

<header class="page-header" data-background="{{ asset('assets/images/slide01') }}.jpg">
    <div class="container">
        <h1>Contact</h1>
        <p>Take the complexity out of customs Freight Solutions<br> with customs brokerage services</p>
    </div>
    <!-- end container -->
</header>
<!-- end page-header -->
<section class="content-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title">
                    <figure><img src="{{ asset('assets/images/paxRuta logo') }}.png" alt="Image"></figure>
                    <h2>We’d love to hear from you</h2>
                    <p>Please send your enquiry to <u>paxrutainfo@gmail.com</u>, or contact your local<br>
                        specialists using the contact details below.</p>
                </div>
                <!-- end section-title -->
            </div>
            <!-- end col-12 -->
            <div class="col-lg-5 col-md-6">
                <div class="contact-box">
                    <h5>Australia Office</h5>
                    <address>
                        Burwood Road, Burwood, Australia<br>
                        <!-- Phone: <br> -->
                        Email: <a href="mailto:paxrutainfo@gmail.com">paxrutainfo@gmail.com</a>
                    </address>
                    <!-- <a href="https://www.google.com/maps/search/?api=1&amp;query=centurylink+field" data-fancybox=""
                        data-width="640" data-height="360" class="custom-button">FIND US ON MAP</a> -->
                </div>
                <!-- end contact-box -->
            </div>
            <!-- end col-5 -->
            <div class="col-lg-5 col-md-6">
                <div class="contact-box">
                    <h5>Branch Offices</h5>
                    <address>
                        We have offices in different parts of the world<br>
                        Email: <a href="paxrutainfo@gmail.com">paxrutainfo@gmail.com</a><br>
                        Just send an email to the email address above to get every information about our shipping and
                        delivery.
                    </address>
                    <!-- <a href="https://www.google.com/maps/search/?api=1&amp;query=centurylink+field"
                        data-fancybox="" data-width="640" data-height="360" class="custom-button">FIND US ON MAP</a> -->
                </div>
                <!-- end contact-box -->
            </div>
            <!-- end col-5 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end content-section -->
<section class="content-section no-bottom-spacing" data-background="#f9f7ef">
    <form action="{{ route('submit.request')}}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h6>Have Any Question?</h6>
                        <h2>If you would like to know more <br>
                            about our services, please contact <br>
                            us using this form
                        </h2>
                    </div>
                    <!-- end section-title -->
                </div>
                <!-- end col-12 -->

                <div class="col-12">
                    <div class="contact-form">
                        <div class="row inner">
                            <div class="form-group col-lg-4">
                                <input type="text" name="name" placeholder="Complate Name">
                            </div>
                            <!-- end form-group -->
                            <div class="form-group col-lg-4 col-md-6">
                                <input type="text" name="email" placeholder="Email Address">
                            </div>
                            <!-- end form-group -->
                            <div class="form-group col-lg-4 col-md-6">
                                <input type="text" name="phone" placeholder="Phone No">
                            </div>
                            <!-- end form-group -->
                            <div class="form-group col-12">
                                <textarea placeholder="Message" name="message"></textarea>
                            </div>
                            <!-- end form-group -->
                            <div class="form-group col-12">
                                <input type="submit" value="SEND MESSAGE">
                            </div>
                            <!-- end form-group -->
                        </div>
                        <!-- end row inner -->
                    </div>
                    <!-- end contact-form -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
    </form>
    <!-- end container -->
</section>
<!-- end content-section -->
<div class="google-maps ">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26499.50866707934!2d151.08351953243297!3d-33.87835675639818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12badc97f1d661%3A0x5017d681632aea0!2sBurwood%20NSW%202134%2C%20Australia!5e0!3m2!1sen!2sng!4v1758110531519!5m2!1sen!2sng"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

@endsection