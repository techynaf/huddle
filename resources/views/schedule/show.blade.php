@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <h4 class="page-title">Schedule for {{$date_first.' to '.$date_last}}</h4>
            </div>

            @foreach($branches as $branch)
                <div class="row">
                    <h4 class="page-title">{{$branch->name}}</h4>
                </div>
                @if(count($schedules[$loop->index]) == 0)
                    <div class="row">
                        <div class="col-12 card-box">
                            <hr>
                            <h3 class="text-center">There are no schedules for this date range</h3>
                            <hr>
                        </div>
                    </div>
                @else 
                    <div class="row">
                        <div class="col-12 card-box">
                            <div class="row">
                                <div class="col-2">Name</div>
                                <div class="col-2">Date</div>
                                <div class="col-2">Starting Time</div>
                                <div class="col-2">Ending Time</div>
                                <div class="col-2">Starting Branch</div>
                                <div class="col-2">Ending Branch</div>
                            </div>
                            <hr>
                            @foreach($schedules[$loop->index] as $schedule)
                                @if($branch->id == $schedule->branch_id)
                                    <div class="row">
                                        <div class="col-2">{{$schedule->user->name}}</div>
                                        <div class="col-2">{{date("d M Y", strtotime($schedule->date))}}</div>
                                        <div class="col-2">{{date( 'g:i a', strtotime($schedule->start))}}</div>
                                        <div class="col-2">{{date( 'g:i a', strtotime($schedule->end))}}</div>
                                        <div class="col-2">{{$schedule->startingBranch->name}}</div>
                                        <div class="col-2">{{$schedule->endingBranch->name}}</div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection