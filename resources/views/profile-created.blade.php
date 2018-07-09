@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="row">
                        {{$name}}
                    </div>
                    <div class="row">
                        {{$e_id}}
                    </div>
                    <div class="row">
                        <img src="{{$path}}" alt="QRCode">
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </div>
@endsection