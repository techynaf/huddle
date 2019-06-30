@extends('layouts.app')

@section('content')
    <script>
        function selectOpt(id, action) {
            document.getElementById('id-inp').value = id;
            document.getElementById('action-inp').value = action;
            document.getElementById('submit-btn').click();
        }
    </script>

    <form action="{{ route('overtimes.action') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="" id="id-inp">
        <input type="hidden" name="action" value="" id="action-inp">
        <button class="hidden" id="submit-btn"></button>
    </form>

    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h3>Overtime Approval</h3>
        </div>
    </div>

    <form action="{{ route('overtimes.index') }}" method="GET">
        @csrf
        <div class="row bm-3">
            <div class="col-md-3">
                <input type="date" name="from" class="form-control">
            </div>
            <div class="col-md-3">
                <input type="date" name="to" class="form-control">
            </div>
            <div class="col-md-3">
                <select name="branch" class="form-control">
                    <option value="">Select a Branch</option>
                    @foreach (auth()->user()->branch->descendent as $descendent)
                        <option value="{{ $descendent }}">{{ App\Branch::find($descendent)->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100" type="submit">Submit</button>
            </div>
        </div>
    </form>

    <div class="row mb-3 mt-5">
        <div class="col-md-2 h6">Name & ID</div>
        <div class="col-md h6 text-center">Sign-in Time</div>
        <div class="col-md h6 text-center">Sign-out Time</div>
        <div class="col-md-1 h6 text-center">Total Hours</div>
        <div class="col-md-2 h6 text-center">Overtime Hours</div>
        <div class="col-md-3 h6 text-center">Scheduled Hours</div>
        <div class="col-md-1 h6 text-right">Action</div>
    </div>

    @foreach ($overtimes as $overtime)
        <div class="row mb-3 mt-5">
            <div class="col-md-2 h6 my-auto">
                {{ $overtime->user->name }}<br>
                {{ $overtime->user->employee_id }}
            </div>
            <div class="col-md text-center my-auto">{{ $overtime->signIn }}</div>
            <div class="col-md text-center my-auto">{{ $overtime->signOut }}</div>
            <div class="col-md-1 text-center my-auto">{{ $overtime->totalWorked }}</div>
            <div class="col-md-2 text-center my-auto">{{ $overtime->hours }}</div>
            <div class="col-md-3 text-center my-auto">{!! $overtime->scheduled !!}</div>
            <div class="col-md-1 my-auto text-right">
                @if (is_null($overtime->action))
                    <button class="btn btn-success p-2 m-0" onclick="selectOpt({{ $overtime->id }}, 1)"><i class="fas fa-check"></i></button>
                    <button class="btn btn-danger p-2 m-0" onclick="selectOpt({{ $overtime->id }}, -1)"><i class="fas fa-times"></i></button>
                @elseif ($overtime->action == 1)
                    <button class="btn btn-danger p-2 m-0" onclick="selectOpt({{ $overtime->id }}, -1)"><i class="fas fa-times"></i></button>
                @else
                    <button class="btn btn-success p-2 m-0" onclick="selectOpt({{ $overtime->id }}, 1)"><i class="fas fa-check"></i></button>
                @endif
            </div>
        </div>
    @endforeach
@endsection