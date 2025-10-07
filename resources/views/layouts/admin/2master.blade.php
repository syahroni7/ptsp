<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Meta Dasar -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="SIPINTU adalah Sistem Pelayanan Terpadu Satu Pintu Kementerian Agama Kabupaten Lebak. Ajukan layanan secara mudah, transparan, dan akuntabel.">
    <meta name="keywords" content="SIPINTU, PTSP Kemenag, Kementerian Agama Lebak, pelayanan publik, layanan online, Kemenag Lebak, sistem terpadu, pelayanan agama, Lebak">
    <meta name="author" content="Kementerian Agama Kabupaten Lebak">

    <!-- Meta Sosial (Open Graph untuk Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:title" content="SIPINTU | PTSP Kemenag Lebak">
    <meta property="og:description" content="Ajukan layanan secara mudah, transparan, dan akuntabel melalui Sistem Pelayanan Terpadu Satu Pintu Kemenag Lebak.">
    <meta property="og:image" content="https://example.com/assets/img/og-image.jpg"> <!-- Ganti URL dengan gambar share -->
    <meta property="og:url" content="https://ptspkemenaglebak.my.id"> <!-- Ganti dengan URL asli -->
    <meta property="og:type" content="website">

    <!-- Meta Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SIPINTU | PTSP Kemenag Lebak">
    <meta name="twitter:description" content="Layanan publik digital Kemenag Lebak berbasis transparansi dan kemudahan akses.">
    <meta name="twitter:image" content="https://example.com/assets/img/og-image.jpg"> <!-- Ganti dengan gambar valid -->

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    @include('layouts.admin.css')
    @yield('css')
</head>

<body class="homepage-v4">


    <!-- Navigation -->
    @include('layouts.admin.header')

    <!-- Navigation -->

    <!-- Main layout -->
    <main class="pt-4">

        @yield('content')

    </main>
    <!-- Main layout -->

    <!-- Footer -->
    @include('layouts.admin.footer')
    <!-- Footer -->

    <!-- SCRIPTS -->

    @include('layouts.admin.js')
    @yield('js')


</body>

</html>