<!-- ======= Header ======= -->
<header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="mailto:sekjen_416610@kemenag.go.id">sekjen_416610@kemenag.go.id</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>0252-201319</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-cente">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="/" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                    <img src="{{ asset('bizland-assets/img/logo-sipintu.png') }}" alt="Logo" style="height: 40px; margin-right: 8px;">
                    <!--h1 class="sitename">SIPINTU<h1-->
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                        <li><a href="/tentang" class="{{ request()->is('tentang') ? 'active' : '' }}">Tentang</a></li>
                        <li><a href="/daftar-pelayanan" class="{{ request()->is('daftar-pelayanan') ? 'active' : '' }}">Daftar Pelayanan</a></li>
                        <li><a href="/lacak-pelayanan" class="{{ request()->is('lacak-pelayanan') ? 'active' : '' }}">Lacak Pelayanan</a></li>
                        <li><a href="#faq">F.A.Q</a></li>
                        <li class="dropdown"><a href="#"><span>Unduh</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Manual Book</a></li>
                                <li class="dropdown"><a href="#"><span>Tutorial</span> <i
                                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Dropdown 1</a></li>
                                        <li><a href="#">Deep Dropdown 2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#contact">Kontak</a></li>
                        <li><a href="/login">Login</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

            </div>

        </div>

    </header><!-- End Header -->