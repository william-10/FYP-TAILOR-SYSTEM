 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                     <a class="navbar-brand" href="{{url('/admin/home')}}"> ADMIN</a>
                      
                        
                     
                          <div class="collapse navbar-collapse justify-content-end" id="navigation">
                         
                         <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="no-icon">Account</span>
                                </a>
                             </li>
                           
                             <li class="nav-item">
                        
                                 
                                    <a class="nav-link" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-power-off"></i>     Logout
                                    </a>
                                    
                                    
                                    <form id="logout-form" action="{{ route('admin.logout') }}"         method="POST" class="d-none">
                                        @csrf
                                    </form>
                             </li>
                         </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->