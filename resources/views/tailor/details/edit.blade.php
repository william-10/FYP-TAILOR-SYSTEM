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

          <div class="card">
    <div class="card-header">
    <h4> EDIT DETAILS</h4>
    </div>

    <div class="card-body">
           <form action="{{('update-details')}}" method="POST">
               @csrf
               @method('PUT')

             <div class="row">
                 <div class="col-md-6 mb-3">
                     <label for="tailor_name">NAME</label>
                     <input type="text" value="{{Auth::user()->tailor_name}}" class="form-control" name="tailor_name">
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for="phone">PHONE NUMBER</label>
                     <input type="text" value="{{Auth::user()->phone}}" class="form-control" name="phone">
                 </div>





                 <div class="col-md-6 mb-3">
                     <label for="address">ADDRESS</label>
                     <textarea id="address" value="{{Auth::user()->address}}" class="form-control" rows="3" name="address"> </textarea>
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for="password">Password</label>
                     <input type="text" class="form-control" name="password"> </input>
                 </div>




                 <div class="col-md-12">
                     <button type="submit" class="btn btn-primary">Update</button>
                 </div>
             </div>

           </form>
    </div>
</div>



         </div>
         </div>



    <script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}" ></script>
    <script src="{{ asset('admin/js/popper.min.js') }}" ></script>

    <script src="{{ asset('admin/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('admin/js/home.js') }}" ></script>

</body>
</html>
