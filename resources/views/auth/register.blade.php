@extends('layouts.auth')
@section('title')
    <title>Login</title>
@endsection
@section('content')
    <main class="login-container">
        <div class="container">
            <div class="row page-login d-flex align-items-center">
                <div class="section-left col-12 col-md-6">
                    {{-- <h1 class="mbb-4"> We explore the new <br /> life much better</h1> --}}
                    <img src="frontend/images/kaldera_login.png" alt="" class="w-75 d-none d-sm-flex">
                </div>
                <div class="section-right col-12 col-md-5 mt-5">
                    <div class="card">
                        <div class="card-body register-card-body">
                            <div class="text-center">
                                <img src="frontend/images/Logo_Kaldera.png" alt="" class="w-50">
                            </div>
                            <p class="login-box-msg">Silahkan Daftar Terlebih Dahulu</p>
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" autocomplete="off" name="name"
                                        placeholder="Full name">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="input-group mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="role1"
                                            value="wisatawan">
                                        <label class="form-check-label" for="inlineRadio1">Pengunjung</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="role" id="role2" value="umkm">
                                        <label class="form-check-label" for="inlineRadio2">Penjual</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" autocomplete="off" name="email"
                                        placeholder="Email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" autocomplete="off" name="password"
                                        placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Konfirmasi Password" autocomplete="off">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <label for="">Tanggal Lahir</label>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir">
                                </div>
                                <label for="">Jenis Kelamin</label>
                                <div class="input-group mb-3">
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fa fa-genderless"></span>
                                        </div>
                                    </div>
                                </div>
                                <label for="">Alamat</label>
                                <div class="input-group mb-3">
                                    <textarea name="alamat" class="form-control" id="" cols="10" rows="3"></textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                            <label for="agreeTerms">
                                                I agree to the <a href="#" style="color: #071c4d">terms</a>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-danger text-black font-weight-bold btn-block">Sign Up</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
            
                            <a href="{{ route('login') }}" class="text-center" style="color: #071c4d">Sudah Punya Akun</a>
                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->
            
                </div>
            </div>
        </div>

    </main>
@endsection
