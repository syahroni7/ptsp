@extends('layouts.landing.bizland.master')
@section('title', 'Daftar Pelayanan')


@section('_styles')
@endsection


@section('content')
<!-- ======= Services Section ======= -->
<section id="services" class="services mt-5">
    <div class="container" data-aos="fade-up">

        <div class="section-title mb-0">
            <h2>Daftar Layanan Tersedia</h2>
            <p class="mb-0" style="font-size: 1rem">Berisi informasi terperinci mengenai jenis layanan yang disediakan, persyaratan administrasi, serta tata cara permohonan sesuai peraturan yang berlaku. Menu ini disusun untuk memastikan kemudahan akses layanan yang tertib, transparan, dan akuntabel.</p>
        </div>

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

        <div class="accordion" id="accordionExample">
            @foreach ($units as $key => $unit)
            <div class="accordion-item mb-3">
                <h2 class="accordion-header" id="heading-{{ $unit->id_unit_pengolah }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $unit->id_unit_pengolah }}" aria-expanded="false" aria-controls="collapse-{{ $unit->id_unit_pengolah }}">
                        <i class="bi bi-building me-2"></i> {{ $unit->name }}
                    </button>
                </h2>
                <div id="collapse-{{ $unit->id_unit_pengolah }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $unit->id_unit_pengolah }}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        @forelse ($unit->layanan as $layanan)
                        <div class="icon-box py-2 px-3 mb-2 border rounded shadow-sm" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex justify-content-between align-items-start ">
                                <p class="title mb-0 fw-semibold text-dark">{{ $layanan->name }}</p>
                                <div class="text-end ms-3">
                                    <a id="lihat-syarat"
                                        data-id_layanan="{{ $layanan->id_layanan }}"
                                        data-nama_layanan="{{ $layanan->name }}"
                                        class="badge bg-secondary mb-1"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#fModal"
                                        data-title="Lihat Syarat Layanan">
                                        Lihat Syarat
                                    </a>
                                    <a href="{{ route('landing.buat-pelayanan', $layanan->idx_layanan) }}"
                                        class="badge bg-primary">
                                        Buat Permohonan
                                    </a>
                                </div>
                            </div>
                        </div>


                        @empty
                        <p class="text-muted">.: Belum Ada Layanan Terdaftar :.</p>
                        @endforelse

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    </div>
</section><!-- End Services Section -->

<!-- Tambah Group -->
<div class="modal fade" id="fModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <form id="fForm" method="post" action="{{ route('arsip-pelayanan.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Syarat Pelayanan Publik </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modalBox">

                    {{ csrf_field() }}

                    <input type="hidden" name="id_pelayanan" id="search_id_pelayanan">
                    <div class="row card-body m-2 p-2">
                        <div class="col-12">
                            Syarat dari Layanan <b><span id="judul-modal"></span></b>
                            <div class="syarat-layanan-box">

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


@section('_scripts')

<script>
    function fetchSyarat(id_layanan) {
        $.ajax({
            url: "/syarat-layanan/list/fetch/" + id_layanan,
            type: 'GET',
            success: function(res) {
                var box = $('.syarat-layanan-box');
                box.empty();
                console.log(res);
                data = res.data;
                var html = '';
                if (data.length > 0) {
                    html = `<ol>`;
                    $.each(data, function(index, item) {
                        html += `<li>
                                    ${item.name}
                                </li>`;
                    });
                    html += `<ol>`;
                } else {
                    html += '<div class="text-center mt-3">.:: Belum ada Data Syarat ::. </div>'
                }

                box.append(html);

            }
        });
    }
    $(document).on("click", "#lihat-syarat", function() {
        var idLayanan = $(this).data('id_layanan');
        var namaLayanan = $(this).data('nama_layanan');

        $('#judul-modal').html(namaLayanan);
        console.log('namaLayanan');
        console.log(namaLayanan);

        fetchSyarat(idLayanan);
    });
</script>


@endsection