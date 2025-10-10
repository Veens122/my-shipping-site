<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaxRuta Logistics</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/admin_superadmin_style.css') }}">


</head>

<body>


    @include('admin_snippets.sidebar')

    @include('admin_snippets.header')

    @yield('content')

    @include('admin_snippets.footer')

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Bootstrap JS Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src="{{ asset('assets/js/admin_superadmin_script.js') }}"></script>

    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- SweetAlert2 Messages --}}
    @if(Session::has('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Successful!',
        html: "{{ Session::get('success') }}<br> {{ Session::get('tracking') }}",
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