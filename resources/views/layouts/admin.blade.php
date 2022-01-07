<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    @include('includes.style')

    <!-- Google Font: Source Sans Pro -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('includes.navbar')

        @include('includes.sidebar')
        @yield('content')

        @include('includes.footer')
    </div>

    @include('includes.script')
</body>

</html>
