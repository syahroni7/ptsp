<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('layouts.landing.anyar.styles')

    @yield('_styles')



    <!-- =======================================================
  * Template Name: Anyar - v4.9.0
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="d-flex flex-column min-vh-100">

    @include('layouts.landing.anyar.header')

    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    @include('layouts.landing.anyar.footer')
    @include('layouts.landing.anyar.scripts')


    @yield('_scripts')



</body>

</html>
