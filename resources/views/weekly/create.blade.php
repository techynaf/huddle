@extends('layouts.app')

@section('content')

            <div class="row text-center">
            <h4 class="page-title-create-daysoff w-100">Create Weekly Day offs</h4>
                <div class="card-box-create-daysoff col-12">
                
                    <div class="row">
                        <div class="col-12 mt-3">
                            <h4><strong>Select Days</strong></h4>
                        </div>
                    </div>

                    <br>
                    <form action="/create/weekly/{{auth()->user()->id}}" method="POST">
                        @csrf
                        <div class="row">
                        <div class="col-1"></div>
                            <div class="col-1">
                                <label for="day_1" class="form-label-control align-middle float-right font-weight-bold">First Day</label>
                            </div>
                            <div class="col-4">
                                <select name="day_1" class="form-control">
                                    <option value=""></option>
                                    @foreach($days as $day)
                                        <option value="{{$day}}">{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-1">
                                <label for="day_2" class="form-label-control align-middle float-right font-weight-bold">Second Day</label>
                            </div>
                            <div class="col-4">
                                <select name="day_2" class="form-control">
                                    <option value=""></option>
                                    @foreach($days as $day)
                                        <option value="{{$day}}">{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h4><strong>Select Range</strong></h4>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                <label for="start" class="form-label-control align-middle float-right font-weight-bold">Select Start Date</label>
                            </div>
                            <div class="col-4">
                                <input type="date" name="start" min="{{$start}}" class="form-control">
                            </div>
                            <div class="col-1">
                                <label for="end" class="form-label-control align-middle float-right font-weight-bold">End Date</label>
                            </div>
                            <div class="col-4">
                                <input type="date" name="end" min="{{$end}}" class="form-control">
                            </div>
                            <div class="col-1"></div>
                        </div>
                        
                        <div class="row my-5">
                            <div class="col-12">
                                <button class="btn btn-success px-5" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection