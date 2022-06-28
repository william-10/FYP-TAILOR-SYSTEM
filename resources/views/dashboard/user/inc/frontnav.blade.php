<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand " href="{{ url('/user/home') }}">
                <img src="{{asset('assets/uploads/gallery/tailor_logo.jpg')}}" width="16%" alt="img here">
            </a>

            <div class="search-bar ">
                <form action="{{url('user/searchtailor_details')}}" method="POST">
                    @csrf
                        <div class="input-group mb-1">
                            <input type="search" id="search_tailor" name="tailor_search" class="form-control" placeholder="Search..." aria-describedby="basic-addon2">
                            <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                        </div>
                </form>


            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{url('user/home')}}" class="nav-link">Tailors</a>

                    </li>
                    <!-- <li class="nav-item">
                        <a href="{{url('user/home/products')}}" class="nav-link">Products</a>

                    </li> -->
                    <!-- <li class="nav-item">
                        <a href="{{url('/user/cart')}}" class="nav-link">Cart
                            <span class="badge badge-pill bg-success cart-count">0</span>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a href="{{url('/user/wishlist')}}" class="nav-link">Wishlist
                        <span class="badge badge-pill bg-primary wishlist-count">0</span>
                        </a>

                    </li> -->

                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('user.login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tailor.login') }}">Login</a>
                    </li>
                    @endif

                    @if (Route::has('user.register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <li>
                                <a href="{{url('/user/profile')}}" class="dropdown-item">
                                    Profile
                                </a>

                            </li>

                            <li>
                                <a href="{{url('/user/my-orders')}}" class="dropdown-item">
                                    My Notification
                                </a>

                            </li>


                            <li>
                                <a class="dropdown-item" href="{{ route('user.logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                    Logout</a>



                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
