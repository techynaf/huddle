@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Profile</h2>
                </div>
            </div>            
            <div class="row">

                <div class="col-sm-12 col-md-4">
                    <div class="card-box">
                        <div class="text-center">
                            <img src="/frontend/images/users/avatar-1.jpg" class="rounded-circle thumb-xl img-thumbnail m-b-10" alt="profile-image">
                        </div>
                        <div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cell-sm">Name</td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td>{{$user->role[0]->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="card-box">
                        <div class="card-title">
                            <h2>Employee Analytics</h2>
                        </div>
                        <div class="widget-container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-20">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h3>Time worked</h3>
                                            </div>
                                            <div class="col-md-9">
                                                <h3>{{$hours}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        @if($lates != 'Nothing')
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <h4>Late Count</h4>
                                                </div>
                                                <div class="col-md-9">
                                                    <h4>{{$lates}}</h4>
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                        <form action="/view/employee/{{$user->id}}" class="form-horizontal">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3"><h4>Date Range</h4></label>
                                                <div class="col-sm-9">
                                                    <div class="input-daterange input-group" id="date-range">
                                                        <input type="text" class="form-control" name="start_date" placeholder="{{$today}}"/>
                                                        <input type="text" class="form-control" name="end_date" placeholder="{{$today}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10"></div>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-rounded btn-primary">Enter Dates</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection