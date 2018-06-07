@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row"><h1> </h1></div>
            <div class="row">
                @if($value)
                    <div class="col-xl-12">
                        <div class="text-center card-box">
                            <h2>Entries have already been made for today.</h2>
                            <a href="/test/log" class="btn btn-primary btn-rounded">Log those baristas in!</a>
                        </div>
                    </div> <!-- end col -->    
                @else
                    <div class="col-xl-12">
                        <div class="text-center card-box">
                            <form action="/test/scheduler" method="post">
                                @csrf
                                <div class="text-center card-box">
                                    <h4>Create 200 entries in schedule for today's testing.</h4>
                                </div>
                                <input class="btn btn-primary btn-rounded" type="submit">
                            </form>
                        </div>
                    </div> <!-- end col -->
                @endif
            </div>
        </div>
    </div>
@endsection