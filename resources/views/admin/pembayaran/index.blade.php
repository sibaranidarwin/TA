@extends('layouts.admin')

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
                        <h1>Daftar Pembayaran</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pembayaran</li>
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
                        @if ($start_date != null || $end_date != null)
                        <p class="title" style="text-align: center; background-color: #007bff; color: #fff;"></i><strong>Tanggal Kunjungan: {{ Carbon\Carbon::parse($start_date)->format('d F Y') }} Sampai: {{ Carbon\Carbon::parse($end_date)->format('d F Y') }} </strong></i></p>
                        @endif
                        <div class="table-responsive">

                            <form action="{{ route('filterpembayaran') }}" class="form-inline mb-3"
                            method="GET">
                            <div class="form-group ">
                                <label for="">Tanggal Pembayaran : &nbsp;</label>
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
                                        <th>Order ID</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>Rp {{ number_format($item->total_harga, 0, '.', '.') }}</td>
                                            <td>{{ $item->tgl_wisata }}</td>
                                            <td>
                                                @if ($item->status == 'PENDING')
                                                    <button
                                                        class="btn btn-warning btn-sm rounded">{{ $item->status }}</button>
                                                        <a data-toggle="tooltip" data-placement="bottom" href="" class="btn btn-success btn-sm" title="Cancel Disputed"
                                                onclick="return confirm('Are you sure?')"><i class="fa fa-check"></i></a>
                                                @elseif ($item->status == 'SUCCESS')
                                                    <button
                                                        class="btn btn-success btn-sm rounded">{{ $item->status }}</button>
                                                        <a data-toggle="tooltip" data-placement="bottom" href="" class="btn btn-danger btn-sm" title="Cancel Disputed"
                                                onclick="return confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                                                @else
                                                    <button
                                                        class="btn btn-danger btn-sm rounded">{{ $item->status }}</button>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <form action="{{ route('gallery.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE') --}}
                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#edit-pesan{{ $item->id }}"><i class="fas fa-edit"></i>
                                                    Edit</a>
                                                {{-- <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i> Delete</button> --}}
                                                {{-- </form> --}}
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
    @foreach ($transaction as $item)
        <div class="modal fade" id="edit-pesan{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">EDIT PESANAN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('transaction.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $item->user_id }}" name="user_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">ORDER ID</label>
                                <input type="text" class="form-control" value="{{ $item->kode }}" name="kode"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="">NAMA</label>
                                <input type="text" class="form-control" value="{{ $item->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" value="{{ $item->total_harga }}"
                                    name="total_harga" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Pesanan</label>
                                <input type="date" class="form-control" value="{{ $item->tgl_wisata }}"
                                    name="start_date">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                                    <option value="">--------------</option>
                                    <option value="PENDING">PENDING</option>
                                    <option value="SUCCESS">SUCCESS</option>
                                    <option value="CANCELLED">CANCELLED</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

<script>
  $("#table").DataTable({
    columnDefs: [{
                orderable: true,
                className: 'reorder',
                targets: 0
            },
            {
                orderable: false,
                targets: '_all'
            }
        ],
});
</script>
@endsection
