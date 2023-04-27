@extends('layouts.admin')
@section('title')
    <title>Dashboard Users</title>
@endsection
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    {{-- <div class="col-sm-6">
                        <h1>Data Users</h1>
                    </div> --}}
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                        <h3 class="card-title">Data Users</h3>
                        <div class="float-right"> --}}
                            <!-- Button trigger modal -->
                            {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModalLong">
                                <i class="fa fa-plus-circle"></i>
                                Tambah Data
                            </button> --}}
                        {{-- </div>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-row-bordered gy-5 gs-7">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm">{{ $item->role }}</button>
                                            </td>

                                            <td>
                                                <form action="{{ route('userr.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#edit-user{{ $item->id }}"><i
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
    <!-- Edit Modal -->
    @foreach ($users as $p)
        <div class="modal fade" id="edit-user{{ $p->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">EDIT USER</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('userr.update', $p->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" value="{{ $p->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" value="{{ $p->email }}" name="email"
                                    placeholder="Rp.">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
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
});
</script>
@endsection
