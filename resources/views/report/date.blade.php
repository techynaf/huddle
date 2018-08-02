@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-3"></div>
            <h2 class="page-title">Select Date</h2>
        </div>
        <form action="{{$url}}" method="GET">
            <div class="row">
                <div class="col"></div>
                <div class="col-6 card-box">
                    <div class="row">
                        <div class="col-8">
                            <select name="month" class="form-control">
                                <option value="">Select month</option>
                                @foreach ($months as $month)
                                    <option value="{{$loop->index}}">{{$month}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="year" class="form-control">
                                <option value="">Select year</option>
                                @foreach ($years as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12"><button type="submit" class="btn btn-primary btn-rounded">Submit</button></div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </form>
@endsection