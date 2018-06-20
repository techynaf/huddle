@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Select Range</h2>
                </div>
            </div>
            <div class="card-box">
                <form action="/schedule/show" method="get">
                    <div class="row">
                        <div class="col-11">
                            <div class="row">
                                <div class="col-6"><label for="year">Please select year</label></div>
                                <div class="col-6"><label for="month">Please select month</label></div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <select name="year">
                                        <option value="">---</option>
                                        @for($i = $date_first[0]; $i <= $date_last[0]; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select name="month">
                                        <option value="">---</option>
                                        @foreach($months as $month)
                                            <option value="{{$loop->iteration}}">{{$month}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <br>
                            <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                        </div>   
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection