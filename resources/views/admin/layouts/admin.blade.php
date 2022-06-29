<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ADMIN- TAILOR SHOP</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />



    <!-- CSS Files -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/light-bootstrap-dashboard.css?v=2.0.0 ') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/toastr.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/servicebox.css') }}" rel="stylesheet">







</head>
<body>

<div class="wrapper">

    @include('admin.layouts.inc.sidebar')

    <div class="main-panel">

         @include('admin.layouts.inc.adminnav')

         <div class="content">
             @yield('content')
         </div>

         @include('admin.layouts.inc.adminfooter')
    </div>

</div>


<script src="{{ asset('admin/js/jquery.3.2.1.min.js') }}" ></script>
<script src="{{ asset('admin/js/popper.min.js') }}" ></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}" ></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ asset('admin/js/toastr.min.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

@if(SESSION('status'))
<script>swal("{{session('status')}}");
</script>
@endif

<script>
  @if(Session::has('message'))

  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");

  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>


@yield('scripts')
</body>
</html>
