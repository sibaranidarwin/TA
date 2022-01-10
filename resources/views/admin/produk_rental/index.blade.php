@extends('layouts.admin')
@section('title')
    <title>Dashboard Paket</title>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Paket Travel</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Paket Travel</li>
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
                    <div class="card-header">
                        <h3 class="card-title">Data Paket Travel</h3>
                        <div class="float-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModalLong">
                                <i class="fa fa-plus-circle"></i>
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mobil</th>
                                        <th>Harga</th>
                                        <th>Gambar</th>
                                        <th>Kapasitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>Rp. {{ number_format($item->harga, 2, ',', '.') }}</td>
                                            <td>
                                                <img src="{{ Storage::url('public/products/' . $item->gambar) }}"
                                                    height="100px" class="rounded" alt="" srcset="">
                                            </td>
                                            <td>{{ $item->total_kursi }}</td>
                                            <td>
                                                <form action="{{ route('product.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#edit-product{{ $item->id }}"><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i> Delete</button>
                                                </form>
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
    <!-- /.content-wrapper -->



    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Merek Mobil</label>
                            <select name="id_kategori" class="form-control">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Mobil</label>
                            <input type="text" class="form-control" name="nama_produk">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" class="form-control" name="harga" placeholder="Rp.">
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                        <div class="form-group">
                            <label for="">Kapasitas</label>
                            <input type="number" class="form-control" name="total_kursi">
                        </div>
                        <div class="form-group">
                            <label for="">Jam Rental</label>
                            <select name="jam_rental" class="form-control">
                                <option value="12">12 Jam</option>
                                <option value="24">24 Jam</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tipe Rental</label>
                            <select name="tipe_rental" class="form-control">
                                <option value="matic">Manual</option>
                                <option value="manual">Matic</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tipe Driver</label>
                            <select name="tipe_driver" class="form-control" id="">
                                <option value="lepas">Lepas Kunci</option>
                                <option value="driver">Dengan Driver</option>
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

    <!-- Edit Modal -->
    @foreach ($product as $p)
        <div class="modal fade" id="edit-product{{ $p->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Paket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('product.update', $p->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Merek Mobil</label>
                                <select name="id_kategori" class="form-control">
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Mobil</label>
                                <input type="text" class="form-control" value="{{ $p->nama_produk }}"
                                    name="nama_produk">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" value="{{ $p->harga }}" name="harga"
                                    placeholder="Rp.">
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                                <img src="{{ Storage::url('public/product/' . $p->gambar) }}" height="100px"
                                    class="rounded" alt="" srcset="">
                            </div>
                            <div class="form-group">
                                <label for="">Kapasitas</label>
                                <input type="number" class="form-control" value="{{ $p->total_kursi }}"
                                    name="total_kursi">
                            </div>
                            <div class="form-group">
                                <label for="">Jam Rental</label>
                                <select name="jam_rental" class="form-control">
                                    <option value="12">12 Jam</option>
                                    <option value="24">24 Jam</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="">Tipe Rental</label>
                                <select name="tipe_rental" class="form-control">
                                    <option value="matic">Manual</option>
                                    <option value="manual">Matic</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tipe Driver</label>
                                <select name="tipe_driver" class="form-control" id="">
                                    <option value="lepas">Lepas Kunci</option>
                                    <option value="driver">Dengan Driver</option>
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
@endsection
