<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TAILOR TAILOR SHOP</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

       

    <!-- CSS Files -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/light-bootstrap-dashboard.css?v=2.0.0 ') }}" rel="stylesheet">
    
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/all.min.css') }}" rel="stylesheet">







</head>
<body>

<div class="wrapper">

    @include('tailor.layouts.inc.sidebar')

    <div class="main-panel">

         @include('tailor.layouts.inc.adminnav')
        
         <div class="content">
             @yield('content')
         </div>

         @include('tailor.layouts.inc.adminfooter')
    </div>

</div> 


<script src="{{ asset('admin/js/jquery.3.2.1.min.js') }}" defer></script>
<script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>

@if(SESSION('status'))
<script>swal("{{session('status')}}");
</script>
@endif

@yield('scripts')
</body>
</html>
