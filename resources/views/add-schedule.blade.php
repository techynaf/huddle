@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Profile</h2>
                </div>
            </div>
            @if(count($schedules) != 0)
            <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="responsive-datatable" class="table table-bordered table-bordered 
                            dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Branch</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($schedules as $schedule)
                                    <tr>
                                        <td>{{$schedule->user->name}}</td>
                                        <td>{{$schedule->branch->name}}</td>
                                        <td>{{$schedule->start}}</td>
                                        <td>{{$schedule->end}}</td>
                                        <td>
                                            <a href="/schedule/update/{{$schedule->id}}">Edit</a> 
                                            <a href="/schedule/delete/{{$schedule->id}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->
                <div class="card-box">
                    <h4>Existing Schedule for {{$date}}</h4>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            Name
                        </div>
                        <div class="col-4">
                            Start Time
                        </div>
                        <div class="col-4">
                            End Time
                        </div>
                    </div>
                    <hr>
                    @foreach($schedules as $schedule)
                        <div class="row">
                            <div class="col-4">
                                {{$schedule->user->name}}
                            </div>
                            <div class="col-4">
                                {{$schedule->start}}
                            </div>
                            <div class="col-4">
                                {{$schedule->end}}
                            </div>
                            
                        </div>
                        <hr>
                    @endforeach
                </div>
            @endif
            <div class="card-box">
                <h4>Add Schedule to {{$date}}</h4>
                <form action="/schedule/store/{{$date}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <label for="user">
                                Emlpoyee Name
                            </label>
                        </div>
                        <div class="col-4">
                            <label for="start">
                                Start Time
                            </label>
                        </div>
                        <div class="col-4">
                            <label for="end">
                                End Time
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control" name="user">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <input id="timepicker" type="text" class="form-control" name="start">
                        </div>
                        <div class="col-4">
                            <input id="timepicker3" type="text" class="form-control" name="end">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-11"></div>
                        <div class="col-1">
                            <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection