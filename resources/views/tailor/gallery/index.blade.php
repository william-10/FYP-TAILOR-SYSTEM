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
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">





    <title>TAILOR SHOP | TAILOR PANEL</title>
</head>
<body>
        <div class="wrapper">
            @include('tailor.layouts.inc.sidebar')

            @include('tailor.layouts.inc.navbar')

            @if ( Session::get('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')  }}
                                </div>
                            @endif

            <div class="card">





    <div class="card-body">
            <table class="table table-bordered ">
            <thead>
                <tr>

                    <th><h5>GALLERY</h5></th>
                    <th><h5>ACTION</h5></th>
                </tr>
                </thead>
                <tbody>



               @foreach ($gallery as $picture )
               <tr>
                    <td class="w-25">

                    <img src="{{asset('storage/gallery/'.$picture->image)}} " class="img-fluid img-thumbnail"  alt="image here" >
                    </td>

                    <td>

                            <a href="{{ url('tailor/delete-picture/'.$picture->id)}}" class="btn btn-danger" onclick="return confirm('are you sure you want to delete the picture?')" >  Delete</a>

                        </td>
                        </tr>
               @endforeach
               </tbody>
</table>
{!! $gallery->links() !!}
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
