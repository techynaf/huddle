@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2 class="page-title">Select Leave Type</h2>
            </div>

            <div class="row">
                <div class="col-12 card-box">
                    <div class="row text-center">
                        <div class="col-2"></div>
                        <div class="col-2">
                            <a href="/leave/type/annual" class="btn btn-primary btn-rounded">
                                <h3>Annual Leave</h3>
                            </a>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-2">
                            <a href="/leave/type/sick" class="btn btn-info btn-rounded">
                                <h3>Sick Leave</h3>    
                            </a>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-2">
                            <a href="/leave/type/annual" class="btn btn-success btn-rounded">
                                <h3>Government Holiday</h3>    
                            </a>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection