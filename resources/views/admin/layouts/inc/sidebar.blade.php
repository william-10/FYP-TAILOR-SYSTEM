<div class="sidebar"  data-color="blue">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">

                       <h3>TAILOR SHOP</h3>


                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item {{Request::is('admin/home') ? 'active':''}}">
                        <a class="nav-link" href="{{'/admin/home'}}">
                            <i class="fa fa-home fa-fw" aria-hidden="true"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item {{Request::is('admin/categories') ? 'active':''}}">
                        <a class="nav-link" href="{{'categories'}}">
                            <i class="fa fa-list-alt"></i>
                            <p>CATEGORY</p>
                        </a>
                    </li>

                    <li class="nav-item {{Request::is('admin/add-categories') ? 'active':''}}"  >
                        <a class="nav-link" href="{{'add-categories'}}">
                            <i class="fas fa-plus-circle"></i>
                            <p>ADD CATEGORY</p>
                        </a>
                    </li>

                    <li class="nav-item {{Request::is('admin/gender') ? 'active':''}}">
                        <a class="nav-link" href="{{'gender'}}">
                            <i class="fa fa-list-alt"></i>
                            <p>GENDERS</p>
                        </a>
                    </li>

                    <li class="nav-item {{Request::is('admin/add-gender') ? 'active':''}}"  >
                        <a class="nav-link" href="{{'add-gender'}}">
                            <i class="fas fa-plus-circle"></i>
                            <p>ADD GENDER</p>
                        </a>
                    </li>

                   <li class="nav-item {{Request::is('admin/measurement') ? 'active':''}}">
                        <a class="nav-link" href="{{'measurement'}}">
                            <i class="far fa-user"></i>
                            <p>MEASUREMENT GUIDE</p></a>
                    </li>

                   <li class="nav-item {{Request::is('admin/add-measurement') ? 'active':''}}">
                        <a class="nav-link" href="{{'add-measurement'}}">
                            <i class="far fa-user"></i>
                            <p>CREATE MEASUREMENT</p>
                        </a>
                    </li>

                    <li class="nav-item {{Request::is('admin/view_tailors') ? 'active':''}}">
                        <a class="nav-link" href="{{'view_tailors'}}">
                            <i class="fas fa-users"></i>
                            <p>TAILOR MANAGEMENT</p>
                        </a>
                    </li>


                   <li class="nav-item {{Request::is('admin/view_customers') ? 'active':''}}">
                        <a class="nav-link" href="{{'view_customers'}}">
                            <i class="far fa-user"></i>
                            <p>USER MANAGEMENT</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
