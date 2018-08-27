@extends('layouts.app')

@section('content')
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Profile</h2>
                </div>
            </div>
            
            <div class="row card-box">
                <div class="col-sm-12 col-md-4 border-right">

                        <div class="text-center">
                            <h2 class="text-center">{{ucwords($user->roles->first()->name).' Information'}}</h2>
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
                                    @if ($user->branch_id != 0)
                                        <tr>
                                            <td>Branch</td>
                                            <td>{{$user->branch->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Religion</td>
                                            <td>{{$user->religion}}</td>
                                        </tr>
                                    @endif

                                    @if ($user->manager != null)
                                        <tr>
                                            <td>Manager Pin</td>
                                            <td>{{$user->manager->pin}}</td>
                                        </tr>
                                    @endif

                                    @if(auth()->user()->roles->first()->name == 'HR' || auth()->user()->roles->first()->name == 'super-admin')
                                        <tr>
                                            <td>QR Code</td>
                                            <td><a href="{{ asset('qrcodes/'.$user->pin.'.png') }}" target="_blank">Download</a></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <hr>

                            <div class="row text-center">
                                <div class="col-3"></div>
                                <div class="col-6 border-right border-left">
                                    <img src="{{'/qrcodes/'.$user->pin.'.png'}}" width="150" height="150" alt="{{'QR code of'.$user->name}}">
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <hr>
                            @if(auth()->user()->roles->first()->name == 'HR' || auth()->user()->roles->first()->name == 'super-admin')
                                <div class="row text-center">
                                    <div class="col-md-6"><a href="/edit/profile/{{$user->id}}" class="text-success">Edit Profile</a></div>
                                    <div class="col-md-6"><a href="/delete/profile/{{$user->id}}" class="text-danger">Delete Profile</a></div>
                                </div>
                            @endif
                        </div>

                </div>
                <div class="col-sm-12 col-md-8 border-left">
                        <div class="card-title text-center">
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
                            <div class="row text-center">
                                <div class="col-sm-6 text-center"><h4>Scheduled</h4></div>
                                <div class="col-sm-6 text-center"><h4>Actual</h4></div>
                            </div>
                            <div class="row">
                                    <div class="col-sm-6"><hr></div>
                                    <div class="col-sm-6"><hr></div>
                                </div>
                            <div class="row text-center">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2">Start</div>
                                <div class="col-sm-2">End</div>
                                @if (auth()->user()->roles->first()->name == 'manager' || auth()->user()->roles->first()->name == 'super-admin')
                                    <div class="col-3 text-center">Login Time</div>
                                    <div class="col-3 text-center">Logout Time</div>
                                @else
                                    <div class="col-3 text-center">Punch in time</div>
                                    <div class="col-3 text-center">Punch out time</div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-6"><hr></div>
                                <div class="col-sm-6"><hr></div>
                            </div>
                            
                                @foreach($schedules as $schedule)
                                    <div class="row">
                                        @if($schedule == null)
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        {{$days[$loop->index]}}
                                                    </div>
                                                    <div class="col-sm-8 text-center">
                                                        No Schedule for this day
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif (sizeof($user->noSchedule->where('date', $schedule->date)) != 0)
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        {{$days[$loop->index]}}
                                                    </div>
                                                    <div class="col-sm-8 text-center">
                                                        No Schedule for this day
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        {{$days[$loop->index]}}
                                                    </div>
                                                    
                                                        <div class="col-sm-4 text-center {{strtolower($schedule->startingBranch->name)}}">
                                                            <strong>{{date("g:i A", strtotime($schedule->start))}}</strong>
                                                        </div>
                                                        <div class="col-sm-4 text-center {{strtolower($schedule->endingBranch->name)}}">
                                                            <strong>{{date("g:i A", strtotime($schedule->end))}}</strong>    
                                                        </div>
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
                                                        <div class="col-sm-6 text-center">
                                                            <strong>{{date("g:i A", strtotime($log->start))}}</strong>
                                                        </div>
                                                        <div class="col-sm-6 text-center">
                                                            @if($log->end == null)
                                                                Logged in
                                                            @else
                                                            <strong>{{date("g:i A", strtotime($log->end))}}</strong>
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
            <div class="row card-box">
                <div class="col-sm-12 col-md-4 border-right">
                    <div class="card-title">
                        <h2>Employee Analytics</h2>
                    </div>
                    <br><hr>
                    <div class="widget-container">
                        <div class="row">
                            <div class="col-6">
                                Working time
                            </div>
                            <div class="col-6">
                                {{$hours}} hours {{$minutes}} minutes
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">Lates</div>
                            <div class="col-6">{{$lates}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 border-left">
                        <div class="card-title">
                            <h2>Requests Made</h2>
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
                                                {{$request->leavetype->name}}
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
@endsection