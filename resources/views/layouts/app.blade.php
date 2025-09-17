<!doctype html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#fed300" />
    <title>Qesco | Logicstic Shipping Company</title>
    <meta name="author" content="Themezinho">
    <meta name="description" content="For all kind of delivery and shipping company website">
    <meta name="keywords"
        content="logistic, shipping, cargo, delivery, transportation, truck, service, solutions, importing, exporting, trade, product, move, calculate, cost, ecommerce">

    <!-- SOCIAL MEDIA META -->
    <meta property="og:description" content="Qesco | Logicstic Shipping Company">
    <meta property="og:image" content="preview.html">
    <meta property="og:site_name" content="Qesco">
    <meta property="og:title" content="Qesco">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.themezinho.net/qesco">

    <!-- TWITTER META -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Qesco">
    <meta name="twitter:creator" content="@Qesco">
    <meta name="twitter:title" content="Qesco">
    <meta name="twitter:description" content="Qesco | Logicstic Shipping Company">
    <meta name="twitter:image" content="preview.html">

    <!-- FAVICON FILES -->
    <link href="ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon" sizes="144x144">
    <link href="ico/apple-touch-icon-114-precomposed.png" rel="apple-touch-icon" sizes="114x114">
    <link href="ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon" sizes="72x72">
    <link href="ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon">
    <link href="ico/favicon.png" rel="shortcut icon">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
</head>

<body>
    <!-- <div class="preloader"> <img src="{{ asset('assets/images/preloader.png') }}" alt="Image"> </div> -->
    <!-- end preloader -->
    <div class="page-transition"></div>
    <!-- end page-transition -->

    <!-- side -->
    @include('snippets.sidebar')

    <!-- top -->
    @include('snippets.topbar')

    <!-- nav -->
    @include('snippets.navbar')

    <!-- content -->
    @yield('content')

    <!-- footer -->
    @include('snippets.footer')



    <!-- JS FILES -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>




    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- SweetAlert2 Messages --}}
    @if(Session::has('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Successful!',
        html: "{{ Session::get('success') }}<br><b>Tracking Number:</b> {{ Session::get('tracking') }}",
        timer: 5000,
        showConfirmButton: true
    });
    </script>
    @endif

    @if(Session::has('error'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: "{{ Session::get('error') }}",
        timer: 5000,
        showConfirmButton: false
    });
    </script>
    @endif

    @if(Session::has('info'))
    <script>
    Swal.fire({
        icon: 'info',
        title: 'Info',
        text: "{{ Session::get('info') }}",
        timer: 5000,
        showConfirmButton: false
    });
    </script>
    @endif

    @if($errors->any())
    <script>
    Swal.fire({
        icon: 'warning',
        title: 'Validation Errors',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        showConfirmButton: true
    });
    </script>
    @endif



</body>


</html>