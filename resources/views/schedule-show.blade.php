@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            @if($flow)
                <div class="row">
                    <div class="col-sm-12">	
                        <h2 class="page-title">Schedule</h2>
                    </div>
                </div>

                @if(count($schedules) == 0)
                    <div class="card-box">
                        <div class="row text-center">
                            <hr>
                            <h2>There are no schedules for this day.</h2>
                            <hr>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
                                            <td><a href="/schedule/update/{{$schedule->id}}">Edit</a> <a href="/schedule/delete/{{$schedule->id}}">Delete</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end row -->
                @endif
            @endif
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">{{$message}}</h2>
                </div>
            </div>

            <div class="card-box">
                <h4>{{$year}}</h4>
                <div class="row">
                    @for($i = 1; $i <= $date; $i++)
                        <div class="col-3">
                            <a href="/schedule/show?year={{$year.'&month='.$month.'&date='.$i}}">
                                <h4>{{$name.' - '.$i}}</h4>
                            </a>
                        </div>
                    @endfor
                </div>

                <br>
                <a href="/schedule/view" class="btn btn-primary btn-rounded">Try another range.</a>
            </div>
        </div>
    </div>
@endsection