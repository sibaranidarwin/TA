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
i{
    font-family: 'Segoe UI';
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
        <section class="section-popular-content" id="popularContent">
            <div class="container mt-5">
                <div class="col text-left">
                    <h5><strong>Tiket Masuk Kaldera Toba!</strong></h5>
                    <p>Berikut form tiket masuk kaldera toba nomadic escape, lho. jangan sampai kehabisan ya!</p>
                </div>
                <div class="row mt-5">
                @foreach ($products as $item)
                @endforeach
                <div class="form-group col-lg-6 col-md-6 col-xs-12"> 
                    {{-- <h6><strong style="color: black;">{{$item->nama_produk}}</strong></h6> --}}
                    <p><strong> Tiket Masuk 1 Hari </strong></p>
                    <p class="" style="color: #F15C59; text-align: left; font-family: roboto;">Rp {{number_format($item->harga, 0, ',', '.')}}&nbsp;&nbsp;&nbsp;<strong style="color: black;">(Dewasa)</strong></p>
                    <p class="" style="color: #F15C59; text-align: left; font-family: roboto;">Rp {{number_format($item->harga_anak, 0, ',', '.') }}&nbsp;&nbsp;&nbsp;<strong style="color: black;">(Anak-anak)</strong></p>
                    <hr >
                    <i class="fa fa-hourglass-end" style="color: black;"><span style="font-family: roboto;">&nbsp; Berlaku ditanggal yang terpilih</span></i><br><br>
                    <i class="fa fa-calendar" style="color: black;"><span style="font-family: roboto;">&nbsp; Konfirmasi instan</span></i><br><br>
                    <i class="fa fa-money" style="color: black;"><span style="font-family: roboto;">&nbsp; Tidak bisa refund</span></i>
                    <hr >
                    <p>Lihat Informasi Penukaran tiket, tiket sudah termasuk <br> dan syarat ketentuan <strong>disini!</strong></p>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12 mt-3 contact-form-area contact-page-form contact-form text-left cart-totals"> 
                    <form action="{{ route('add-form', $item->id) }}" method="post">
                        @csrf
                    <label hidden><strong>Id Pemesanan : </strong></label>
                        <input hidden type="text" name="id" class="form-control" placeholder="Id Pemesanan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Id Pemesanan'" value=" S-{{ rand() }}" readonly>
                        
                        <label><strong>Tanggal : </strong></label>
                        <input type="date" class="form-control" name="tgl_wisata" placeholder="Pilih Tanggal Wisata" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Pilih Tanggal Wisata'" required>
                        @if ($errors->has('tgl_wisata'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('tgl_wisata') }}</p></span>
                        @endif
                        <label><strong>Jumlah Tiket : </strong></label>
                        {{-- <input type="button" value="-"  data-for="quantity1"> --}}
                        <input type="number" min="0" max="1000" step="0.1" id="id-1" class="form-control" name="dewasa" placeholder="Dewasa" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Dewasa'" required>
                        <input type="hidden" min="0" max="1000" step="0.1" id="id-4" class="form-control" name="" value="{{ ($item->harga)}}" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'dewasa'">
                        {{-- <input type="button" value="+" data-for="quantity1"> --}}
                        
                        {{-- <input type="button" value="-" data-for="quantity2"> --}}
                        <input type="number" min="0" max="1000" step="0.1" id="id-2" class="form-control" name="anak" placeholder="Anak" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Anak-anak'">
                        <input type="hidden" min="0" max="1000" step="0.1" id="id-5" class="form-control" name="" value="{{ ($item->harga_anak)}}" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'anak'">  
                        {{-- <input type="button" value="+" data-for="quantity2"> --}}

                            {{-- <input type="button" value="-"  data-for="quantity1">
                            <input type="number" id="quantity1" value="1" min="0">
                            <input type="button" value="+" data-for="quantity1">
            
                            <input type="button" value="-" data-for="quantity2">
                            <input type="number" id="quantity2" value="5" min="2">
                            <input type="button" value="+" data-for="quantity2"> --}}
                        

                        <label><strong>Total Harga : </strong></label>
                        <input type="hidden" min="0" max="1000" step="0.1" class="id-3" class="form-control" name="total_harga" placeholder="" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'total_harga'" readonly>
                        <input type="text" min="0" max="1000" step="0.1" class="id-3" id="input_mask" class="form-control" name="" placeholder="" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'total_harga'" readonly>              

                    <div class="join-container">
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-danger mb-2 px-4 col-lg-12">
                            Pesan Tiket
                        </button>
                    </div>

                    </form>
                </div>
            </div>
        </section>

        @if ($item->tgl_event <= now())
        <section class="section-popular-content" id="popularContent">
            <div class="container mt-5">
                <div class="col text-left">
                    <h5><strong>Berikut event terakhir yang ada di wisata kaldera!</strong></h5>
                    <p>Berbagai pilihan tiket event terakhir dengan harga yang spesial, lho. sampai jumpa di event yang akan datang!</p>
                </div>
                <div class="section-popular-travel row justify-content-left mt-3">
                    @foreach ($product as $item)
                        <div class="col-sm-8 col-md-4 col-lg-4">
                            <div class="container">
                                <div class="row">
                              &nbsp; &nbsp;
                              <div class="card text-center" style="width: 180rem; height: 25rem;">
                                <img src="{{ Storage::url('public/products/' . $item->gambar) }}" alt="" style="width: 22.5rem; height: 30rem;">
                                <h6 class="mt-3" style="color: #333333; text-align: left;"><b>&nbsp; {{$item->nama_produk}}</b></h6>
                                <p class="ml-2 mr-2" maxlength="10" style="text-align: justify ; ">"{{Str::limit($item->isi, 130) }}"</p>
                                <p class="mt-3" style="color: #F15C59; text-align: left;">&nbsp; Rp {{number_format($item->harga, 0, ',', '.') }}</p>    
                                {{-- {{dd($item->tgl_event >= now());}} --}}
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
        @else
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
                                <p class="ml-2 mr-2" maxlength="10" style="text-align: justify ; ">"{{Str::limit($item->isi, 130) }}"</p>
                                <p class="mt-3" style="color: #F15C59; text-align: left;">&nbsp; Rp {{number_format($item->harga, 0, ',', '.') }}</p>    
                                {{-- {{dd($item->tgl_event >= now());}} --}}
                                <form action="{{ route('form-tiket', $item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    {{-- <button class="btn btn-danger mb-2 px-4" disabled>Lihat Tiket</button> --}}
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
        @endif

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
                <div class="section-popular-travel row justify-content-left mt-2">
                    @foreach ($testimonis as $test)
                    <div class="col-sm-8 col-md-4 col-lg-4">
                        <div class="card card-testimonial text-center" style="height: 20rem;">
                            {{-- <div class="testimonial-content">
                                <img src="{{asset ('admin/img/avatar.png') }}" alt="" class="rounded-circle" /> --}}
                                <h3 class="mb-5">{{ $test->name }}</h3>
                                <p class="testimonials">
                                    {{ $test->isi }}
                                </p>
                            {{-- </div> --}}
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button id="theButton" class="btn btn-get-started px-4 mt-4 mx-1" onclick="clickMe()">Bagikan Pengalaman Anda</button>
                        {{-- <a href="{{url('testimoni')}}" class="btn btn-get-started px-4 mt-4 mx-1">Bagikan Pengalaman Anda!</a> --}}
                        <form action="{{ route('testimoni') }}" method="post">
                            @csrf
                            @guest
                            @if (Route::has('login'))
                            {{-- <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="name" value="{{Auth::user()->name}}"> --}}
                            @endif
                            @else
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="name" value="{{Auth::user()->name}}">
                            @endguest
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
          // membuat plus minus item
          var cart = document.querySelector('.cart-totals');

        cart.addEventListener('click', function(ev) {

        var tgt = ev.target;
        if (tgt.matches('input[type="button"]')) {

            var input = document.getElementById(tgt.dataset.for);
            var currentValue = +input.value;
            var minValue = +input.min;
            
            
            if (tgt.value === '+') {
                input.value = currentValue + 1;
            }
            else if (currentValue > minValue) {
                input.value = currentValue - 1;
            }
            
        }
        });
    </script>
     <script type="text/javascript">
        $(function() {
            $("#id-1, #id-2, #id-4, #id-5").keyup(function() {
                 $(".id-3").val((+$("#id-1").val() * +$("#id-4").val()) + (+$("#id-2").val() * +$("#id-5").val()));
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
            mask: 'Rp **.***.***.*-***.***',
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
