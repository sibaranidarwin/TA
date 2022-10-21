@extends('layouts.front')
@section('title')
    <title>Kegiatan Wisata</title>
@endsection
@section('content')
    <section class="section-popular-content" id="popularContent">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12 pl-lg-0">
                    <div class="card" style="border: 0 !important">
                        <div class="card-title">
                            <h3 class="text-border">Kegiatan Wisata</h3>
                            <hr>
                            <div class="card-body">
                                <div class="section-popular-travel row justify-content-center">
                                    @foreach ($article as $item)
                                        <div class="col-sm-6 col-md-4 col-lg-3">
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
