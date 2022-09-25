@extends('layouts.admin.master')
@section('title', $title)


@section('_styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.rtl.min.css') }}" />
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
        <section class="section">
            <div class="row">
                {{-- <div class="row nav" id="nav-tab" role="tablist"> --}}

                {{-- Input Pelayanan Section --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0 p-0"> <i class="bi bi-plus-square"></i> Input Data
                                Pelayanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-sm-8">
                                    <div class="input-group mt-2">
                                        {{-- <button type="button" class="btn btn-primary">Tambah Pelayanan Baru</button> --}}

                                        <a id="inputButton" class="btn btn-primary" data-bs-toggle="collapse"
                                            href="#inputSection" role="button" aria-expanded="false"
                                            aria-controls="inputSection" data-bs-target=".input-collapse">
                                            Tambah Pelayanan Baru
                                        </a>

                                        {{-- <a class="btn btn-primary" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab"
                                            aria-controls="nav-home" aria-selected="true">
                                            Tambah Pelayanan Baru
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Lacak Pelayanan Section --}}
                <div class="col-lg-6">
                    <div class="card" id="find-data">
                        <div class="card-header">
                            <h5 class="card-title m-0 p-0"> <i class="bi bi-search"></i> Cari Data Pelayanan</h5>
                        </div>
                        <div class="card-body">

                            <div class="row mt-2">
                                <div class="col-sm-8">
                                    <div class="input-group mt-2">
                                        {{-- <input type="text" class="form-control" placeholder="Ketik No. Registrasi"
                                            aria-label="Ketik No. Registrasi" aria-describedby="basic-addon2"> --}}


                                        <select name="id_daftar_pelayanan" id="search-pelayanan"
                                            class="form-control select2-search">
                                        </select>
                                        <button class="input-group-text" id="searchButton" data-bs-toggle="collapse"
                                            href="#searchSection" role="button" aria-expanded="false"
                                            aria-controls="searchSection" data-bs-target=".search-collapse">
                                            <i class="bi bi-search"></i>&nbsp;&nbsp;Cari
                                        </button>

                                        {{-- <button class="input-group-text" id="basic-addon2" id="nav-profile-tab"
                                            data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false">
                                            <i class="bi bi-search"></i>&nbsp;&nbsp;Cari
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            {{-- <div class="tab-content" id="nav-tabContent"> --}}


            <div class="form-box">

                {{-- <div class="row tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> --}}
                <div class="row collapse input-collapse" id="inputSection">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title m-0 p-0"> <i class="bi bi-card-checklist"></i> Form Data Pelayanan
                                </h5>
                            </div>
                            <div class="card-body">

                                <form class="row g-3 mt-2" id="fForm" method="post"
                                    action="{{ route('daftar-pelayanan.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="col-md-12">
                                        <label for="id_layanan" class="form-label fw-bold">Nama Layanan</label>
                                        <select name="id_layanan" id="id_layanan" class="form-control select2">
                                            <option selected="">Pilih Layanan</option>
                                            @foreach ($daftar_layanan as $layanan)
                                                <option value="{{ $layanan->id_layanan }}">{{ $layanan->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="perihal" class="form-label fw-bold">Perihal</label>
                                        <input class="form-control" name="perihal" id="perihal" type="text"
                                            value="" placeholder="Perihal">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="pemohon_no_surat" class="form-label fw-bold">No. Surat
                                            Permohonan</label>
                                        <input class="form-control" name="pemohon_no_surat" id="pemohon_no_surat"
                                            type="text" placeholder="Nomor Surat" value="">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="pemohon_tanggal_surat" class="form-label fw-bold">Tanggal Surat
                                            Permohonan</label>
                                        <input type="date" class="form-control" name="pemohon_tanggal_surat"
                                            id="pemohon_tanggal_surat" placeholder="Tanggal Surat">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="pemohon_nama" class="form-label fw-bold">Nama Pemohon</label>
                                        <input class="form-control" name="pemohon_nama" id="pemohon_nama" type="text"
                                            placeholder="Nama Pemohon" value="">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="pemohon_alamat" class="form-label fw-bold">Alamat Pemohon</label>
                                        <input class="form-control" name="pemohon_alamat" id="pemohon_alamat"
                                            type="text" placeholder="Alamat Pemohon" value="">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="pemohon_no_hp" class="form-label fw-bold">No. HP Pemohon</label>
                                        <input class="form-control" name="pemohon_no_hp" id="pemohon_no_hp"
                                            type="text" placeholder="Nomor HP Pemohon" value="">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="pengirim_nama" class="form-label fw-bold">Nama Pengirim</label>
                                        <input class="form-control" name="pengirim_nama" id="pengirim_nama"
                                            type="text" placeholder="Nama Pengirim" value="">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="kelengkapan_syarat" class="form-label fw-bold">Kelengkapan
                                            Syarat</label>
                                        <select name="kelengkapan_syarat" id="kelengkapan_syarat"
                                            class="form-control select2">
                                            <option selected="">-- Pilih Kelengkapan Syarat --</option>
                                            <option value="Sudah Lengkap">Sudah Lengkap</option>
                                            <option value="Belum Lengkap">Belum Lengkap</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="status_pelayanan" class="form-label fw-bold">Status
                                            Pelayanan</label>
                                        <select name="status_pelayanan" id="status_pelayanan"
                                            class="form-control select2">
                                            <option selected="">-- Pilih Status Layanan --</option>
                                            <option value="Baru">Baru</option>
                                            <option value="Proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                            <option value="Ambil">Ambil</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="catatan" class="form-label fw-bold">Catatan</label>
                                        <textarea class="form-control" style="height: 100px" name="catatan" id="catatan"></textarea>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-end">Simpan Data
                                            Pelayanan</button>
                                        <button type="reset" class="btn btn-secondary float-start">Reset</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- <div class="row tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> --}}
                <div class="row collapse search-collapse2" id="searchSection2">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title m-0 p-0"> <i class="bi bi-card-checklist"></i> Hasil Pencarian
                                    Pelayanan
                                </h5>
                            </div>
                            <div class="card-body">

                                <form class="row g-3 mt-2" id="fForm" method="post"
                                    action="{{ route('daftar-pelayanan.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="col-md-6">
                                        <label for="search_no_registrasi" class="form-label fw-bold">No Registrasi</label>
                                        <input class="form-control" name="search_no_registrasi" id="search_no_registrasi"
                                            type="text" value="" placeholder="No Registrasi" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="search_id_layanan" class="form-label fw-bold">Nama Layanan</label>
                                        <select name="search_id_layanan" id="search_id_layanan"
                                            class="form-control select2" disabled="true">
                                            <option selected="">Pilih Layanan</option>
                                            @foreach ($daftar_layanan as $layanan)
                                                <option value="{{ $layanan->id_layanan }}">{{ $layanan->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="search_pemohon_no_surat" class="form-label fw-bold">Perihal</label>
                                        <input class="form-control" name="search_perihal" id="search_perihal"
                                            type="text" value="" placeholder="Perihal" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pemohon_no_surat" class="form-label fw-bold">No. Surat
                                            Permohonan</label>
                                        <input class="form-control" name="search_pemohon_no_surat"
                                            id="search_pemohon_no_surat" type="text" placeholder="Nomor Surat"
                                            value="" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pemohon_tanggal_surat" class="form-label fw-bold">Tanggal Surat
                                            Permohonan</label>
                                        <input type="date" class="form-control" name="search_pemohon_tanggal_surat"
                                            id="search_pemohon_tanggal_surat" placeholder="Tanggal Surat" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pemohon_nama" class="form-label fw-bold">Nama Pemohon</label>
                                        <input class="form-control" name="search_pemohon_nama" id="search_pemohon_nama"
                                            type="text" placeholder="Nama Pemohon" value="" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pemohon_alamat" class="form-label fw-bold">Alamat
                                            Pemohon</label>
                                        <input class="form-control" name="search_pemohon_alamat"
                                            id="search_pemohon_alamat" type="text" placeholder="Alamat Pemohon"
                                            value="" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pemohon_no_hp" class="form-label fw-bold">No. HP
                                            Pemohon</label>
                                        <input class="form-control" name="search_pemohon_no_hp" id="search_pemohon_no_hp"
                                            type="text" placeholder="Nomor HP Pemohon" value="" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pengirim_nama" class="form-label fw-bold">Nama Pengirim</label>
                                        <input class="form-control" name="search_pengirim_nama" id="search_pengirim_nama"
                                            type="text" placeholder="Nama Pengirim" value="" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_kelengkapan_syarat" class="form-label fw-bold">Kelengkapan
                                            Syarat</label>
                                        <select name="search_kelengkapan_syarat" id="search_kelengkapan_syarat"
                                            class="form-control select2" disabled="true">
                                            <option selected="">-- Pilih Kelengkapan Syarat --</option>
                                            <option value="Sudah Lengkap">Sudah Lengkap</option>
                                            <option value="Belum Lengkap">Belum Lengkap</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_status_pelayanan" class="form-label fw-bold">Status
                                            Pelayanan</label>
                                        <select name="search_status_pelayanan" id="search_status_pelayanan"
                                            class="form-control select2" disabled="true">
                                            <option selected="">-- Pilih Status Layanan --</option>
                                            <option value="Baru">Baru</option>
                                            <option value="Proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                            <option value="Ambil">Ambil</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="search_catatan" class="form-label fw-bold">Catatan</label>
                                        <textarea class="form-control" style="height: 100px" name="search_catatan" id="search_catatan" disabled="true"></textarea>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-end">Detail</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            {{-- </div> --}}
        </section>

    </main>


@endsection


@section('_scripts')


    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>


    <script type="text/javascript" language="javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('js/buttons.bootstrap5.min.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('js/jszip.min.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('js/buttons.colVis.min.js') }}"></script>



    <script>
        $(document).on('click', '#searchButton', function(e) {
            e.preventDefault();

            $('body').block({
                message: `Loading...`
            });
            setTimeout(function() {

                $.ajax({
                    type: 'GET',
                    url: '/daftar-pelayanan/fetch/' + $('#search-pelayanan').val(),
                    dataType: 'json', // let's set the expected response format
                    success: function(data) {
                        console.log('data');
                        console.log(data);
                        if (data.success) {
                            var item = data.data;
                            $('#search_id_layanan').val(item.id_layanan).trigger('change');
                            $('#search_no_registrasi').val(item.no_registrasi);
                            $('#search_perihal').val(item.perihal);
                            $('#search_pemohon_no_surat').val(item.pemohon_no_surat);
                            $('#search_pemohon_tanggal_surat').val(item.pemohon_tanggal_surat);
                            $('#search_pemohon_nama').val(item.pemohon_nama);
                            $('#search_pemohon_alamat').val(item.pemohon_alamat);
                            $('#search_pemohon_no_hp').val(item.pemohon_no_hp);
                            $('#search_pengirim_nama').val(item.pengirim_nama);
                            $('#search_kelengkapan_syarat').val(item.kelengkapan_syarat);
                            $('#search_status_pelayanan').val(item.status_pelayanan);
                            $('#search_catatan').val(item.catatan);

                        } else {
                            Swal.fire(
                                'Error!', data.message, 'error'
                            );
                        }
                        $('#fForm')[0].reset();
                        $('#id_layanan').val('');

                    },
                    error: function(err) {
                        if (err.status ==
                            422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            // you can loop through the errors object and show it to the user
                            console.warn(err.responseJSON.errors);
                            // display errors on each form field
                            $('.ajax-invalid').remove();
                            $.each(err.responseJSON.errors, function(i, error) {
                                var el = $(document).find('[name="' + i + '"]');
                                el.after($('<span class="ajax-invalid" style="color: red;">' +
                                    error[0] + '</span>'));
                            });
                        } else if (err.status == 403) {
                            Swal.fire(
                                'Unauthorized!', 'You are unauthorized to do the action',
                                'warning'
                            );

                        }
                    }
                });



                $('body').unblock();
                $('#inputSection').removeClass('show');
                $('#searchSection2').fadeIn("slow");
            }, 1500);



        })

        $(document).on('click', '#inputButton', function(e) {
            e.preventDefault();

            $('#inputSection').fadeIn("slow");
            $('#searchSection2').hide();

        })


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.select2').select2({
            theme: 'bootstrap-5',
        });

        $('.select2-search').select2({
            theme: 'bootstrap-5',
            ajax: {
                url: "/daftar-pelayanan/search",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    console.log(data);
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.no_registrasi,
                                id: item.id_pelayanan,
                            }
                        })
                    };
                },
                cache: true
            },
            placeholder: 'Ketik No. Registrasi',
            minimumInputLength: 5,
        });


        var table = $('#example').DataTable({
            orderable: false,
            sort: false,
            order: false,
            lengthChange: false,
            responsive: false,
            scrollX: true,
            autoWidth: false,
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            iDisplayLength: 50,
            buttons: [
                'pageLength', {
                    text: '<i class="fa fa-plus-circle"></i> Tambah',
                    attr: {
                        'title': 'Import Data',
                        'data-bs-original-title': 'Import Data',
                        'data-bs-target': '#fModal',
                        'data-bs-toggle': 'modal',
                        'data-bs-backdrop': 'static',
                        'data-bs-keyboard': 'false',
                        'data-bs-title': 'Tambah Item Layanan',
                        'data-title': 'Tambah Item Layanan',
                        'type': 'button',
                        'id': 'addBtn',
                        'class': 'btn btn-primary'
                    },
                    action: function(e, dt, node, config) {
                        // alert('Button activated');
                    }
                }, {
                    text: '<i class="fa fa-refresh"></i>  Reload',
                    attr: {
                        'title': 'Refresh Table',
                        'class': 'btn btn-warning'
                    },
                    action: function(e, dt, node, config) {
                        dt.ajax.reload(null, false);
                        $('#example').block({
                            message: `Loading...`
                        });
                        setTimeout(function() {
                            $('#example').unblock();
                        }, 1500);
                    }
                }
            ],
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center'
            }, {
                data: 'unit.name',
                name: 'unit.name'
            }, {
                data: 'name',
                name: 'name',
                className: 'fw-bold fs-6'
            }, {
                data: 'jenis.name',
                name: 'jenis.name',
            }, {
                data: 'output.name',
                name: 'output.name'
            }, {
                data: 'lama_layanan',
                name: 'lama_layanan',
                className: 'text-center',
                render: function(data, type, row) {
                    return `${row.lama_layanan} hari`
                },
            }, {
                data: 'action',
                name: 'action',
                className: 'text-center'
            }, ]
        });


        $(document).ready(function() {
            table.ajax.url('/daftar-layanan').load();

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

            $('.toggle-sidebar-btn').on('click', function() {
                setTimeout(function() {
                    table.columns.adjust();
                }, 500);
            });

            $(window).on('resize', function() {
                setTimeout(function() {
                    table.columns.adjust();
                }, 500);
            });


            $(document).on("click", "#addBtn", function() {
                $('.edit-state').hide();
                $('#id_layanan').val('');
                $('#fForm')[0].reset();
                var title = $(this).data('title');
                $("#judul-modal").html(title);
                $('#nama').prop('disabled', false);
            });

            $(document).on("click", "#editBtn", function() {
                $('.edit-state').show();
                var title = $(this).data('title');
                $("#judul-modal").html(title);
                var data = table.row($(this).parents('tr')).data();
                console.log(data);
                console.log(title);
                $("#id_layanan").val(data.id_layanan);
                $('#name').val(data.name);

                $('#id_unit_pengolah').val(data.id_unit_pengolah).trigger('change');
                $('#id_jenis_layanan').val(data.id_jenis_layanan).trigger('change');
                $('#id_output_layanan').val(data.id_output_layanan).trigger('change');
                $('#lama_layanan').val(data.lama_layanan);
                $('#biaya_layanan').val(data.biaya_layanan);

            });


            $("#submitBtn").on("click", function(event) {
                event.preventDefault();

                $('.modalBox').block({
                    message: null
                });

                $('#submitBtn').prop("disabled", true);

                var formdata = $("#fForm")
                    .serialize(); // here $(this) refere to the form its submitting
                console.log(formdata);

                url = $('#fForm').attr('action');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formdata, // here $(this) refers to the ajax object not form
                    dataType: 'json', // let's set the expected response format
                    success: function(data) {
                        setTimeout(function() {
                            $('#submitBtn').prop("disabled", false);
                            $('.modalBox').unblock();
                            console.log(data);
                            if (data.success == 'yeah') {
                                $('#fModal').modal('hide');
                                table.ajax.reload(null, false);
                                Swal.fire(
                                    'Great!', 'Data sukses di update!', 'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error!', data.message, 'error'
                                );
                            }
                            $('#fForm')[0].reset();
                            $('#id_layanan').val('');
                        }, 200);

                    },
                    error: function(err) {
                        if (err.status ==
                            422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            // you can loop through the errors object and show it to the user
                            console.warn(err.responseJSON.errors);
                            // display errors on each form field
                            $('.ajax-invalid').remove();
                            $.each(err.responseJSON.errors, function(i, error) {
                                var el = $(document).find('[name="' + i + '"]');
                                el.after($('<span class="ajax-invalid" style="color: red;">' +
                                    error[0] + '</span>'));
                            });
                        } else if (err.status == 403) {
                            Swal.fire(
                                'Unauthorized!', 'You are unauthorized to do the action',
                                'warning'
                            );

                        }
                    }
                });
            });


            $(document).on("click", "#destroyBtn", function() {
                event.preventDefault();
                var idItem = $(this).data('id_layanan');

                swalWithBootstrapButtons.fire({
                    title: 'Apakah anda yakin akan melakukan penghapusan data?',
                    text: "Anda tidak dapat mengembalikan file yang sudah dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak, batalkan!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = '{{ route('daftar-layanan.destroy', ':id') }}';
                        url = url.replace(':id', idItem);
                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            dataType: 'json', // let's set the expected response format
                            success: function(data) {
                                console.log(data);
                                if (data.success) {
                                    $('#fModal').modal('hide');
                                    swalWithBootstrapButtons.fire(
                                        'Dihapus!',
                                        'Data berhasil dihapus',
                                        'success'
                                    )
                                } else {
                                    Swal.fire(
                                        'Error!', data.message, 'error'
                                    );
                                }
                                table.ajax.reload(null, false);
                            },
                            error: function(err) {
                                if (err.status ==
                                    422
                                ) { // when status code is 422, it's a validation issue
                                    console.log(err.responseJSON);
                                    // you can loop through the errors object and show it to the user
                                    console.warn(err.responseJSON.errors);
                                    // display errors on each form field
                                    $('.ajax-invalid').remove();
                                    $.each(err.responseJSON.errors, function(i, error) {
                                        var el = $(document).find('[name="' +
                                            i + '"]');
                                        el.after($('<span class="ajax-invalid" style="color: red;">' +
                                            error[0] + '</span>'));
                                    });
                                } else if (err.status == 403) {
                                    Swal.fire(
                                        'Unauthorized!',
                                        'You are unauthorized to do the action',
                                        'warning'
                                    );
                                }
                            }
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Dibatalkan!', 'Data Aman', 'error'
                        )
                    }
                });

            });


        });
    </script>
@endsection
