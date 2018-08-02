@extends ('layouts.app')

@section('content')
    @foreach($branches as $branch)
        <div class="row">
            <h2 class="page-title">{{$branch->name}}</h2>
        </div>
        <div class="row">
            <div class="col-12 card-box">
                <div class="row">
                    <div class="col">Name</div>
                    <div class="col">Designation</div>
                    <div class="col">Religion</div>
                    @foreach($weeks as $week)
                        <div class="col">
                            {{date("d M", strtotime($week[0]))}} <br>
                            {{date("d M", strtotime($week[1]))}}
                        </div>
                    @endforeach
                    <div class="col">Total</div>
                </div>
                <hr>
                
                @foreach ($users as $user)
                    @if ($user->branch_id == $branch->id)
                        <div class="row">
                            <div class="col">{{$user->name}}</div>
                            <div class="col">{{ucfirst($user->roles->first()->name)}}</div>
                            <div class="col">{{$user->religion}}</div>
                            @foreach($hours[$x++] as $hour)
                                <div class="col">
                                    {{$hour}}
                                </div>
                            @endforeach
                        </div>
                        <hr>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
@endsection