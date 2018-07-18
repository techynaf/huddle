@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
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
                                    <td>{{$branch->name}}</td>
                                    <td>{{count($branch->users)}}</td>
                                    <td>Manager</td>
                                    <td>Assistant Manager</td>
                                    <td>Shift Managers</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection