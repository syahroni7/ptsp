@extends('layouts.landing.anyar.master')
@section('title', 'Daftar Pelayanan')



@section('_styles')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.rtl.min.css') }}" />

    <style>
        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }

        .modal-print {
            min-height: 700px !important;
        }
    </style>
@endsection


@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services mt-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
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


                                        <select name="id_daftar_pelayanan" id="search-pelayanan" class="form-control select2-search">
                                        </select>
                                        <button class="input-group-text" id="searchButton" data-bs-toggle="collapse" href="#searchSection" role="button" aria-expanded="false" aria-controls="searchSection" data-bs-target=".search-collapse">
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

            <div class="form-box mt-5">

                {{-- <div class="row tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> --}}
                <div class="row collapse search-collapse2" id="searchSection2">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title m-0 p-0"> <i class="bi bi-card-checklist"></i> Hasil Pencarian
                                    Pelayanan
                                    <button id="cetak-bukti-button" type="button" class="btn btn-warning btn-sm mx-1 float-end" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" data-cetak_bukti_link="">
                                        Cetak Bukti
                                    </button>
                                </h5>

                            </div>
                            <div class="card-body">

                                <form class="row g-3 mt-2" id="sForm" method="post" action="{{ route('daftar-pelayanan.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="col-md-6">
                                        <label for="search_no_registrasi" class="form-label fw-bold">No Registrasi</label>
                                        <input class="form-control" name="search_no_registrasi" id="search_no_registrasi" type="text" value="" placeholder="No Registrasi" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="search_id_layanan" class="form-label fw-bold">Nama Layanan</label>
                                        <select name="search_id_layanan" id="search_id_layanan" class="form-control select2" disabled="true">
                                            <option selected="">Pilih Layanan</option>
                                            @foreach ($daftar_layanan as $layanan)
                                                <option value="{{ $layanan->id_layanan }}">{{ $layanan->unit->name . ' - ' . $layanan->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="search_pemohon_no_surat" class="form-label fw-bold">Perihal</label>
                                        <input class="form-control" name="search_perihal" id="search_perihal" type="text" value="" placeholder="Perihal" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pemohon_no_surat" class="form-label fw-bold">No. Surat
                                            Permohonan</label>
                                        <input class="form-control" name="search_pemohon_no_surat" id="search_pemohon_no_surat" type="text" placeholder="Nomor Surat" value="" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pemohon_tanggal_surat" class="form-label fw-bold">Tanggal Surat
                                            Permohonan</label>
                                        <input type="date" class="form-control" name="search_pemohon_tanggal_surat" id="search_pemohon_tanggal_surat" placeholder="Tanggal Surat" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pemohon_nama" class="form-label fw-bold">Nama Pemohon</label>
                                        <input class="form-control" name="search_pemohon_nama" id="search_pemohon_nama" type="text" placeholder="Nama Pemohon" value="" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pemohon_alamat" class="form-label fw-bold">Alamat
                                            Pemohon</label>
                                        <input class="form-control" name="search_pemohon_alamat" id="search_pemohon_alamat" type="text" placeholder="Alamat Pemohon" value="" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pemohon_no_hp" class="form-label fw-bold">No. HP
                                            Pemohon</label>
                                        <input class="form-control" name="search_pemohon_no_hp" id="search_pemohon_no_hp" type="text" placeholder="Nomor HP Pemohon" value="" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_pengirim_nama" class="form-label fw-bold">Nama Pengirim</label>
                                        <input class="form-control" name="search_pengirim_nama" id="search_pengirim_nama" type="text" placeholder="Nama Pengirim" value="" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_kelengkapan_syarat" class="form-label fw-bold">Kelengkapan
                                            Syarat</label>
                                        <select name="search_kelengkapan_syarat" id="search_kelengkapan_syarat" class="form-control select2" disabled="true">
                                            <option selected="">-- Pilih Kelengkapan Syarat --</option>
                                            <option value="Sudah Lengkap">Sudah Lengkap</option>
                                            <option value="Belum Lengkap">Belum Lengkap</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="search_status_pelayanan" class="form-label fw-bold">Status
                                            Pelayanan</label>
                                        <select name="search_status_pelayanan" id="search_status_pelayanan" class="form-control select2" disabled="true">
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
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

    <div class="modal fade" id="ExtralargeModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cetak Bukti Pendaftaran Pelayanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-print">
                    <div class="mx-2 my-2">
                        <iframe id="cetak-bukti-link" class="responsive-iframe" src="" frameborder="0"></iframe>
                    </div>

                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div><!-- End Extra Large Modal-->


@endsection


@section('_scripts')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

    <script>
        $(document).on('click', '#searchButton', function(e) {
            e.preventDefault();

            if ($('#search-pelayanan').val()) {

                searchData($('#search-pelayanan').val());

            } else {
                Swal.fire(
                    'Perhatian!',
                    'Harap Ketik No. Registrasi untuk melacak Data',
                    'warning'
                );
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

        $(document).ready(function() {

            $(document).on("click", "#cetak-bukti-button", function() {
                var cetakBuktiLink = $(this).data('cetak_bukti_link');
                $('#cetak-bukti-link').attr('src', cetakBuktiLink);
            });

        });

        function searchData(id_pelayanan) {
            $('body').block({
                message: `Loading...`
            });

            setTimeout(function() {

                $.ajax({
                    type: 'GET',
                    url: '/daftar-pelayanan/fetch/' + id_pelayanan,
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
                            $('#search_pemohon_tanggal_surat').val(item
                                .pemohon_tanggal_surat);
                            $('#search_pemohon_nama').val(item.pemohon_nama);
                            $('#search_pemohon_alamat').val(item.pemohon_alamat);
                            $('#search_pemohon_no_hp').val(item.pemohon_no_hp);
                            $('#search_pengirim_nama').val(item.pengirim_nama);
                            $('#search_kelengkapan_syarat').val(item.kelengkapan_syarat)
                                .trigger('change');
                            $('#search_status_pelayanan').val(item.status_pelayanan)
                                .trigger(
                                    'change');
                            $('#search_catatan').val(item.catatan);

                            $('.detail-button').attr('href', data.url_detail);

                            $('#cetak-bukti-button').attr('data-cetak_bukti_link', data.url_pdf)

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
                                'Unauthorized!',
                                'You are unauthorized to do the action',
                                'warning'
                            );

                        }
                    }
                });



                $('body').unblock();
                $('#inputSection').removeClass('show');
                $('#searchSection2').fadeIn("slow");
            }, 1500);
        }
    </script>


@endsection
