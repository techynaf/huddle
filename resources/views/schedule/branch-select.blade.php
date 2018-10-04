@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-3"></div>
        <h2 class="page-title">Select Branch</h2>
    </div>
    <form action="/schedule/print" method="GET">
        <div class="row">
            <div class="col"></div>
            <div class="col-6 card-box">
                <div class="row">
                    <div class="col-12">
                        <select name="id" class="form-control">
                            <option value="all">All</option>
                            @foreach ($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
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