@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <form action="/branch/filter" method="GET">
                @csrf
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-1">
                        <label for="id" class="form-label-control">Filter Branch</label>
                    </div>
                    <div class="col-2">
                        <select class="form-control" name="id">
                            <option value="all">All</option>
                            @foreach($filters as $filter)
                                <option value="{{$filter->id}}">{{$filter->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-primary btn-rounded" type="submit">Go</button>
                    </div>
                </div>
            </form>
            @if($flow)
                <div class="row">
                    <div class="col-sm-8">	
                        <h2 class="page-title">{{$branches->name}}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-3">Name</div>
                                <div class="col-1">Logged In</div>
                                @foreach($days as $day)
                                    <div class="col-1">{{$day}}</div>
                                @endforeach
                            </div>
                            <hr>
                            @foreach($users as $user)
                                @if($user->branch_id == $branch->id)
                                    @include('templates.user-card')
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                @foreach($branches as $branch)
                    @if(count($branches) > 1)
                        <div class="row">
                            <div class="col-sm-8">	
                                <h2 class="page-title">{{$branch->name}}</h2>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-8">	
                                <h2 class="page-title">{{$branch->name}}</h2>
                            </div>
                        </div>
                    @endif
                    <div class="row text-center">
                        <div class="col-12">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-3">Name</div>
                                    <div class="col-1">Logged In</div>
                                    @foreach($days as $day)
                                        <div class="col-1">{{$day}}</div>
                                    @endforeach
                                </div>
                                <hr>
                                @foreach($users as $user)
                                    @if($user->branch_id == $branch->id)
                                        @include('templates.user-card')
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection