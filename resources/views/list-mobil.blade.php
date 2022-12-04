<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Cari Mobil</title>
    <link rel="stylesheet" href="{{ asset('frontend/libraries/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/styles/main.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/libraries/xzoom/dist/xzoom.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/libraries/gijgo/css/gijgo.min.css') }}" />
</head>

<body>
    <!-- Semantic elements -->
    <!-- https://www.w3schools.com/html/html5_semantic_elements.asp -->

    <!-- Bootstrap navbar example -->
    <!-- https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <div class="navbar-nav ml-auto mr-auto mr-sm-auto mr-lg-0 mr-md-auto">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="" />
                </a>
            </div>
            <ul class="navbar-nav mr-auto d-none d-lg-block">
                <li>
                    <span class="text-muted">| &nbsp; Beyond the explorer of the world</span>
                </li>
            </ul>
        </nav>
    </div>

    <!-- posisi page sekarang -->
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Hasil Pencarian
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- menampilan mobil -->
                <div class="row">
                    <div class="col-lg-12 pl-lg-0">
                        <div class="card card-details">
                            <h1>Pilih mobil untuk anda</h1>
                            <p>
                                {{ $tanggal }} - {{ $jam }} Jam -
                                {{ $tipe_rental == 'matic' ? 'Matic' : 'Manual' }} -
                                {{ $tipe_driver == 'lepas' ? 'Lepas Kunci' : 'Dengan Driver' }}
                            </p>
                            <div class="attendee">
                                <table class="table table-responsive-sm">
                                    <tbody>
                                        @forelse ($mobil as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ Storage::url('public/products/' . $item->gambar) }}"
                                                        height="100">
                                                </td>
                                                <td class="align-middle">
                                                    <h2>{{ $item->nama_produk }}</h2>
                                                    <P> {{ $item->total_kursi }} seat </P>
                                                </td>
                                                <td class="align-middle">
                                                    <h2>IDR {{ number_format($item->harga, 2, ',', '.') }}
                                                    </h2>
                                                    <form action="{{ route('detail-add', $item->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="tanggal"
                                                            value="{{ $tanggal }}">
                                                        @if (!$item->stock == 1)
                                                            <span>Sudah dibooking</span>
                                                        @else
                                                            <button type="submit" class="btn btn-add-now mb-2 px-4">
                                                                Pilih
                                                            </button>
                                                        @endif
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
        </section>
    </main>


    <!----- footer ----->
    <footer class="section-footer mt-5 mb-4 border-top">
        <div class="container pt-5 pb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-3">
                                    <h5>Social Media</h5> <br>
                                    <a class="navbar-icon" href="#">
                                        <img src="{{ asset('frontend/images/sm-icon1.png') }}" alt="fb">
                                    </a>
                                    <a class="navbar-icon" href="#">
                                        <img src="{{ asset('frontend/images/sm-icon2.png') }}" alt="ig">
                                    </a>
                                    <a class="navbar-icon" href="#">
                                        <img src="{{ asset('frontend/images/sm-icon3.png') }}" alt="tiktok">
                                    </a>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <h5>Get Connected</h5> <br>
                                    <ul class="list-unstyled">
                                        <li>Daerah Istimewa Yogyakarta</li>
                                        <li>Indonesia</li>
                                        <li>WA. 0823 - 2465 - 2546</li>
                                        <li>woitravel.jogja@gmail.com</li>
                                    </ul>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <h5>Payment Method</h5> <br>
                                    <a class="navbar-icon" href="#">
                                        <img src="{{ asset('frontend/images/pay-icon.png') }}" alt="payment">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row border-top justify-content-center align-items-center pt-4">
                <div class="col-auto text-gray-500 font-weight-light">
                    2021 Copyright akbar_satria.d • All rights reserved • Made in Jogja
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('frontend/libraries/retina/retina.js') }}"></script>
    <script src="{{ asset('frontend/libraries/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/libraries/xzoom/dist/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });

            $('.datepicker').datepicker({
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<img src="URL:to('
                    frontend / images / ic_doe.png ')" alt="" />'
                }
            });
        });
    </script>
</body>

</html>
