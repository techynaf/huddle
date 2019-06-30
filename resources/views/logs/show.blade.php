@extends ('layouts.app')

@section('content')
    <div class="row">
        <h2 class="page-title-logs mt-5 mb-4">Logs</h2>
    </div>
    @foreach($logs_dates as $date => $logs)
        <div class="row">
            <div class="col-12 card-box">
                <div class="row">
                    <div class="col-1 my-auto">
                        <h3>{{ date("D d M",strtotime($date)) }}</h3>
                    </div>
                    <div class="col-11">
                        <div class="row">
                            @foreach($logs as $log)
                                <div class="col-6 {{ $loop->iteration % 2 != 0 ? 'border-right border-left' : '' }}">
                                    <form action="/logs/{{ $log->id }}" method="POST">
                                        @csrf
                                        <hr>
                                        <div class="row">
                                            <div class="col-3 my-auto border-right">
                                                <strong>{{$log->user->name}}</strong> <br>
                                                Login: <strong>{{ date("g:iA",strtotime($log->start)) }}</strong> <br>
                                                @if (!is_null($log->end))
                                                    Logout: <strong>{{ date("g:iA",strtotime($log->end)) }}</strong> <br>
                                                @else
                                                    <strong>NOT LOGGED OUT</strong>
                                                @endif
                                            </div>
                                           <div class="col-md">
                                               <div class="row mb-3">
                                                    <div class="col-md">
                                                        <label for="start" class="form-label-control">Login Time:</label>
                                                        <input type="datetime-local" value="{{ implode('T', explode(' ',Carbon\Carbon::parse($log->start)->toDateTimeString())) }}" name="start" class="form-control">
                                                    </div>
                                                    <div class="col-md">
                                                        <label for="end" class="form-label-control">Logout Time:</label> 
                                                        <input type="datetime-local" value="{{ implode('T', explode(' ',Carbon\Carbon::parse($log->end)->toDateTimeString())) }}" name="end" class="form-control">
                                                    </div>
                                               </div>
                                               <button class="btn btn-primary btn-rounded w-100" type="submit">Save</button>
                                           </div>
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection