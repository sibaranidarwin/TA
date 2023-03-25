@extends('layouts.front')
@section('title')
    <title>Kaldera Toba Nomadic Escape</title>
@endsection
@section('content')
    <!-- privilage woi travel -->

    <div class="main-banner" id="top">
        <div class="Modern-Slider">
            <!-- Item -->
            <div class="item">
                <div class="img-fill">
                    <img src="pelanggan/assets/images/slide-01.jpg" alt="">
                    <div class="text-content">
                        <h3>Selamat Datang di Wisata Kaldera</h3>
                        <h5>Pemesanan Tiket Online Wisata Kaldera Toba Nomadic Escape</h5>
                        <a href="#testimonials" class="main-filled-button">Pesan Tiket</a>
                        <a href="{{ route('register') }}" class="main-stroked-button">Buat Akun</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item">
                <div class="img-fill">
                    <img src="pelanggan/assets/images/slide-02.jpg" alt="">
                    <div class="text-content">
                        <h3>Selamat Datang di Wisata Kaldera</h3>
                        <h5>Pemesanan Tiket Online Wisata Kaldera Toba Nomadic Escape</h5>
                        <a href="#testimonials" class="main-filled-button">Pesan Tiket</a>
                        <a href="{{ route('register') }}" class="main-stroked-button">Buat Akun</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
        </div>
    </div>

    <main>
        {{-- <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-5 col-md-12 stats-detail">
                    <p>Wisata Desa Trinsing merupakan salah satu Lokasi wisata Barito Utara yang
                        terbaru dan terhits
                        lainnya adalah bendungan Trinsing. Bendungan yang berada di desa Trinsing ini dapat dijadikan
                        lokasi untuk berenang dan memainkan aktifitas air lainnya. Anda dapat menyewa sepeda bebek agar
                        dapat mengelilingi bendungan Trinsing.</p>
                </div>
            </section>
        </div> --}}

        <!---- text & detail picture wisata populer ---->
        {{-- <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2> Wisata Desa Trinsing</h2>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="section-popular-content" id="popularContent">
            <div class="container mt-5">
                <div class="col text-left">
                    <h5><strong>Ayo Liburan ke destinasi menarik wisata kaldera!</strong></h5>
                    <p>Ada berbagai pilihan tiket dengan harga yang spesial, lho. jangan sampai kehabisan ya!</p>
                </div>
                <div class="section-popular-travel row justify-content-left mt-3">
                    @foreach ($product as $item)
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="container">
                                <div class="row">
                              &nbsp; &nbsp;
                              <div class="card text-center" style="width: 180rem; height: 25rem;">
                                <img src="{{ Storage::url('public/products/' . $item->gambar) }}" alt="" style="width: 22.5rem; height: 30rem;">
                                <h6 class="mt-3" style="color: #333333; text-align: left;"><b>&nbsp; {{$item->nama_produk}}</b></h6>
                                <p  maxlength="10" style="text-align: left;">&nbsp; "{{Str::limit("Kaldera Toba memiliki", 30) }}"</p>
                                <p class="mt-3" style="color: #F15C59; text-align: left;">&nbsp; IDR {{number_format($item->harga)}}</p>    
                                <form action="{{ route('detail-add', $item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-danger mb-2 px-4">
                                        Pilih
                                    </button>
                                </form>
                              </div>
                             
                                </div>
                              </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <!-- testimoni wisatawan -->
        <section class="section-testimonials-heading mt-5" id="testimonialsHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h3><strong> Testimonials! </strong></h3>
                        <p>
                            Momen memberi mereka
                            <br />
                            pengalaman terbaik
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-testimonials-content" id="testimonialsContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center match-height">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/avatar-1.png" alt="" class="mb-4 rounded-circle" />
                                <h3 class="mb-4">Akbar Satria.d</h3>
                                <p class="testimonials">
                                    “ ini merupakan perjalanan yang sangat menarik sekali
                                    dengan layanan yang nyaman dari woi travel “
                                </p>
                            </div>
                            <hr />
                            <p class="trip-to mt-2">Trip to Wediombo, jogja</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/avatar-2.png" alt="" class="mb-4 rounded-circle" />
                                <h3 class="mb-4">Shayna</h3>
                                <p class="testimonials">
                                    “ The trip was amazing and I saw something beautiful in that
                                    Island that makes me want to learn more “
                                </p>
                            </div>
                            <hr />
                            <p class="trip-to mt-2">Trip to Waduk Sermo</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content mb-auto">
                                <img src="frontend/images/avatar-3.png" alt="" class="mb-4 rounded-circle" />
                                <h3 class="mb-4">Panji</h3>
                                <p class="testimonials">
                                    “ I loved it when the waves was shaking harder — I was
                                    scared too “
                                </p>
                            </div>
                            <hr />
                            <p class="trip-to mt-2">Trip to HEHA, Jogja</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-get-started px-4 mt-4 mx-1">
                            Bagikan Pengalaman Anda!
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
