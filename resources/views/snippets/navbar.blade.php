    <nav class="navbar">
        <div class="container">
            <div class="inner">
                <div class="logo"> <a href=""> <img src="{{ asset('assets/images/logo.png') }}" alt="Image">
                    </a> </div>
                <!-- end logo -->
                <!-- <div class="custom-menu">
                    <ul>
                        <li><a href="#">En</a></li>
                        <li><a href="#">Ru</a></li>
                    </ul>
                </div> -->
                <!-- end custom-menu -->
                <div class="site-menu">
                    <ul>
                        <li><a href="{{ route('services')}}">Services</a></li>
                        <li><a href="{{ route('blog')}}">News</a></li>
                        <li><a href="{{ route('about')}}">About</a></li>
                        <li><a href="{{ route('contact')}}">Contact</a></li>
                    </ul>
                </div>
                <!-- end site-menu -->
                <div class="hamburger-menu"> <span></span> <span></span> <span></span> </div>
                <!-- end hamburger-menu -->
                <div class="navbar-button"> <a href="#">GET A QUOTE</a> </div>
                <!-- end navbar-button -->
            </div>
            <!-- end inner -->
        </div>
        <!-- end container -->
    </nav>