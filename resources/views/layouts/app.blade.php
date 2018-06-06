<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <title>North End Coffee Roasters – craft great coffee create great community</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="North End Coffee Roasters" name="craft great coffee create great community" />
    <meta content="North End Coffee Roasters – Employee attandance management System" name="Techynaf" />
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
    @guest
        <div class="container-fluid">
            <div class="row">
                <h1>HELLO!!!</h1>
            </div>
        </div>
    @else
        @include('layouts.nav')
    @endif

    @include('layouts.messages')
    @yield('content')
    @include('layouts.footer')
</body>
</html>
