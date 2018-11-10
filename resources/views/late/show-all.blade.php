@extends ('layouts.app')

@section('content')
@if (App\Http\Controllers\Controller::admin())
    <div class="row">
        <h2 class="page-title-logs mt-5 mb-4">Lates</h2>
    </div>
here
    @foreach($lates as $late)
        <div class="row">
            <div class="col-12 card-box-logs">
                <div class="row">
                    <div class="col-1 border-right ml-3">
                        {{date("D d M", strtotime($date))}}
                        <br>
                        {{date("Y", strtotime($date))}}
                    </div>
                    <div class="col-11">
                        <form action="/lates/{{$late->id}}" method="POST">
                            @csrf
                            <hr>
                            <div class="row">
                                <div class="col-2 border-right">
                                    <strong>{{$late->user->name}}</strong>
                                    <br>
                                    <br>
                                    Login Time: {{date("g:i A", strtotime($late->log->start))}}
                                    <br>
                                    <br>
                                    @if ($late->log->end == null)
                                        <br>
                                        <br>
                                    @else
                                        Logout Time: {{date("g:i A", strtotime($late->log->end))}}
                                    @endif
                                </div>
                                <div class="col-3">
                                    <h4>Late Type</h4>
                                    @if ($late->type == null)
                                        <select name="type" class="form-control" required>
                                            <option value=""></option>
                                            <option value="Excused">Excused</option>
                                            <option value="Punch-in">Punch-in</option>
                                            <option value="Actual">Actual</option>
                                        </select>
                                    @else
                                        <select name="type" class="form-control" required>
                                            <option value="{{$late->type}}">{{$late->type}}</option>
                                            <option value="Excused">Excused</option>
                                            <option value="Punch-in">Punch-in</option>
                                            <option value="Actual">Actual</option>
                                        </select>
                                    @endif
                                </div>
                                <div class="col-4 border-right">
                                    <h4>Comment</h4>
                                    @if ($late->comment == null)
                                        <textarea name="comment" class="form-control" cols="30" rows="10" required></textarea>
                                    @else
                                        <textarea name="comment" class="form-control" cols="30" rows="10" required>{{$late->comment}}</textarea>
                                    @endif
                                </div>
                                <div class="col-1"></div>
                                <div class="col-1">
                                    <br>
                                    <br>
                                    <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                                </div>
                            </div>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="row">
        <h2 class="page-title-logs mt-5 mb-4">Lates</h2>
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
                        @foreach($lates as $late)
                            @if($late->date == $date)
                                <form action="/lates/{{$late->id}}" method="POST">
                                    @csrf
                                    <hr>
                                    <div class="row">
                                        <div class="col-2 border-right">
                                            <strong>{{$late->user->name}}</strong>
                                            <br>
                                            <br>
                                            Login Time: {{date("g:i A", strtotime($late->log->start))}}
                                            <br>
                                            <br>
                                            @if ($late->log->end == null)
                                                <br>
                                                <br>
                                            @else
                                                Logout Time: {{date("g:i A", strtotime($late->log->end))}}
                                            @endif
                                        </div>
                                        <div class="col-3">
                                            <h4>Late Type</h4>
                                            @if ($late->type == null)
                                                <select name="type" class="form-control" required>
                                                    <option value=""></option>
                                                    <option value="Excused">Excused</option>
                                                    <option value="Punch-in">Punch-in</option>
                                                    <option value="Actual">Actual</option>
                                                </select>
                                            @else
                                                <select name="type" class="form-control" required>
                                                    <option value="{{$late->type}}">{{$late->type}}</option>
                                                    <option value="Excused">Excused</option>
                                                    <option value="Punch-in">Punch-in</option>
                                                    <option value="Actual">Actual</option>
                                                </select>
                                            @endif
                                        </div>
                                        <div class="col-4 border-right">
                                            <h4>Comment</h4>
                                            @if ($late->comment == null)
                                                <textarea name="comment" class="form-control" cols="30" rows="10" required></textarea>
                                            @else
                                                <textarea name="comment" class="form-control" cols="30" rows="10" required>{{$late->comment}}</textarea>
                                            @endif
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-1">
                                            <br>
                                            <br>
                                            <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                                        </div>
                                    </div>
                                    <hr>
                                </form>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
@endsection