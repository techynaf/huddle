@extends ('layouts.app')

@section('content')
            <div class="row">
                <h2 class="page-title-logs mt-5 mb-4">Logs</h2>
            </div>

            @foreach($dates as $date)
                <div class="row">
                    <div class="col-12 card-box-logs">
                        <div class="row">
                            <div class="col-1 border-right ml-3">
                                {{date("D d M", strtotime($date))}}
                                <br>
                                {{date("Y", strtotime($date))}}
                            </div>
                            <div class="col-11">
                                <div class="row">
                                    @foreach($logs as $log)
                                        @if($log->date == $date)
                                            <div class="col-6 border-right border-left">
                                                <form action="/logs/{{$log->id}}" method="POST">
                                                    @csrf
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-3 border-right">
                                                            <strong>{{$log->user->name}}</strong>
                                                            <br><br><br>
                                                            Login Time: {{date("g:i A", strtotime($log->start))}}
                                                            <br><br><br>
                                                            <strong>NOT LOGGED OUT</strong>
                                                        </div>
                                                        <div class="col-7 border-right">
                                                            <label for="start" class="form-label-control">Login Time:</label> 
                                                            <input type="time" name="start" class="form-control">
                                                            <br>
                                                            <label for="end" class="form-label-control">Logout Time:</label> 
                                                            <input type="time" name="end" class="form-control" required>
                                                        </div>
                                                        <div class="col-2">
                                                            <br><br><br>
                                                            <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </form>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
@endsection