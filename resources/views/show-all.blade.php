@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Employees</h4>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                @foreach($users as $user)
                    <div class="col-xl-4">
                        <div class="text-center card-box">
                            <div>
                                
                                <div class="text-left">
                                    <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15">{{$user->name}}</span></p>
    
                                    <p class="text-muted font-13"><strong>Role :</strong> <span class="m-l-15">{{$user->roles->first()->name}}</span></p>
    
                                    <p class="text-muted font-13"><strong>PIN :</strong> <span class="m-l-15">{{$user->pin}}</span></p>
                                    
                                    <p class="text-muted font-13"><strong>Branch :</strong><span class="m-l-15">{{$user->branch->name}}</span></p>
                                </div>
                                <a href="/view/employee/{{$user->id}}" type="btn-rounded" class="btn btn-custom btn-rounded waves-effect waves-light">Show details</a>
                            </div>
                        </div>
                    </div> <!-- end col -->
                @endforeach
            </div>
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection