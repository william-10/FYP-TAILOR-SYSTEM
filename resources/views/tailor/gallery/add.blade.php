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
                <h4> ADD PICTURE</h4>
                
                </div>

                      <div class="card-body">
            
                      <form action="{{ url('tailor/insert-picture') }}" method="POST" enctype="multipart/form-data">
               @csrf
             <div class="row">
                 <input type="hidden" name="tailor_id" value="{{Auth::user()->tailor_id}}">
                
                 
                 <div class="col-md-4">
                     <input type="file" class="form-control" name="image">
                 </div>

                 <div class="col-md-12">
                     <button type="submit" class="btn btn-primary">Submit</button>
                 </div>
             </div>

           </form>

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