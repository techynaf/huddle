@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">Barista Login Details</h4>
                    <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        @if($value)
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Login Time</th>
                                    <th>Scheduled logout Time</th>
                                    <th>Branch</th>
                                </tr>
                            </thead>
                            
                            @foreach($lists as $list)
                                <tbody>
                                    <tr>
                                        <td>{{$list[0]}}</td>
                                        <td>{{$list[1][1]}}</td>
                                        <td>{{$list[2]}}</td>
                                        <td>{{$list[3]}}</td>
                                        <td>{{$list[4]}}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @else 
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Login Time</th>
                                    <th>Scheduled Logout Time</th>
                                    <th>Date</th>
                                    <th>Branch</th>
                                </tr>
                            </thead>
                            
                            @foreach($lists as $list)
                                <tbody>
                                    <tr>
                                        <td>{{$list[0]}}</td>
                                        <td>{{$list[1]}}</td>
                                        <td>{{$list[2]}}</td>
                                        <td>{{$list[3]}}</td>
                                        <td>{{$list[4]}}</td>
                                        <td>{{$list[5]}}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
@endsection