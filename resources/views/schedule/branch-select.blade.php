@extends('layouts.app')

@section('content')
<br>
    <form action="/schedule/print" method="GET">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card-box">
                    <div class="card-title py-1 p-2">
                        <h2>Select Branch</h2>
                    </div>
                    <div class="widget-container p-3">
                        <select name="id" class="form-control">
                            <option value="all">All</option>
                            @foreach ($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </form>
@endsection