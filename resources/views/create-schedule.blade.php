@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Create Schedule</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title">Employee Roster Table</h4>
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                @foreach($days as $day)
                                    <th>{{$day[0].' '.$day[1]}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <form action="/create/schedule/{{$user->id}}" method="POST">
                                        @csrf
                                        <tr>
                                            <td>
                                                {{$user->name}}
                                                <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                                            </td>
                                            
                                            @foreach($schedules[$loop->index] as $schedule)
                                                <td>
                                                    @if($schedule == 'day-off')
                                                        <div class="text-center btn-danger">
                                                            DAY OFF
                                                        </div>
                                                    @elseif($schedule == false)
                                                        @include('templates.schedule-default-form')
                                                    @else
                                                        @include('templates.schedule-form')
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection