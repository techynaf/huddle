<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
    <table class="table table-bordered bg-white">
        <thead>
            <tr class="bg-warning">
            <th scope="col table-header">Name</th>
            <th scope="col table-header">Designation</th>
            <th scope="col table-header">Status</th>
            <th scope="col table-header">Employee Code</th>
            <th scope="col table-header">Religion</th>
            <th scope="col table-header">Date</th>
            <th scope="col table-header">Actual Schedule</th>
            <th scope="col table-header">Login Time</th>
            <th scope="col table-header">Duration</th>
            <th scope="col table-header">Late Type</th>
            <th scope="col table-header">Comment</th>
            <th scope="col table-header">Commented By</th>
            </tr>  
        </thead>
        <tbody>
            @foreach($branches as $branch)
                <tr>
                    <th class="bg-secondary" colspan="14" scope="row">{{$branch->name}}</th>
                </tr>
                @foreach ($lates as $late)
                    @if ($late->user->branch_id == $branch->id)
                        <tr>
                            <td>{{$late->user->name}}</td>
                            <td>{{ucfirst($late->user->roles->first()->name)}}</td>
                            <td>{{$late->user->status}}</td>
                            <td>{{$late->user->employee_id}}</td>
                            <td>{{$late->user->religion}}</td>
                            <td>{{$late->date}}</td>
                            <td>{{date("g:i A", strtotime($late->log->schedule->start))}}</td>
                            <td>{{date("g:i A", strtotime($late->log->start))}}</td>
                            <td>{{$duration[$x++].' mins'}}</td>
                            <td>{{$late->type}}</td>
                            <td>{{$late->comment}}</td>
                            <td>
                                @if ($late->alteredBy == null)
                                    <strong>NOT COMMENTED</strong>
                                @else
                                    <a href="/view/employee/{{$late->alteredBy->id}}" target="_blank">
                                        {{$late->alteredBy->name}}
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>