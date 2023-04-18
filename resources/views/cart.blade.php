@extends('layouts.front')
@section('title')
    <title>Keranjang</title>
@endsection
@section('content')
<br><br><br>
<br><br>
    <main>
        <section class="section-details-content">
            <div class="container">
                <!-- tabel detail pemesan -->
                <div class="row">
                    <div class="col-lg-6 pl-lg-0">
                        <div class="card card-details mb-3">
                            {{-- <div class="card-title">
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
                            </div> --}}
                            <h2><strong>Detail Pemesan</strong></h2>

                            <div class="member mt-3">
                                <form class="form-inline col-md-12">
                                    <div class="form-group col-md-3">
                                        <label class="sr-only" class="mr-2" for="inlineFormCustomSelectPref">Title</label>

                                        <select class="custom-select mb-4 mr-sm-2" id="inlineFormCustomSelectPref">
                                            <option selected value="">Tuan</option>
                                            <option value="2">Nyonya</option>
                                            <option value="3">Nona</option>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                        <label class="sr-only" for="inputUsername">Name</label>
                                        <input type="text" class="form-control mb-4 mr-sm-2 col-md-12" value="{{ $name }}"
                                            id="inputname" placeholder="Nama Lengkap" />
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label class="sr-only" for="email">Email</label>
                                        <div class="input-group mb-4 mr-sm-10">
                                            <input type="text" value="{{ $email }}"
                                                class="form-control datepicker" value="" id="email"
                                                placeholder="Email" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label class="sr-only" for="whatsapp">No.WhatsApp</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input type="tel" value="{{ $no_hp }}"
                                                class="form-control datepicker" value="" id="whatsapp"
                                                placeholder="No.WhatsApp" />
                                        </div>
                                    </div>

                                </form>

                                <!-- <h3 class="mt-2 mb-0">Note</h3> -->
                                <p class="disclaimer mb-0">
                                    Kami akan mengirimkan detail pemesanan ke WhatsApp & Email.
                                </p>
                                {{-- <hr /> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        {{-- {{ dd($carts) }} --}}
                        <form action="{{ route('checkout') }}" enctype="multipart/form-data" method="post">
                            @csrf

                            <input type="hidden" name="total_harga" value="{{ $carts->total_harga }}">
                            <div class="card card-details card-right">    
                            <h2><strong>Detail Pemesananan</strong></h2>
                            <br>
                               <p>{{ $carts->nama_produk }}</p>
                               <p hidden><input type="hidden" class="form-control" name="nama_tiket"
                                value="{{ $carts->nama_produk }}" required> </p>
                            <br>
                               <p>Tiket Masuk 1 Hari</p>
                            <br>
                            <p>Tanggal Dipilih : {{ Carbon\Carbon::parse($carts->tgl_wisata)->format('d F Y') }}</p>
                            <p hidden><input type="hidden" class="form-control" name="tgl_wisata"
                                value="{{ $carts->tgl_wisata }}" required> </p>
                            <br>
                            <p>Jumlah Tiket Dewasa : {{ ($carts->dewasa) }} Orang </p>
                            <p hidden><input type="hidden" class="form-control" name="dewasa"
                                value="{{ $carts->dewasa }}" required> </p>
                            <br>
                            <p>Jumlah Tiket Anak-anak : {{ ($carts->anak) }} Orang </p>
                            <p hidden><input type="hidden" class="form-control" name="anak"
                                value="{{ $carts->anak }}" required> </p>
                            <br>
                            <p><strong>Total Harga: Rp {{ number_format($carts->total_harga,  0, ',', '.') }}</strong></p>
                                <hr />
                                <h2>Instruksi Pembayaran</h2>
                                <p class="payment-instructions">
                                    Harap selesaikan pembayaran Anda sebelum melanjutkan perjalanan yang indah
                                </p>
                            </div>
                            <div class="join-container">
                                <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">
                                    Lanjutkan Ke Pembayaran</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <button type="submit" class="deleteRecord btn btn-danger btn-block"
                                data-id="{{ $carts->id }}">Cancel
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
         var count = 1;
        var countEl = document.getElementById("count");
        function plus(){
            count++;
            countEl.value = count;
        }
        function minus(){
        if (count > 1) {
            count--;
            countEl.value = count;
        }  
        }
        
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
                    window.location.assign("{{ url('wisata') }}");
                }
            });

        });
    </script>
@endpush
