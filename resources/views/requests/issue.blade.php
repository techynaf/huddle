@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="card-title py-1 pl-4 mt-5">
                    <h2>Create Leave Request</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="p-20">
                            <form class="form-horizontal" role="form" action="/create/leave" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6 text-center">
                                        <div class="btn-group btn-group-toggle mt-3 mb-4 p-x-0" data-toggle="buttons">
                                            @foreach ($types as $type)
                                                <label class="btn btn-success huddle-brown-btn px-2 py-3">
                                                    <input type="radio" name="type" id="{{'id-'.$type->id}}" autocomplete="off" onchange="dayOff()" value="{{$type->id}}"> {{$type->name}}
                                                </label>
                                            @endforeach
                                          </div>
                                    </div>
                                    <div class="col-1 pt-3 pr-0 mr-0">
                                        <label for="id" class="form-label-control float-right align-middle">Select Employee</label>
                                    </div>
                                    <div class="col-md-5 pt-4">
                                        <select name="id" class="form-control" required>
                                            @if (old('id') != null)
                                                <option value="{{ old('id') }}">{{ App\User::find(old('id'))->name }}</option>
                                            @else
                                                <option value="">Please select an employee</option>
                                            @endif
                                            @foreach($users as $user)
                                                @if (App\Http\Controllers\Controller::manager())
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @else
                                                    <option value="{{$user->id}}">{{$user->branch->name.' - '.$user->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="hidden" id="day">
                                    <div class="form-group row" >
                                        <div class="col-1">
                                            <label for="day_1" class="form-label-control float-right align-middle">Day 1</label>
                                        </div>
                                        <div class="col-5">
                                            <select name="day_1" class="form-control" id="day-1">
                                                @if (old('day_1') != null)
                                                    <option value="{{ old('day_1') }}">{{ old('day_1') }}</option>
                                                @else
                                                    <option value="">Please select day one</option>
                                                @endif
                                                <option value="Sunday">Sunday</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                            </select>
                                        </div>
                                        <div class="col-1">
                                            <label for="day_2" class="form-label-control float-right align-middle">Day 2</label>
                                        </div>
                                        <div class="col-5">
                                            <select name="day_2" class="form-control" id="day-2">
                                                @if (old('day_2') != null)
                                                    <option value="{{ old('day_2') }}">{{ old('day_2') }}</option>
                                                @else
                                                    <option value="">Please select day one</option>
                                                @endif
                                                <option value="Sunday">Sunday</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-1">
                                        <label for="start" class="form-label-control float-right align-middle">Date 1</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="date" name="start" class="form-control" value="{{ old('start') }}" required>
                                    </div>
                                    <div class="col-1">
                                        <label for="end" class="form-label-control float-right align-middle">Date 2</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="date" name="end" class="form-control" value="{{ old('end') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-1">
                                        <label for="comment" class="form-label-control float-right align-middle">Comment</label>
                                    </div>
                                    <div class="col-11">
                                        <textarea name="comment" class="form-control" cols="30" rows="10">{{ old('comment') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-10"></div>
                                    <div class="col-2 text-right">
                                        <button type="submit" class="btn btn-primary huddle-brown-btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function dayOff () {
            if (document.getElementById('id-6').checked)
                document.getElementById('day').style.display = 'block';
            else {
                document.getElementById('day').style.display = 'none';
            }
        }
    </script>
@endsection