@extends('layouts.app')

@section('section')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Schedule Edit for {{$schedule->user}} on {{$schedule->date}}</h2>
                </div>
            </div>

            <div class="card-box">
                <form action="/schedule/upate/{{$schedule->id}}" method="POST">
                    <div class="row">
                            <div class="col-6">
                                <label for="start">Starting Time</label>
                            </div>
                            <div class="col-6">
                                <label for="end">Ending Time</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input id="timepicker" type="text" class="form-control" name="start" placeholder="{{$schedule->start}}">
                            </div>
                            <div class="col-6">
                                <input id="timepicker3" type="text" class="form-control" name="end" placeholder="{{$schedule->end}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <label for="start_branch">Starting Branch</label>
                            </div>
                            <div class="col-6">
                                <label for="end_branch">Ending Branch</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-control" name="start_branch">
                                    <option value="">---</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-control" name="end_branch">
                                    <option value="">---</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-11"></div>
                        <div class="col-1">
                            <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection