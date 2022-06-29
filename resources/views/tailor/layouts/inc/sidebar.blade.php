 <!-- Sidebar  -->
 <nav id="sidebar">
     <div class="sidebar-header">
         <a href="{{url('tailor/home')}}"><img src="{{asset('assets/uploads/gallery/tailor_logo.jpg')}}" width="16%"
                 alt="img here"></a>
     </div>

     <ul class="list-unstyled components">
         <h4 class="bg bg-success">ONLINE</h4>
         <li>
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
         <li class="nav-item {{Request::is('tailor/details') ? 'active':''}}">

             <a href="{{('details')}}">PERSONAL DETAILS</a>
         </li>

         <!-- <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">PRODUCTS</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">

                        <li class="nav-item {{Request::is('tailor/view-product') ? 'active':''}}">
                            <a href="{{ ('view-product' )}}">VIEW PRODUCTS</a>
                        </li>

                        <li class="nav-item {{Request::is('tailor/add-product') ? 'active':''}}">
                            <a href="{{ ('add-product' )}}">ADD PRODUCT</a>
                        </li>

                    </ul>

                </li> -->

         <!--
                <li class="nav-item {{Request::is('tailor/orders') ? 'active':''}}">
                    <a href="{{('orders')}}">ORDERS</a>
                </li> -->


         <li>
             <a href="#pagemap" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">MAPS</a>
             <ul class="collapse list-unstyled" id="pagemap">

                 <li class="nav-item {{Request::is('tailor/list-map') ? 'active':''}}">
                     <a href="{{'list-map'}}">VIEW MAP</a>
                 </li>

                 <li class="nav-item {{Request::is('tailor/add-map') ? 'active':''}}">
                     <a href="{{ ('add-map' )}}">CREATE</a>
                 </li>

             </ul>

         </li>
         <!-- <li >
                    <a href="#homesubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">STAFFS</a>
                    <ul class="collapse list-unstyled" id="homesubmenu2">
                        <li class="nav-item ">
                            <a href="">ADD STAFF</a>
                        </li>
                        <li class="nav-item">
                            <a href="">VIEW STAFFS</a>
                        </li>
                    </ul>

                </li> -->


         <li>
             <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false"
                 class="dropdown-toggle">MEASUREMENT</a>
             <ul class="collapse list-unstyled" id="pageSubmenu2">

                 <li class="nav-item">
                     <a href="">VIEW MEASUREMENT</a>
                 </li>

                 <li class="nav-item">
                     <a href="">ADD MEASUREMENT</a>
                 </li>
             </ul>

         </li>

         <li>
             <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">SEWING
                 CATEGORIES</a>
             <ul class="collapse list-unstyled" id="pageSubmenu6">

                 <li class="nav-item {{Request::is('tailor/view-categories') ? 'active':''}}">
                     <a href="{{url('tailor/view-categories')}}">VIEW CATEGORIES</a>
                 </li>

                 <li class="nav-item {{Request::is('tailor/add-categories') ? 'active':''}}">
                     <a href="{{url('tailor/add-categories')}}">ADD CATEGORY</a>
                 </li>

             </ul>

         </li>


         <li>
             <a href="#homesubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">ORDERS</a>
             <ul class="collapse list-unstyled" id="homesubmenu3">
                 <li class="nav-item {{Request::is('tailor/create-order') ? 'active':''}}">
                     <a href="{{('create-order')}}">ADD ORDER</a>
                 </li>
                 <li class="nav-item {{Request::is('tailor/orders') ? 'active':''}}">
                     <a href="{{('orders')}}">VIEW ORDERS</a>
                 </li>
                 <li class="nav-item {{Request::is('tailor/view-requests') ? 'active':''}}">
                     <a href="{{('view-requests')}}">REQUESTS</a>
                 </li>
             </ul>

         </li>

         <li class="nav-item {{Request::is('tailor/reports') ? 'active':''}}">

             <a href="{{url('tailor/reports')}}">REPORT</a>
         </li>



     </ul>





 </nav>
