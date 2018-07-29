@extends('layouts.app')

@section('content')
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Leave Request Form</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20">
                                    <form class="form-horizontal" role="form" action="/request/{{auth()->user()->id}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-1">
                                                <label class="form-label-control float-right align-middle">Leave Type</label>
                                            </div>
                                            <div class="col-11">
                                                <select class="form-control" name="type">
                                                    @foreach($types as $type)
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-1">
                                                <label for="start" class="form-label-control float-right align-middle">Start Date</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="date" name="start" class="form-control">
                                            </div>
                                            <div class="col-1">
                                                <label for="end" class="form-label-control float-right align-middle">End Date</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="date" name="end" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-11"></div>
                                            <div class="col-1">
                                                <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                    </div> <!-- end card-box -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
@endsection