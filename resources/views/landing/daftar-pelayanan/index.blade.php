@extends('layouts.landing.anyar.master')
@section('title', 'Daftar Pelayanan')



@section('_styles')
@endsection


@section('content')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services mt-5">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Daftar Layanan Tersedia</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">

                        @foreach ($units as $key => $unit)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $unit->id_unit_pengolah }}" aria-expanded="false" aria-controls="collapse-{{ $unit->id_unit_pengolah }}">
                                        {{ $unit->name }}
                                    </button>
                                </h2>
                                <div id="collapse-{{ $unit->id_unit_pengolah }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">

                                        <ul class="list-group">
                                            @forelse ($unit->layanan as $layanan)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ $layanan->name }}
                                                    <div>


                                                        <a href="/lihat-syarat/{{ $layanan->id_layanan }}" class="badge bg-secondary">Lihat Syarat</a>
                                                        <a href="{{ route('landing.buat-pelayanan', $layanan->idx_layanan) }}" class="badge bg-primary">Buat Permohonan</a>
                                                    </div>
                                                </li>

                                            @empty
                                                .: Belum Ada Layanan Terdaftar :.
                                            @endforelse
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        @endforeach




                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Services Section -->

@endsection


@section('_scripts')



@endsection
