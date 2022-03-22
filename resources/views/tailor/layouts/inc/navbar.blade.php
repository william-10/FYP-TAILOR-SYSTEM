  <!-- Page Content  -->
  <div id="content">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>Toggle </span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
               
                <li class="nav-item">
                    <a class="nav-link" href="#"><strong>{{ Auth::user()->tailor_name }}</strong></a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{url('/')}}">Homepage</a>
                </li>
                
                <li class="nav-item">
            
                     
                        <a class="btn btn-danger" href="{{ route('tailor.logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i>     Logout
                        </a>
                        
                        
                        <form id="logout-form" action="{{ route('tailor.logout') }}"         method="POST" class="d-none">
                            @csrf
                        </form>
                 </li>
            </ul>
        </div>
    </div>
</nav>
