@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            @if($flow)
                <div class="row">
                    <h4 class="page-title">ID Card of {{$user->name}}</h4>
                </div>
                <div class="row">
                    <div class="col-12 card-box">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <div class="row">
                                    {{$user->name}}
                                </div>
                                <div class="row">
                                    {{$user->pin}}
                                </div>
                                <div class="row">
                                    {{$user->employee_id}}
                                </div>
                                <div class="row">
                                    <img src="{{'qrcodes/'.$user->pin.'.png'}}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <h4 class="page-title">Input</h4>
                </div>
                <div class="ro">
                    <form action="/test2" method="get">
                        @csrf
                        <input type="number" name="id">
                        <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection