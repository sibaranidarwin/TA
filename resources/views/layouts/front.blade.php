<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('frontend/libraries/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/styles/main.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/libraries/xzoom/dist/xzoom.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/libraries/gijgo/css/gijgo.min.css') }}" />
</head>

<body>

    @include('_component_home.navbar')

    <!-- text center header -->
    <header class="text-center">
        <h1> Wisata Desa Trinsing</h1>
    </header>

    @yield('content')

    <!----- footer ----->
    @include('_component_home.footer')
    <script src="{{ asset('frontend/libraries/retina/retina.js') }}"></script>
    <script src="{{ asset('frontend/libraries/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/libraries/xzoom/dist/xzoom.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
    @stack('after-script')

</body>

</html>
