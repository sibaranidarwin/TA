@extends('layouts.front')
@section('title')
    <title>Daftar</title>
@endsection
@section('content')
    {{-- <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <div class="navbar-nav ml-auto mr-auto mr-sm-auto mr-lg-0 mr-md-auto">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="" />
                </a>
            </div>
            <ul class="navbar-nav mr-auto sd-none d-lg-block">
                <li>
                    <span class="text-muted">| &nbsp; Beyond the explorer of the world</span>
                </li>
            </ul>
        </nav>
    </div> --}}
    <section class="section-details-content">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg pl-lg-0">
                    <div class="card card-details">
                        <div class="card-title">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Pilihan Paket
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-body">
                            <p>
                                Hey, kamu
                            </p>
                            <h1>Cari sewa mobil murah di sini</h1>
                            <div class="member mt-3">
                                <h2>Order</h2>
                                <form class="form-inline" method="GET" action="">
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

                                    <label class="sr-only" class="mr-2" for="transmisi">Preference</label>
                                    <select name="tipe_rental" class="custom-select mb-2 mr-sm-2" id="transmisi">
                                        <option value="lepas">Manual</option>
                                        <option selected value="matic">Matic</option>
                                    </select>

                                    <label class="sr-only" class="mr-2" for="transmisi">Preference</label>
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
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
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
@endpush
