@extends('layouts.app')

@section('content')
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Select date</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="card-box col-8">
                    @if($flow)
                        <form action="/scheduler" method="GET">
                            <div class="row">
                                <div class="col-3">
                                    <h4><label for="date" class="form-label-control">Week date range</label></h4>
                                </div>
                                <div class="col-5">
                                    <select name="date" class="form-control">
                                        @foreach($dates as $date)
                                            <option value="{{$date[0]}}">{{$date[0].' to '.$date[1]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-1">
                                    <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form action="/schedule/view" method="GET">
                            <div class="row">
                                <div class="col-3">
                                    <h4><label for="date" class="form-label-control">Week date range</label></h4>
                                </div>
                                <div class="col-5">
                                    <select name="date" class="form-control">
                                        @foreach($dates as $date)
                                            <option value="{{$date[0]}}">{{$date[0].' to '.$date[1]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-1">
                                    <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
                <div class="col-2"></div>
            </div>
@endsection