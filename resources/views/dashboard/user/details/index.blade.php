@extends('dashboard.user.inc.front')

@section('title')
{{ Auth::user()->name }} details
@endsection

@section('content')
@if ( Session::get('success'))
<div class="alert alert-success">
    {{Session::get('success')  }}
</div>
@endif

<div id="mymodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{url('user/update-userdetails')}}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h4 class="modal-title">Edit profile</h4>
                    <button class="close" type="button" data-bs-dismiss="modal">&times</button>

                </div>

                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label text-md-end">{{ __('name') }}</label>
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ Auth::user()->name }}">
                            <span class="text-danger"> @error('name'){{  $message  }}@enderror</span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label text-md-end">{{ __('lname') }}</label>


                            <input id="lname" type="lname" class="form-control @error('lname') is-invalid @enderror"
                                name="lname" value="{{ Auth::user()->lname }}">
                            <span class="text-danger"> @error('lname'){{  $message  }}@enderror</span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}">
                            <span class="text-danger"> @error('email'){{  $message  }}@enderror</span>






                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone</label>

                            <div class="col-md-12">
                                <input id="phone" type="text"
                                    class="form-control @error('password') is-invalid @enderror" name="phone"
                                    value="{{ Auth::user()->phone }}">
                                <span class="text-danger">@error('phone'){{ $message}}@enderror</span>

                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}">
                                <span class="text-danger">@error('password'){{ $message}}@enderror</span>

                            </div>
                        </div>


                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary float-start">Update</button>

                    <button type="button" class="btn btn-danger  " data-bs-dismiss="modal"><i
                            class="fas fa-window-close"></i></button>
                </div>

            </form>

        </div>
    </div>
</div>

<div class="py-3 mb-4 shadow-sm bg-primary border-top ">

</div>
<div class="card">
    <div class="card-body">

        <h4>PERSONAL DETAILS

            <button type="button" class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#mymodal">Edit
                Profile</button>

            <hr>

            <label for=""><strong> First Name</strong></label>
            <div class="border">{{auth()->user()->name}}</div>

            <label for=""><strong>Last Name</strong></label>
            <div class="border">{{auth()->user()->lname}}</div>
            <label for=""><strong>Email</strong></label>
            <div class="border">{{auth()->user()->email}}</div>

            <label for=""><strong>Phone Number</strong></label>
            <div class="border">{{auth()->user()->phone}}</div>



    </div>
</div>



@endsection
