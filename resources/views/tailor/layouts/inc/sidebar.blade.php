 <!-- Sidebar  -->
<nav id="sidebar">
            <div class="sidebar-header">
                <h3>TAILOR SHOP</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li >
                    <a href="#homesubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">GALLERY</a>
                    <ul class="collapse list-unstyled" id="homesubmenu">
                        <li class="nav-item {{Request::is('tailor/add-picture') ? 'active':''}}">
                            <a href="{{('add-picture')}}">ADD PICTURE</a>
                        </li>
                        <li class="nav-item {{Request::is('tailor/view-gallery') ? 'active':''}}">
                            <a href="{{('view-gallery')}}">VIEW GALLERY</a>
                        </li>
                      
                    </ul>
                </li>
                <li class="nav-item {{Request::is('tailor/details') ? 'active':''}}" >
                    
                    <a  href="{{('details')}}">PERSONAL DETAILS</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

        </nav>
