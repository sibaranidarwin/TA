<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Form Register</title>
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
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0 pl-3 pl-lg-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Paket Travel
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details mb-3">
                            <p>
                                Hey, kamu
                            </p>
                            <h1>Cari sewa mobil murah di sini</h1>
                            <div class="member mt-3">
                                <h2>Order</h2>
                                <form class="form-inline" method="GET" action="{{ route('cari.mobil') }}">
                                    <label class="sr-only" for="haritanggal">
                                        Hari Tanggal</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="date" name="tanggal" class="form-control datepicker" id="txtDate"
                                            required />
                                    </div>

                                    <label class="sr-only" class="mr-2" for="durasi">Preference</label>
                                    <select name="jam_rental" class="custom-select mb-2 mr-sm-2" id="durasi">
                                        <option selected value="12">12 Jam</option>
                                        <option value="24">24 Jam</option>
                                    </select>

                                    <label class="sr-only" class="mr-2" for="unit">Preference</label>
                                    <select name="id_kategori" class="custom-select mb-2 mr-sm-2" id="unit">
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>

                                    <label class="sr-only" class="mr-2"
                                        for="transmisi">Preference</label>
                                    <select name="tipe_rental" class="custom-select mb-2 mr-sm-2" id="transmisi">
                                        <option value="lepas">Manual</option>
                                        <option selected value="matic">Matic</option>
                                    </select>

                                    <label class="sr-only" class="mr-2"
                                        for="transmisi">Preference</label>
                                    <select name="tipe_driver" class="custom-select mb-2 mr-sm-2" id="transmisi">
                                        <option selected value="lepas">Lepas Kunci</option>
                                        <option value="driver">Dengan Driver</option>
                                    </select>
                                    <br /><br /><br />

                                    <button type="submit" class="btn btn-add-now mb-2 px-4">
                                        Cari Mobil
                                    </button>
                                </form>
                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    Durasi satu hari sewa adalah 12 Jam.
                                </p>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

            // $('.datepicker').datepicker({
            //     uiLibrary: 'bootstrap4',
            //     icons: {
            //         rightIcon: '<img src="URL:to('
            //         frontend / images / ic_doe.png ')" alt="" />'
            //     }
            // });
        });
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            // alert(maxDate);
            $('#txtDate').attr('min', maxDate);
        });
    </script>
</body>

</html>
