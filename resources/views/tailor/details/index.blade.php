<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/home.css') }}" rel="stylesheet">






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

        <div id="mymodal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{('update-details')}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-header">
                            <h4 class="modal-title">Edit profile</h4>
                            <button class="close" type="button" data-bs-dismiss="modal">&times</button>

                        </div>
                        <div class="modal-body">


                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tailor_name">NAME</label>
                                    <input type="text" value="{{Auth::user()->tailor_name}}" class="form-control"
                                        name="tailor_name">
                                </div>




                                <div class="col-md-6 mb-3">
                                    <label for="phone">PHONE NUMBER</label>
                                    <input type="text" value="{{Auth::user()->phone}}" class="form-control"
                                        name="phone">
                                </div>

                                <div class="col-md-6 mb-3">
                                <label for="phone">REGION</label>
                                    <select class="form-select" name="name">
                                        <option value="">{{Auth::user()->region}}</option>
                                        @foreach ($region as $item )
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                <label for="phone">CITY</label>
                                    <select class="form-select" name="city_name">
                                        <option value="">{{Auth::user()->city}}</option>
                                        @foreach ($city as $item )
                                        <option value="{{$item->city_name}}">{{$item->city_name}}</option>
                                        @endforeach

                                    </select>
                                </div>






                                <div class="col-md-6 mb-3">
                                    <label for="address">ADDRESS</label>
                                    <textarea id="address" value="{{Auth::user()->address}}" class="form-control"
                                        rows="3" name="address"> </textarea>
                                </div>


                            </div>



                                <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password">
                                        <span class="text-danger">@error('password'){{ $message}}@enderror</span>

                                    </div>
                                </div>






                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary float-start">Update</button>

                            <button type="button" class="btn btn-danger  " data-bs-dismiss="modal"><i class="fas fa-window-close"></i></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h4> personal details</h4>


                @php
                        $ratenum=number_format($rating_value)
                        @endphp
                        <div class="rating float-end">
                            @for ($i=1; $i<= $ratenum; $i++) <i class="fa fa-star checked"></i>
                                @endfor
                                @for ($j=$ratenum+1; $j<=5; $j++) <i class="fa fa-star"></i>
                                    @endfor

                                    <span>
                                        @if ($ratings->count() > 0)
                                        {{$ratings->count()}} Ratings

                                        @else
                                        No ratings
                                        @endif
                                    </span>


                        </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>
                                <h5>NAME</h5>
                            </th>
                            <th>
                                <h5>EMAIL</h5>
                            </th>
                            <th>
                                <h5>NUMBER</h5>
                            </th>
                            <th>
                                <h5>REGION</h5>
                            </th>
                            <th>
                                <h5>city</h5>
                            </th>
                            <th>
                                <h5>ADDRESS</h5>
                            </th>
                            <th>
                                <h5>ACTION</h5>
                            </th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>


                            <td>{{ Auth::user()->tailor_name }}</td>
                            <td>{{ Auth::user()->email }}</td>
                            <td>{{ Auth::user()->phone }}</td>
                            <td>{{ Auth::user()->region }}</td>
                            <td>{{ Auth::user()->city }}</td>
                            <td>{{ Auth::user()->address }}</td>
                            <td>
                                <!-- <a href="{{('edit-profile')}}" class="btn btn-primary">Edit</a> -->


                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#mymodal">Edit Profile</button>


                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


    </div>




    <script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>

    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('admin/js/home.js') }}"></script>


    @if(SESSION('status'))
    <script>
    swal("{{session('status')}}");
    </script>
    @endif



       <!-- <script>

           $(document).ready(function(){
            $('select[name="country"]').on('change',function(){
                var country_id= $(this).val();
                if (country_id) {
                 $.ajax({
                    url: "{{url('/getStates/')}}/"+country_id,
                  type: "GET",
                  dataType: "json",
                  success: function(data){
                    console.log(data);
                    $('select[name="state"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                    });
                  }
                 });
                }else {
                     $('select[name="state"]').empty();
               }
           });
             $('select[name="state"]').on('change',function(){
                var state_id= $(this).val();
                if (state_id) {
                 $.ajax({
                    url: "{{url('/getCities/')}}/"+state_id,
                  type: "GET",
                  dataType: "json",
                  success: function(data){
                    console.log(data);
                    $('select[name="city"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
                    });
                  }
                 });
                }else {
                     $('select[name="city"]').empty();
               }
           });
           });


</script> -->


</body>

</html>
