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
                            <img src="/frontend/images/pic.jpg" class="rounded-circle thumb-xl img-thumbnail m-b-10" alt="profile-image">
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
                                    @if(auth()->user()->branch->name == 'HR and Admin' || auth()->user()->roles->first()->name == 'super-admin')
                                        <tr>
                                            <td>QR Code</td>
                                            <td><a href="{{ asset('qrcodes/'.$user->pin.'.png') }}" target="_blank">Download</a></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <hr>
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
                                        @if($schedule == null)
                                            <div class="col-sm-6 text-center">
                                                No Schedule for this day
                                            </div>
                                        @else
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        {{$days[$loop->index]}}
                                                    </div> 
                                                    <div class="col-sm-2">{{date("g:i A", strtotime($schedule->start))}}</div>
                                                    <div class="col-sm-2">{{date("g:i A", strtotime($schedule->end))}}</div>
                                                </div>
                                            </div>
                                        @endif
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
                                                            {{date("g:i A", strtotime($log->start))}}
                                                        </div>
                                                        <div class="col-sm-6">
                                                            @if($log->end == null)
                                                                Logged in
                                                            @else
                                                            {{date("g:i A", strtotime($log->end))}}
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
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="card-box">
                        <br><br><br><br><br><br><br><br><br>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="card-box">
                        <div class="card-title">
                            <h2>Requests made</h2>
                        </div>
                        <div class="widget-container">
                            @if(count($requests) == 0)
                                <br><hr>
                                <p class="text-center">No requests made yet</p>
                                <hr><br>
                            @else
                            <hr>
                                @foreach($requests as $request)
                                    <div class="row">
                                        <div class="col-10">
                                            <h4>{{$request->subject}}</h4>
                                        </div>
                                        @if($request->is_approved == 0)
                                            <div class="col-2 text-center">
                                                <a href="/request/edit/{{$request->id}}" class="btn">Edit</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        @if($request->start != null)
                                            <div class="col-3">
                                                Date range
                                            </div>
                                            <div class="col-3">
                                                {{date("D d M", strtotime($request->start))}}
                                            </div>
                                            <div class="col-3">
                                                {{date("D d M", strtotime($request->end))}}
                                            </div>
                                            <div class="col-1"></div>
                                        @else
                                            <div class="col-2">
                                                Request Body
                                            </div>
                                            <div class="col-8">
                                                {{$request->body}}
                                            </div>
                                        @endif
                                        <div class="col-1">
                                            @if($request->is_approved === 1)
                                                <div class="btn btn-success">Approved</div>
                                            @else
                                                @if($request->is_approved === 2)
                                                    <div class="btn btn-danger">Declined</div>
                                                @else
                                                    <div class="btn btn-secondary">Pending</div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection