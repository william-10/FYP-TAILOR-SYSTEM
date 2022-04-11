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

        <div id="mymodal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Edit profile</h4>
                        <button class="close" type="button" data-bs-dismiss="modal">&times</button>

                    </div>
                    <div class="modal-body">
                        <form action="{{('update-details')}}" method="POST">
                            @csrf
                            @method('PUT')

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
                                    <label for="location">LOCATION</label>
                                    <input type="text" value="{{Auth::user()->location}}" class="form-control"
                                        name="location">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="address">ADDRESS</label>
                                    <textarea id="address" value="{{Auth::user()->address}}" class="form-control"
                                        rows="3" name="address"> </textarea>
                                </div>


                            </div>

                        </form>


                    </div>
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary float-start">Update</button>

                            <button type="button" class="btn btn-secondary  "
                                    data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h4> personal details</h4>
                <hr>
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
                                <h5>LOCATION</h5>
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
                            <td>{{ Auth::user()->location }}</td>
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

    @yield('scripts')

</body>

</html>
