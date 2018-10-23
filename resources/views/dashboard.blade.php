@extends('layouts.app')

@section('content')
            
                <div class="row text-center pt-5">
                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="card-title py-1">
                                <h2>Profile</h2>
                            </div>
                            <div class="text-center">
                                <h2 class="text-center">{{ucwords($user->roles->first()->name).' Information'}}</h2>
                            </div>

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
                                        <td>{{$user->pin}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                            @if ($user->roles->first()->name == 'super-admin' || $user->roles->first()->name == 'district-manager' || $user->roles->first()->name == 'HR')
                                                @if (auth()->user()->roles->first()->name == 'super-admin') 
                                                    <a href="/pin/change/{{$user->id}}/{{$user->roles->first()->name}}">Change Pin</a>
                                                @endif
                                            @else
                                                @if (auth()->user()->roles->first()->name == 'super-admin' || auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'HR')
                                                    <a href="/pin/change/{{$user->id}}/false">Change Pin</a>
                                                @endif
                                            @endif
                                        </td>
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
                                            <td>{{$user->manager->pin}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                                @if ($user->roles->first()->name == 'super-admin' || $user->roles->first()->name == 'district-manager' || $user->roles->first()->name == 'HR')
                                                    @if ($user->roles->first()->name == auth()->user()->roles->first()->name || auth()->user()->roles->first()->name == 'super-admin') 
                                                        <a href="/pin/change/{{$user->id}}/true">Change Pin</a>
                                                    @endif
                                                @else
                                                    @if (auth()->user()->roles->first()->name == 'super-admin' || auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'hr')
                                                        <a href="/pin/change/{{$user->id}}/true">Change Pin</a>
                                                    @endif
                                                @endif
                                            </td>
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





                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">

                                    <div class="card-title py-1">
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
                                        @if (App\Leave::where('user_id', $user->id)->where('start', '<=', $date->copy()->addDays($loop->index)->format('Y-m-d'))->where('end', '>=', $date->copy()->addDays($loop->index)->format('Y-m-d'))->where('is_approved', 1)->first() != null)
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        {{$days[$loop->index]}}
                                                    </div>
                                                    <div class="col-sm-8 text-center">
                                                        {{App\Leave::where('user_id', $user->id)->where('start', '<=', $date->copy()->addDays($loop->index)->format('Y-m-d'))->where('end', '>=', $date->copy()->addDays($loop->index)->format('Y-m-d'))->where('is_approved', 1)->first()->leavetype->name}}
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($schedule == null)
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
                                        @elseif (count($user->noSchedule->where('date', $schedule->date)) != 0)
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
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                        <div class="col-sm-12 col-md-4">
                                <div class="card-box">
                                    <div class="card-title py-1 text-center">
                                        <h2>Employee Analytics</h2>
                                    </div>
                                    <div class="widget-container pl-3">
                                        <div class="row py-1">
                                            <div class="col-6">
                                                Working time
                                            </div>
                                            <div class="col-6">
                                                {{$hours}} hours {{$minutes}} minutes
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row pb-4">
                                            <div class="col-6">Lates</div>
                                            <div class="col-6">{{$lates}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="card-box">
                                    <div class="card-title py-1 text-center">
                                        <h2>Requests Made</h2>
                                    </div>
                                    <div class="widget-container">
                                        @if(count($requests) == 0)
                                            <br>
                                            <hr>
                                            <p class="text-center">No requests made yet</p>
                                            <hr>
                                            <br>
                                        @else
                                        <hr>
                                            @foreach($requests as $request)
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h4>{{$request->subject}}</h4>
                                                    </div>
                                                    @if (App\Http\Controllers\Controller::admin() || auth()->user()->id == $user->id)
                                                        <div class="col-2 text-right">
                                                            <a href="/delete/request/{{$request->id}}" class="btn">Delete</a>
                                                        </div>
                                                    @endif
                                                    @if($request->is_approved == 0)
                                                        <div class="col-2 text-center">
                                                            <a href="/request/edit/{{$request->id}}" class="btn">Edit</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                            {{ $requests->links() }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                </div>
@endsection