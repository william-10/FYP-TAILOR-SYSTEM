<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/all.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/home.css') }}" rel="stylesheet">
   

  


    
    <title>TAILOR SHOP | TAILOR PANEL</title>
</head>
<body>
        <div class="wrapper">
            @include('tailor.layouts.inc.sidebar')
            
            @include('tailor.layouts.inc.navbar')

            <div class="card">
    <div class="card-header">
    <h4> personal details</h4>
    <hr>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                
                    <th><h5>NAME</h5></th>
                    <th><h5>EMAIL</h5></th>
                    <th><h5>NUMBER</h5></th>
                    <th><h5>LOCATION</h5></th>
                    <th><h5>ADDRESS</h5></th>
                    <th><h5>ACTION</h5></th>
                    
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        
                    
                        <td>{{ Auth::user()->tailor_name }}</td>
                        <td>{{ Auth::user()->email }}</td>
                        <td>{{ Auth::user()->phone }}</td>
                        <td>{{ Auth::user()->location }}</td>
                        <td>{{ Auth::user()->address }}</td>
                        <td>
                            <a href="{{('edit-profile')}}" class="btn btn-primary">Edit</a>
                            

                        </td>
                    </tr>
                
            </tbody>
        </table>
    </div>
</div>

            
        </div>
        



    <script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}" ></script>
    <script src="{{ asset('admin/js/popper.min.js') }}" ></script>

    <script src="{{ asset('admin/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('admin/js/home.js') }}" ></script>

                
    @if(SESSION('status'))
<script>swal("{{session('status')}}");
</script>
@endif

@yield('scripts')

</body>
</html>