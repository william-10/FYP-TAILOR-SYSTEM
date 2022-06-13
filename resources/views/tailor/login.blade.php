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
            <a class="navbar-brand mr-auto" href="{{url('/user/home')}}">
            <img src="{{asset('assets/uploads/gallery/tailor_logo.jpg')}}" width="16%" alt="img here">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto">

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('user.register') }}">
                                        <strong>{{ __('Register') }} </strong></a>
                                </li>

                </ul>
            </div>
        </div>
    </nav>


    <main class="login-form">
     <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">LOGIN</h3>
                    <div class="card-body">
                        <form method="POST" action="{{route('tailor.check')}}" autocomplete="off">

                        @if ( Session::get('success'))
                                <div class="alert alert-success alert-dismissable">
                                    {{Session::get('success')  }}
                                </div>
                            @endif

                        @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{Session::get('fail')  }}
                                </div>
                            @endif
                            @csrf
                            <div class="form-group mb-3">
                            <label for="email" class="form-group"><strong>Email</strong></label>
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" value="{{ old('email')}}">
                                <span class="text-danger">@error('email'){{ $message}}@enderror</span>

                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-group"><strong>Password</strong></label>
                            <input type="password" placeholder="Password" id="password" class="form-control" name="password">
                            <span class="text-danger">@error('password'){{ $message}}@enderror</span>
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Log in</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



</body>
</html>
