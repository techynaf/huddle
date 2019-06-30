@extends('layouts.app')

@section('content')
            <div class="row mt-5">
                <div class="col-sm-12">
                    <h4 class="page-title">Create New Profile</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box-employee">
                        <div class="row pt-4">
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
                                            <label class="col-1 text-right col-form-label" for="role">Access Level</label>
                                            <div class="col-4">
                                                <select name="role" class="form-control" required>
                                                    <option value="">Select an Access Level</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role[0]}}">{{$role[1]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-1"></div>
                                            <label class="col-1 text-right col-form-label" for="branch">Branch</label>
                                            <div class="col-4">
                                                <select name="branch" class="form-control" required>
                                                    <option value="">Select a Branch</option>
                                                    @foreach($branches as $branch)
                                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-1 text-right col-form-label" for="religion">Religion</label>
                                            <div class="col-4">
                                                <select name="religion" class="form-control" required>
                                                    <option value="">Select a Religion</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Hinduism">Hinduism</option>
                                                    <option value="Buddhism">Buddhism</option>
                                                    <option value="Christianityity">Christianity</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-1"></div>
                                            <label class="col-1 text-right col-form-label" for="status">Status</label>
                                            <div class="col-4">
                                                <select name="status" class="form-control" required>
                                                    <option value="">Select a Status</option>
                                                    <option value="Probation">Probation</option>
                                                    <option value="Permanent">Permanent</option>
                                                    <option value="Part Time">Part Time</option>
                                                    <option value="Contratual">Contratual</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-1 text-right col-form-label" for="religion">Designation</label>
                                            <div class="col-4">
                                                <select name="designation" class="form-control" required>
                                                    <option value="">Select a Designation</option>
                                                    @foreach (App\Designation::all() as $designation)
                                                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-1"></div>
                                            <label class="col-1 text-right col-form-label" for="status">Gender</label>
                                            <div class="col-4">
                                                <select name="gender" class="form-control" required>
                                                    <option value="">Select a Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-1 text-right col-form-label" for="religion">Joining Date</label>
                                            <div class="col-4">
                                                <input type="date" name="joining_date" class="form-control" required>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-4"></div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-1"></div>
                                            <div class="col-11">
                                                <button class="btn btn-primary huddle-brown-btn my-4" type="submit">Submit</button>
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