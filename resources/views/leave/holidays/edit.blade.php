@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h3>Edit Public Holiday</h3>
        </div>
    </div>

    <form action="{{ route('holidays.edit', ['holiday' => $holiday->id]) }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                Holiday Name
                <input type="text" name="name" class="form-control" placeholder="Holiday Name" value="{{ $holiday->name }}">
            </div>
            <div class="col-md-3">
                Starting Date
                <input type="date" name="starting" class="form-control" placeholder="Starting Date" value="{{ $holiday->starting }}" min="{{ Carbon\Carbon::now()->toDateString() }}">
            </div>
            <div class="col-md-3">
                Ending Date
                <input type="date" name="ending" class="form-control" placeholder="Ending Date" value="{{ $holiday->ending }}" min="{{ Carbon\Carbon::now()->toDateString() }}">
            </div>
            <div class="col-md-3">
                Religion
                <select name="religion" class="form-control">
                    <option value="{{ $holiday->religion }}">{{ $holiday->religion }}</option>
                    @if ($holiday->religion != 'Islam')
                        <option value="Islam">Islam</option>
                    @endif
                    @if ($holiday->religion != 'Christianity')
                        <option value="Christianity">Christianity</option>
                    @endif
                    @if ($holiday->religion != 'Hinduism')
                        <option value="Hinduism">Hinduism</option>
                    @endif
                    @if ($holiday->religion != 'Buddhism')
                        <option value="Buddhism">Buddhism</option>
                    @endif
                    @if ($holiday->religion != 'Other')
                        <option value="Other">Other</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </div>
    </form>
@endsection