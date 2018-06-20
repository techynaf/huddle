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
                                            <label class="col-2 col-form-label" for="email">Email</label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="email" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="phone">Phone</label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="phone" placeholder="Phone Number">
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
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="role">Role</label>
                                            <div class="col-4">
                                                <select name="role" class="form-control">
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-2 col-form-label" for="job_title">Job Title</label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="job_title" placeholder="Job Title">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="address">Address</label>
                                            <div class="col-4">
                                                <textarea name="address" class="form-control" rows="5" placeholder="Address"></textarea>
                                            </div>
                                            <label class="col-2 col-form-label" for="status">Status of Employee</label>
                                            <div class="col-4">
                                                <select name="status" class="form-control">
                                                    <option value="probational">Probational</option>
                                                    <option value="premanent">Premanent</option>
                                                    <option value="contractual">Contractual</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-2 col-form-label" for="category">Category of Employee</label>
                                            <div class="col-4">
                                                <select name="category" class="form-control">
                                                    <option value="full_time">Full Time</option>
                                                    <option value="part_time">Part Time</option>
                                                </select>
                                            </div>
                                            <label class="col-2 col-form-label" for="religion">Religion</label>
                                            <div class="col-4">
                                                <input type="text" class="form-control" name="religion" placeholder="Religion">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-2 col-form-label" for="date">Joining Date</label>
                                                <div class="col-4">
                                                    <input type="date" class="form-control" name="date" placeholder="Joining Date">
                                                </div>
                                                <label class="col-2 col-form-label" for="id">Employee ID</label>
                                                <div class="col-4">
                                                    <input type="text" class="form-control" name="id" placeholder="Employee ID">
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