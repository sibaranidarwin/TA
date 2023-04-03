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
                        <h1>Tiket Wisata Kaldera</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Paket Wisata</li>
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
                        {{-- <h3 class="card-title">Data Paket Wisata</h3> --}}
                        <div class="float-left">
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
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Wisata</th>
                                        <th>Harga Tiket Dewasa</th>
                                        <th>Harga Tiket Anak-anak</th>
                                        <th>Deskripsi</th>

                                        {{-- <th>Gambar</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->category->nama_kategori }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($item->harga_anak, 2, ',', '.') }}</td>
                                            <td>{{ $item->isi }}</td>
                                            {{-- <td>
                                                <img src="{{ Storage::url('public/products/' . $item->gambar) }}"
                                                    height="100px" class="rounded" alt="" srcset="">
                                            </td> --}}
                                            <td>
                                                <form action="{{ route('product.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#show-product{{ $item->id }}"><i class="fa fa-eye"
                                                            aria-hidden="true"></i> Show</a>
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
                            <label for="">Kategori Wisata</label>
                            <select name="category_id" class="form-control">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Wisata</label>
                            <input type="text" class="form-control" name="nama_produk">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Dewasa</label>
                            <input type="number" class="form-control" name="harga" placeholder="Rp.">
                        </div>
                        <div class="form-group">
                            <label for="">Harga Anak-anak</label>
                            <input type="number" class="form-control" name="harga_anak" placeholder="Rp.">
                        </div>
                        <div class="form-group">
                            <label for="">Deksripsi</label>
                            <input type="text" class="form-control" name="isi" placeholder="Masukkkan Deskripsi Tiket">
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" class="form-control" name="file_gambar">
                        </div>
                        <div class="form-group">
                            <label for="">Link Maps</label>
                            <input type="text" class="form-control" name="link_maps">
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Type Product</label>
                            <select name="type_product" class="form-control" required>
                                <option value="">--Pilih--</option>
                                @foreach ($type as $tipe)
                                    <option value="{{ $tipe }}">{{ ucwords($tipe) }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- show modal --}}
    @foreach ($product as $p)
        <div class="modal fade" id="show-product{{ $p->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Wisata {{ $p->nama_produk }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>{{ $p->category->nama_kategori }}</td>
                                </tr>
                                <tr>
                                    <td>Wisata</td>
                                    <td>:</td>
                                    <td>{{ $p->nama_produk }}</td>
                                </tr>
                                <tr>
                                    <td>Harga Tiket Dewasa</td>
                                    <td>:</td>
                                    <td>Rp. {{ $p->harga }}</td>
                                </tr>
                                <tr>
                                    <td>Harga Tiket Anak-anak</td>
                                    <td>:</td>
                                    <td>Rp. {{ $p->harga_anak }}</td>
                                </tr>
                                <tr>
                                    <td>Gambar</td>
                                    <td>:</td>
                                    <td>
                                        <img src="{{ Storage::url('public/products/' . $p->gambar) }}" width="250px"
                                            height="100%" alt="" srcset="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deksripsi</td>
                                    <td>:</td>
                                    <td>{{ $p->isi }}</td>
                                </tr>
                                <tr>
                                    <td>Link Maps</td>
                                    <td>:</td>
                                    <td>{{ $p->link_maps }}</td>
                                </tr>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
                                <label for="">Kategori Wisata</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Wisata</label>
                                <input type="text" value="{{ old('nama_produk', $p->nama_produk) }}"
                                    class="form-control" name="nama_produk">
                            </div>
                            <div class="form-group">
                                <label for="">Harga Tiket Dewasa</label>
                                <input type="number" value="{{ old('harga', $p->harga) }}" class="form-control"
                                    name="harga" placeholder="Rp.">
                            </div>
                            <div class="form-group">
                                <label for="">Harga Tiket Anak-anak</label>
                                <input type="number" value="{{ old('harga_anak', $p->harga_anak) }}" class="form-control"
                                    name="harga_anak" placeholder="Rp.">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <input type="text" value="{{ old('isi', $p->isi) }}" class="form-control"
                                    name="isi" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" class="form-control" name="file_gambar">
                            </div>
                            <div class="form-group">
                                <label for="">Link Maps</label>
                                <input type="text" value="{{ old('link_maps', $p->link_maps) }}" class="form-control"
                                    name="link_maps">
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Type Product</label>
                                <select name="type_product" class="form-control" required>
                                    <option value="">--Pilih--</option>
                                    @foreach ($type as $tipe)
                                        @if ($p->type_product == $tipe)
                                            <option value="{{ $tipe }}" selected>{{ ucwords($tipe) }}
                                            </option>
                                        @else
                                            <option value="{{ $tipe }}">{{ ucwords($tipe) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> --}}
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
