@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Month Select</h2>
                </div>
            </div>
            @foreach($years as $year)
                <div class="card-box">
                    <h4>{{$year}}</h4>
                    <div class="row">
                        @foreach($months as $month)
                            <div class="col-md-4">
                                <a href="/schedule/create/{{$year.'/'.$loop->iteration}}">
                                    <h4>{{$month}}</h4>
                                </a>      
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<!-- for current url: $request->url() -->