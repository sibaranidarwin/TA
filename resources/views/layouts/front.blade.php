<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @yield('title')
    <link rel="stylesheet" href="{{ asset('frontend/libraries/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/styles/main.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/libraries/xzoom/dist/xzoom.css') }}" />
</head>

<body>

    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
                {{-- <img src="{{ asset('frontend/images/logo.png') }}" alt=""> --}}
                <h6>Website Pembelian</h6>
                <h6>Tiket Wisata Desa Trinsing</h6>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!------- Menu navbar ------->
            <div class="collapse navbar-collapse" id="navb">
                <div class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a class="nav-link" href="{{ route('paket.travel') }}">Tiket Wisata</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                </div>
                </ul>
                <!-- Mobile button -->

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
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        </nav>
    </div>

    <!-- text center header -->
    <header class="text-center">
        <h1> Wisata Desa Trinsing</h1>
    </header>

    @yield('content')

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
</body>

</html>
