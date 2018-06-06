@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            @if(count($users) == 0)
                <h3>No one is logged in to be logged out!!</h3>
                <h4>Please click <a href="/test/log">here</a> to log employees in</h4>
            @else
                <form action="/test/logger" method="post">
                    @csrf
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Pin</th>
                                <th>{{'Log'.$type}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->pin}}
                                    </td>
                                    <td>
                                        <input type="checkbox" for="{{'log_'.$user->id}}" name="{{'log_'.$user->id}}" value="{{$user->pin}}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @endif
            <br>
        </div>
    </div>
@endsection