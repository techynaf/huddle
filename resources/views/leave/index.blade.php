@extends('layouts.app')

@section('content')
    <script>
        function showTo () {
            if (document.getElementsByName('single_day')[0].checked) {
                document.getElementById('to').style.display = 'none';
            } else {
                document.getElementById('to').style.display = 'block';
            }
        }

        function showMaternity () {
            console.log('here');
            if (document.getElementById('Maternity').checked) {
                document.getElementById('due-date').style.display = 'block';
            } else {
                document.getElementById('due-date').style.display = 'none';
            }
        }
    </script>
    {{-- <form action="/test" method="POST"> --}}
    <form action="{{ route('leaves.create') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    @foreach ($leaves as $leave)
                        @if ($leave->gender == 'all')
                            <label class="btn btn-secondary {{ $loop->iteration == 1 ? 'active' : '' }}">
                                <input type="radio" name="type" value="{{ $leave->id }}" autocomplete="off" {{ $loop->iteration == 1 ? 'checked' : '' }}> {{ $leave->name }}
                            </label>
                        @elseif ($leave->gender == auth()->user()->gender)
                            <label class="btn btn-secondary {{ $loop->iteration == 1 ? 'active' : '' }}">
                                <input type="radio" name="type" value="{{ $leave->id }}" autocomplete="off" {{ $loop->iteration == 1 ? 'checked' : '' }}> {{ $leave->name }}
                            </label>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-5">
                From
                <label class="checkbox-inline float-right mr-3">
                    <input type="checkbox" name="start_half" value="1"> Half Day
                </label>
                <input type="date" name="start" class="form-control" min="{{ Carbon\Carbon::now()->toDateString() }}">
            </div>
            <div class="col-md-2 text-center my-auto">
                <label class="checkbox-inline">
                    <input type="checkbox" name="single_day" value="1" onclick="showTo()"> Single Day
                </label> 
            </div>
            <div class="col-md-5" id="to">
                To
                <label class="checkbox-inline float-right mr-3">
                    <input type="checkbox" name="end_half" value="1"> Half Day
                </label>
                <input type="date" name="end" class="form-control" min="{{ Carbon\Carbon::now()->toDateString() }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md"></div>
            <div class="col-md-5" id="due-date" style="display: none">
                Due Date
                <input type="date" name="due_date" class="form-control" min="{{ Carbon\Carbon::now()->toDateString() }}">
            </div>
            <div class="col-md"></div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <textarea name="reason" class="form-control" placeholder="Reason"></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </div>
    </form>
@endsection