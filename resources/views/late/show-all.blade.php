@extends ('layouts.app')

@section('content')

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
                                @foreach($lates as $late)
                                    @if($late->date == $date)
                                        <form action="/late/{{$late->id}}" method="POST">
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
@endsection