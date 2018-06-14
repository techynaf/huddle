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
                                                    <option value="null">---</option>
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
                                                    <option value="null">---</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-2 col-form-label" for="address">Address</label>
                                            <div class="col-4">
                                                <textarea name="address" class="form-control" rows="5" placeholder="Address"></textarea>
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