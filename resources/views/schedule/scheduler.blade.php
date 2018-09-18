@extends('layouts.app')

@section('content')
            <form action="/scheduler" method="get">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col--4">
                            <h4 class="schedule-page-title">Scheduler for {{date("D d M", strtotime($days[0][1])).' to '.date("D d M", strtotime($days[6][1]))}}</h4>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="text-right">Select a branch</h5>
                                </div>
                                <div class="col-6">
                                    <select name="branch" class="form-control">
                                        @if ($b == null)
                                            <option value="">All</option>
                                        @else
                                            <option value="{{$b->id}}">{{$b->name}}</option>
                                        @endif
                                        @foreach($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                                        @endforeach
                                        <option value="">All</option>
                                    </select>
                                </div>     
                            </div>        
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="text-right">Select date range</h5>
                                </div>
                                <div class="col-6">
                                    <select name="date" class="form-control">
                                        <option value="{{date("d M", strtotime($days[0][1]))}}">{{date("d M", strtotime($days[0][1])).' to '.date("d M", strtotime($days[6][1]))}}</option>
                                        @foreach($dates as $date)
                                            @if($days[0][1] != date("Y-m-d", strtotime($date[0])))
                                                <option value="{{$date[0]}}">{{date("d M", strtotime($date[0])).' to '.date("d M", strtotime($date[1]))}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if (auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
                            @endif
                        </div>
                        <div class="col-1">
                            <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                        </div>
                    </div>
                </div>    
            </form>
            <br>
            <div class="bg-white">
                <div class="header bg-light">
                    <div class="row pt-3">
                        <div class="col-md text-center">Name</div>
                        @foreach($days as $day)
                            <div class="col-md text-center">
                                {{date("D d M", strtotime($day[1]))}}
                                
                                {{date("Y", strtotime($day[1]))}}
                            </div>
                        @endforeach
                        <div class="col-md-1 text-center">Action</div>
                    </div><!-- row -->
                    <hr>
                </div>

                 <div class="table">
                     @foreach($users as $user)
                        <form action="/scheduler/{{$user->id}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md my-auto text-center" id="{{$user->id}}">{{$user->name}}</div>
                                @foreach($schedules[$loop->index] as $schedule)
                                <input type="hidden" name="date[]" value="{{$days[$loop->index][1]}}">
                                    <div class="col-md">
                                        @if($schedule == 'day-off')
                                            <div class="text-center btn btn-outline-danger h-100 w-100">
                                                <input type="hidden" name="s_id[]" value="off">
                                                <h6>DAY OFF</h6>
                                            </div>
                                        @elseif ($schedule == 'sick')
                                            <div class="text-center btn btn-outline-danger h-100 w-100">
                                                <input type="hidden" name="s_id[]" value="off">
                                                <h6>SICK</h6>
                                                <h6>LEAVE</h6>
                                            </div>
                                        @elseif ($schedule == 'annual')
                                            <div class="text-center btn btn-outline-danger h-100 w-100">
                                                <input type="hidden" name="s_id[]" value="off">
                                                <h6>ANNUAL</h6>
                                                <h6>LEAVE</h6>
                                            </div>
                                        @elseif ($schedule == 'govt')
                                            <div class="text-center btn btn-outline-danger h-100 w-100">
                                                <input type="hidden" name="s_id[]" value="off">
                                                <h6>GOVERNMENT</h6>
                                                <h6>HOLIDAY</h6>
                                            </div>
                                        @elseif($schedule == 'no-schedule')
                                            <div class="text-center btn btn-outline-danger h-75 w-100">
                                                <input type="hidden" name="s_id[]" value="off">
                                                <h6>DAY OFF</h6>
                                            </div>
                                            <br><br>
                                            <div class="col text-center">
                                                <a href="/enable/{{$user->id.'/'.$days[$loop->index][1].'/'.$user->branch_id}}" class="text-center btn btn-outline-success ">ENABLE</a>
                                            </div>
                                        @elseif($schedule == 'false')
                                            <input type="hidden" name="s_id[]" value="0">
                                            @include('templates.schedule-default-form')
                                            <br>
                                            <div class="col text-center">
                                                <a href="/disable/{{$user->id.'/'.$days[$loop->index][1].'/'.$user->branch_id}}" class="text-center btn btn-outline-danger ">DISABLE</a>
                                            </div>
                                        @else
                                            @if ($schedule->date != $days[$loop->index][1])
                                                <input type="hidden" name="s_id[]" value="0">
                                                @include('templates.schedule-form')
                                                <br>
                                                <div class="col text-center">
                                                    <a href="/disable/{{$user->id.'/'.$days[$loop->index][1].'/'.$user->branch_id}}" class="text-center btn btn-outline-danger ">DISABLE</a>
                                                </div>
                                            @else
                                                <input type="hidden" name="s_id[]" value="{{$schedule->id}}">
                                                @include('templates.schedule-form')
                                                <br>
                                                <div class="col text-center">
                                                    <a href="/disable/{{$user->id.'/'.$days[$loop->index][1].'/'.$user->branch_id}}" class="text-center btn btn-outline-danger ">DISABLE</a>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                @endforeach
                                <div class="col-md-1 my-auto text-center">
                                    <button type="submit" class="btn btn-success btn-rounded">Save</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                     @endforeach
                </div>
            </div>
@endsection