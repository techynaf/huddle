@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Requests</h4>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        @foreach($requests as $request)
                            <form action="/store/requests/{{$request->id.'/'.$flow}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-1">
                                        Name:
                                    </div>
                                    <div class="col-1">
                                        {{$request->user->name}}
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-1">
                                        Branch:
                                    </div>
                                    <div class="col-3">
                                        {{$request->user->branch->name}}
                                    </div>
                                    <div class="col-1">Status:</div>
                                    <div class="col-2">
                                        Pending
                                    </div>
                                    <div class="col-1">
                                        <select class="form-control" name="status">
                                            <option value="null">---</option>
                                            <option value="approved">Approve</option>
                                            <option value="declined">Decline</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-11">
                                        <h3>{{$request->subject}}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-11">
                                        {{$request->body}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-11"></div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div> <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection