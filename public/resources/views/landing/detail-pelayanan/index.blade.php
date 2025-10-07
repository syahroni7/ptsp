@extends('layouts.landing.bizland.master')
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

        *:focus {
            outline: 0px;
        }

        .aksi-disposisi {
            text-transform: capitalize !important;
        }

        .disp-name {
            line-height: 10pt !important !important;
        }

        .select2 {
            width: 100% !important !important;
        }

        .dashboard .activity .activity-item .activite-label {
            color: #888 !important;
            position: relative !important;
            flex-shrink: 0 !important;
            flex-grow: 0 !important;
            min-width: 90px !important !important;
            text-align: right !important !important;
        }

        .dashboard .activity {
            font-size: 14px !important;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        .d-flex {
            display: flex !important;
        }

        .dashboard .activity .activity-item .activite-label {
            color: #888 !important;
            position: relative !important;
            flex-shrink: 0 !important;
            flex-grow: 0 !important;
            min-width: 90px !important;
            text-align: right !important;
        }

        .dashboard .activity .activity-item:first-child .activite-label::before {
            top: 5px !important;
        }

        .dashboard .activity .activity-item .activite-label::before {
            content: "" !important;
            position: absolute !important;
            right: -11px !important;
            width: 4px !important;
            top: 0 !important;
            bottom: 0 !important;
            background-color: #eceefe !important;
        }

        .dashboard .activity .activity-item .activity-badge {
            margin-top: 3px !important;
            z-index: 1 !important;
            font-size: 11px !important;
            line-height: 0 !important;
            border-radius: 50% !important;
            flex-shrink: 0 !important;
            border: 3px solid #fff !important;
            flex-grow: 0 !important;
        }

        .bi-circle-fill::before {
            content: "\f287";
        }

        .bi::before,
        [class^="bi-"]::before,
        [class*=" bi-"]::before {
            display: inline-block !important;
            font-family: bootstrap-icons !important !important;
            font-style: normal !important;
            font-weight: normal !important !important;
            font-variant: normal !important;
            text-transform: none !important;
            line-height: 1 !important;
            vertical-align: -0.125em !important;
            -webkit-font-smoothing: antialiased !important;
            -moz-osx-font-smoothing: grayscale !important;
        }

        .dashboard .activity .activity-item .activity-content {
            padding-left: 10px !important;
            padding-bottom: 20px !important;
        }

        .disp-name {
            line-height: 10pt !important;
        }
    </style>
@endsection


@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services mt-5">
        <div class="container" data-aos="fade-up">

            <div class="form-box mt-5">

                {{-- <div class="row tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> --}}
                <div class="row collapse search-collapse2 show" id="searchSection2">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="accordion card" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <h5 class="card-title m-0 p-0"> <i class="bi bi-card-checklist"></i> Detail Pelayanan Publik
                                            </h5>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form class="row g-3 mt-2" id="sForm">
                                                {{ csrf_field() }}
                                                <div class="col-md-6">
                                                    <label for="search_no_registrasi" class="form-label fw-bold">No Registrasi</label>
                                                    <input class="form-control" name="search_no_registrasi" id="search_no_registrasi" type="text" value="" placeholder="No Registrasi" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="search_id_layanan" class="form-label fw-bold">Nama Layanan</label>
                                                    <select name="search_id_layanan" id="search_id_layanan" class="form-control select2" disabled="true" width="100%">
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
                                                    <select name="search_kelengkapan_syarat" id="search_kelengkapan_syarat" class="form-control select2" disabled="true" width="100%">
                                                        <option selected="">-- Pilih Kelengkapan Syarat --</option>
                                                        <option value="Sudah Lengkap">Sudah Lengkap</option>
                                                        <option value="Belum Lengkap">Belum Lengkap</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="search_status_pelayanan" class="form-label fw-bold">Status
                                                        Pelayanan</label>
                                                    <select name="search_status_pelayanan" id="search_status_pelayanan" class="form-control select2" disabled="true" width="100%">
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

                                                <div class="card-footer">
                                                    {{-- <button type="button" class="btn btn-primary float-end">Detail</button> --}}
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-lg-5">

                            <div class="accordion card" id="accordion2">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne2">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <h5 class="card-title m-0 p-0"> <i class="bi bi-archive"></i> Arsip Pelayanan
                                            </h5>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingOne2" data-bs-parent="#accordion2">
                                        <div class="accordion-body">
                                            <form class="row g-3 mt-2" id="aForm">
                                                <div class="col-12">
                                                    <label for="search_catatan" class="form-label fw-bold">Arsip Masuk</label>
                                                    <div class="arsip-masuk-output">
                                                        -
                                                    </div>

                                                    {{-- <div class="arsip-masuk-box-upload">
                                                        <span id="upload_arsip_masuk" class="badge bg-primary me-1 text-start upload-arsip-masuk" type="button" data-bs-toggle="modal" data-bs-target="#fModal" data-title="Edit Data Item Layanan"><i class="bi bi-archive"></i> Upload</span>
                                                    </div> --}}
                                                </div>

                                                <div class="col-12">
                                                    <label for="search_catatan" class="form-label fw-bold">Arsip Keluar</label>
                                                    {{-- <div class="arsip-keluar-box-upload">
                                                        <span id="upload_arsip_keluar" class="badge bg-primary me-1 text-start upload-arsip-keluar" type="button" data-bs-toggle="modal" data-bs-target="#fModal" data-title="Edit Data Item Layanan"><i class="bi bi-archive"></i> Upload</span>
                                                    </div> --}}
                                                    <div class="arsip-keluar-output">
                                                        -
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="search_catatan" class="form-label fw-bold text-danger">Arsip Lama</label>
                                                    <div class="arsip-lama-box">
                                                        -
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion card mt-3" id="accordion3">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne3">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            <h5 class="card-title m-0 p-0"> <i class="bi bi-mailbox"></i> Riwayat Disposisi
                                            </h5>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingOne3" data-bs-parent="#accordion3">
                                        <div class="accordion-body">
                                            <div class="activity mt-3 disposisi-box">

                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            var idPelayanan = $('#search-pelayanan').val();
            var pemohonNoHP = $('#lacak-pemohon-no-hp').val();

            if (!idPelayanan) {
                Swal.fire(
                    'Perhatian!',
                    'Harap Ketik No. Registrasi untuk melacak Data',
                    'warning'
                );

                return false;
            } else if (!pemohonNoHP) {
                Swal.fire(
                    'Perhatian!',
                    'Harap Ketik No. HP untuk melacak Data',
                    'warning'
                );

                return false;
            } else {
                searchData(idPelayanan, pemohonNoHP);
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

            searchData('{{ $idx_pelayanan }}')

        });

        function searchData(id_pelayanan) {
            $('body').block({
                message: `Loading...`
            });

            setTimeout(function() {

                $.ajax({
                    type: 'GET',
                    url: '/daftar-pelayanan/detail/' + id_pelayanan,
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


                            let boxmasuk = $('.arsip-masuk-output');
                            let masukUpload = $('.arsip-masuk-box-upload');

                            boxmasuk.empty();
                            var htmlmasuk = '';
                            if (item.arsip.dokumen_masuk_url) {
                                $.each(item.arsip.dokumen_masuk_url, function(key, item) {
                                    var item_url_secure = item.file_url.replace("http:", "https:");
                                    htmlmasuk += `<div class="badge bg-secondary me-1 text-start">
                                                        <a id="string_url" class="text-white cetak-bukti-button" href="https://docs.google.com/gview?embedded=true&url=${item.file_url}" target="_blank" style="font-size:smaller;">
                                                         ${item.filename}
                                                        </a>
                                                </div>`
                                    // target="_blank"

                                    // <a id="string_url"  href="javascript:void(0)" style="font-size:smaller;" class="text-white cetak-bukti-button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" data-cetak_bukti_link="https://docs.google.com/gview?embedded=true&url=${item_url_secure}" data-file_name="${item.filename}">
                                    //                         ${item.filename}
                                    //                     </a>
                                });
                                if (item.status_pelayanan != 'Selesai') {
                                    htmlmasuk += `<span id="upload_arsip_masuk" class="badge bg-primary me-1 text-start upload-arsip-masuk" type="button" data-bs-toggle="modal" data-bs-target="#fModal" data-title="Edit Data Item Layanan"><i class="bi bi-folder-plus"></i> Tambah</span>`;
                                }

                                boxmasuk.append(htmlmasuk);
                                boxmasuk.show();
                                masukUpload.hide();
                            } else {
                                boxmasuk.append('-');
                                boxmasuk.hide();
                                masukUpload.show();

                            }

                            var boxkeluar = $('.arsip-keluar-output');
                            let keluarUpload = $('.arsip-keluar-box-upload');
                            boxkeluar.empty();
                            var htmlkeluar = '';
                            if (item.arsip.dokumen_keluar_url) {
                                $.each(item.arsip.dokumen_keluar_url, function(key, item) {
                                    var item_url_secure = item.file_url.replace("http:", "https:");
                                    htmlkeluar += `<div class="badge bg-secondary me-1 text-start">
                                                        
                                                        <a id="string_url" class="text-white cetak-bukti-button" target="_blank" href="https://docs.google.com/gview?embedded=true&url=${item.file_url}" style="font-size:smaller;">
                                                             ${item.filename}
                                                        </a>
                                                </div>`
                                    // target="_blank"

                                    // <a id="string_url"  href="javascript:void(0)" style="font-size:smaller;" class="text-white cetak-bukti-button" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" data-cetak_bukti_link="https://docs.google.com/gview?embedded=true&url=${item_url_secure}" data-file_name="${item.filename}">
                                    //                         ${item.filename}
                                    //                     </a>
                                });

                                boxkeluar.append(htmlkeluar);
                                // boxkeluar.show();
                                // keluarUpload.hide();
                            } else {
                                boxkeluar.append('-');
                                // boxkeluar.hide();
                                // keluarUpload.show();
                            }


                            //
                            let boxlama = $('.arsip-lama-box');
                            if (item.arsip.arsip_masuk_url) {
                                boxlama.empty();
                                var arsipHTML = `<a href="${item.arsip.arsip_masuk_url}"  class="badge bg-primary" type="button" >Lihat Dokumen</a>`;
                                boxlama.append(arsipHTML);
                            }











                            // =====================

                            // let boxmasuk = $('.arsip-masuk-box');

                            // boxmasuk.empty();
                            // var htmlmasuk = '';
                            // if (res.arsip.dokumen_masuk_url) {
                            //     $.each(res.arsip.dokumen_masuk_url, function(key, item) {
                            //         htmlmasuk += `<div class="btn btn-outline-dark mx-2 my-1 text-start">
                        //                         <u>
                        //                             <a id="string_url" target="_blank" href="${item.file_url}" style="font-size:smaller;">
                        //                                 ${item.filename}
                        //                             </a>
                        //                         </u>
                        //                     </div>`
                            //     });

                            //     boxmasuk.append(htmlmasuk);
                            // } else {
                            //     boxmasuk.append('-');

                            // }

                            // var boxkeluar = $('.arsip-keluar-box');
                            // boxkeluar.empty();
                            // var htmlkeluar = '';
                            // if (res.arsip.dokumen_keluar_url) {
                            //     $.each(res.arsip.dokumen_keluar_url, function(key, item) {
                            //         htmlkeluar += `<div class="btn btn-outline-dark mx-2 my-1 text-start">
                        //                         <u>
                        //                             <a id="string_url" target="_blank" href="${item.file_url}" style="font-size:smaller;">
                        //                                 ${item.filename}
                        //                             </a>
                        //                         </u>
                        //                     </div>`
                            //     });

                            //     boxkeluar.append(htmlkeluar);
                            // } else {
                            //     boxkeluar.append('-');
                            // }


                            // if (res.arsip) {
                            //     if (res.arsip.arsip_masuk_url) {
                            //         let arsipBox = $('.arsip-masuk-box');
                            //         arsipBox.empty();
                            //         var arsipHTML = `<a href="${res.arsip.arsip_masuk_url}" target="_blank" class="badge bg-primary" type="button" >Lihat Dokumen</a>`;
                            //         arsipBox.append(arsipHTML);
                            //     }

                            //     if (res.arsip.arsip_keluar_url) {
                            //         let arsipBox = $('.arsip-keluar-box');
                            //         arsipBox.empty();
                            //         var arsipHTML = `<a href="${res.arsip.arsip_keluar_url}" target="_blank" class="badge bg-primary" type="button" >Lihat Dokumen</a>`;
                            //         arsipBox.append(arsipHTML);
                            //     }
                            // }


                            let box = $('.disposisi-box');

                            var dHtml = '<ul>';
                            var urutan_disposisi = 0;
                            var countDisp = item.disposisi.length;
                            $.each(item.disposisi, function(i, item) {
                                urutan_disposisi++;
                                var date = item.created_at_short.substring(0, 11);
                                var time = item.created_at_short.substring(11, 20);
                                if (item.id_disposisi_parent == null) {

                                    dHtml += `<li class="mb-3"> <div class="disp-name ">
                                                        <span>${item.sender ? item.sender.name : item.pemohon_nama} </span> | <span class="text-muted" style="font-size:smaller;"> ${item.sender ? item.sender.jabatan : 'Publik'}</span><br>
                                                    </div>
                                                    <span>[${item.aksi_disposisi}]</span> | <span class="text-muted" style="font-size:smaller;"> ${date} ${time} </span>
                                            </li>`;

                                    if (countDisp == 1) {

                                        dHtml += `<li class="mb-3"> <div class="disp-name ">
                                                        <span>${item.recipient.name} </span> | <span class="text-muted" style="font-size:smaller;"> ${item.recipient.jabatan}</span><br>
                                                    </div>
                                                    <span>[-]</span> | <span class="text-muted" style="font-size:smaller;"> - </span>
                                            </li>`;
                                    }
                                } else {

                                    dHtml += `<li class="mb-3"> <div class="disp-name">
                                                        <span>${item.sender.name} </span> | <span class="text-muted" style="font-size:smaller;"> ${item.sender.jabatan}</span><br>
                                                    </div>
                                                    <span>[${item.aksi_disposisi}]</span> | <span class="text-muted" style="font-size:smaller;"> ${date} ${time} </span><br>
                                                    <span class="text-muted" style="font-size:smaller;">${item.keterangan == null ? '' : item.keterangan}</span>
                                            </li>`;

                                    if (i + 1 == countDisp) {
                                        if (item.recipient) {
                                            // Do Nothing
                                            dHtml += `<li class="mb-3"> <div class="disp-name ">
                                                        <span>${item.recipient.name} </span> | <span class="text-muted" style="font-size:smaller;"> ${item.recipient.jabatan}</span><br>
                                                    </div>
                                                    <span>[-]</span> | <span class="text-muted" style="font-size:smaller;"> - </span>
                                            </li>`;
                                        }
                                    }
                                }

                            });

                            dHtml += `</ul>`;

                            box.empty();
                            box.append(dHtml);


                        } else {
                            Swal.fire(
                                'Error!', data.message, 'error'
                            );
                        }

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
