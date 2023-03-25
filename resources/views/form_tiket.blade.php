<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@extends('layouts.front')
@section('title')
    <title>Form Tiket</title>
@endsection
@section('content')

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container card">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-xs-12">
                    <div>
                            <p style="text-align: center;" class="">
                                <img width="600px" src="{{ url('pelanggan/assets/images/fotowisata/'.$wisata->foto) }}">
                            </p>
                            <h5 style="text-align: left;"><b>{{$wisata->nama_wisata}}</b></h5>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-xs-12 mt-3">

                    
                    <p>Tiket Masuk 1 Hari</p>
                    <p class="" style="color: #F15C59; text-align: left;">@rupiah($wisata->harga_tiket_anak)&nbsp;&nbsp;&nbsp;<strong style="color: black;">(Dewasa)</strong></p>
                    <p class="" style="color: #F15C59; text-align: left;">@rupiah($wisata->harga_tiket_dewasa)&nbsp;&nbsp;&nbsp;<strong style="color: black;">(Anak-anak)</strong></p>
                    <hr >
                    <i class="fa fa-home">&nbsp; Berlaku ditanggal yang dipilih</i><br>
                    <i class="fa fa-home">&nbsp; Berlaku ditanggal yang dipilih</i><br>
                    <i class="fa fa-home">&nbsp; Berlaku ditanggal yang dipilih</i>
                    <hr >
                    <p>Lihat Informasi Penukaran tiket, tiket sudah termasuk <br> dan syarat ketentuan <strong>disini!</strong></p>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12 mt-3">
                    <form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="{{url('AksiPemesanan')}}" method="post">

                    {{csrf_field()}}

                    <label hidden><strong>Id Pemesanan : </strong></label>
                        <input hidden type="text" name="id" class="form-control" placeholder="Id Pemesanan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Id Pemesanan'" value=" S-{{ rand() }}" readonly>

                    <input type="text" name="id_wisata" value="{{$wisata->id}}" hidden>
                    
                    @if(Session::get('loginPelanggan'))
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
                    @endif

                    <label><strong>Tanggal Berwisata : </strong></label>
                        <input type="date" class="form-control" name="tanggal_wisata" placeholder="Pilih Tanggal Wisata" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Pilih Tanggal Wisata'">
                        @if ($errors->has('tanggal_wisata'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('tanggal_wisata') }}</p></span>
                        @endif

                        <label><strong>Jumlah Tiket : </strong></label>
                        <input type="number" min="1" class="form-control" name="jumlah_tiket" placeholder="Jumlah Tiket" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Jumlah Tiket'">
                        @if ($errors->has('jumlah_tiket'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('jumlah_tiket') }}</p></span>
                        @endif

                        <label><strong>Jumlah harga : </strong></label>
                        <input type="number" class="form-control" name="jumlah_harga" placeholder="Jumlah Harga" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Jumlah Harga'"  value="100">
                        @if ($errors->has('jumlah_harga'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('jumlah_harga') }}</p></span>
                        @endif

{{--                         
                    <label><strong>Jumlah Tiket : </strong></label>
                        <input type="number" min="1" class="form-control " name="jumlah_tiket" placeholder="Dewasa" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Jumlah Tiket'">
                        @if ($errors->has('jumlah_tiket'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('jumlah_tiket') }}</p></span>
                        @endif

                    <label><strong>Jumlah Harga : </strong></label>
                        <input type="number" class="form-control " name="jumlah_harga" placeholder="Jumlah harga" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Jumlah Harga'">
                        @if ($errors->has('jumlah_harga'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('jumlah_harga') }}</p></span>
                        @endif
                    
                        <input type="number" min="1" class="form-control" name="" placeholder="Anak-anak" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Jumlah Tiket'">
                        <span style="color: blue">* Hari ini tersedia {{$sisaTiket}} Tiket</span> --}}
                        {{-- @if ($errors->has('jumlah_tiket'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('jumlah_tiket') }}</p></span>
                        @endif

                        <table>
                            <thead>
                              <tr>
                                <th>Jumlah Tiket</th>
                                <th hidden >Cost per item</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="amount"><input type="number" value="1"></td>
                                <td hidden class="cost">15000</td>
                                <td hidden class="total">15000</td>
                              </tr>
                              <tr>
                                <td class="amount"><input type="number" value="1"></td>
                                <td hidden class="cost">20000</td>
                                <td hidden class="total">20000</td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>Total Harga</th>
                                <td class="total_harga">2000</td>
                              </tr>
                            </tfoot>
                          </table> --}}
                    <hr>
                    <input type="submit" style="color: #fff; background-color: #3490DC;" class="btn btn-success" value="Pesan">
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

<!-- content -->

<script>

// Get all inputs with type="number"
// that is a child of <td class="amount">.
var $amountInput = $('td.amount > input[type="number"]');

// Attach "input" event listener to the input fields
// so that we know when the value changes and handle the changes.
// In this case, the event handler is the function "updateTotal".
$amountInput.on('input', updateTotal);


function updateTotal(e){
  // Get the `input` element that triggers this event.
  var $thisInput = $(e.target);

  // Get the value of $thisInput
  var amount = $thisInput.val();
  
  // The `value` is a string,
  // so we need `parseInt` to make it a number.
  // Use `parseInt` because quantity can't have decimals.
  amount = parseInt(amount);

  // Don't do anything if value is not valid
  // else you will see NaN in result.
  if (!amount || amount < 0)
    return;

  // Get the parent <tr> of this input field
  var $parentRow = $thisInput.parent().parent();
  
  // Find the <td class="total"> element
  var $siblingTotal = $parentRow.find('.total');
  
  // Find the <td class="cost"> element
  var $siblingCost = $parentRow.find('.cost');

  //Find the <td class="total_harga"> element
  var $cousinTotalHarga = $parentRow.find('.total_harga');
  
  // Get the cost from <td class="cost"> element
  var cost = $siblingCost.text();

  // The "cost" is a string,
  // so we need `parseFloat` to make it a number.
  // Use `parseFloat` because cost can have decimals.
  cost = parseFloat(cost);

  // Calculate the total cost
  var total = amount * cost;
  
  // .toFixed(2) to force 2 decimal places
  total = total.toFixed(2);

  var total_harga = total + total;
  
  // Update the total cost into <td class="total"> element
  $siblingTotal.text(total);
  
  // Update the total_harga cost into <td class="total_harga"> element
    $cousinTotalHarga.text(total_harga);
}
</script>

@endsection