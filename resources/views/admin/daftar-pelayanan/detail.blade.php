@extends('layouts.admin.master')
@section('title', $title)


@section('_styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.rtl.min.css') }}" />

    <style>
        *:focus {
            outline: 0px;
        }

        .aksi-disposisi {
            text-transform: capitalize;
        }

        .disp-name {
            line-height: 10pt !important;
        }

        .select2 {
            width: 100% !important;
        }

        .dashboard .activity .activity-item .activite-label {
            color: #888;
            position: relative;
            flex-shrink: 0;
            flex-grow: 0;
            min-width: 140px !important;
        }
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

            <div class="form-box">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title m-0 p-0"> <i class="bi bi-card-checklist"></i> Detail Pelayanan Publik
                                </h5>
                            </div>
                            <div class="card-body">

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
                                            <option value="selesai">Selesai</option>
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


                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title m-0 p-0"> <i class="bi bi-mailbox"></i> Riwayat Disposisi
                                </h5>
                            </div>
                            <div class="card-body">

                                <div class="activity mt-3 disposisi-box">

                                </div>

                            </div>

                        </div>

                        <div class="card lembar-disposisi" style="display: none">
                            <div class="card-header">
                                <h5 class="card-title m-0 p-0"> <i class="bi bi-mailbox"></i> Lembaran Disposisi
                                </h5>
                            </div>
                            <div class="card-body">

                                <form class="row g-3 mt-2 needs-validation" novalidate id="dForm" method="post" action="{{ route('disposisi-list.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="id_pelayanan" id="id_pelayanan" value="">
                                    <input type="hidden" name="id_disposisi_parent" id="id_disposisi_parent" value="">
                                    <input type="hidden" name="urutan_disposisi" id="urutan_disposisi" value="">

                                    <div class="col-md-12 form-group">
                                        <label for="id_recipient" class="form-label fw-bold">Nama Layanan</label>
                                        <select name="id_recipient" id="id_recipient" class="form-control select2 custom-select">
                                            <option selected value="">Pilih Pejabat</option>
                                            @foreach ($pegawai as $item)
                                                <option value="{{ $item->id }}">{{ $item->name . ' - ' . $item->jabatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="id_aksi_disposisi" class="form-label fw-bold">Aksi Disposisi</label>
                                        <select name="id_aksi_disposisi" id="id_aksi_disposisi" class="form-control select2 custom-select">
                                            <option selected value="">-- Pilih Disposisi --</option>
                                            @foreach ($aksi as $item)
                                                <option value="{{ $item->id_aksi_disposisi }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="catatan" class="form-label fw-bold">Catatan / Keterangan</label>
                                        <textarea class="form-control" style="height: 100px" name="keterangan" id="keterangan"></textarea>
                                    </div>

                                    <hr />
                                    <button type="button" id="saveDisposisiBtn" class="btn btn-primary float-end m-0">Disposisikan</button>

                                    {{-- <div class="card-footer">

                                    </div> --}}
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function searchData(id_pelayanan) {
            // $('body').block({
            //     message: `Loading...`
            // });

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


                            let box = $('.disposisi-box');

                            var dHtml = '';
                            var urutan_disposisi = 0;
                            var countDisp = item.disposisi.length;
                            $.each(item.disposisi, function(i, item) {
                                urutan_disposisi++;
                                if (item.id_disposisi_parent == null) {
                                    dHtml += `<div class="activity-item d-flex">
                                            <div class="activite-label">${item.created_at_short}</div>
                                            <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                                            <div class="activity-content">
                                                <div class="disp-name">
                                                    <span>${item.sender.name} </span><br><span class="text-muted" style="font-size:smaller;"> ${item.sender.jabatan}</span><br>
                                                </div>
                                                <span>[${item.aksi_disposisi}]</span>
                                                
                                            </div>
                                        </div>`;
                                    if (countDisp == 1) {
                                        dHtml += `<div class="activity-item d-flex">
                                            <div class="activite-label">-</div>
                                            <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                                            <div class="activity-content">
                                                <div class="disp-name">
                                                    <span>${item.recipient.name} </span><br><span class="text-muted" style="font-size:smaller;"> ${item.recipient.jabatan}</span><br>
                                                </div>
                                                <span class="aksi-disposisi">-</span>
                                            </div>
                                        </div>`;
                                    }
                                    // <span class="aksi-disposisi">[${item.aksi_disposisi.replace("_", " ")}]</span>
                                } else {
                                    dHtml += `<div class="activity-item d-flex">
                                            <div class="activite-label">${item.created_at_short}</div>
                                            <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                                            <div class="activity-content">
                                                <div class="disp-name">
                                                    <span>${item.sender.name} </span><br><span class="text-muted" style="font-size:smaller;"> ${item.sender.jabatan}</span><br>
                                                </div>
                                                <div class="disp-name mt-1">
                                                    <span>[${item.aksi_disposisi}]</span><br>
                                                    <span class="text-muted" style="font-size:smaller;">${item.keterangan == null ? '' : item.keterangan}</span>
                                                </div>
                                                
                                            </div>
                                        </div>`;
                                    if (i + 1 == countDisp) {
                                        // Do Nothing
                                        // dHtml += `<div class="activity-item d-flex">
                                    //     <div class="activite-label">-</div>
                                    //     <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                                    //     <div class="activity-content">
                                    //         <div class="disp-name">
                                    //             <span>${item.recipient.name} </span><br><span class="text-muted" style="font-size:smaller;"> ${item.recipient.jabatan}</span><br>
                                    //         </div>
                                    //         <span class="aksi-disposisi">-</span>
                                    //     </div>
                                    // </div>`;
                                    }
                                }

                            });

                            box.empty();
                            box.append(dHtml);


                            // Lembar Disposisi
                            var primary = data.primary;
                            if (primary.bisa_disposisi) {
                                $('.lembar-disposisi').show();
                                $('#id_disposisi_parent').val(primary.disposisiCurr.id_disposisi);
                                $('#id_pelayanan').val(item.id_pelayanan);
                                $('#urutan_disposisi').val(urutan_disposisi + 1);
                            } else {
                                $('.lembar-disposisi').hide();
                            }

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

                // $('body').unblock();
                $('#inputSection').removeClass('show');
                $('#searchSection2').fadeIn("slow");
            }, 1500);
        }

        $('.select2').select2({
            theme: 'bootstrap-5',
        });

        $(document).ready(function() {

            searchData('{{ $id_pelayanan }}');

            function fetchSyarat(id_layanan) {

                // $('.template-syarat').block({
                //     message: '',
                // });

                setTimeout(function() {
                    $.ajax({
                        url: '/syarat-layanan/list/fetch/' + id_layanan,
                        method: 'get'
                    }).done(function(res) {
                        console.log('res');
                        console.log(res);



                        var htmlData = `<ol>`;
                        $.each(res.data, function(key, item) {
                            htmlData += `<li>${item.name}</li>`
                        });

                        htmlData += `</ol>`;

                        $('#message-syarat').html(htmlData);
                        $('.template-syarat').fadeIn("slow");
                        $('.template-syarat').unblock();
                    });

                }, 300)
            }

            $('#dForm').validate({
                lang: 'id', // or whatever language option you have.
                ignore: [],
                rules: {
                    id_aksi_disposisi: {
                        required: true,
                    },
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

            $("select").on("select2:close", function(e) {
                console.log('masuk validasi select2');
                console.log($(this).val());
                console.log($(this).valid());
            });

            $("#saveDisposisiBtn").on("click", function(event) {
                event.preventDefault();
                console.log($("#dForm").valid());

                if ($("#dForm").valid()) {

                    $('#dForm').block({
                        message: `Loading...`
                    });

                    setTimeout(function() {

                        var formdata = $("#dForm")
                            .serialize(); // here $(this) refere to the form its submitting
                        console.log(formdata);
                        url = $('#dForm').attr('action');

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

                                    var notifData = [
                                        data.recipient, data.disposisi
                                    ];
                                    socket.emit('sendNotifToServer', notifData);
                                    searchData('{{ $id_pelayanan }}');

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

                    }, 1500);
                }
            });

        });
    </script>
@endsection
