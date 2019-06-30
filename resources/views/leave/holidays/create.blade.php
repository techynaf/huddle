@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h3>Add Public Holiday</h3>
        </div>
    </div>

    <form action="{{ route('holidays.create') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                Holiday Name
                <input type="text" name="name" class="form-control" placeholder="Holiday Name">
            </div>
            <div class="col-md-3">
                Starting Date
                <input type="date" name="starting" class="form-control" placeholder="Starting Date" min="{{ Carbon\Carbon::now()->toDateString() }}">
            </div>
            <div class="col-md-3">
                Ending Date
                <input type="date" name="ending" class="form-control" placeholder="Ending Date" min="{{ Carbon\Carbon::now()->toDateString() }}">
            </div>
            <div class="col-md-3">
                Religion
                <select name="religion" class="form-control">
                    <option value="">Select Religion</option>
                    <option value="All">All</option>
                    <option value="Islam">Islam</option>
                    <option value="Christianity">Christianity</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddhist">Buddhist</option>
                    <option value="Other">Other</option>
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