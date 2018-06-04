@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if($value)
                <h2>Entries have already been made for today.</h2>
            @else
                <form action="/test/scheduler" method="post">
                    @csrf
                    <h4>Create 200 entries in schedule for today's testing.</h4>
                    <input type="submit">
                </form>
            @endif
        </div>
    </div>
@endsection