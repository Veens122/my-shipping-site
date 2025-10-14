    <nav class="navbar">
        <div class="container">
            <div class="inner">
                <div class="logo"> <a href="{{ route('home')}}"> <img
                            src="{{ asset('assets/images/paxruta logo.png') }}" alt="Image">
                    </a> </div>


                <!-- end logo -->
                <!-- <div class="custom-menu">
                    <ul>
                        <li><a href="#">En</a></li>
                        <li><a href="#">Ru</a></li>
                    </ul>
                </div> -->

                @auth
                <a href="{{ auth()->user()->dashboardRoute() }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Back to Dashboard
                </a>
                @endauth


                <!-- end custom-menu -->
                <div class="site-menu">
                    <ul>
                        <li><a href="{{ route('services')}}">Services</a></li>
                        <!-- <li><a href="{{ route('blog')}}">News</a></li> -->
                        <li><a href="{{ route('about')}}">About</a></li>
                        <li><a href="{{ route('contact')}}">Contact</a></li>
                    </ul>



                </div>
                <!-- end site-menu -->
                <div class="hamburger-menu"> <span></span> <span></span> <span></span> </div>
                <!-- end hamburger-menu -->
                <div class="navbar-button"> <a href="{{ url('/#track-order') }}">TRACK YOUR ORDER</a> </div>
                <!-- end navbar-button -->
            </div>
            <!-- end inner -->
        </div>
        <!-- end container -->
    </nav>