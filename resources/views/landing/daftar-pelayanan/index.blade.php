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


                                                        {{-- <a href="/lihat-syarat/{{ $layanan->id_layanan }}" class="badge bg-secondary">Lihat Syarat</a> --}}

                                                        <a id="lihat-syarat" data-id_layanan="{{ $layanan->id_layanan }}" data-nama_layanan="{{ $layanan->name }}" class="badge bg-secondary" type="button" data-bs-toggle="modal" data-bs-target="#fModal" data-title="Lihat Syarat Layanan">Lihat Syarat</a>
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
