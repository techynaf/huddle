<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                    <!-- Image Logo -->
                    <a href="/" class="logo">
                        <img src="/frontend/images/logo-sm.png" alt="" height="40" class="logo-small">
                        <img src="/frontend/images/logo.png" alt="" height="35" class="logo-large">
                    </a>
                    
                </div>
                <!-- End Logo container-->

                <div>
                    <a href="/logout" class="btn btn-primary huddle-login-btn"> LOGOUT </a>
                </div>

                <div>
                    <a href="/dashboard" class="text-white btn btn-primary huddle-name-btn">
                        @if (auth()->user() != null)
                            <div class="name">{{auth()->user()->name}}</div>
                            <div class="role">{{ucfirst(auth()->user()->designation->name)}}</div>
                        @endif
                    </a>
                </div>

                

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
        <!-- <img src="/frontend/images/beans.png" class="img-fluid beans"> -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container-fluid text-center">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    @if (auth()->user()->designation->name == 'Shift Supervisor')
                        @include('layouts.shift-super-nav')
                    @elseif(auth()->user()->roles->first()->name == 'Entry Level Employee')
                        @include('layouts.barista-nav')
                    @elseif(auth()->user()->roles->first()->name == 'Manager/Assistant Manager')
                        @include('layouts.manager-nav')
                    @elseif(auth()->user()->roles->first()->name == 'HOD/Area Manager')
                        @include('layouts.dm-nav')
                    @else
                        @include('layouts.super-nav')
                    @endif
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div>
                
            </div>
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
