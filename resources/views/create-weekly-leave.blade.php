@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Create Weekly Day offs</h4>
                </div>
            </div>

            <div class="row">
                <div class="card-box col-12">
                    <div class="row">
                        <div class="col-12">
                            <h4>Select Days</h4>
                        </div>
                    </div>

                    <br>
                    <form action="/create/weekly/{{auth()->user()->id}}">
                        <div class="row">
                            <div class="col-2">
                                <label for="day_1" class="form-label-control">First Day</label>
                            </div>
                            <div class="col-4">
                                <select name="day_1" class="form-control">
                                    @foreach($days as $day)
                                        <option value="{{$day}}">{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="day_2" class="form-label-control">Second Day</label>
                            </div>
                            <div class="col-4">
                                <select name="day_2" class="form-control">
                                    @foreach($days as $day)
                                        <option value="{{$day}}">{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h4>Select Range</h4>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                <label for="start" class="form-label-control">Select Start Date</label>
                            </div>
                            <div class="col-4">
                                <input type="date" name="start" min="{{$start}}" class="form-control">
                            </div>
                            <div class="col-2">
                                <label for="start" class="form-label-control">Select End Date</label>
                            </div>
                            <div class="col-4">
                                <input type="date" name="start" max="{{$end}}" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-10"></div>
                            <div class="col-2">
                                <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection