@extends('layouts.admin')
@section('title')
    <title>Pesanan Wisata</title>
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
                        <h1>Daftar tiket</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Daftar tiket</li>
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
                        <h3 class="card-title">Daftar tiket</h3>
                        <div class="float-right">
                        </div>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-row-bordered gy-5 gs-7">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Tanggal Wisata</th>
                                        <th>Tiket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>Rp {{ number_format($item->total_harga, 0 ,".", ".") }}</td>
                                            <td>
                                                @if ($item->status == 'PENDING')
                                                    <button
                                                        class="btn btn-warning btn-sm rounded">{{ $item->status }}</button>
                                                @elseif ($item->status == 'SUCCESS')
                                                    <button
                                                        class="btn btn-success btn-sm rounded">{{ $item->status }}</button>
                                                @else
                                                    <button
                                                        class="btn btn-danger btn-sm rounded">{{ $item->status }}</button>
                                                @endif
                                            </td>
                                            <td>{{ $item->tanggal_wisata }}</td>
                                            <td>
                                                @if ($item->status == 'SUCCESS')
                                                    <a href="{{ route('pelanggan.transaksi.download', $item->id) }}"
                                                        class="btn btn-info btn-sm rounded"> Lihat
                                                        Tiket</a>
                                                @else
                                                    <p>Belum diproses</p>
                                                @endif
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
    <script>
  $("#table").DataTable({
});
</script>
@endsection
