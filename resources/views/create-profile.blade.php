@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Create New Profile</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20">
                                    <form class="form-horizontal" role="form" action="/store/profile" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="name">Name</label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="name" placeholder="Name">
                                            </div>
                                            <label class="col-2 col-form-label" for="role">Employee ID</label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="e_id" placeholder="Employee ID">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="role">Job Title</label>
                                            <div class="col-4">
                                                <select name="role" class="form-control">
                                                    @foreach($roles as $role)
                                                        <option value="{{$role[1]}}">{{$role[0]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-2 col-form-label" for="branch">Branch</label>
                                            <div class="col-4">
                                                <select name="branch" class="form-control">
                                                    @foreach($branches as $branch)
                                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-11"></div>
                                            <div class="col-1">
                                                <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end row -->
                    </div> <!-- end card-box -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div>
@endsection