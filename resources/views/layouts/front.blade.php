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
    <link rel="stylesheet" href="{{ asset('frontend/styles/font-awesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Assistant:200,400,700&&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/libraries/xzoom/dist/xzoom.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/libraries/gijgo/css/gijgo.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/styles/footer.css') }}">

    <link rel="stylesheet" href="{{ asset('pelanggan/assets/css/owl-carousel.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/styles/templatemo-breezed.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/styles/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
   
</head>

<body>

    @include('_component_home.navbar')

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

     <!-- Plugins -->
     <script src="{{ asset('pelanggan/assets/js/owl-carousel.js') }}"></script>
     <script src="{{ asset('pelanggan/assets/js/scrollreveal.min.js') }}"></script>
     <script src="{{ asset('pelanggan/assets/js/waypoints.min.js') }}"></script>
     <script src="{{ asset('pelanggan/assets/js/jquery.counterup.min.js') }}"></script>
     <script src="{{ asset('pelanggan/assets/js/imgfix.min.js') }}"></script> 
     <script src="{{ asset('pelanggan/assets/js/slick.js') }}"></script> 
     <script src="{{ asset('pelanggan/assets/js/lightbox.js') }}"></script> 
     <script src="{{ asset('pelanggan/assets/js/isotope.js') }}"></script> 
     
     <!-- Global Init -->
     <script src="{{ asset('pelanggan/assets/js/custom.js') }}"></script>
 
     <script>
 
         $(function() {
             var selectedClass = "";
             $("p").click(function(){
             selectedClass = $(this).attr("data-rel");
             $("#portfolio").fadeTo(50, 0.1);
                 $("#portfolio div").not("."+selectedClass).fadeOut();
             setTimeout(function() {
               $("."+selectedClass).fadeIn();
               $("#portfolio").fadeTo(50, 1);
             }, 500);
                 
             });
         });
 
     </script>

</body>

</html>
