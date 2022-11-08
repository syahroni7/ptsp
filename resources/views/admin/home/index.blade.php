@extends('layouts.admin.master')
@section('title', 'Beranda PTSP Kemenag Pessel')


@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <link href="{{ asset('niceadmin/vendor/boxicons/css/boxicons.min.css') }} " rel="stylesheet">
    <link href="{{ asset('niceadmin/vendor/quill/quill.snow.css') }} " rel="stylesheet">
    <link href="{{ asset('niceadmin/vendor/quill/quill.bubble.css') }} " rel="stylesheet">
    <link href="{{ asset('niceadmin/vendor/remixicon/remixicon.css') }} " rel="stylesheet">


    <link href="{{ asset('niceadmin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <style>


    </style>
@endsection





@section('content')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{{ $br1 }}</a></li>
                    <li class="breadcrumb-item active">{{ $br2 }}</li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card m-0">

                        <div class="card-body mb-0 pb-0">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h5 class="card-title">
                                {{ $greeting }} {{ Auth::user()->name }}, {{ __('Anda telah Login!') }}.
                                Ubah Profil Anda <a href="{{ route('profile.index') }}">Disini</a>
                            </h5>




                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">

                    <div class="row box-layanan">
                        <div class="col-12">
                            <h5 class="card-title">
                                <span>Berdasarkan Status</span>
                            </h5>
                        </div>
                        @foreach ($summaryPelayanan as $key => $status)
                            <!-- Item Card -->
                            {{-- <div class="col-xxl-3 col-md-6"> --}}
                            <div class="col-6">
                                <div class="card info-card sales-card m-0">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $status['name'] }} <span>| Total</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-envelope-open"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><span id="countJemaah">{{ $status['total'] }}</span></h6>
                                                <span class="text-{{ $status['color'] }} small pt-1 fw-bold">Total {{ $status['name'] }}</span>
                                                {{-- <span class="text-muted small pt-2 ps-1">Jemaah</span> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Jemaah Card -->
                        @endforeach




                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-title">
                                <span>Berdasarkan Unit Pengolah</span>
                            </h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Website Traffic -->
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Tabel Pelayanan <span></span></h5>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Unit Pengolah</th>
                                                <th scope="col" class="text-center">Baru</th>
                                                <th scope="col" class="text-center">Proses</th>
                                                <th scope="col" class="text-center">Selesai</th>
                                                <th scope="col" class="text-center">Total</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($totalByUnit as $key => $item)
                                                <tr>
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td class="">{{ $item['name'] }}</td>
                                                    <td class="text-center">{{ $item['Baru'] }}</td>
                                                    <td class="text-center">{{ $item['Proses'] }}</td>
                                                    <td class="text-center">{{ $item['Selesai'] }}</td>
                                                    <td class="text-center">{{ $item['value'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div><!-- End Website Traffic -->
                        </div>

                        <div class="col-md-6">
                            <!-- Website Traffic -->
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Chart Pelayanan <span></span></h5>

                                    <div id="trafficChart" style="min-height: 350px;" class="echart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            echarts.init(document.querySelector("#trafficChart")).setOption({
                                                tooltip: {
                                                    trigger: 'item'
                                                },
                                                legend: {
                                                    top: '5%',
                                                    left: 'center',
                                                    position: 'center'
                                                },
                                                series: [{
                                                    name: 'Total Pelayanan',
                                                    type: 'pie',
                                                    radius: ['40%', '70%'],
                                                    avoidLabelOverlap: true,
                                                    label: {
                                                        show: false,
                                                        position: 'center'
                                                    },
                                                    emphasis: {
                                                        label: {
                                                            show: true,
                                                            fontSize: '18',
                                                            fontWeight: 'bold'
                                                        }
                                                    },
                                                    labelLine: {
                                                        show: false
                                                    },
                                                    data: @json($totalByUnit)
                                                }]
                                            });
                                        });
                                    </script>

                                </div>
                            </div><!-- End Website Traffic -->
                        </div>


                    </div>














                </div><!-- End Left side columns -->


            </div>

        </section>
    </main>

@endsection


@section('_scripts')


    {{-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script> --}}

    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}



@endsection
