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
                                <th>Shift Managers</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <td><a href="/branch/details/{{$branch->id}}">{{$branch->name}}</a></td>
                                    <td>{{count($branch->users)}}</td>
                                    <td>Manager</td>
                                    <td>Assistant Manager</td>
                                    <td>Shift Managers</td>
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