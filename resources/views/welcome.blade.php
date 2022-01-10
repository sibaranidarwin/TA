@extends('layouts.front')
@section('title')
    <title>Welcome</title>
@endsection
@section('content')
    <!-- privilage woi travel -->
    <main>
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-5 col-md-3 stats-detail">
                    <p>• Antar jemput sampai lokasi</p>
                    <p>• Bebas biaya bagasi</p>
                </div>
                <div class="col-md-3 col-md-4 stats-detail">
                    <p>• Layanan transportasi 24 jam</p>
                    <p>• Tarif pelajar</p>
                </div>
                <div class="col-3 col-md-3 stats-detail">
                    <p>• Driver Berpengalaman</p>
                    <p>• Driver Muda</p>
                </div>
            </section>
        </div>

        <!---- text & detail picture wisata populer ---->
        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Popular</h2>
                        <p>
                            Jogja Istimewa, Something that you never try
                            <br />
                            articles before in this world
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-popular-content" id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach ($article as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column"
                                style="background-image: url('{{ Storage::url('public/blog/' . $item->gambar) }}');">
                                <div class="travel-country">INDONESIA</div>
                                <div class="travel-location">{{ $item->judul }}</div>
                                <div class="travel-button mt-auto">
                                    <a href="{{ route('blog.detail', $item->slug) }}" class="btn btn-travel-details px-4">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex flex-column"
                            style="background-image: url('frontend/images/travel-2.jpg');">
                            <div class="travel-country">INDONESIA</div>
                            <div class="travel-location">WEDIOMBO</div>
                            <div class="travel-button mt-auto">
                                <a href="details.html" class="btn btn-travel-details px-4">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex flex-column"
                            style="background-image: url('frontend/images/travel-3.jpg');">
                            <div class="travel-country">INDONESIA</div>
                            <div class="travel-location">HUTAN PINUS</div>
                            <div class="travel-button mt-auto">
                                <a href="details.html" class="btn btn-travel-details px-4">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-travel text-center d-flex flex-column"
                            style="background-image: url('frontend/images/travel-4.jpg');">
                            <div class="travel-country">INDONESIA</div>
                            <div class="travel-location">HEHA</div>
                            <div class="travel-button mt-auto">
                                <a href="details.html" class="btn btn-travel-details px-4">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

        <!-- tentang kami -->
        <section class="section-networks" id="networks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Tentang Kami</h2>
                        <p>
                            woi travel jogja group
                        </p>
                    </div>
                    <div class="col-md-8">
                        <p>Woi travel jogja group merupakan salah satu perusahaan biro perjalanan yang berlokasi di
                            Bantul, Daerah <br>
                            Istimewa Yogyakarta. Perusahaan ini baru dirintis sekitar tahun 2020, dan berupaya
                            menyelaraskan visi nya <br>
                            dengan target Pemerintah Daerah untuk menjadikan Jogja menjadi destinasi kota pariwisata.
                        </p>
                        <!-- <img src="frontend/images/partner.png" class="img-patner" /> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- testimoni wisatawan -->
        <section class="section-testimonials-heading" id="testimonialsHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They Are Loving Us</h2>
                        <p>
                            Moments were giving them
                            <br />
                            the best experience
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
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
