@extends('layouts.landing.bizland.master')
@section('title', $title)


@section('_styles')

<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.rtl.min.css') }}" />
{{-- File Pond --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/filepond/filepond.css') }}">

@endsection

@section('content')

<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

        <!-- Tombol Toggle -->
        <div class="text-center my-3">
            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#pengumumanToggle" aria-expanded="true" aria-controls="pengumumanToggle">
                <i class="bi bi-megaphone-fill me-2"></i> Lihat Pengumuman
            </button>
        </div><!-- /Tombol Toggle -->

        <!-- Area Pengumuman langsung terbuka -->
        <div class="collapse show" id="pengumumanToggle">
            <div class="alert alert-primary shadow-sm px-4 py-3 border-start border-2 border-primary rounded-2 animate__animated animate__fadeIn"
                role="alert"
                style="background: linear-gradient(to right, #eaf4fb, #ffffff);">

                <!-- Bagian atas: icon dan teks pengumuman di kiri, tombol close di kanan -->
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="d-flex align-items-start">
                        <i class="bi bi-megaphone-fill fs-3 me-3 animate__animated animate__pulse animate__infinite" style="animation-duration: 2s;"></i>
                        <div class="lh-sm text-dark">
                            <strong class="d-block mb-1">Pengumuman !</strong>
                            Jenis Naskah Surat yang Harus Lewat <strong>Aplikasi Srikandi </strong>Surat Edaran (SE) Sekjen <strong>30 Tahun 2024</strong>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-toggle="collapse" data-bs-target="#pengumumanToggle" aria-label="Close"></button>
                </div>

                <!-- Daftar 2 kolom di bawah -->
                <div class="d-flex justify-content-between">
                    <ol style="flex: 1; margin-right: 1rem;">
                        <li>Surat Edaran</li>
                        <li>Surat Pengantar</li>
                        <li>Surat Dinas</li>
                        <li>Surat Keterangan</li>
                        <li>Nota Dinas</li>
                    </ol>
                    <ol start="6" style="flex: 1; margin-left: 1rem;">
                        <li>Surat Undangan</li>
                        <li>Surat Tugas</li>
                        <li>Surat Cuti</li>
                        <li>Surat Keputusan (SK) Kegiatan</li>
                        <li>Berita Acara</li>
                    </ol>
                    <ol start="11" style="flex: 1; margin-left: 1rem;">
                        <li>Surat Pernyataan</li>
                        <li>Telaah Staf</li>
                        <li>Laporan</li>
                        <li>Sertifikat</li>
                    </ol>
                </div>

            </div>
        </div><!-- /Area Pengumuman langsung terbuka -->

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

                            {{-- <div class="col-md-12 mb-3 arsip-masuk-box">
                                    <label for="arsip_masuk_url_register" class="form-label fw-bold">Arsip Masuk</label><br>
                                    <div id="arsip-masuk-filebox" class="masuk-img" style="display: none">
                                        <img class="img-fluid" id="arsip-masuk-src" src="" alt="" width="200">
                                    </div>

                                    <button id="upload_widget_opener_masuk" type="button" class="btn btn-secondary btn-sm upload_widget_opener_masuk">Upload</button>
                                    <input type="hidden" id="arsip_masuk_url_register" name="arsip_masuk_url_register" value="empty" required>
                                </div> --}}

                            <!--  For multiple file uploads  -->
                            <div class="col-12">
                                <label for="pengirim_nama" class="form-label fw-bold">Dokumen Pendukung</label>
                                <input type="file" name="data_file[]" multiple required />
                                <p class="help-block">{{ $errors->first('data_file.*') }}</p>
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

                            {{-- <button id="upload_arsip_masuk" class="btn btn-secondary btn-sm mx-1 float-end" type="button" data-bs-toggle="modal" data-bs-target="#arsipModal" data-title="Edit Data Item Layanan">Upload Arsip</button> --}}
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
                                    <option value="Selesai">Selesai</option>
                                    <option value="Ambil">Ambil</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="search_catatan" class="form-label fw-bold">Catatan</label>
                                <textarea class="form-control" style="height: 100px" name="search_catatan" id="search_catatan" disabled="true"></textarea>
                            </div>

                            <!--  For multiple file uploads  -->
                            <div class="col-12">
                                <label for="pengirim_nama" class="form-label fw-bold">Dokumen Pendukung</label>

                                <div class="dokumen_masuk_box">

                                </div>
                            </div>

                            {{-- <div class="card-footer">
                                    <a target="_blank" type="button" class="btn btn-primary float-end detail-button">Detail</a>
                                </div> --}}
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

<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2@11.js') }}"></script>
<script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script>
<script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
{{-- File Pond --}}
<script src="{{ asset('assets/js/filepond/filepond.js') }}"></script>
<script src="{{ asset('assets/js/filepond/validate-filepond.js') }}"></script>


<script>
    // Register the plugin
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    // Get a reference to the file input element
    const inputElement = document.querySelector('input[name="data_file[]"]');
    // Create a FilePond instance
    const pond = FilePond.create(inputElement, {
        acceptedFileTypes: ['application/pdf'],
    });

    // const pond = FilePond.create(inputElement, {
    //     chunkUploads: true
    // });

    FilePond.setOptions({
        server: {
            process: {
                url: '/upload-file/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            revert: {
                url: '/upload-file/destroy/1',
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    '_method': 'DELETE'
                }
            }
        },
        onaddfilestart: (file) => {
            isLoadingCheck();
        },
        onprocessfile: (files) => {
            isLoadingCheck();
        }
    });

    function isLoadingCheck() {
        var isLoading = pond.getFiles().filter(x => x.status !== 5).length !== 0;
        if (isLoading) {
            $('#submitPelayananBtn').attr("disabled", "disabled");
        } else {
            $('#submitPelayananBtn').removeAttr("disabled");
        }
    }


    // Global Variabel
    var id_pelayanan = null;
    var id_arsip = null;
    var arsip_masuk_url = null;
    var arsip_keluar_url = null;
    // Cloudinary Widget

    var widgetMasuk = cloudinary.createUploadWidget({
        cloudName: 'dwzc7p9dj', // Cloud name dari Cloudinary
        uploadPreset: 'arsip_masuk',
        theme: 'minimal',
        multiple: true,
        max_file_size: 10048576,
        background: "white"
    }, (error, result) => {
        if (!error && result && result.event === "success") {
            console.log('Info Arsip Masuk: ', result.info);
            var arsip_masuk_url = result.info.secure_url;
            console.log('arsip_masuk_url');
            console.log(arsip_masuk_url);
            $('#arsip_masuk_url_register').val(arsip_masuk_url);
            console.log('val');
            console.log($('#arsip_masuk_url_register').val());
            console.log('hide masuk');

            $('.upload_widget_opener_masuk').hide();
            $('.masuk-img').show();
            $('#arsip-masuk-src').attr("src", arsip_masuk_url);

        }
    });

    // document.getElementById("upload_widget_opener_masuk").addEventListener("click", function() {
    //     widgetMasuk.open();
    // }, false);


    const socket = io('wss://socket.ptspkemenaglebak.my.id/', {
        forceNew: true,
        transports: ["polling"]
    });

    socket.on('connection');


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

        var id_layanan = '' + '{{ $id_layanan }}';
        if (id_layanan) {
            $('#id_layanan').val(id_layanan).trigger('change');
            $('#id_layanan').prop('readonly', true);
            fetchSyarat(id_layanan);
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

                                // if (!(typeof socket === "undefined")) {
                                socket.emit('sendSummaryToServer', data.summary);
                                var notifData = [
                                    data.recipient, data.disposisi
                                ];
                                socket.emit('sendNotifToServer', notifData);
                                // }

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

        $(document).on('select2:select', '#id_layanan', function(e) {
            var id_layanan = $(this).val();
            fetchSyarat(id_layanan);
        });

        $(document).on("click", "#upload_arsip_masuk", function(e) {
            var title = $(this).data('title');
            $("#judul-modal").html('Upload Arsip Masuk');
            $('.arsip-masuk-box').show();
            $('.arsip-keluar-box').hide();
            console.log('dataPelayanan');
            console.log(dataPelayanan);
            var data = dataPelayanan;
            $('#arsip_id_pelayanan').val(data.id_pelayanan);
            $('#arsip_no_registrasi').val(data.no_registrasi);
            $('#arsip_id_layanan').val(data.id_layanan).trigger('change');
            $('#arsip_perihal').val(data.perihal);

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

                        if (item.arsip) {
                            if (item.arsip.arsip_masuk_url) {
                                $('#upload_arsip_masuk').prop('disabled', true);
                                $('#upload_arsip_masuk').props('disabled', true);
                            }
                        }

                        var boxmasuk = $('.dokumen_masuk_box');
                        var htmlmasuk = '';
                        $.each(item.arsip.dokumen_masuk_url, function(key, item) {
                            htmlmasuk += `<div class="btn btn-outline-dark mx-2 my-1">
                                                    <u>
                                                        <a id="string_url" target="_blank" href="${item.file_url}" style="font-size:smaller;">
                                                            ${item.filename}
                                                        </a>
                                                    </u>
                                                </div>`
                        });

                        boxmasuk.append(htmlmasuk);

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

    function fetchSyarat(id_layanan) {

        $('.template-syarat').block({
            message: '',
        });

        setTimeout(function() {
            $.ajax({
                url: '/syarat-layanan/list/fetch/' + id_layanan,
                method: 'get'
            }).done(function(res) {
                console.log('res');
                console.log(res);


                var htmlData = '';
                if (res.data.length > 0) {
                    htmlData += `<ol>`;
                    $.each(res.data, function(key, item) {
                        htmlData += `<li>${item.name}</li>`
                    });
                    htmlData += `</ol>`;
                } else {
                    htmlData += '.:: Belum ada Data Syarat ::.';
                }

                $('#message-syarat').html(htmlData);
                $('.template-syarat').fadeIn("slow");
                $('.template-syarat').unblock();
            });

        }, 300)
    }
</script>

@endsection