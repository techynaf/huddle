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
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        
                                        @if($schedules[$loop->index]->user_id == $user->id)
                                            @foreach($schedules[$loop->index] as $schedule)
                                                <td>
                                                    
                                                </td>
                                            @endforeach
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection