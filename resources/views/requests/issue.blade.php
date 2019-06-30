@extends('layouts.app')

@section('content')
    <script>
        var prev = 0;
        function selectOpt (id) {
            if (document.getElementById('opt-'+prev) != null) {
                document.getElementById('opt-'+prev).classList.remove['huddle-brown-btn'];
            }
            document.getElementById('opt-'+id).classList.add['huddle-red-btn'];
            prev = id;
        }

        function selectHalf (id, prefix) {
            console.log(document.getElementById('half-'+id).classList.contains('huddle-brown-btn'));
            if (document.getElementById('half-'+id).classList.contains('huddle-brown-btn')) {
                document.getElementById('half-'+id).classList.add('huddle-success-btn');
                document.getElementById('half-'+id).classList.remove('huddle-brown-btn');
                document.getElementById(prefix+'_is_half').value = 1;
            } else {
                document.getElementById('half-'+id).classList.add('huddle-brown-btn');
                document.getElementById('half-'+id).classList.remove('huddle-success-btn');
                document.getElementById(prefix+'_is_half').value = 0;
            }
        }
    </script>

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
                                <input type="hidden" name="start_half" id="start_is_half" value="0">
                                <input type="hidden" name="end_half" id="end_is_half" value="0">
                                <div class="form-group row">
                                    <div class="col-md-6 text-center my-auto">
                                        <div class="btn-group btn-group-toggle mt-3 mb-4 p-x-0" data-toggle="buttons">
                                            @foreach ($types as $type)
                                                <label class="btn btn-success huddle-brown-btn px-2 py-3" onclick="selectOpt({{ $loop->iteration + 1 }})" id="opt-{{ $loop->iteration + 1 }}">
                                                    <input type="radio" name="type" id="{{'id-'.$type->id}}" autocomplete="off" value="{{ $type->name }}"> {{$type->name}}
                                                </label>
                                            @endforeach
                                          </div>
                                    </div>
                                    <div class="col-md-1 pr-0 mr-0 my-auto">
                                        <label for="id" class="form-label-control float-right">Select Employee</label>
                                    </div>
                                    <div class="col-md-5 my-auto">
                                        <select name="id" class="form-control" required>
                                            @if (old('id') != null)
                                                <option value="{{ old('id') }}">{{ App\User::find(old('id'))->name }}</option>
                                            @else
                                                <option value="">Please select an employee</option>
                                            @endif
                                            @foreach($users as $user)
                                                @if (App\Http\Controllers\Controller::manager())
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @else
                                                    <option value="{{ $user->id }}">{{ $user->branch->name.' - '.$user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-1">
                                        <label for="start" class="form-label-control float-right align-middle">From</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="date" name="start" class="form-control" value="{{ old('start') }}" required>
                                    </div>
                                    <div class="col-1">
                                        <div class="btn-group-toggle" data-toggle="buttons" onclick="selectHalf(1, 'start')">
                                            <label class="btn huddle-brown-btn" id="half-1">
                                                <input type="checkbox" value="1" autocomplete="off"> Half Day
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <label for="end" class="form-label-control float-right align-middle">To</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="date" name="end" class="form-control" value="{{ old('end') }}" required>
                                    </div>
                                    <div class="col-1">
                                        <div class="btn-group-toggle" data-toggle="buttons" onclick="selectHalf(2, 'end')">
                                            <label class="btn huddle-brown-btn" id="half-2">
                                                <input type="checkbox" value="1" autocomplete="off" name="end_half"> Half Day
                                            </label>
                                        </div>
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
@endsection