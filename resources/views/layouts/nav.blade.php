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
                    @elseif(auth()->user()->roles->first()->name == 'manager' || auth()->user()->roles->first()->name == 'super-admin' || auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'assistant-manager')
                        <li class="has-submenu">

                            @if ($notification[0] == true || $notification[1] == true)
                                <a href="/request" class="text-danger"><i class="mdi mdi-invert-colors text-danger"></i> <span> Leave Form </span> </a>
                            @else
                                <a href="/request"><i class="mdi mdi-invert-colors"></i> <span> Leave Form </span> </a>
                            @endif

                            <ul class="submenu">
                                <li><a href="/create/weekly">Select Weekly Day Offs</a></li>
                                <li><a href="/edit/weekly">Edit Weekly Day Offs</a></li>
                                
                                @if ($notification[0] == true)
                                    <li class="text-danger"><a href="/view/requests" class="text-danger">Leave Requests</a></li>
                                @else
                                    <li><a href="/view/requests">Leave Requests</a></li>
                                @endif

                                @if ($notification[1] == true)
                                    <li class="text-danger"><a href="/show/weekly" class="text-danger">Day-off Requests</a></li>
                                @else
                                    <li><a href="/show/weekly">Day-off Requests</a></li>
                                @endif
                            </ul>
                        </li>
                        
                        <li class="has-submenu">
                            @if ($notification[2] || $notification[3])
                                <a href="/scheduler" class="text-danger"><i class="mdi mdi-chart-donut-variant"></i> <span> Schedule </span> </a>
                            @else
                                <a href="/scheduler"><i class="mdi mdi-chart-donut-variant"></i> <span> Schedule </span> </a>
                            @endif

                            <ul class="submenu">
                                @if ($notification[2])
                                    <li class="text-danger"><a href="/logs" class="text-danger">Logs</a></li>
                                @else
                                    <li><a href="/logs">Logs</a></li>
                                @endif

                                @if ($notification[3])
                                    <li class="text-danger"><a href="/lates" class="text-danger">Lates</a></li>
                                @else
                                    <li><a href="/lates">Lates</a></li>
                                @endif
                            </ul>
                        </li>
                        @if(auth()->user()->roles->first()->name != 'manager' || auth()->user()->roles->first()->name != 'assistant-manager')
                            <li class="has-submenu">
                                <a href="/branch"><i class="mdi mdi-google-pages"></i> <span> Branch </span> </a>
                                <ul class="submenu">
                                    <li><a href="/branch/create">Create Branch</a></li>
                                    <li><a href="/branch/delete">Delete Branch</a></li>
                                </ul>
                            </li>
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