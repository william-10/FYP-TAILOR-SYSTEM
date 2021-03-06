<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <meta name="csrf-token" content="{{ csrf_token() }}">


     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- <script src="https://use.fontawesome.com/ff4050828e.js"></script> -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/fontawesome.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('frontend/css/fontawsome4.7.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('frontend/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
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
<script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}" ></script>
<script src="{{ asset('admin/js/popper.min.js') }}" ></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}" ></script>
<script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>
<script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
<!-- <script src="{{ asset('frontend/js/custom.owl.js') }}"></script> -->

@yield('scripts')

@if(SESSION('status'))
<script>
swal("{{session('status')}}");
</script>
@endif

<script>
  $( function() {
    var availableTags = [];
    $.ajax({
        type: "GET",
        url: "/user/search-tailor",
        success: function (response) {
                // console.log(response);
                searchAutoComplete(response);
        }
    });
    function searchAutoComplete(availableTags) {
        $( "#search_tailor" ).autocomplete({
        source: availableTags
    });

    }


  } );
  </script>

</body>
</html>

