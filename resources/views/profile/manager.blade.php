<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <title>North End Coffee Roasters – craft great coffee create great community</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="North End Coffee Roasters" name="craft great coffee create great community" />
    <meta content="North End Coffee Roasters – Employee attandance management System" name="Techynaf" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="/frontend/images/favicon.ico">
    
    <!-- Plugins css-->
    <link href="/frontend/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/frontend/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="/frontend/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/frontend/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="/frontend/plugins/switchery/switchery.min.css" rel="stylesheet" />
    <link href="/frontend/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="/frontend/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="/frontend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/frontend/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- App css -->
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/frontend/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="/frontend/css/style.css" rel="stylesheet" type="text/css" />
    
    <script src="/frontend/js/modernizr.min.js"></script>
    
    
    <!-- DataTables -->
    <link href="/frontend/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/frontend/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="/frontend/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Multi Item Selection examples -->
    <link href="/frontend/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">
                <div class="logo">
                    <a href="/" class="logo">
                        <img src="/frontend/images/logo-sm.png" alt="" height="50" class="logo-small">
                        <img src="/frontend/images/logo.png" alt="" height="27" class="logo-large">
                    </a>
                </div>
                <div class="menu-extras topbar-custom">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">
                        <li class="menu-item">
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <ul class="navigation-menu">
                        <li class="has-submenu">
                            <a href="/logout"><i class="fas fa-power-off"></i> <span> Logout </span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <br><br><br><br><br><br><br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Manager Login') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="/manager-login">
                            @csrf
    
                            <div class="form-group row">
                                <label for="pin" class="col-sm-4 col-form-label text-md-right">Manager Pin</label>
    
                                <div class="col-md-6">
                                    <input id="pin" type="number" class="form-control" name="pin" value="{{ old('pin') }}" required autofocus>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
