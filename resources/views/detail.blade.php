@extends('layouts.front')
@section('title')
    <title>{{ $article->judul }}</title>
@endsection
@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">
                                    Home
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $article->judul }}</h1>
                            <p>
                                Jogja, Republic of Indonesia Raya
                            </p>
                            <div class="gallery">
                                <div class="xzoom-container">
                                    @foreach ($gallery as $item)
                                        @if ($article->id == $item->article_id)
                                            @if ($item->is_default == 1)
                                                <img class="xzoom" id="xzoom-default"
                                                    src="{{ Storage::url('public/wisata/' . $item->file_gambar) }}"
                                                    xoriginal="frontend/images/details-11.jpg" />
                                            @endif
                                            @if ($item->is_default == 1)
                                                <div class="xzoom-thumbs">
                                                    <a href="{{ Storage::url('public/wisata/' . $item->file_gambar) }}">
                                                        <img class="xzoom-gallery" width="128"
                                                            src="{{ Storage::url('public/wisata/' . $item->file_gambar) }}"
                                                            xpreview="{{ Storage::url('public/wisata/' . $item->file_gambar) }}" />
                                                    </a>
                                                @else
                                                    <a href="{{ Storage::url('public/wisata/' . $item->file_gambar) }}">
                                                        <img class="xzoom-gallery" width="128"
                                                            src="{{ Storage::url('public/wisata/' . $item->file_gambar) }}"
                                                            xpreview="{{ Storage::url('public/wisata/' . $item->file_gambar) }}" />
                                                    </a>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>

                            </div>


                            <h2>Tentang Wisata</h2>
                            <p>
                                {{ $article->deskripsi }}
                            </p>


                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
@endsection
