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



            <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>

                <th><h5> NAME</h5></th>
                <th><h5> DETAIL</h5></th>
             <th><h5> GENDER</h5></th>
                <th><h5> CATEGORY</h5></th>
                <th><h5> O.PRICE</h5></th>
                <th><h5> S.PRICE</h5></th>
                <th><h5> QUANTITY</h5></th>
                <th><h5> IMAGE</h5></th>
                <th><h5>ACTION</h5></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($product as $item )

               <tr>
                   <td>{{$item->name}}</td>
                   <td>{{$item->description}}</td>
                <td>{{$item->genders->name}}</td>
                   <td>{{$item->categories->category_name}}</td>
                   <td>{{$item->original_price}}</td>
                   <td>{{$item->selling_price}}</td>
                   <td>{{$item->qty}}</td>

                    <td class="w-35">
                        <img src="{{asset('assets/uploads/product/'.$item->image)}}" class="img-fluid img-thumbnail"  alt="image here" >
                    </td>

                    <td>
                        <a href="{{('edit-product/'.$item->id)}}" class="btn btn-primary" >Edit</a>

                        <a href="{{('delete-product/'.$item->id)}}" class="btn btn-danger" onclick="return confirm('are you sure you want to delete the product?')" >  Delete</a>

                     </td>
                 </tr>
                @endforeach
               </tbody>
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
