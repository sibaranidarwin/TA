@extends('layouts.auth')
@section('title')
    <title>Login</title>
@endsection
@section('content')
    <main class="login-container">
        <div class="container">
            <div class="row page-login d-flex align-items-center">
                <div class="section-left col-12 col-md-6">
                    <h1 class="mbb-4"> We explore the new <br /> life much better</h1>
                    <img src="frontend/images/login-images.png" alt="" class="w-75 d-none d-sm-flex">
                </div>
                <div class="section-right col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="frontend/images/logo.png" alt="" class="w-50 mb-4">
                            </div>
                            <form method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div> <br>
                                <button type="submit" class="btn btn-login btn-block font-weight-bold">Sign in</button>
                                <a href="{{ route('register') }}"
                                    class="btn btn-danger text-white font-weight-bold btn-block">Sign Up</a>
                                <p class="text-center mt-4">
                                    <a href="{{ route('password.request') }}"> Saya lupa password</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
