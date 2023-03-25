@extends('layouts.front')
@section('title')
    <title>Wisata</title>
@endsection
@section('content')
<br>
<br>
<br>
<br><br>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pl-lg-0">
                    <div class="card card-details">
                        <div class="card-title">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Pilihan Paket Wisata
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="card-body">
                            {{-- <h1>Pilih Paket Wisata Kaldera Toba Nomadic Escape!</h1> --}}
                            <div class="col text-left">
                                <h5><strong>Ayo Liburan ke destinasi menarik wisata kaldera!</strong></h5>
                                <p>Ada berbagai pilihan tiket dengan harga yang spesial, lho. jangan sampai kehabisan ya!</p>
                            </div>
                            <div class="attendee mt-3">
                                <table class="table table-responsive-sm">
                                    <tbody>
                                        @forelse ($wisata as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ Storage::url('public/products/' . $item->gambar) }}"
                                                        height="100">
                                                </td>
                                                <td class="align-middle">
                                                    <h2>{{ $item->nama_produk }}</h2>
                                                    <P> 1 Orang </P>
                                                </td>
                                                <td class="align-middle">
                                                    <h2>IDR {{ number_format($item->harga, 2, ',', '.') }}
                                                    </h2>
                                                    <form action="{{ route('detail-add', $item->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                        <button type="submit" class="btn btn-danger mb-2 px-4">
                                                            Pilih
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center">Tidak Ada Data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
