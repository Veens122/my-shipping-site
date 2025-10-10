@extends('layouts.app')
@section('content')

<header class="page-header" data-background="{{ asset('assets/images/slide01.jpg') }}">
    <div class="container">
        <h1>News</h1>
        <p>Take the complexity out of customs Freight Solutions<br> with customs brokerage services</p>
    </div>
    <!-- end container -->
</header>
<!-- end page-header -->
<section class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="news-box">
                    <figure>
                        <img src="{{ asset('assets/images/news01.jpg') }}" alt="Image">
                    </figure>
                    <div class="content"> <small>31 November, 2020</small>
                        <h3><a href="news-single.html">Expression alteration entreaties mrs can terminated
                                estimating. </a></h3>
                        <div class="author"> <img src="{{ asset('assets/images/avatar.jpg') }}" alt="Image"> <span>by
                                <b>Quesco
                                    LLC</b></span> </div>
                        <!-- end author -->
                    </div>
                    <!-- end content -->
                </div>
                <!-- end news-box -->
                <div class="news-box">
                    <figure>
                        <img src="{{ asset('assets/images/news02.jpg') }}" alt="Image">
                    </figure>
                    <div class="content"> <small>31 November, 2020</small>
                        <h3><a href="news-single.html">Subject but why ten earnest husband imagine sixteen brandon.
                            </a></h3>
                        <div class="author"> <img src="{{ asset('assets/images/avatar.jpg') }}" alt="Image"> <span>by
                                <b>Quesco
                                    LLC</b></span> </div>
                        <!-- end author -->
                    </div>
                    <!-- end content -->
                </div>
                <!-- end news-box -->
                <div class="news-box">
                    <figure>
                        <img src="{{ asset('assets/images/news03.jpg') }}" alt="Image">
                    </figure>
                    <div class="content"> <small>31 November, 2020</small>
                        <h3><a href="news-single.html">Sentiments way understood end partiality and his.</a></h3>
                        <div class="author"> <img src="{{ asset('assets/images/avatar.jpg') }}" alt="Image"> <span>by
                                <b>Quesco
                                    LLC</b></span> </div>
                        <!-- end author -->
                    </div>
                    <!-- end content -->
                </div>
                <!-- end news-box -->
                <div class="news-box">
                    <figure>
                        <img src="{{ asset('assets/images/news04.jpg') }}" alt="Image">
                    </figure>
                    <div class="content"> <small>31 November, 2020</small>
                        <h3><a href="news-single.html">An an valley indeed so no wonder future nature vanity.</a>
                        </h3>
                        <div class="author"> <img src="{{ asset('assets/images/avatar.jpg') }}" alt="Image"> <span>by
                                <b>Quesco
                                    LLC</b></span> </div>
                        <!-- end author -->
                    </div>
                    <!-- end content -->
                </div>
                <!-- end news-box -->
                <ul class="pagination">
                    <li class="page-item"> <a class="page-link" href="#">PREV</a> </li>
                    <li class="page-item"> <a class="page-link" href="#">NEXT</a> </li>
                </ul>
                <!-- end pagination -->
            </div>
            <!-- end col-8 -->

            <!-- end col-4 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end content-section -->

@endsection