@extends('layouts.front')
@section('title')
    <title>Kegiatan Wisata</title>
@endsection
@section('content')
<br>
<br>
<br>
<br><br>
    <section class="section-popular-content" id="popularContent">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pl-lg-0">
                    <div class="card" style="border: 0 !important">
                        <div class="card-title">
                            {{-- <h3 class="text-border">Galery Wisata Kaldera Toba Nomadic Escape</h3> --}}
                            <div class="col text-left">
                                <h5><strong>Galery Wisata Kaldera Toba Nomadic Escape!</strong></h5>
                                <p>Ada berbagai galery wisata kaldera toba nomadic escape, lho. jangan sampai ketinggalan ya!</p>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="section-popular-travel row">
                                    @foreach ($article as $item)
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="card-travel text-center shadow d-flex flex-column"
                                                style="background-image: url('{{ Storage::url('public/blog/' . $item->gambar) }}');">
                                                <div class="travel-country">INDONESIA</div>
                                                <div class="travel-location">{{ $item->judul }}</div>
                                                <div class="travel-button mt-auto">
                                                    <a href="{{ route('blog.detail', $item->slug) }}"
                                                        class="btn btn-travel-details px-4">
                                                        View Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
