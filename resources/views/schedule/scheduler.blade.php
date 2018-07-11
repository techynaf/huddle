@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Scheduler</h4>
                </div>
            </div>

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
                        <div class="col-md-1 pt-2">Action</div>
                        <div class="col-md-1"></div>
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
                                    <div class="col-md-1">
                                        <input type="hidden" name="date[]" value="{{$days[$loop->index][1]}}">
                                        @if($schedule == 'day-off')
                                            <div class="text-center btn-danger">
                                                <input type="hidden" name="s_id[]" value="off">
                                                DAY OFF
                                            </div>
                                        @elseif($schedule == false)
                                            <input type="hidden" name="s_id[]" value="null">
                                            @include('templates.schedule-default-form')
                                        @else
                                            <input type="hidden" name="s_id[]" value="{{$schedule->id}}">
                                            @include('templates.schedule-form')
                                        @endif
                                    </div>
                                @endforeach
                                <div class="col-md-1 pt-2">
                                    <button type="button" class="btn btn-success btn-rounded">Save</button>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </form>
                        <hr>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection