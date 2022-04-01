<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <style>
        a{
             text-decoration:none !important;
             color:black;
        }
    </style>
    <title>
        @yield('title')
    </title>
</head>
<body>
    @include('dashboard.user.inc.frontnav')
    @yield('content')
        </div>

<!-- Scripts -->
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}" ></script>
<script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>

@if(SESSION('status'))
<script>swal("{{session('status')}}");
</script>
@endif

@yield('scripts')
</body>
</html>
