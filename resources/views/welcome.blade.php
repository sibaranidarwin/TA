@extends('layouts.front')
@section('title')
    <title>Kaldera Toba Nomadic Escape</title>
@endsection
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<style>
    form {
  width: 100%;
}

.hide {
  display: none;
}

.show {
  display: block;
  align-items: center;
}
</style>
    <!-- privilage woi travel -->
    <div class="main-banner" id="top">
        <div class="Modern-Slider">
            <!-- Item -->
            <div class="item">
                <div class="img-fill">
                    <img src="pelanggan/assets/images/slide-02.jpg" alt="">
                    <div class="text-content">
                        <h3>Selamat Datang di Wisata Kaldera</h3>
                        <h5>Pemesanan Tiket Online Wisata Kaldera Toba Nomadic Escape</h5>
                        
                            <a href="#testimonials" class="main-filled-button">Pesan Tiket</a>
                            <a href="{{ route('register') }}" class="main-stroked-button">Buat Akun</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
            <!-- Item -->
            <div class="item">
                <div class="img-fill">
                    <img src="pelanggan/assets/images/slide-02.jpg" alt="">
                    <div class="text-content">
                        <h3>Selamat Datang di Wisata Kaldera</h3>
                        <h5>Pemesanan Tiket Online Wisata Kaldera Toba Nomadic Escape</h5>
                        <a href="#testimonials" class="main-filled-button">Pesan Tiket</a>
                        <a href="{{ route('register') }}" class="main-stroked-button">Buat Akun</a>
                    </div>
                </div>
            </div>
            <!-- // Item -->
        </div>
    </div>

    <main>
        {{-- <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-5 col-md-12 stats-detail">
                    <p>Wisata Desa Trinsing merupakan salah satu Lokasi wisata Barito Utara yang
                        terbaru dan terhits
                        lainnya adalah bendungan Trinsing. Bendungan yang berada di desa Trinsing ini dapat dijadikan
                        lokasi untuk berenang dan memainkan aktifitas air lainnya. Anda dapat menyewa sepeda bebek agar
                        dapat mengelilingi bendungan Trinsing.</p>
                </div>
            </section>
        </div> --}}

        <!---- text & detail picture wisata populer ---->
        {{-- <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2> Wisata Desa Trinsing</h2>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="section-popular-content" id="popularContent">
            <div class="container mt-5">
                <div class="col text-left">
                    <h5><strong>Ayo Liburan ke destinasi menarik wisata kaldera!</strong></h5>
                    <p>Ada berbagai pilihan tiket dengan harga yang spesial, lho. jangan sampai kehabisan ya!</p>
                </div>
                <div class="row mt-5">
                @foreach ($products as $item)
                @endforeach
                <div class="form-group col-lg-6 col-md-6 col-xs-12"> 
                    <h6><strong style="color: black;">{{$item->nama_produk}}</strong></h6>
                    {{-- <p><strong> Tiket Masuk 1 Hari </strong></p> --}}
                    <p class="" style="color: #F15C59; text-align: left; font-family: roboto;">Rp {{number_format($item->harga)}}&nbsp;&nbsp;&nbsp;<strong style="color: black;">(Dewasa)</strong></p>
                    <p class="" style="color: #F15C59; text-align: left; font-family: roboto;">Rp {{number_format($item->harga_anak)}}&nbsp;&nbsp;&nbsp;<strong style="color: black;">(Anak-anak)</strong></p>
                    <hr >
                    <p><i class="fa fa-hourglass-end">&nbsp; Berlaku ditanggal yang terpilih</i></p>
                    <p><i class="fa fa-calendar">&nbsp; Konfirmasi instan</i></p>
                    <p><i class="fa fa-money">&nbsp; Tidak bisa refund</i></p>
                    <hr >
                    <p>Lihat Informasi Penukaran tiket, tiket sudah termasuk <br> dan syarat ketentuan <strong>disini!</strong></p>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12 mt-3 contact-form-area contact-page-form contact-form text-left">
                       
    
                    <label hidden><strong>Id Pemesanan : </strong></label>
                        <input hidden type="text" name="id" class="form-control" placeholder="Id Pemesanan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Id Pemesanan'" value=" S-{{ rand() }}" readonly>
                    {{-- <input type="text" name="id_wisata" value="{{$wisata->id}}" hidden> --}}
                    
                    {{-- @if(Session::get('loginPelanggan'))
                        <input hidden type="text" name="id_pelanggan" value="{{Session::get('id_pelanggan')}}" hidden>
                        <label hidden><strong>Nama Pemesan : </strong></label>
                            <input hidden type="text" class="form-control" name="nama_pelanggan" placeholder="Masukkan Nama" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Masukkan Nama'" value="{{Session::get('nama_pelanggan')}}">
                            @if ($errors->has('nama_pelanggan'))
                            <span class="text-danger"><p class="text-right">* {{$errors->first('nama_pelanggan') }}</p></span>
                            @endif
                    @else
                        <label><strong>Nama Pemesan : </strong></label>
                        <input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukkan Nama" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Masukkan Nama'">
                        @if ($errors->has('nama_pelanggan'))
                        <span class="text-danger"><p class="text-right">* {{$errors->first('nama_pelanggan') }}</p></span>
                        @endif
                    @endif --}}

                    <label><strong>Tanggal : </strong></label>
                        <input type="date" class="form-control" name="tanggal_wisata" placeholder="Pilih Tanggal Wisata" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Pilih Tanggal Wisata'">
                        @if ($errors->has('tanggal_wisata'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('tanggal_wisata') }}</p></span>
                        @endif

                        <label><strong>Jumlah Tiket : </strong></label>
                        <input type="number" min="0" max="1000" step="0.1" id="id-1" class="form-control" name="jumlah_tiket" placeholder="Dewasa" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Dewasa'">
                        <input hidden type="number" min="0" max="1000" step="0.1" id="id-4" class="form-control" name="" value="15000" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Dewasa'">
                        <input type="number" min="0" max="1000" step="0.1" id="id-2" class="form-control" name="jumlah_tiket" placeholder="Anak-anak" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Anak-anak'">
                        <input hidden type="number" min="0" max="1000" step="0.1" id="id-5" class="form-control" name="" value="30000" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Anak-anak'">  
                        @if ($errors->has('jumlah_tiket'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('jumlah_tiket') }}</p></span>
                        @endif

                        <label><strong>Total Harga : </strong></label>
                        <input type="text" min="0" max="1000" step="0.1" id="id-3" class="form-control" name="jumlah_tiket" placeholder="" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Dewasa'" readonly>

                    <div class="join-container">
                      {{-- <form action="{{ route('detail-add', $formtikets->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $formtikets->id }}">
                        <button type="submit" class="btn btn-danger col-lg-12">
                            Pesan Tiket
                        </button>
                    </form> --}}
                    <form action="{{ route('add-form', $item->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-danger mb-2 px-4 col-lg-12">
                            Pesan Tiket
                        </button>
                    </form>
                      {{-- <form action="" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="">
                        <a href="{{url('cart')}}" class="btn btn-danger col-lg-12 px-4">Pesan Tiket</a>
                      </form> --}}
                        {{-- <a href="{{url('cart')}}" class="btn btn-danger col-lg-12 mt-5 px-4">Pesan Tiket!</a> --}}
                        {{-- <button type="submit" class="btn btn-danger col-lg-12 mb-2 px-8">
                            Pesan Tiket
                        </button> --}}
                    </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="section-popular-content" id="popularContent">
            <div class="container mt-5">
                <div class="col text-left">
                    <h5><strong>Berikut event terakhir yang ada di wisata kaldera!</strong></h5>
                    <p>Berbagai pilihan tiket event terakhir dengan harga yang spesial, lho. sampai jumpa di event yang akan datang!</p>
                </div>
                <div class="section-popular-travel row justify-content-left mt-3">
                    @foreach ($product as $item)
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="container">
                                <div class="row">
                              &nbsp; &nbsp;
                              <div class="card text-center" style="width: 180rem; height: 25rem;">
                                <img src="{{ Storage::url('public/products/' . $item->gambar) }}" alt="" style="width: 22.5rem; height: 30rem;">
                                <h6 class="mt-3" style="color: #333333; text-align: left;"><b>&nbsp; {{$item->nama_produk}}</b></h6>
                                <p class="ml-2 mr-2" maxlength="10" style="text-align: justify ; ">"{{Str::limit($item->isi, 910) }}"</p>
                                <p class="mt-3" style="color: #F15C59; text-align: left;">&nbsp; IDR {{number_format($item->harga)}}</p>    
                                <form action="{{ route('form-tiket', $item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <button class="btn btn-danger mb-2 px-4" disabled>Lihat Tiket</button>
                                    {{-- <a href="{{url('form-tiket')}}" class="btn btn-danger mb-2 px-4">Lihat Tiket</a> --}}
                                </form>
                              </div>
                             
                                </div>
                              </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <!-- testimoni wisatawan -->
        <section class="section-testimonials-heading" id="testimonialsHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h3><strong> Testimonials </strong></h3>
                        <p>
                            Momen memberi mereka
                            <br />
                            pengalaman terbaik
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-testimonials-content" id="testimonialsContent">
            <div class="container">
                @foreach ($testimonis as $test)
                <div class="section-popular-travel row justify-content-center match-height">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            {{-- <div class="testimonial-content">
                                <img src="{{asset ('admin/img/avatar.png') }}" alt="" class="rounded-circle" /> --}}
                                <h3 class="mb-5">{{ $test->name }}</h3>
                                <p class="testimonials">
                                    {{ $test->isi }}
                                </p>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row">
                    <div class="col-12 text-center">
                        <button id="theButton" class="btn btn-get-started px-4 mt-4 mx-1" onclick="clickMe()">Bagikan Pengalaman Anda</button>
                        {{-- <a href="{{url('testimoni')}}" class="btn btn-get-started px-4 mt-4 mx-1">Bagikan Pengalaman Anda!</a> --}}
                        <form action="{{ route('testimoni') }}" method="post">
                            @csrf
                            {{-- <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="name" value="{{Auth::user()->name}}"> --}}
                            <textarea cols="30" rows="10" name="isi" id="popup" class="hide form-control mt-3"></textarea>
                            <button class="btn btn-danger px-4 mt-4 mx-1 hide" id="submit">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </main>
    
    <script>
        function clickMe() {
        var text = document.getElementById("popup");
        var submit = document.getElementById("submit");
        
        text.classList.toggle("hide");
        text.classList.toggle("show");

        submit.classList.toggle("hide");
        submit.classList.toggle("show");
        
        }
    </script>
     <script type="text/javascript">
        $(function() {
            $("#id-1, #id-2, #id-4, #id-5").keyup(function() {
                 $("#id-3").val((+$("#id-1").val() * +$("#id-4").val()) + (+$("#id-2").val() * +$("#id-5").val()));
                 var sum = +$("#id-1").val() + (+$("#id-2").val());
               console.log(sum);
               if(sum == 0) {
                 $('input[name="go"]').prop('disabled', false);
               } else {
                 $('input[name="go"]').prop('disabled', true);
               }
            });
        });
        $(document).on('keyup', '.number-decimal', function(e) {
            var regex = /[-+][^\d.]|\.(?=.*\.)/g;
            var subst = "";
            var str = $(this).val();
            var result = str.replace(regex, subst);
            $(this).val(result);
        });
        $('#input_mask').inputmask({
            mask: '**.***.***.*-***.***',
            definitions: {
                A: {
                    validator: "[A-Za-z0-9 ]"
                },
            },
        });
        $('#date').val(new Date().toJSON().slice(0,10));
        $('#input_mask1').inputmask({
            mask: '*********-**',
            definitions: {
                A: {
                    validator: "[A-Za-z0-9 ]"
                },
            },
        });
        $("#input_mask_currency").inputmask({
            prefix: '',
            radixPoint: ',',
            groupSeparator: ".",
            alias: "numeric",
            autoGroup: true,
            digits: 0
        });
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datefield").setAttribute("max", today);
        </script>
@endsection
