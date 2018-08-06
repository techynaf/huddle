@extends('layouts.app')

@section('content')
    <div class="row">
        <h2>Late Report</h2>
    </div>

    @foreach($branches as $branch)
        <div class="row">
            <h4>{{$branch->name}}</h4>
        </div>

        <div class="row">
            <div class="col-12 card-box">
                <div class="row">
                    <div class="col">Name</div>
                    <div class="col">Status</div>
                    <div class="col">Religion</div>
                    <div class="col">Late Type</div>
                    <div class="col">Date</div>
                    <div class="col">Duration</div>
                    <div class="col">Comment</div>
                    <div class="col">Signed Off by</div>
                </div>
            </div>
        </div>

        @foreach ($lates as $late)
            @if ($late->user->branch_id == $branch->id)
                <div class="row">
                    <div class="col">{{$late->user->name}}</div>
                    <div class="col">{{$late->user->status}}</div>
                    <div class="col">{{$late->user->religion}}</div>
                    <div class="col">{{$late->type}}</div>
                    <div class="col">{{$late->date}}</div>
                    <div class="col">{{$duration[$x++]}}</div>
                    <div class="col">{{$late->comment}}</div>
                    <div class="col">
                        <a href="/view/employee/{{$late->alteredBy->id}}" target="_blank">
                            {{$late->alteredBy->name}}
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach
@endsection