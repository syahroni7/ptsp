@extends('layouts.landing.bizland.master')

@section('title', 'Tentang PTSP')

@section('_styles')
<!-- Tambahkan custom style di sini jika dibutuhkan -->
@endsection

@section('content')

<!-- ======= Section Ramah Aksesibilitas ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-title pt-5">
            <h2>Ramah Aksesibilitas</h2>
            <p>
                Anda dapat mengakses Pelayanan Kami melalui aplikasi dengan Fitur Ramah Aksesibilitas.
                Fitur ini dapat mendukung Kelompok Rentan dalam mengakses pelayanan kami.
            </p>
        </div>

        <div class="row content">
            <div class="col-lg-12 text-center">

                <button id="suara-aksesibilitas" class="btn btn-primary btn-sm">
                    <i class="ri-play-fill"></i>
                    Suara Aksesibilitas
                </button>

                <div class="pt-3">
                    <a href="/" class="btn-learn-more" aria-label="Akses Layanan Disabilitas">
                        Akses Layanan Disabilitas
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>
<!-- ======= End Section ======= -->

@endsection

@section('_scripts')
<script>
    $(document).on('click', '#suara-aksesibilitas', function() {
        if (typeof responsiveVoice !== 'undefined') {
            responsiveVoice.speak("Ini adalah Tes Suara Aksesibilitas", "Indonesian Male");
        } else {
            alert("Fitur suara belum tersedia. Harap pastikan koneksi internet.");
        }
    });
</script>
@endsection