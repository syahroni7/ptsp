@extends('layouts.landing.anyar.master')
@section('title', $title)



@section('_styles')
    <style>
        .breadcrumbs {
            padding: 15px 0;
            background: #ecf6fe;
            margin-top: 70px;
        }

        .card-footer {
            background-color: unset !important;
        }

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
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Buat Permohonan Layanan</a></li>
            </ol>
            <h2>Buat Permohonan Layanan</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            {{-- Create Layanan --}}
            <div class="row collapse input-collapse show" id="inputSection">

                <div class="col-lg-12 entries">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0 p-0"> <i class="bi bi-card-checklist"></i> Formulir Permohonan Pelayanan
                            </h5>
                        </div>
                        <div class="card-body">

                            <form class="row g-3 mt-2 needs-validation" novalidate id="fForm" method="post" action="{{ route('daftar-pelayanan.store-landing') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-12 form-group">
                                    <label for="id_layanan" class="form-label fw-bold">Nama Layanan</label>
                                    <select name="id_layanan" id="id_layanan" class="form-control select2 custom-select">
                                        <option selected value="">Pilih Layanan</option>
                                        @foreach ($daftar_layanan as $layanan)
                                            <option value="{{ $layanan->id_layanan }}">{{ $layanan->unit->name . ' - ' . $layanan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 template-syarat" style="display: none">
                                    <ul class="list-group">
                                        <li class="list-group-item list-group-item-secondary">Syarat Layanan</li>
                                        <li class="list-group-item"><span id="message-syarat"></span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="perihal" class="form-label fw-bold">Perihal</label>
                                    {{-- <input class="form-control" name="perihal" id="perihal" type="text" value="" placeholder="Perihal"> --}}

                                    <div class="input-group mt-2">
                                        {{-- <input type="text" class="form-control" placeholder="Ketik No. Registrasi"
                                        aria-label="Ketik No. Registrasi" aria-describedby="basic-addon2"> --}}
                                        <input class="form-control" name="perihal" id="perihal" type="text" value="" placeholder="Perihal">
                                        <button class="input-group-text" id="copy-from-layanan" role="button" type="button" aria-expanded="false" aria-controls="searchSection">
                                            <i class="bi bi- clipboard-check"></i>&nbsp;&nbsp;Salin dari Layanan
                                        </button>

                                        {{-- <button class="input-group-text" id="basic-addon2" id="nav-profile-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">
                                        <i class="bi bi-search"></i>&nbsp;&nbsp;Cari
                                    </button> --}}
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="pemohon_no_surat" class="form-label fw-bold">No. Surat
                                        Permohonan</label>
                                    <input class="form-control" name="pemohon_no_surat" id="pemohon_no_surat" type="text" placeholder="Nomor Surat" value="">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="pemohon_tanggal_surat" class="form-label fw-bold">Tanggal Surat
                                        Permohonan</label>
                                    <input type="date" class="form-control" name="pemohon_tanggal_surat" id="pemohon_tanggal_surat" placeholder="Tanggal Surat" value="{{ date('Y-m-d') }}">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="pemohon_nama" class="form-label fw-bold">Nama Pemohon</label>
                                    <input class="form-control" name="pemohon_nama" id="pemohon_nama" type="text" placeholder="Nama Pemohon" value="">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="pemohon_alamat" class="form-label fw-bold">Alamat Pemohon</label>
                                    <input class="form-control" name="pemohon_alamat" id="pemohon_alamat" type="text" placeholder="Alamat Pemohon" value="">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="pemohon_no_hp" class="form-label fw-bold">No. HP Pemohon</label>
                                    <input class="form-control" name="pemohon_no_hp" id="pemohon_no_hp" type="text" placeholder="Nomor HP Pemohon" value="">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="pengirim_nama" class="form-label fw-bold">Nama Pengirim</label>
                                    <input class="form-control" name="pengirim_nama" id="pengirim_nama" type="text" placeholder="Nama Pengirim" value="">
                                </div>

                                {{-- <div class="col-md-12 form-group">
                                <label for="kelengkapan_syarat" class="form-label fw-bold">Kelengkapan
                                    Syarat</label>
                                <select name="kelengkapan_syarat" id="kelengkapan_syarat" class="form-control select2 custom-select">
                                    <option selected value="">-- Pilih Kelengkapan Syarat --</option>
                                    <option value="Sudah Lengkap">Sudah Lengkap</option>
                                    <option value="Belum Lengkap">Belum Lengkap</option>
                                </select>
                            </div> --}}

                                <input type="hidden" name="kelengkapan_syarat" id="kelengkapan_syarat" value="Sudah Lengkap">
                                <input type="hidden" name="status_pelayanan" id="status_pelayanan" value="Baru">

                                <div class="col-12">
                                    <label for="catatan" class="form-label fw-bold">Catatan</label>
                                    <textarea class="form-control" style="height: 100px" name="catatan" id="catatan"></textarea>
                                </div>

                                <div class="card-footer">
                                    <button id="submitPelayananBtn" type="submit" class="btn btn-primary float-end">Buat Permohonan</button>
                                    <button type="reset" class="btn btn-secondary float-start">Reset</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div><!-- End blog entries list -->

            </div>

            {{-- Result Layanan --}}
            <div class="row collapse search-collapse2" id="searchSection2">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0 p-0"> <i class="bi bi-card-checklist"></i> Rincian Permohonan
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

                                <div class="card-footer">
                                    <a target="_blank" type="button" class="btn btn-primary float-end detail-button">Detail</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Blog Single Section -->

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

    <script>
        $('.select2').select2({
            theme: 'bootstrap-5',
        });

        $("#copy-from-layanan").on("click", function() {
            var textLayanan = $('#id_layanan').find(":selected").text();
            $('#perihal').val(textLayanan.split("-").pop());
        });

        $(document).ready(function() {

            $(document).on("click", "#cetak-bukti-button", function() {
                var cetakBuktiLink = $(this).data('cetak_bukti_link');
                $('#cetak-bukti-link').attr('src', cetakBuktiLink);
            });

            var id_layanan = {{ $id_layanan }};
            if (id_layanan) {
                $('#id_layanan').val(id_layanan).trigger('change');
                $('#id_layanan').prop('readonly', true);
            }

            jQuery.validator.addMethod("phoneID", function(value, element) {
                return value.match(/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/);
            }, "Masukkan Nomor HP yang valid!");

            $('#fForm').validate({
                lang: 'id', // or whatever language option you have.
                ignore: [],
                rules: {
                    id_layanan: {
                        required: true,
                    },
                    perihal: {
                        required: true,
                    },
                    pemohon_no_surat: {
                        required: true,
                    },
                    pemohon_tanggal_surat: {
                        required: true,
                    },
                    pemohon_nama: {
                        required: true,
                    },
                    pemohon_alamat: {
                        required: true,
                    },
                    pemohon_no_hp: {
                        required: true,
                        phoneID: true
                    },
                    pengirim_nama: {
                        required: true,
                    },
                    kelengkapan_syarat: {
                        required: true,
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a valid email address",
                        minlength: "Please enter a valid email address",
                        email: "Please enter a valid email address",
                        remote: "This email is already registered"
                    },
                    username: {
                        required: "Please enter a valid username",
                        remote: "This username is already registered"
                    },
                    jenis_usaha: "Jenis Usaha Harap diisi",
                    id_kabkota: "Kota / Kabupaten Harap diisi",
                    nama: "Nama Harap diisi"
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            $("#submitPelayananBtn").on("click", function(event) {
                event.preventDefault();
                console.log($("#fForm").valid());

                if ($("#fForm").valid()) {

                    $('#fForm').block({
                        message: `Loading...`
                    });

                    setTimeout(function() {

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

                                console.log(data);
                                if (data.success) {
                                    Swal.fire(
                                        'Mantap!',
                                        'Data Pelayanan berhasil disimpan!',
                                        'success'
                                    );

                                    if (!(typeof socket === "undefined")) {
                                        socket.emit('sendSummaryToServer', data.summary);
                                        var notifData = [
                                            data.recipient, data.disposisi
                                        ];
                                        socket.emit('sendNotifToServer', notifData);
                                    }

                                    searchData(data.data.id_pelayanan);

                                } else {
                                    Swal.fire(
                                        'Perhatian!', data.message,
                                        'warning'
                                    );
                                }

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
                                    $.each(err.responseJSON.errors,
                                        function(i, error) {
                                            var el = $(document).find(
                                                '[name="' +
                                                i + '"]');
                                            el.after($('<span class="ajax-invalid" style="color: red;">' +
                                                error[0] +
                                                '</span>'));
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

                        $('#fForm').unblock();
                        $('#fForm')[0].reset();
                        $('#id_layanan').val('').trigger('change');
                        $('#inputSection').hide();
                        $('#inputSection').removeClass('show');

                    }, 1500);
                }
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
