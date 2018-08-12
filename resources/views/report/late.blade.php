@extends('layouts.app')

@section('content')
    <div class="row">
        <h2>Late Report</h2>
    </div>

    @foreach($branches as $branch)
        <div class="row">
            <u><h3>{{$branch->name}}</h3></u>
        </div>

        <div class="card-box">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col">Name</div>
                        <div class="col">Status</div>
                        <div class="col">Religion</div>
                        <div class="col">Scheduled</div>
                        <div class="col">Actual</div>
                        <div class="col">Late Type</div>
                        <div class="col">Date</div>
                        <div class="col">Duration</div>
                        <div class="col">Comment</div>
                        <div class="col">Commented by</div>
                    </div>
                </div>
            </div>

            <hr>

            @foreach ($lates as $late)
                @if ($late->user->branch_id == $branch->id)
                    <div class="row">
                        <div class="col">{{$late->user->name}}</div>
                        <div class="col">{{$late->user->status}}</div>
                        <div class="col">{{$late->user->religion}}</div>
                        <div class="col">{{date("g:i A", strtotime($late->log->schedule->start))}}</div>
                        <div class="col">{{date("g:i A", strtotime($late->log->start))}}</div>
                        <div class="col">{{$late->type}}</div>
                        <div class="col">{{$late->date}}</div>
                        <div class="col">{{$duration[$x++].' mins'}}</div>
                        <div class="col">{{$late->comment}}</div>
                        <div class="col">
                            @if ($late->alteredBy == null)
                                <strong>NOT COMMENTED</strong>
                            @else
                                <a href="/view/employee/{{$late->alteredBy->id}}" target="_blank">
                                    {{$late->alteredBy->name}}
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
                <hr>
            @endforeach
        </div>
    @endforeach
@endsection