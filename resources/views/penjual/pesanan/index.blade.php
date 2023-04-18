@extends('layouts.penjual')

@section('title')
    <title>Transaksi</title>
@endsection
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Pemesanan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pemesanan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    {{-- <div class="card-header">
                        <h3 class="card-title">Data Transaksi</h3>
                        <div class="float-right">
                        </div>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="" class="form-inline mb-3"
                            method="GET">
                            <div class="form-group ">
                                <label for="">Tanggal Pesanan: &nbsp;</label>
                                <input type="date" class="form-control form-control-sm"
                                    name="start_date">
                            </div>
                            <div class="form-group mx-sm-4">
                                <label for="inputPassword2">Sampai: &nbsp;</label>
                                <input type="date" class="form-control form-control-sm"
                                    name="end_date">
                            </div>
                            <button class="btn btn-primary btn-sm"
                                onclick="return confirm('Are you sure?')" type="submit"><i
                                    class="fa fa-search"></i></button>
                        </form>
                            <table id="table" class="table table-striped table-row-bordered gy-5 gs-7">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Transaksi</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Wisata</th>
                                        <th>Harga</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_transaksi }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>Rp {{ number_format($item->total_harga, 0, '.', '.') }}</td>
                                            <td>{{ TanggalID($item->tgl_wisata) }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#edit-pesan{{ $item->id }}"> <i
                                                        class="fa fa-eye"></i>Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Edit Modal -->
    @foreach ($detail as $item)
        <div class="modal fade" id="edit-pesan{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">DETAIL PESANAN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-responsive">
                            <tr>
                                <td>Kode Transaksi</td>
                                <td>:</td>
                                <td>{{ $item->kode_transaksi }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <td>Tujuan Wisata</td>
                                <td>:</td>
                                <td>{{ $item->nama_produk }}</td>
                            </tr>
                            <tr>
                                <td>TOTAL HARGA </td>
                                <td>:</td>
                                <td>Rp.{{ $item->total_harga }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Kunjungan </td>
                                <td>:</td>
                                <td>{{ TanggalID($item->tgl_wisata) }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
<script>
  $("#table").DataTable({
});
</script>
@endsection
