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
                <h4> PRODUCTS</h4>

                </div>

                      <div class="card-body">

                      <form action="{{url('tailor/insert-product')}}" method="POST" enctype="multipart/form-data">
               @csrf

             <div class="row">
                 <input type="hidden" name="tailor_id" value="{{Auth::user()->tailor_id}}">

                 <div class="col-md-6 mb-3">
                     <label for="">Name</label>
                     <input type="text" class="form-control" name="name">
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for="">Slug</label>
                     <input type="text" class="form-control" name="slug">
                 </div>

                 </div>
                <div class="com-md-12 mb-3">
                    <select class="form-select" name="category_id">
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
                     <label for="">Description</label>
                     <textarea class="form-control" rows="3" name="description"></textarea>
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for="">Original price</label>
                     <input type="number" class="form-control" name="original_price">
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for="">Selling price</label>
                     <input type="number" class="form-control" name="selling_price">
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for="">Quantity</label>
                     <input type="number" class="form-control" name="qty">
                 </div>

                <div class="row">
                 <div class="col-md-6 mb-3">
                     <label for="">Status</label>
                     <input type="checkbox"  name="status">
                 </div>

                 <div class="col-md-6 mb-3">
                     <label for="">Trending</label>
                     <input type="checkbox" name="trending">
                 </div>

                 <div class="col-md-4">
                     <input type="file" class="form-control" name="image">
                 </div></div>
                 </div>

                 <div class="col-md-4">
                     <button type="submit" class="btn btn-primary">Submit</button>
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
