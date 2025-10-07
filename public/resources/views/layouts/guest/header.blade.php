<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between"> <a href="/" class="logo d-flex align-items-center">
            <img src="{{ asset('niceadmin/img/logo.png') }}" alt=""> <span class="d-none d-lg-block">PTSP ONLINE</span>
        </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
    {{-- <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center"> <img
                src="{{ asset('assets/images/logo/hajj_logo.png') }}" alt=""> <span class="d-none d-lg-block">Jendela
                Hati</span> </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div> --}}
    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#"> <input type="text" name="query"
                placeholder="Search" title="Enter search keyword"> <button type="submit" title="Search"><i
                    class="bi bi-search"></i></button></form>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i
                        class="bi bi-search"></i> </a></li>
            <li class="nav-item dropdown"> <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown"> <i
                        class="bi bi-bell"></i> <span class="badge bg-primary badge-number total-notifikasi">0</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">

                </ul>
            </li>

            <li class="nav-item dropdown pe-3"> <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                    data-bs-toggle="dropdown"> <img src="{{ asset('niceadmin/img/profile-img.jpg') }}" alt="Profile"
                        class="rounded-circle"> <span class="d-none d-md-block dropdown-toggle ps-2">
                        Guest
                    </span> </a>


                {{-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul> --}}

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile"
                    data-popper-placement="bottom-end"
                    style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-16.5px, 38px, 0px);">
                    <li class="dropdown-header">
                        <h6>Guest</h6>
                        <span>Guest</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.index') }}">
                            <i class="bi bi-person"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>


            </li>


            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" data-popper-placement="bottom-end"
                style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-16.5px, 38px, 0px);">
                <li class="dropdown-header">
                    <h6>Guest</h6>
                    <span>Guest</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.index') }}">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </ul>
    </nav>
</header>