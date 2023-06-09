@extends('layouts.front')
@section('title')
    <title>Tiket Masuk Wisata</title>
@endsection
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<br>
<br>
<br>
<br><br>
<section class="section-details-content">
    <div class="container">
      {{-- <div class="col text-left">
            <h5><strong>Ayo Liburan ke destinasi menarik wisata kaldera!</strong></h5>
            <p>Ada berbagai pilihan tiket dengan harga yang spesial, lho. jangan sampai kehabisan ya!</p>
        </div> --}}
        <div class="row">
        @foreach ($wisata as $item)
        @endforeach
        <div class="form-group col-lg-6 col-md-6 col-xs-12 mt-3"> 
            <h5><strong style="color: black;">{{$item->nama_produk}}</strong></h5>
            <p><strong> Tiket Masuk 1 Hari </strong></p>
            <p class="" style="color: #F15C59; text-align: left; font-family: roboto;">Rp {{number_format($item->harga, 0, '.', '.')}}&nbsp;&nbsp;&nbsp;<strong style="color: black;">(Dewasa)</strong></p>
            <p class="" style="color: #F15C59; text-align: left; font-family: roboto;">Rp {{number_format($item->harga_anak, 0, '.', '.')}}&nbsp;&nbsp;&nbsp;<strong style="color: black;">(Anak-anak)</strong></p>
            <hr >
            <i class="fa fa-hourglass-end" style="color: black;"><span style="font-family: roboto;">&nbsp; Berlaku ditanggal yang terpilih</span></i><br><br>
            <i class="fa fa-calendar" style="color: black;"><span style="font-family: roboto;">&nbsp; Konfirmasi instan</span></i><br><br>
            <i class="fa fa-money" style="color: black;"><span style="font-family: roboto;">&nbsp; Tidak bisa refund</span></i>
                    
            <hr >
            <p>Lihat Informasi Penukaran tiket, tiket sudah termasuk <br> dan syarat ketentuan <strong>disini!</strong></p>
        </div>
        <div class="form-group col-lg-6 col-md-6 col-xs-12 mt-3 contact-form-area contact-page-form contact-form text-left"> 
            <form action="{{ route('add-form', $item->id) }}" method="post">
                @csrf
            <label hidden><strong>Id Pemesanan : </strong></label>
                <input hidden type="text" name="id" class="form-control" placeholder="Id Pemesanan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Id Pemesanan'" value=" S-{{ rand() }}" readonly>
                
                <label><strong>Tanggal : </strong></label>
                <input type="date" class="form-control" name="tgl_wisata" placeholder="Pilih Tanggal Wisata" onfocus="this.placeholder = ''"
                             onblur="this.placeholder = 'Pilih Tanggal Wisata'">
                @if ($errors->has('tgl_wisata'))
                  <span class="text-danger"><p class="text-right">* {{$errors->first('tgl_wisata') }}</p></span>
                @endif

                <label><strong>Jumlah Tiket : </strong></label>
                <input type="number" min="0" max="1000" step="0.1" id="id-1" class="form-control" name="dewasa" placeholder="Dewasa" onfocus="this.placeholder = ''"
                             onblur="this.placeholder = 'dewasa'">
                <input type="hidden" min="0" max="1000" step="0.1" id="id-4" class="form-control" name="" value="{{ ($item->harga)}}" onfocus="this.placeholder = ''"
                             onblur="this.placeholder = 'dewasa'">
                <input type="number" min="0" max="1000" step="0.1" id="id-2" class="form-control" name="anak" placeholder="Anak" onfocus="this.placeholder = ''"
                             onblur="this.placeholder = 'anak'">
                <input type="hidden" min="0" max="1000" step="0.1" id="id-5" class="form-control" name="" value="{{ ($item->harga_anak)}}" onfocus="this.placeholder = ''"
                             onblur="this.placeholder = 'anak'">  

                <label><strong>Total Harga : </strong></label>
                <input type="hidden" min="0" max="1000" step="0.1" class="id-3" class="form-control" name="" placeholder="total_harga" onfocus="this.placeholder = ''"
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
