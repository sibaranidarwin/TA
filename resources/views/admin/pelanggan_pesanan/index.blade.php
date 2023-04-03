@extends('layouts.admin')
@section('title')
    <title>Pesanan Wisata</title>
@endsection
@section('content')
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
                            <table class="table table-sm">
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
                                            <td>{{ $item->total_harga }}</td>
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
                                                        class="btn btn-danger btn-sm rounded"> Generate
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
@endsection
