<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HQ5S4RXHE7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HQ5S4RXHE7');
    </script>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIPINTU Kemenag Lebak</title>
    <meta name="description" content="SIPINTU - PTSP Kementerian Agama Kabupaten Lebak" />
    <meta name="keywords" content="SIPINTU Kemenag Lebak, PTSP Kemenag Lebak, SIPINTU Online, Pelayanan Publik" />
    <meta name="author" content="Prakom Kemenag Lebak" />
    <meta name="robots" content="all" />
    <meta name="revisit-after" content="1 Days" />
    <meta property="og:locale" content="id-ID" />
    <meta property="og:site_name" content="SIPINTU / PTSP Kemenag Lebak" />
    <meta property="og:image" content="https://lh5.googleusercontent.com/3bQe7yrarMJrsJRG9A68Re1YTTC7wM26tDRgCxlRFXQ94MUoyBHfvAeipThgj_dQxrNbZ8k5bCXLDortY5uIVCVem03AtYCnTjlk5AEAPoL0ptUKUxxJa7kGeL-K90YIzyRn9oGEnzQ=w16383" /> <!-- Logo dari web Kemenag Lebak -->
    <meta property="og:image:width" content="180" />
    <meta property="og:image:height" content="50" />
    <meta property="og:type" content=website />
    <meta property="og:title" content="SIPINTU - Kemenag Lebak" />
    <meta property="og:description" content="Pelayanan Publik Terpadu Satu Pintu Berbasis Web (ONLINE) Kementerian Agama Kabupaten Lebak" />
    <meta property="og:url" content="https://pstpkemenaglebak.my.id" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="SIPINTU ONLINE Kemenag Lebak" />
    <meta name="twitter:title" content="SIPINTU ONLINE - Kemenag Lebak" />
    <meta name="twitter:description" content="Pelayanan Publik Terpadu Satu Pintu Berbasis Web (ONLINE) Kementerian Agama Kabupaten Lebak" />
    <meta name="twitter:image" content="https://lh5.googleusercontent.com/3bQe7yrarMJrsJRG9A68Re1YTTC7wM26tDRgCxlRFXQ94MUoyBHfvAeipThgj_dQxrNbZ8k5bCXLDortY5uIVCVem03AtYCnTjlk5AEAPoL0ptUKUxxJa7kGeL-K90YIzyRn9oGEnzQ=w16383" /> <!-- Logo dari web Kemenag Lebak -->
    <link rel="canonical" href="https://pstpkemenaglebak.my.id" />
    <link rel="alternate" hreflang="en-US" href="https://pstpkemenaglebak.my.id" />
    <link rel="shortcut icon" type="image/png" href="https://lh5.googleusercontent.com/3bQe7yrarMJrsJRG9A68Re1YTTC7wM26tDRgCxlRFXQ94MUoyBHfvAeipThgj_dQxrNbZ8k5bCXLDortY5uIVCVem03AtYCnTjlk5AEAPoL0ptUKUxxJa7kGeL-K90YIzyRn9oGEnzQ=w16383" /> <!-- Logo dari web Kemenag Lebak -->

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


    <!-- Accessibility Code for "ptspkemenaglebak.my.id" -->
    <script>
        /* Want to customize your button? visit our documentation page: https://login.equalweb.com/custom-button */
        window.interdeal = {
            get sitekey() {
                return "8555d2a8c2522e6997535ea2228fd788"
            },
            get domains() {
                return {
                    "js": "https://cdn.equalweb.com/",
                    "acc": "https://access.equalweb.com/"
                }
            },
            "Position": "left",
            "Menulang": "ID",
            "draggable": true,
            "btnStyle": {
                "vPosition": [
                    "80%",
                    "80%"
                ],
                "margin": [
                    "0",
                    "0"
                ],
                "scale": [
                    "0.6",
                    "0.5"
                ],
                "color": {
                    "main": "#2e850f",
                    "second": "#ffffff"
                },
                "icon": {
                    "outline": true,
                    "outlineColor": "#ffffff",
                    "type": 7,
                    "shape": "circle"
                }
            },

        };

        (function(doc, head, body) {
            var coreCall = doc.createElement('script');
            coreCall.src = interdeal.domains.js + 'core/5.1.13/accessibility.js';
            coreCall.defer = true;
            coreCall.integrity = 'sha512-70/AbMe6C9H3r5hjsQleJEY4y5l9ykt4WYSgyZj/WjpY/ord/26LWfva163b9W+GwWkfwbP0iLT+h6KRl+LoXA==';
            coreCall.crossOrigin = 'anonymous';
            coreCall.setAttribute('data-cfasync', true);
            body ? body.appendChild(coreCall) : head.appendChild(coreCall);
        })(document, document.head, document.body);
    </script>


    <!-- script src="https://code.responsivevoice.org/responsivevoice.js?key=zJWb4A6g" --><!-- /script --> <!-- Suara Voice -->
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=9iOhRsUe"></script>
</body>

</html>