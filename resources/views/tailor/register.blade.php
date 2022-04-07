<!DOCTYPE html>
<html>
<head>
    <title>TAILOR SHOP |TAILOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#"><h4>Tailor Shop | TAILOR</h4></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest

                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div> -->

        </div>
    </nav>

    <main class="login-form">
     <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                        <h3 class="card-header text-center">TAILOR REGISTER</h3>
                        <div class="card-body">

                        <form method="POST" action="{{route('tailor.create')}}" autocomplete="off" enctype="multipart/form-data">

                            @if ( Session::get('message'))
                                <div class="alert alert-success alert-dismissable">
                                    {{Session::get('success')  }}
                                </div>
                            @endif

                            @if ( Session::get('error'))
                                <div class="alert alert-danger">
                                    {{Session::get('fail')  }}
                                </div>
                            @endif

                        @csrf

                        <div class="row mb-3">
                            <label for="tailor_name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="tailor_name" type="text" placeholder="Enter full name" class="form-control @error('tailor_name') is-invalid @enderror" name="tailor_name" value="{{ old('tailor_name') }}" >
                                <span class="text-danger">@error('tailor_name'){{ $message}}@enderror</span>
                            </div>
                        </div>





                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Enter email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >
                                <span class="text-danger">@error('email'){{ $message}}@enderror</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="avator" class="col-md-4 col-form-label text-md-end">profile picture<br>
                        <span class="text-small text-info">*Not required</span>
                        </label>

                            <div class="col-md-6">
                                <input  type="file"  class="form-control @error('avator') is-invalid @enderror" name="avator" >

                                <span class="text-danger">@error('avator'){{ $message}}@enderror</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Phone number</label>

                            <div class="col-md-6">
                                <input id="phone" type="name" placeholder="Enter phone number"  class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" >
                                <span class="text-danger">@error('phone'){{ $message}}@enderror</span>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="name" placeholder="Enter location" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('email') }}" >
                                <span class="text-danger">@error('location'){{ $message}}@enderror</span>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                            <div class="col-md-6">
                                <textarea id="address"  placeholder="Enter full address of location" rows="3" class="form-control @error('address') is-invalid @enderror" name="address" >

                                </textarea>
                                <span class="text-danger">@error('location'){{ $message}}@enderror</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                                <span class="text-danger">@error('password'){{ $message}}@enderror</span>

                            </div>
                        </div>

                        <div class="row mb-3">
                     <label for="cpassword" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="confirm password"  type="password" class="form-control" name="cpassword" value="{{old('cpassword')}}">
                                <span class="text-danger">@error('cpassword'){{ $message}}@enderror</span>
                            </div>
                        </div>

                         <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                            <br>
                            <a href="{{route('tailor.login')}}">I already have an account, login now</a>

                            <br>
                            <a href="{{url('user/home')}}">Go to home page</a>

                            <br>
                            <a href="{{route('admin.login')}}">Admin login</a>

                         </div>
                         </form>

                       </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('admin/js/jquery.3.2.1.min.js') }}" defer></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>

<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>

</body>
</html>
