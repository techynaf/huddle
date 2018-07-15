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
                                        <td>{{$user->roles->first()->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>PIN</td>
                                        <td>{{$user->pin}}</td>
                                    </tr>
                                    <tr>
                                        <td>QR Code</td>
                                        <td><a href="{{ asset('qrcodes/'.$user->pin.'.png') }}" target="_blank">Download</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="card-box">
                        <div class="card-title">
                            <h2>Current Week Schedule</h2>
                        </div>
                        <div class="widget-container">
                            @if(count($schedules) == 0)
                                <br><br>
                                <br><hr>
                                    <p class="text-center">Schedule has yet to be posted</p>
                                <hr><br>
                                <br><br>
                            @else
                            <div class="row">
                                <div class="col-sm-6">Scheduled</div>
                                <div class="col-sm-6">Actual</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><hr></div>
                                <div class="col-sm-6"><hr></div>
                            </div>
                            
                                @foreach($schedules as $schedule)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    {{$days[$loop->index]}}
                                                </div> 
                                                <div class="col-sm-2">{{date("g:i A", strtotime($schedule->start))}}</div>
                                                <div class="col-sm-2">{{date("g:i A", strtotime($schedule->end))}}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            @if(count($logs[$loop->index]) == 0)
                                                <div class="row">
                                                    <hr>
                                                    No records yet
                                                    <hr>
                                                </div>
                                            @else
                                                @foreach($logs[$loop->index] as $log)
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            {{$log->start}}
                                                        </div>
                                                        <div class="col-sm-6">
                                                            @if($log->end == null)
                                                                Logged in
                                                            @else
                                                                {{$log->end}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6"><hr></div>
                                        <div class="col-sm-6"><hr></div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection