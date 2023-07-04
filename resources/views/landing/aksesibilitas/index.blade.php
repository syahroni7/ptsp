@extends('layouts.landing.anyar.master')
@section('title', 'Tentang PTSP')



@section('_styles')
@endsection


@section('content')
<!-- ======= About Us Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-title pt-5">
            <h2>Ramah Aksesibilitas</h2>
            <p>Anda dapat mengakses Pelayanan Kami melalui aplikasi dengan Fitur Ramah Aksesibilitas. Fitur ini dapat mendukung Kelompok Rentan dalam mengakses pelayanan kami</p>

        </div>

        <div class="row content">
            <div class="col-lg-12">

                <center>
                    <button id="suara-aksesibilitas" class="btn button btn-primary btn-sm">
                        {{-- <i class="fas fa fa-play"></i>  --}}
                        {{-- <i class="fa-solid fa-play"></i> --}}
                        {{-- <i class="fa fa-play" aria-hidden="true"></i> --}}
                        <i class="ri-play-fill"></i>
                        Suara Aksesibilitas
                    </button>
                </center>


                <center class="pt-3">
                    <a href="/" class="btn-learn-more" aria-hidden="true" aria-label="Akses Layanan Disabilitas">Akses Layanan Disabilitas</a>
                </center>

            </div>
        </div>

    </div>
</section><!-- End About Us Section -->

@endsection


@section('_scripts')

<script>
    $(document).on('click', '#suara-aksesibilitas', function(e) {
        responsiveVoice.speak("Ini adalah Tes Suara Aksesibilitas", "Indonesian Female");
    });

</script>

@endsection
