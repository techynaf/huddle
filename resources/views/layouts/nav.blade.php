<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Image Logo -->
                <a href="index.html" class="logo">
                    <img src="/frontend/images/logo-sm.png" alt="" height="50" class="logo-small">
                    <img src="/frontend/images/logo.png" alt="" height="27" class="logo-large">
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">

                    <li class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                    
                    

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                    <img src="/frontend/images/users/avatar-1.jpg" alt="user" class="rounded-circle"><span class="font-16 text-dark">{{auth()->user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                            <!-- item-->
                            <a href="profile.html" class="dropdown-item notify-item">
                                <i class="ti-user m-r-5"></i> My Profile
                            </a>

                            <!-- item-->
                            <a href="login.html" class="dropdown-item notify-item">
                                <i class="ti-power-off m-r-5"></i> Logout
                            </a>

                        </div>
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu">
                        <a href="/"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                    </li>
                    @if(auth()->user()->role[0] == 'barista')
                        <li class="has-submenu">
                            <a href="/request"><i class="mdi mdi-invert-colors"></i> <span> Request Form </span> </a>
                        </li>
                    @elseif(auth()->user()->role[0]->name == 'manager' || auth()->user()->role[0]->name == 'super-admin')
                        <li class="has-submenu">
                            <a href="/request"><i class="mdi mdi-invert-colors"></i> <span> Leave Form </span> </a>
                            <ul class="submenu">
                                <li><a href="/view/requests">Show Requests</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="/create/employee"><i class="mdi mdi-texture"></i> <span> New Profile </span> </a>
                        </li>
                        <li class="has-submenu">
                            <a href="/schedule/view"><i class="mdi mdi-chart-donut-variant"></i> <span> Schedule </span> </a>
                            <ul class="submenu">
                                <li><a href="/schedule/create">Create Schedule</a></li>
                            </ul>
                        </li>
                    @else

                    @endif

                    {{-- <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-texture"></i><span> Other pages </span> </a>
                        <ul class="submenu">
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Registration</a></li>
                            <li><a href="recoverpw.html">Forget Password</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-view-list"></i> <span> Section 3 </span> </a>
                        <ul class="submenu">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-chart-donut-variant"></i><span> Section 4 </span> </a>
                        <ul class="submenu">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-google-pages"></i><span> Section 5 </span> </a>
                        <ul class="submenu">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-layers"></i><span> Section 6 </span> </a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->