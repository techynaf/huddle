@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-md-10">
            <h3>Public Holiday List</h3>
        </div>
        <div class="col-md-2">
            <a href="{{ route('holidays.create') }}" class="btn btn-primary w-100">Create</a>
        </div>
    </div>
    <div class="row mb-3">
        @foreach ($holidays as $holiday)
            <div class="col-md-4">
                <h3>{{ $holiday->name }}</h3>
                Starting: {{ Carbon\Carbon::parse($holiday->starting)->format('d M Y') }} <br>
                Ending: {{ Carbon\Carbon::parse($holiday->ending)->format('d M Y') }} <br>
                Religion: {{ $holiday->religion }}
                <div class="row mt-2">
                    <div class="col-md-6">
                        <a href="{{ route('holidays.edit', ['holiday' => $holiday->id]) }}" class="btn btn-warning w-100">Edit</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('holidays.delete', ['holiday' => $holiday->id]) }}" class="btn btn-danger w-100">Delete</a>
                    </div>
                </div>
            </div>

            @if ($loop->iteration % 3 == 0)
                </div>
                <div class="row mb-3">
            @endif
        @endforeach
    </div>
@endsection