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
                <h4> EDIT PRODUCTS</h4>

                </div>

                      <div class="card-body">

                      <form action="{{url('tailor/update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')

             <div class="row">


                 <div class="col-md-6 mb-3">
                     <label for=""><strong>Name</strong></label>
                     <input type="text" class="form-control"  value="{{$product->name}}" name="name">
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for=""><strong>Slug</strong></label>
                     <input type="text" class="form-control" value="{{$product->slug}}" name="slug">
                 </div>
                 
                <div class="com-md-12 mb-3">
                    <select class="form-select" name="category_id" ">
                        <option value="">select a category</option>
                        @foreach ($category as $item )
                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="com-md-12 mb-3">
                    <select class="form-select" name="gender_id">
                        <option value="">select a gender</option>
                        @foreach ($gender as $item )
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-12 mb-3">
                     <label for=""> <strong>Description </strong></label>
                     <textarea class="form-control" rows="4" value="{{ $product->description}}" name="description"></textarea>
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for=""><strong>Original Price </strong></label>
                     <input type="number" class="form-control" name="original_price"              value="{{$product->original_price}}">
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for=""><strong>Selling Price </strong></label>
                     <input type="number" value="{{$product->selling_price}}" class="form-control" name="selling_price">
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for=""><strong>Quantity </strong></label>
                     <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
                 </div>

                <div class="row">
                 <div class="col-md-6 mb-3">
                     <label for=""><strong>Status </strong></label>
                     <input type="checkbox"  name="status" value="{{$product->status}}">
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for=""><strong>Trending </strong></label>
                     <input type="checkbox" name="trending" value="{{$product->trending}}">
                 </div>


                 <div class="row">
                 <div class="col-md-6 mb-3">
                     <label for=""><strong>Upper part </strong></label>
                     <input type="checkbox"  name="upper_part" value="{{$product->upper_part}}">
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for=""><strong>Lower part </strong></label>
                     <input type="checkbox" name="lower_part" value="{{$product->lower_part}}">
                 </div>

                 <div class="col-md-4">
                     <input type="file" class="form-control" name="image">
                 </div></div>
                 </div>

                 <div class="col-md-4">
                     <button type="submit" class="btn btn-primary">Update</button>
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
