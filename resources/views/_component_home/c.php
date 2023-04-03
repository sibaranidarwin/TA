<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>

@extends('layouts.front')
@section('title')
<title>Form Tiket</title>
@endsection
@section('content')
<section class="section" id="about">
    <div class="container card">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-xs-12">
                <div>
                    {{-- <p style="text-align: center;" class="">
                                    <img width="600px" src="{{ url('pelanggan/assets/images/fotowisata/'.$wisata->foto) }}">
                    </p>
                    <h5 style="text-align: left;"><b>{{$wisata->nama_wisata}}</b></h5> --}}
                </div>
            </div>
            @foreach ($product as $item)
            @endforeach
            <div class="form-group col-lg-6 col-md-6 col-xs-12 mt-3">
                <p>Tiket Masuk 1 Hari</p>
                <p class="" style="color: #F15C59; text-align: left;">IDR
                    {{number_format($item->harga)}}&nbsp;&nbsp;&nbsp;<strong style="color: black;">(Dewasa)</strong></p>
                <p class="" style="color: #F15C59; text-align: left;">IDR 15.000&nbsp;&nbsp;&nbsp;<strong
                        style="color: black;">(Anak-anak)</strong></p>
                <hr>
                <i class="fa fa-hourglass-end">&nbsp; Berlaku ditanggal yang terpilih</i><br><br>
                <i class="fa fa-calendar">&nbsp; Konfirmasi instan</i><br><br>
                <i class="fa fa-money">&nbsp; Tidak bisa refund</i>
                <hr>
                <p>Lihat Informasi Penukaran tiket, tiket sudah termasuk <br> dan syarat ketentuan
                    <strong>disini!</strong></p>
            </div>
            <div
                class="form-group col-lg-6 col-md-6 col-xs-12 mt-3 contact-form-area contact-page-form contact-form text-left">


                <label hidden><strong>Id Pemesanan : </strong></label>
                <input hidden type="text" name="id" class="form-control" placeholder="Id Pemesanan"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Id Pemesanan'" value=" S-{{ rand() }}"
                    readonly>
                {{-- <input type="text" name="id_wisata" value="{{$wisata->id}}" hidden> --}}

                {{-- @if(Session::get('loginPelanggan'))
                            <input hidden type="text" name="id_pelanggan" value="{{Session::get('id_pelanggan')}}"
                hidden>
                <label hidden><strong>Nama Pemesan : </strong></label>
                <input hidden type="text" class="form-control" name="nama_pelanggan" placeholder="Masukkan Nama"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nama'"
                    value="{{Session::get('nama_pelanggan')}}">
                @if ($errors->has('nama_pelanggan'))
                <span class="text-danger">
                    <p class="text-right">* {{$errors->first('nama_pelanggan') }}</p>
                </span>
                @endif
                @else
                <label><strong>Nama Pemesan : </strong></label>
                <input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukkan Nama"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Nama'">
                @if ($errors->has('nama_pelanggan'))
                <span class="text-danger">
                    <p class="text-right">* {{$errors->first('nama_pelanggan') }}</p>
                </span>
                @endif
                @endif --}}

                <label><strong>Tanggal : </strong></label>
                <input type="date" class="form-control" name="tanggal_wisata" placeholder="Pilih Tanggal Wisata"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pilih Tanggal Wisata'">
                @if ($errors->has('tanggal_wisata'))
                <span class="text-danger">
                    <p class="text-right">* {{$errors->first('tanggal_wisata') }}</p>
                </span>
                @endif

                <label><strong>Jumlah Tiket : </strong></label>
                <input type="number" min="0" max="1000" step="0.1" id="id-1" class="form-control" name="jumlah_tiket"
                    placeholder="Dewasa" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Dewasa'">
                <input type="number" min="0" max="1000" step="0.1" id="id-2" class="form-control" name="jumlah_tiket"
                    placeholder="Anak-anak" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Anak-anak'">
                @if ($errors->has('jumlah_tiket'))
                <span class="text-danger">
                    <p class="text-right">* {{$errors->first('jumlah_tiket') }}</p>
                </span>
                @endif

                <label><strong>Total Tiket : </strong></label>
                <input type="number" min="0" max="1000" step="0.1" id="id-3" class="form-control" name="jumlah_tiket"
                    placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Dewasa'">


                <h2> Example </h2>
                <h1> How to Auto Calculate Price in JavaScript </h1> <br> <br>
                <fieldset>
                    <form action="#" method="post" name="myform">
                        <h4> Number of People </h4>
                        <input type="text" name="qty"> <br />
                        <h4> Enter Price </h4>
                        <input type="text" name="Cost" onkeyup="calculate(this.value)"> <br />
                        <h4> Total Price </h4> <input type="text" name="textbox5" />
                </fieldset>
                </form>
                <div class="join-container">
                    <form action="{{ route('detail-add', $item->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-danger col-lg-12 mb-2 px-4">
                            Pesan Tiket
                        </button>
                    </form>
                    {{-- <form action="" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="">
                            <a href="{{url('cart')}}" class="btn btn-danger mb-2 px-4">Lihat Tiket!</a>
                    </form> --}}
                    {{-- <a href="{{url('cart')}}" class="btn btn-danger col-lg-12 mt-5 px-4">Pesan Tiket!</a> --}}
                    {{-- <button type="submit" class="btn btn-danger col-lg-12 mb-2 px-8">
                                Pesan Tiket
                            </button> --}}
                </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- ***** About Area Ends ***** -->

<!-- content -->

<script type="text/javascript">
$(function() {
    $("#id-1, #id-2").keyup(function() {
        $("#id-3").val(+$("#id-1").val() + (+$("#id-2").val()));
        var sum = +$("#id-1").val() + (+$("#id-2").val());
        console.log(sum);
        if (sum == 0) {
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
$('#date').val(new Date().toJSON().slice(0, 10));
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

function calculate() {
    if (isNaN(document.forms["myform"]["qty"].value) || document.forms["myform"]["qty"].value == "") {
        var text1 = 0;
    } else {
        var text1 = parseInt(document.forms["myform"]["qty"].value);
    }
    if (isNaN(document.forms["myform"]["Cost"].value) || document.forms["myform"]["Cost"].value == "") {
        var text2 = 0;
    } else {
        var text2 = parseFloat(document.forms["myform"]["Cost"].value);
    }
    document.forms["myform"]["textbox5"].value = (text1 * text2);
}
</script>