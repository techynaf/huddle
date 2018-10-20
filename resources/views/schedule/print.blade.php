@extends('layouts.app')

@section('content')
    @include('templates.color-style')
    <div class="printable">
        @foreach($branches as $branch)
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 {{str_replace(" ", "-", strtolower($branch->name)).'b'}}">
                        <br>
                    </div>
                </div>
                @foreach ($branch->users as $user)
                    @if ($loop->index == 0)
                        <div class="row bb">
                            <div class="col-md-2 br">{{$branch->name}}</div>
                            @foreach ($dates as $date)
                                <div class="col">{{$date->copy()->format('D d M')}}</div>
                            @endforeach
                        </div>
                    @endif

                    <div class="row bb">
                        <div class="col-md-2 br">{{$user->name}}</div>
                        @foreach ($dates as $date)
                            <div class="col">
                                @if (count($user->schedule->where('date', $date->copy()->format('Y-m-d'))) == 0)
                                    OFF <br><br>
                                @else
                                    <div class="{{str_replace(" ", "-", strtolower($user->schedule->first()->startingBranch->name))}}">{{Carbon\Carbon::parse($user->schedule->where('date', $date->copy()->format('Y-m-d'))->first()->start)->format('H:i A')}}</div>
                                    <div class="{{str_replace(" ", "-", strtolower($user->schedule->first()->endingBranch->name))}}">{{Carbon\Carbon::parse($user->schedule->where('date', $date->copy()->format('Y-m-d'))->first()->end)->format('H:i A')}}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="row">
                    <div class="col-md-12 {{str_replace(" ", "-", strtolower($branch->name)).'b'}}">
                        <br>
                    </div>
                </div>
            </div>
            <hr><hr>
            <div class="page-break"></div>
        @endforeach
        
    </div>
    <script>
        window.print();
    </script>
@endsection