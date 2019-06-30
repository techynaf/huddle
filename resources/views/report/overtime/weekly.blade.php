@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h3>Weekly Overtime Log</h3>
        </div>
    </div>

    <form action="{{ route('overtimes.weekly.report') }}" method="GET">
        <div class="row mb-3">
            <div class="col-md-4">
                <select name="branch" class="form-control">
                    <option value="">Select a branch</option>
                    @foreach (auth()->user()->branch->descendent as $descendent)
                        <option value="{{ $descendent }}">{{ App\Branch::find($descendent)->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="date" name="from" class="form-control">
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary w-100" type="submit">Search</button>
            </div>
        </div>
    </form>
{{-- {{ dd($start) }} --}}
    @foreach ($users as $user)
    <table class="table">
            <thead class="table-header thead-light">
                <tr>
                    <th>Name</th>
                    @for ($i = $start->copy(); $i <= $start->copy()->addDays(6); $i->addDays(1))
                        <th>{{ $i->copy()->format('d/M') }}</th>
                    @endfor
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    @for ($i = $start->copy(); $i <= $start->copy()->addDays(6); $i->addDays(1))
                        <th>{{ $user->approvedOvertime($i->copy()->format('Y-m-d')) }}</th>
                    @endfor
                    <td>{{ $user->approvedOvertimes($start, $start->copy()->addDays(6)) }}</td>
                </tr>
            </tbody>
        </table>
    @endforeach
@endsection