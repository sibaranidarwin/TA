    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('frontend/images/logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!------- Menu navbar ------->
            <div class="collapse navbar-collapse" id="navb">
                <div class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a class="nav-link {{ set_active('home') }}" href="/">Home</a>
                    </li>
                    <li class="nav-item mx-md-2 ">
                        <a class="nav-link {{ set_active('wisata') }}" href="{{ route('wisata') }}">Tiket
                            Wisata</a>
                    </li>
                    <li class="nav-item mx-md-2 ">
                        <a class="nav-link {{ set_active('gallery-wisata') }}"
                            href="{{ route('gallery-wisata') }}">Gallery</a>
                    </li>
                </div>

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
            </div>
        </nav>
    </div>
