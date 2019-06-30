@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12">
            <h2 class="text-center">{{ $type[0]->name }}</h2>
        </div>
    </div>

    <form action="{{ route('leaves.types', ['name' => $type[0]->name]) }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                Minimum Notification (days)
                <input type="number" step="1" name="min_notification" class="form-control" value="{{ is_null($type[0]->min_notification) ? '' : $type[0]->min_notification }}">
            </div>
            <div class="col-md-3">
                Expires Every
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" step="1" name="exp_val" class="form-control" value="{{ is_null($type[0]->expiration) ? '' : explode(' ', $type[0]->expiration)[0] }}">
                    </div>
                    <div class="col-md-6">
                        <select name="exp_range" class="form-control">
                            @if (is_null($type[0]->expiration))
                                <option value=""></option>
                                <option value="year">Year</option>
                                <option value="month">Month</option>
                                <option value="week">Week</option>
                            @else
                                <option value="$type[0]->expiration)[1]">{{ ucfirst(explode(' ', $type[0]->expiration)[1]) }}</option>
                                @if (explode(' ', $type[0]->expiration)[1] != 'year')
                                    <option value="year">Year</option>
                                @endif

                                @if (explode(' ', $type[0]->expiration)[1] != 'month')
                                    <option value="month">Month</option>
                                @endif

                                @if (explode(' ', $type[0]->expiration)[1] != 'week')
                                    <option value="week">Week</option>
                                @endif
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                Maximum in balance
                <input type="number" step="0.5" name="ceil" class="form-control" value="{{ is_null($type[0]->ceil) ? '' : $type[0]->ceil }}">
            </div>
            <div class="col-md-3">
                Reset Base
                <input type="number" step="0.5" name="base" class="form-control" value="{{ is_null($type[0]->base) ? '' : $type[0]->base }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                Hours added
                <input type="number" step="1" name="hours" class="form-control" value="{{ is_null($type[0]->hours) ? '' : $type[0]->hours }}">
            </div>
            <div class="col-md-3">
                Leave Expiration Starting
                <input type="date" name="starting" class="form-control" value="{{ is_null($type[0]->starting) ? '' : Carbon\Carbon::parse($type[0]->starting)->toDateString() }}">
            </div>
            <div class="col-md-3">
                Leave Counts as Calendar Day <br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary {{ $type[0]->is_calendar_day ? 'active' : '' }}">
                        <input type="radio" name="is_calendar_day" id="1" value="1" autocomplete="off" {{ $type[0]->is_calendar_day ? 'checked' : '' }}> Yes
                    </label>
                    <label class="btn btn-secondary {{ !$type[0]->is_calendar_day ? 'active' : '' }}">
                        <input type="radio" name="is_calendar_day" id="0" value="0" autocomplete="off" {{ !$type[0]->is_calendar_day ? 'checked' : '' }}> No
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                Gender
                <select name="gender" class="form-control">
                    <option value="{{ $type[0]->gender }}">{{ ucfirst($type[0]->gender) }}</option>
                    @if ($type[0]->gender != 'all')
                        <option value="all">All</option>
                    @endif
                    @if ($type[0]->gender != 'female')
                        <option value="female">Female</option>
                    @endif
                    @if ($type[0]->gender != 'male')
                        <option value="male">Male</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <button class="btn btn-primary w-100" type="submit">Save</button>
            </div>
        </div>
    </form>

    <div class="row mb-3">
        @foreach ($type as $dType)
            <div class="col-md-6">
                <h4>Policy for {{ $dType->role->name }} <a href="{{ route('leaves.policies', ['type' => $dType->id]) }}"><i class='far fa-edit float-right'></i></a></h4>
                @foreach ($dType->policies as $policy)
                    <div class="row mb-3">
                        <div class="col-md-6">
                            Approved by: <br>
                            {{ $policy->role->name }}
                        </div>
                        <div class="col-md-6">
                            Max Approval Days: <br>
                            {{ $policy->max }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            Allow Overflow: <br>
                            {{ $policy->allow_overflow ? 'Yes' : 'No' }}
                        </div>
                        <div class="col-md-6">
                            Allow Block: <br>
                            {{ $policy->allow_block ? 'Yes' : 'No' }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            Block Check Message: <br>
                            {{ is_null($policy->message) ? 'No message' : $policy->message }}
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection