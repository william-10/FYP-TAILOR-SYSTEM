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

                        <li class="nav-item {{Request::is('tailor/avator') ? 'active':''}}">
                            <a href="{{ 'avator' }}">UPDATE AVATOR</a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item {{Request::is('tailor/details') ? 'active':''}}" >

                    <a  href="{{('details')}}">PERSONAL DETAILS</a>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">PRODUCTS</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">

                        <li class="nav-item {{Request::is('tailor/view-product') ? 'active':''}}">
                            <a href="{{ ('view-product' )}}">VIEW PRODUCTS</a>
                        </li>

                        <li class="nav-item {{Request::is('tailor/add-product') ? 'active':''}}">
                            <a href="{{ ('add-product' )}}">ADD PRODUCT</a>
                        </li>

                    </ul>

                </li>


                <li class="nav-item {{Request::is('tailor/orders') ? 'active':''}}">
                    <a href="{{('orders')}}">ORDERS</a>
                </li>


                <li >
                    <a href="#">Contact</a>
                </li>
            </ul>

        </nav>
