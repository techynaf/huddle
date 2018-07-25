@extends ('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2 class="page-title">Lates</h2>
            </div>

            @foreach($dates as $date)
                <div class="row">
                    <div class="col-12 card-box">
                        <div class="row">
                            <div class="col-1 border-right">
                                {{date("D d M", strtotime($date))}}
                                <br>
                                {{date("Y", strtotime($date))}}
                            </div>
                            <div class="col-11">
                                <div class="row">
                                    @foreach($lates as $late)
                                        @if($late->date == $date)
                                            <div class="col-1">
                                                <a href="/lates/{{$late->id}}" class="card-box btn btn-outline-success">
                                                    {{$late->user->name}}
                                                    <br>
                                                    {{date("g:i A", strtotime($late->log->start))}}
                                                    <br>
                                                    @if ($late->log->end == null)
                                                        <br>
                                                    @else
                                                        {{date("g:i A", strtotime($late->log->end))}}
                                                    @endif
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection