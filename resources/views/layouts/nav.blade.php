<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                    <!-- Image Logo -->
                    <a href="/" class="logo">
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
                        <a href="/dashboard"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                    </li>
                    @if(auth()->user()->roles->first()->name == 'barista')
                    <li class="has-submenu">
                            <a href="/request"><i class="mdi mdi-invert-colors"></i> <span> Leave Form </span> </a>
                            <ul class="submenu">
                                <li><a href="/create/weekly">Select Weekly Day Offs</a></li>
                                <li><a href="/edit/weekly">Edit Weekly Day Offs</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="/logout"><i class="fas fa-power-off"></i> <span> Logout </span> </a>
                        </li>
                    @elseif(auth()->user()->roles->first()->name == 'manager' || auth()->user()->roles->first()->name == 'super-admin')
                        <li class="has-submenu">
                            <a href="/request"><i class="mdi mdi-invert-colors"></i> <span> Leave Form </span> </a>
                            <ul class="submenu">
                                <li><a href="/create/weekly">Select Weekly Day Offs</a></li>
                                <li><a href="/edit/weekly">Edit Weekly Day Offs</a></li>
                                <li><a href="/view/requests">Show Requests</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="/scheduler"><i class="mdi mdi-chart-donut-variant"></i> <span> Schedule </span> </a>
                        </li>
                        @if(auth()->user()->roles->first()->name != 'manager')
                            <li class="has-submenu">
                                <a href="/create/employee"><i class="mdi mdi-view-list"></i> <span> Employee </span> </a>
                            </li>
                        @endif
                        <li class="has-submenu">
                            <a href="/logout"><i class="fas fa-power-off"></i> <span> Logout </span> </a>
                        </li>
                    @else
                        <li class="has-submenu">
                        </li>
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