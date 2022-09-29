<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">


    @include('layouts.admin.styles')

    @yield('_styles')

</head>

<body class="d-flex flex-column min-vh-100">
    <div class="preloader">
        <div class="loader">
            <img src="{{ asset('assets/images/logo/loader.png') }}" width="85px" alt="">
        </div>
    </div>
    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    @yield('content')

    @include('layouts.admin.footer')

    @include('layouts.admin.scripts')

    <script>
        $(document).ready(function() {
            $('.preloader').addClass('out');
        });
    </script>

    @yield('_scripts')

    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success px-3 mx-3',
                cancelButton: 'btn btn-danger px-3 mx-3'
            },
            buttonsStyling: false
        })
    </script>

</body>

</html>
