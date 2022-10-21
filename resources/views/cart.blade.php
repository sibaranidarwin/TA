@extends('layouts.front')
@section('title')
    <title>Keranjang</title>
@endsection
@section('content')
    <main>
        <section class="section-details-content">
            <div class="container">
                <!-- tabel detail pemesan -->
                <div class="row">
                    <div class="col-lg-6 pl-lg-0">
                        <div class="card card-details mb-3">
                            <div class="card-title">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="">Paket Travel</a>
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
                            <h1>Detail Pemesan</h1>

                            <div class="member mt-3">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <label class="sr-only" class="mr-2" for="inlineFormCustomSelectPref">Title</label>

                                        <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected value="">Tuan</option>
                                            <option value="2">Nyonya</option>
                                            <option value="3">Nona</option>
                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <label class="sr-only" for="inputUsername">Name</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" value="{{ $name }}"
                                            id="inputname" placeholder="Nama Lengkap" />
                                    </div>

                                    <div class="form-group">
                                        <label class="sr-only" for="whatsapp">No.WhatsApp</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input type="tel" value="{{ $no_hp }}"
                                                class="form-control datepicker" value="" id="whatsapp"
                                                placeholder="No.WhatsApp" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="sr-only" for="email">Email</label>
                                        <div class="input-group mb-2 mr-sm-10">
                                            <input type="text" value="{{ $email }}"
                                                class="form-control datepicker" value="" id="email"
                                                placeholder="Email" />
                                        </div>
                                    </div>
                                </form>

                                <!-- <h3 class="mt-2 mb-0">Note</h3> -->
                                <p class="disclaimer mb-0">
                                    Kami akan mengirimkan detail pemesanan ke WhatsApp & Email.
                                </p>
                                <hr />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form action="{{ route('checkout') }}" enctype="multipart/form-data" method="post">
                            @csrf

                            <input type="hidden" name="total_harga" value="{{ $carts->harga }}">
                            <div class="card card-details card-right">
                                <h2>Checkout Information</h2>
                                <table class="trip-informations">
                                    <tr>
                                        <th width="50%">Wisata</th>
                                        <td width="50%" class="text-right text-blue"><span>
                                                {{ $carts->nama_produk }}</span></td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Tanggal</th>
                                        <td width="50%" class="text-right">
                                            <input type="date" class="form-control" name="tgl_wisata"
                                                value="{{ date('Y-m-d') }}" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Harga</th>
                                        <td width="50%" class="text-right text-total">
                                            <span class="text-blue">IDR {{ $carts->harga }}
                                            </span>
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
                                <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">
                                    Lanjutkan Ke Pembayaran</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <button type="submit" class="deleteRecord btn btn-danger btn-block" data-id="">Cancel
                                Booking
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>
@endsection
@push('after-script')
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
                    window.location.assign("{{ route('get-wisata') }}");
                }
            });

        });
    </script>
@endpush
