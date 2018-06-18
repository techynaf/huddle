@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    @for($i = 0; $i < 7; $i++)
                                        <th>{{$days[$i].' '.$dates[$i]}}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                <form action="/schedule/create/{{$count}}">
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                {{$user->name}}
                                            </td>
                                            @foreach($dates as $date)
                                                <td>
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group mb-0">
                                                                    <label>Entry Time</label>
                                                                    <div class="input-group">
                                                                        <input id="timepicker3" name="{{'entry_time_'.$user->id.'_'.$date}}" type="text" class="form-control timepicker3">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Entry Branch</label>
                                                                <select class="form-control" name="{{'entry_branch_'.$user->id.'_'.$date}}">
                                                                    <option value="null">---</option>
                                                                    @foreach($branches as $branch)
                                                                        <option value="{{$branch->id.}}">{{$branch->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group mb-0">
                                                                    <label>Exit Time</label>
                                                                    <div class="input-group">
                                                                        <input id="timepicker4" name="{{'exit_time_'.$user->id.'_'.$date}}" type="text" class="form-control timepicker4">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Entry Branch</label>
                                                                <select class="form-control" name="{{'exit_branch_'.$user->id.'_'.$date}}">
                                                                    <option value="null">---</option>
                                                                    @foreach($branches as $branch)
                                                                        <option value="{{$branch->id.}}">{{$branch->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>			
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    <input type="submit" class="btn btn-primary btn-rounded">
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
    </div>
    <!-- end wrapper -->
@endsection