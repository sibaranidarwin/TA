<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Details {{ strtolower($article[0]->judul) }}</title>
    <link rel="stylesheet" href="{{ asset('frontend/libraries/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/styles/main.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/libraries/xzoom/dist/xzoom.css') }}" />
</head>

<body>
    <!-- Semantic elements -->
    <!-- https://www.w3schools.com/html/html5_semantic_elements.asp -->

    <!-- Bootstrap navbar example -->
    <!-- https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="" />
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a class="nav-link" href="{{ route('paket.travel') }}">Paket Travel</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                </ul>

                @guest
                    @if (Route::has('login'))
                        <form action="{{ route('login') }}" class="form-inline d-sm-block d-md-none">
                            <button type="submit" class="btn btn-login my-2 my-sm-0">
                                Masuk
                            </button>
                        </form>

                        <form action="{{ route('login') }}" class="form-inline my-2 my-lg-0 d-none d-md-block">
                            <button type="submit" class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                                Masuk
                            </button>
                        </form>
                    @endif
                @else
                    <div class="dropdown show">
                        <img height="30px" src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @if (Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            @else
                                <a class="dropdown-item" href="{{ route('dashboard.pelanggan') }}">Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>
    </div>

    <!-- page masuk -->
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
                            <h1>{{ $article[0]->judul }}</h1>
                            <p>
                                Jogja, Republic of Indonesia Raya
                            </p>
                            <div class="gallery">
                                <div class="xzoom-container">
                                    @foreach ($gambar as $item)
                                        @if ($article[0]->id == $item->artikel_id)
                                            @if ($item->is_default == 1)
                                                <img class="xzoom" id="xzoom-default"
                                                    src="{{ Storage::url('public/wisata/' . $item->file_gambar) }}"
                                                    xoriginal="frontend/images/details-11.jpg" />
                                            @endif
                                            @if ($item->is_default == 1)
                                                <div class="xzoom-thumbs">
                                                    <a
                                                        href="{{ Storage::url('public/wisata/' . $item->file_gambar) }}">
                                                        <img class="xzoom-gallery" width="128"
                                                            src="{{ Storage::url('public/wisata/' . $item->file_gambar) }}"
                                                            xpreview="{{ Storage::url('public/wisata/' . $item->file_gambar) }}" />
                                                    </a>
                                                @else
                                                    <a
                                                        href="{{ Storage::url('public/wisata/' . $item->file_gambar) }}">
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
                                {{ $article[0]->deskripsi }}
                            </p>


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
                    2022 Copyright akbar_satria.d • All rights reserved • Made in Jogja
                </div>
            </div>
        </div>
    </footer>
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
        });
    </script>
</body>

</html>
