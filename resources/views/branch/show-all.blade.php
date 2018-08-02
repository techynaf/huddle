@extends('layouts.app')

@section('content')
            <div class="row">
                <h2 class="page-title">Branches</h2>
            </div>
            <div class="row card-box">
                <div class="col-sm-12">
                    <table class="table">
                        <thead class="table-header">
                            <tr>
                                <th>Branch Name</th>
                                <th>Employees</th>
                                <th>Manager</th>
                                <th>Assistant Manager</th>
                                <th>Shift Supervisors</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <td><a href="/branch/details/{{$branch->id}}">{{$branch->name}}</a></td>
                                    <td>{{count($branch->users)}}</td>
                                    @if ($managers[$loop->index] != null)
                                        <td>
                                            @foreach ($managers[$loop->index] as $manager)
                                                <a href="/view/employee/{{$manager->id}}" target="_blank">{{$manager->name}}</a> <br>
                                            @endforeach
                                        </td>
                                    @else
                                        <td>No managers</td>
                                    @endif
                                    @if ($assistant_managers[$loop->index] != null)
                                        <td>
                                            @foreach ($assistant_managers[$loop->index] as $manager)
                                                <a href="/view/employee/{{$manager->id}}" target="_blank">{{$manager->name}}</a> <br>
                                            @endforeach
                                        </td>
                                    @else
                                        <td>No assistant managers</td>
                                    @endif
                                    @if ($supervisors[$loop->index] != null)
                                        <td>
                                            @foreach ($supervisors[$loop->index] as $supervisor)
                                                <a href="/view/employee/{{$supervisor->id}}" target="_blank">{{$supervisor->name}}</a> <br>
                                            @endforeach
                                        </td>
                                    @else
                                        <td>No shift supervisors</td>
                                    @endif
                                </tr>
                            @endforeach
                            <tr>
                                <td><a href="/branch/details/0">Unassigned</a></td>
                                <td>{{count($unassigned)}}</td>
                                <td>---</td>
                                <td>---</td>
                                <td>---</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endsection