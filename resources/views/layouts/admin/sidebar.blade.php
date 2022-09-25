<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Beranda utama</li>
        <li class="nav-item"> <a class="nav-link @if (request()->segment(1) == 'home') @else collapsed @endif" href="/home">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span> </a>
        </li>

        <li class="nav-heading">Kelola Pelayanan</li>

        <li class="nav-item"><a class="nav-link @if (request()->segment(1) == 'daftar-pelayanan' && request()->segment(2) == 'create') @else collapsed @endif"
                href="{{ route('daftar-pelayanan.create') }}"><i class="bi bi-pencil-square"></i><span>Input / Lacak
                    Pelayanan</span></a></li>

        {{-- Daftar Pelayanan --}}
        <li class="nav-item">
            <a class="nav-link @if (request()->segment(1) == 'daftar-pelayanan' && request()->segment(2) == 'list') @else collapsed @endif" data-bs-target="#pelayanan-nav"
                data-bs-toggle="collapse" href="#" aria-expanded="true">
                <i class="bi bi-receipt-cutoff"></i><span>Daftar Pelayanan</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pelayanan-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav" style="">

                @foreach ($statusPelayanan as $key => $status)
                    <li>
                        @if (request()->segment(1) == 'daftar-pelayanan' && request()->segment(2) == 'list')
                            @php $linkStatus = 'javascript:void(0)' @endphp
                        @else
                            @php $linkStatus = trim(route('daftar-pelayanan.index', strtolower($status['name']))) @endphp
                        @endif

                        <a href="{{ $linkStatus }}"
                            class="menu-status menu-{{ $status['name'] }} @if (request()->segment(3) == $status['name']) active @endif "
                            data-status_pelayanan="{{ $status['name'] }}">
                            <i class="bi bi-circle"></i>
                            <span style="width: 100% !important">
                                {{ ucfirst($status['name']) }}
                                <div class="float-end">
                                    <span
                                        class="badge total-{{ $status['name'] }} bg-{{ $status['color'] }}">{{ $status['total'] }}</span>
                                </div>
                            </span>
                        </a>
                    </li>
                @endforeach

                {{-- <li>
                    <a href="{{ route('pelayanan.index', 'baru') }}"
                        class="@if (request()->segment(2) == 'data') active @endif">
                        <i class="bi bi-circle"></i>
                        <span style="width: 100% !important">
                            Baru
                            <div class="float-end">
                                <span class="badge bg-danger">0</span>
                            </div>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pelayanan.index', 'proses') }}"
                        class="@if (request()->segment(2) == 'roles') active @endif">
                        <i class="bi bi-circle"></i>
                        <span style="width: 100% !important">
                            Proses
                            <div class="float-end">
                                <span class="badge bg-secondary">0</span>
                            </div>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pelayanan.index', 'selesai') }}"
                        class="@if (request()->segment(2) == 'roles') active @endif">
                        <i class="bi bi-circle"></i>
                        <span style="width: 100% !important">
                            Selesai
                            <div class="float-end">
                                <span class="badge bg-primary">0</span>
                            </div>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pelayanan.index', 'ambil') }}"
                        class="@if (request()->segment(2) == 'roles') active @endif">
                        <i class="bi bi-circle"></i>
                        <span style="width: 100% !important">
                            Ambil
                            <div class="float-end">
                                <span class="badge bg-success">0</span>
                            </div>
                        </span>
                    </a>
                </li> --}}
            </ul>
        </li>


        <li class="nav-heading">Kelola Data Utama</li>

        {{-- Kelola Pengguna --}}
        <li class="nav-item">
            <a class="nav-link @if (request()->segment(1) == 'users') @else collapsed @endif" data-bs-target="#forms-nav"
                data-bs-toggle="collapse" href="#"
                aria-expanded="@if (request()->segment(1) == 'users') true @else false @endif">
                <i class="bi bi-person"></i><span>Kelola Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse @if (request()->segment(1) == 'users') show @endif"
                data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a href="{{ route('user-data.index') }}" class="@if (request()->segment(2) == 'data') active @endif">
                        <i class="bi bi-circle"></i><span>Daftar Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user-roles.index') }}" class="@if (request()->segment(2) == 'roles') active @endif">
                        <i class="bi bi-circle"></i><span>Daftar Peran</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Kelola Unit Pengolah --}}
        <li class="nav-item"><a class="nav-link @if (request()->segment(1) == 'unit-pengolah') @else collapsed @endif"
                href="{{ route('unit-pengolah.index') }}"><i class="bi bi-file-person"></i><span>Kelola Unit
                    Pengolah</span></a></li>

        <li class="nav-heading">Kelola Master Layanan</li>
        {{-- Kelola Jenis Layanan --}}
        <li class="nav-item"> <a class="nav-link @if (request()->segment(1) == 'jenis-layanan') @else collapsed @endif"
                href="{{ route('jenis-layanan.index') }}"> <i class="bi bi-window-dock"></i> <span>Jenis Layanan</span>
            </a></li>
        {{-- Kelola Output Layanan --}}
        <li class="nav-item"> <a class="nav-link @if (request()->segment(1) == 'output-layanan') @else collapsed @endif"
                href="{{ route('output-layanan.index') }}"> <i class="bi bi-wallet"></i> <span>Output Layanan</span>
            </a></li>
        {{-- Kelola Daftar Layanan --}}
        <li class="nav-item"> <a class="nav-link @if (request()->segment(1) == 'daftar-layanan') @else collapsed @endif"
                href="{{ route('daftar-layanan.index') }}"> <i class="bi bi-vr"></i> <span>Daftar Layanan</span> </a>
        </li>
        {{-- Kelola Syarat Layanan --}}
        <li class="nav-item">
            <a class="nav-link @if (request()->segment(1) == 'syarat-layanan') @else collapsed @endif" data-bs-target="#syarat-nav"
                data-bs-toggle="collapse" href="#"
                aria-expanded="@if (request()->segment(1) == 'syarat-layanan') true @else false @endif">
                <i class="bi bi-view-stacked"></i><span>Kelola Syarat</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="syarat-nav" class="nav-content collapse @if (request()->segment(1) == 'syarat-layanan') show @endif"
                data-bs-parent="#sidebar-nav" style="">
                <li>
                    <a href="{{ route('syarat-layanan-master.index') }}"
                        class="@if (request()->segment(2) == 'master') active @endif">
                        <i class="bi bi-circle"></i><span>Master Syarat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('syarat-layanan-list.index') }}"
                        class="@if (request()->segment(2) == 'list') active @endif">
                        <i class="bi bi-circle"></i><span>Daftar Syarat</span>
                    </a>
                </li>
            </ul>
        </li>





    </ul>
</aside>
