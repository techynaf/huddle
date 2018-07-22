@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <form action="/scheduler" method="get">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="page-title">Scheduler for {{date("D d M", strtotime($days[0][1])).' to '.date("D d M", strtotime($days[6][1]))}}</h4>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-2">
                        <h5>Select another date range</h5>
                    </div>
                    <div class="col-2">
                        <select name="date" class="form-control">
                            <option value="">Current Week</option>
                            @foreach($dates as $date)
                                <option value="{{$date[0]}}">{{$date[0].' to '.$date[1]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                    </div>
                </div>
            </form>

            <div class="bg-white">
                <div class="header bg-light">
                    <div class="row pt-5">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 pt-2">Name</div>
                        @foreach($days as $day)
                            <div class="col-md-1">
                                {{date("D d M", strtotime($day[1]))}}
                                <br>
                                {{date("Y", strtotime($day[1]))}}
                            </div>
                        @endforeach
                        <div class="col-md-2 pt-2 text-center">Action</div>
                    </div><!-- row -->
                    <hr>
                </div>
                
                 <div class="table">
                     @foreach($users as $user)
                        <form action="/scheduler/{{$user->id}}" method="POST">
                            @csrf
                            <div class="row pt-5">
                                <div class="col-md-1"></div>
                                <div class="col-md-2 pt-2">{{$user->name}}</div>
                                @foreach($schedules[$loop->index] as $schedule)
                                    @if ($days[$loop->index][1] <= $today)
                                        <div class="col-md-1">
                                            @if($schedule == 'day-off')
                                                <div class="text-center btn btn-outline-danger h-100 w-100">
                                                    <input type="hidden" name="s_id[]" value="off">
                                                    <h4>DAY</h4>
                                                    <h4>OFF</h4>
                                                </div>
                                            @elseif ($schedule == 'sick')
                                                <div class="text-center btn btn-outline-danger h-100 w-100">
                                                    <input type="hidden" name="s_id[]" value="off">
                                                    <h4>SICK</h4>
                                                    <h4>LEAVE</h4>
                                                </div>
                                            @elseif ($schedule == 'annual')
                                                <div class="text-center btn btn-outline-danger h-100 w-100">
                                                    <input type="hidden" name="s_id[]" value="off">
                                                    <h4>ANNUAL</h4>
                                                    <h4>LEAVE</h4>
                                                </div>
                                            @elseif ($schedule == 'govt')
                                                <div class="text-center btn btn-outline-danger h-100 w-100">
                                                    <input type="hidden" name="s_id[]" value="off">
                                                    <h4>GOVERNMENT</h4>
                                                    <h4>HOLIDAY</h4>
                                                </div>
                                            @elseif($schedule == 'no-schedule' || $schedule == false)
                                                <div class="text-center btn btn-outline-danger h-100 w-100">
                                                    <input type="hidden" name="s_id[]" value="off">
                                                    <h4>NO</h4>
                                                    <h4>RECORD</h4>
                                                </div>
                                                <br><br>
                                            @else
                                                <input type="hidden" name="s_id[]" value="off">
                                                <h4 class="text-center">{{date("g:i A", strtotime($schedule->start))}}</h4>
                                                <br>
                                                <h4 class="text-center">{{date("g:i A", strtotime($schedule->endforeach))}}</h4>
                                            @endif
                                        </div>
                                    @else
                                        <div class="col-md-1">
                                            <input type="hidden" name="date[]" value="{{$days[$loop->index][1]}}">
                                            @if($schedule == 'day-off')
                                                <div class="text-center btn btn-outline-danger h-100 w-100">
                                                    <input type="hidden" name="s_id[]" value="off">
                                                    <h4>DAY</h4>
                                                    <h4>OFF</h4>
                                                </div>
                                            @elseif ($schedule == 'sick')
                                                <div class="text-center btn btn-outline-danger h-100 w-100">
                                                    <input type="hidden" name="s_id[]" value="off">
                                                    <h4>SICK</h4>
                                                    <h4>LEAVE</h4>
                                                </div>
                                            @elseif ($schedule == 'annual')
                                                <div class="text-center btn btn-outline-danger h-100 w-100">
                                                    <input type="hidden" name="s_id[]" value="off">
                                                    <h4>ANNUAL</h4>
                                                    <h4>LEAVE</h4>
                                                </div>
                                            @elseif ($schedule == 'govt')
                                                <div class="text-center btn btn-outline-danger h-100 w-100">
                                                    <input type="hidden" name="s_id[]" value="off">
                                                    <h4>GOVERNMENT</h4>
                                                    <h4>HOLIDAY</h4>
                                                </div>
                                            @elseif($schedule == 'no-schedule')
                                                <div class="text-center btn btn-outline-danger h-75">
                                                    <input type="hidden" name="s_id[]" value="off">
                                                    <h4>DAY OFF</h4>
                                                </div>
                                                <br><br>
                                                <div class="text-center h-25">
                                                    <a href="/enable/{{$user->id.'/'.$days[$loop->index][1].'/'.$path}}" class="text-center btn btn-outline-success">ENABLE</a>
                                                </div>
                                            @elseif($schedule == false)
                                                <input type="hidden" name="s_id[]" value="0">
                                                @include('templates.schedule-default-form')
                                                <br>
                                                <a href="/disable/{{$user->id.'/'.$days[$loop->index][1].'/'.$path}}" class="text-center btn btn-outline-danger">DISABLE</a>
                                            @else
                                                <input type="hidden" name="s_id[]" value="{{$schedule->id}}">
                                                @include('templates.schedule-form')
                                                <br>
                                                <a href="/disable/{{$user->id.'/'.$days[$loop->index][1].'/'.$path}}" class="text-center btn btn-outline-danger">DISABLE</a>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                                <div class="col-md-2 pt-2 text-center">
                                    @if($days[6][1] <= $today)
                                    
                                    @else
                                        <button type="submit" class="btn btn-success btn-rounded">Save</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <hr>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection