@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Date Select</h2>
                </div>
            </div>
            <div class="card-box">
                <h4>{{$year}}</h4>
                <div class="row">
                    @for($date = 1; $date <= $dates; $date++)
                        <div class="col-3">
                            <a href="/schedule/create/{{$year.'/'.$month.'/'.$date}}">
                                <h4>{{$name.' - '.$date}}</h4>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection