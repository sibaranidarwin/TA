<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('frontend/libraries/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/styles/main.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <div class="navbar-nav ml-auto mr-auto mr-sm-auto mr-lg-0 mr-md-auto">
                <a class="navbar-brand" href="index.html">
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
                                <li class="breadcrumb-item" aria-current="page">
                                    <a href="{{ route('paket.travel') }}">Paket Travel</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Hasil Pencarian
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Checkout
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- tabel detail pemesan -->
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details mb-3">
                            <h1>Detail Pemesan</h1>

                            <div class="member mt-3">
                                <form class="form-inline">
                                    <label class="sr-only" class="mr-2"
                                        for="inlineFormCustomSelectPref">titel</label>

                                    <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelectPref">
                                        <option selected value="">Tuan</option>
                                        <option value="2">Nyonya</option>
                                        <option value="3">Nona</option>
                                    </select>


                                    <label class="sr-only" for="inputUsername">Name</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" value="{{ $name }}"
                                        id="inputname" placeholder="Nama Lengkap" />

                                    <label class="sr-only" for="whatsapp">No.WhatsApp</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="tel" class="form-control datepicker" value="{{ $no_hp }}"
                                            id="whatsapp" placeholder="No.WhatsApp" />
                                    </div>

                                    <label class="sr-only" for="email">Email</label>
                                    <div class="input-group mb-2 mr-sm-10">
                                        <input type="text" class="form-control datepicker" value="{{ $email }}"
                                            id="email" placeholder="Email" />
                                    </div>
                                </form>

                                <!-- <h3 class="mt-2 mb-0">Note</h3> -->
                                <p class="disclaimer mb-0">
                                    Kami akan mengirimkan detail pemesanan ke WhatsApp & Email.
                                </p> <br>
                                <hr />
                                <tr>
                                    <td>
                                    <td>
                                        <a class="navbar-brand">
                                            <img src="frontend/images/logo.png" alt="">
                                        </a> <br> <br>
                                        <p>Ketentuan Harga</p>
                                        <table class="trip-informations">
                                            <tr>
                                                <th width="50%">Termasuk</th>
                                            </tr>
                                            <tr>
                                                <th width="50%">• Mobil</th>
                                            </tr>
                                            <tr>
                                                <th width="50%">• PPN</th>
                                            </tr>

                                            <tr>
                                                <th width="50%">Tidak Termasuk</th>
                                            </tr>
                                            <tr>
                                                <th width="50%">• Pengemudi *(lepas kunci)</th>
                                            </tr>
                                            <tr>
                                                <th width="50%">• BBM</th>
                                            </tr>
                                            <tr>
                                                <th width="50%">• Parkir</th>
                                            </tr>
                                            <tr>
                                                <th width="50%">• Tol</th>
                                            </tr>
                                            <tr>
                                                <th width="50%">• Overtime</th>
                                            </tr>
                                        </table> <br>
                                        <p class="disclaimer mb-0">
                                            * Biaya overtime dibayarkan langsung ke petugas saat akhir pemakaian.
                                        </p>
                                    </td>
                                    </td>
                                </tr>
                            </div>
                        </div>
                    </div>


                    <!-- checkout information -->
                    @foreach ($carts as $item)
                        <div class="col-lg-4">
                            <form action="{{ route('checkout') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" name="start_date" value="{{ $item->start_date }}">
                                <input type="hidden" name="total_harga" value="{{ $item->harga }}">
                                <div class="card card-details card-right">
                                    <h2>Checkout Information</h2>
                                    <table class="trip-informations">
                                        <tr>
                                            <th width="50%">Mobil</th>
                                            <td width="50%" class="text-right">{{ $item->nama_produk }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Sewa</th>
                                            <td width="50%" class="text-right">{{ $item->tipe_driver }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Tanggal Mulai</th>
                                            <td width="50%" class="text-right">
                                                {{ $item->start_date }}</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Durasi</th>
                                            <td width="50%" class="text-right">{{ $item->jam_rental }} Jam</td>
                                        </tr>
                                        <tr>
                                            <th width="50%">Harga</th>
                                            <td width="50%" class="text-right text-total">
                                                <span class="text-blue">IDR
                                                    {{ number_format($item->harga, 2, ',', '.') }}</span>
                                                {{-- <span class="text-orange"></span> --}}
                                            </td>
                                        </tr>
                                    </table>
                                    <hr />
                                    <hr />
                                    <h2>Payment Instructions</h2>
                                    <p class="payment-instructions">
                                        Please complete your payment before to continue the wonderful
                                        trip
                                    </p>
                                </div>
                                <div class="join-container">
                                    <button type="submit" formtarget="_blank"
                                        class="btn btn-block btn-join-now mt-3 py-2">
                                        Lanjutkan Ke Pembayaran</button>
                                </div>
                            </form>
                            <div class="text-center mt-3">
                                <button type="submit" class="deleteRecord btn btn-danger btn-block"
                                    data-id="{{ $item->id }}">Cancel Booking
                                </button>
                            </div>
                        </div>
                    @endforeach
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
                                        <img src="frontend/images/sm-icon1.png" alt="fb">
                                    </a>
                                    <a class="navbar-icon" href="#">
                                        <img src="frontend/images/sm-icon2.png" alt="ig">
                                    </a>
                                    <a class="navbar-icon" href="#">
                                        <img src="frontend/images/sm-icon3.png" alt="tiktok">
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
                                        <img src="frontend/images/pay-icon.png" alt="payment">
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
    <script src="{{ asset('frontend/libraries/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
        $(".deleteRecord").click(function() {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "cart/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function() {
                    // console.log("it Works");
                    window.location.reload();
                }
            });

        });
    </script>

</body>

</html>
