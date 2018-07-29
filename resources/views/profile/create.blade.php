@extends('layouts.app')

@section('content')
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
                                            <label class="col-1 text-right col-form-label" for="name">Name</label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="name" placeholder="Name">
                                            </div>
                                            <div class="col-1"></div>
                                            <label class="col-1 text-right col-form-label" for="employee_id">Employee ID</label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="employee_id" placeholder="Employee ID">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-1 text-right col-form-label" for="role">Job Title</label>
                                            <div class="col-4">
                                                <select name="role" class="form-control">
                                                    @foreach($roles as $role)
                                                        <option value="{{$role[0]}}">{{$role[1]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-1"></div>
                                            <label class="col-1 text-right col-form-label" for="branch">Branch</label>
                                            <div class="col-4">
                                                <select name="branch" class="form-control">
                                                    @foreach($branches as $branch)
                                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-1 text-right col-form-label" for="religion">Religion</label>
                                                <div class="col-4">
                                                    <select name="religion" class="form-control">
                                                        <option value=""></option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Hinduism">Hinduism</option>
                                                        <option value="Buddhism">Buddhism</option>
                                                        <option value="Christianity">Christianity</option>
                                                        <option value="Other">Other</option>
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
            </div>
@endsection