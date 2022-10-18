<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="/">PTSP ONLINE</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href=index.html" class="logo"><img src="anyar-assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="/">Beranda</a></li>
                <li><a class="nav-link scrollto @if (request()->segment(1) == 'tentang') active @endif " href="/tentang">Tentang</a></li>
                <li><a class="nav-link scrollto @if (request()->segment(1) == 'daftar-pelayanan') active @endif " href="/daftar-pelayanan">Daftar Pelayanan</a></li>
                <li><a class="nav-link scrollto @if (request()->segment(1) == 'lacak-pelayanan') active @endif " href="/lacak-pelayanan">Lacak Pelayanan</a></li>
                <li><a class="nav-link scrollto" href="/Manual Book PTSP v2.pdf" target="_blank">Buku Manual</a></li>
                <li><a class="nav-link scrollto" href="#contact">HelpDesk</a></li>
                <li><a class="nav-link scrollto" href="/login">Masuk</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
