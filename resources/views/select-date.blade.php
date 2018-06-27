@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Select date</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="card-box col-8">
                    <form action="">
                        <div class="row">
                            <div class="col-2">
                                <h4><label for="date" class="form-label-control">Date</label></h4>
                            </div>
                            <div class="col-6">
                                <select name="date" class="form-control">
                                    @foreach($dates as $date)
                                        <option value="{{$date}}">{{$date}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-1">
                                <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
@endsection