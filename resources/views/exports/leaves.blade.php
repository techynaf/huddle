<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Leave Report</title>
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
                <th scope="col table-header">Employee Information</th>
                <th scope="col table-header">From</th>
                <th scope="col table-header">To</th>
                <th scope="col table-header">Leave Type</th>
                <th scope="col table-header">Status</th>
                <th scope="col table-header">Comment</th>
            </tr>  
        </thead>
        <tbody>
            @foreach($leaves as $leave)
                <tr class="hoverer">
                    <td>
                        {{$leave->user->name}}
                        <div class="hoveree">
                            {{$leave->user->religion}} <br>
                            {{$leave->user->branch != null ? $leave->user->branch->name : 'Unassigned'}} <br>
                            {{ucfirst($leave->user->roles->first()->name)}} <br>
                        </div>
                    </td>
                    <td>{{Carbon\Carbon::parse($leave->start)->format('d M Y')}}</td>
                    <td>{{Carbon\Carbon::parse($leave->end)->format('d M Y')}}</td>
                    <td>{{$leave->leavetype->name}}</td>
                    <td>{{$leave->is_approved == 0 ? 'Pending' : ($leave->is_approved == 1 ? 'Approved' : 'Declined')}}</td>
                    <td>{{$leave->comment == null ? 'None' : $leave->comment}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>