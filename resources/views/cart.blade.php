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
                                <hr />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{ route('checkout') }}" enctype="multipart/form-data" method="post">
                            @csrf

                            <input type="hidden" name="total_harga" value="{{ $carts->harga }}">
                            <div class="card card-details card-right">    
                            <h2><strong>Detail Pemesananan</strong></h2>
                                <table class="trip-informations mt-3">
                                    <tr>
                                        <td width=""><span>
                                                {{ $carts->nama_produk }}</span></td>
                                    </tr>
                                    <tr>
                                        <td width=""><span>Tiket Masuk 1 Hari</span></td>
                                    </tr>
                                    <tr>
                                        <td width="">Tanggal Dipilih</td>
                                        <td width="" class="text-right">
                                            <input type="" class="form-control" name="tgl_wisata"
                                                value="{{ date('Y-m-d') }}" required>
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td>Jumlah Tiket</td>
                                        <td>
                                           <div id="input_div">
                                                <input type="text" size="25" value="1" id="count">
                                                <input type="button" value="-" id="moins" onclick="minus()">
                                                <input type="button" value="+" id="plus" onclick="plus()">
                                            </div>
                                        </td>
                                    </tr> --}}
                                    <tr class="mt-3">
                                        <td width="">Total Harga</td>
                                        <td width="" class="text-right text-total">
                                            <span class="">IDR {{ $carts->harga }}
                                            </span>
                                        </td>
                                    </tr>
                                </table>
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
