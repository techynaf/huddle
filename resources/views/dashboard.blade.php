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
                                            <td><a href="{{ asset('qrcodes/'.$user->pin.'.svg') }}" target="_blank">Download</a></td>
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
                            <table class="table">
                                @if(count($schedules) == 0)
                                    <br><br>
                                    <br><hr>
                                        <p class="text-center">Schedule has yet to be posted</p>
                                    <hr><br>
                                    <br><br>
                                @else
                                <tbody>
                                    @foreach($schedules as $schedule)
                                        <tr>
                                            <td>{{$days[$loop->index]}}</td>
                                            <td>{{$schedule->date}}</td>
                                            <td>{{$schedule->start}}</td>
                                            <td>{{$schedule->end}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="card-box">
                        <div>
                            <div class="card-title">
                                <h2>Analytics for Current Month</h2>
                            </div>
                            @if($flow)
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="cell-sm">Late Count</td>
                                            <td>{{$analytics[0]}}</td>
                                        </tr>
                                        <tr>
                                            <td>Cumulative late time</td>
                                            <td>{{$analytics[1]}}</td>
                                        </tr>
                                        <tr>
                                            <td>Early Leave Count</td>
                                            <td>{{$analytics[2]}}</td>
                                        </tr>
                                        <tr>
                                            <td>Cumulative early leave time</td>
                                            <td>{{$analytics[3]}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <br><hr>
                                    <p class="text-center">No analytics for current month yet</p>
                                <hr><br>
                            @endif
                        </div>
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
                                    <h4>{{$request->subject}}</h4>
                                    <div class="row">
                                        @if($request->start != null)
                                            <div class="col-3">
                                                Date range
                                            </div>
                                            <div class="col-3">
                                                {{$request->start}}
                                            </div>
                                            <div class="col-3">
                                                {{$request->end}}
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
                                            @if($request->hr_approved === 1)
                                                <div class="btn btn-success">Approved</div>
                                            @else
                                                @if($request->manager_approved === 0 || $request->hr_approved === 0)
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