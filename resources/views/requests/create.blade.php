@extends('layouts.app')

@section('content')
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                    <h2 class="page-title-leave">LEAVE REQUEST FORM</h2>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-20">
                                    <form class="form-horizontal" role="form" action="/request/{{auth()->user()->id}}" method="POST">
                                        @csrf
                                        <div class="form-group row text-center">
                                            <div class="col-12">
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-success huddle-leave-btn m-1">
                                                        <input type="radio" name="type" id="option2" autocomplete="off" value="2"> Sick Leave
                                                    </label>
                                                    <label class="btn btn-success huddle-leave-btn m-1">
                                                        <input type="radio" name="type" id="option3" autocomplete="off" value="3"> Annual Leave
                                                    </label>
                                                    <label class="btn btn-success huddle-leave-btn m-1">
                                                        <input type="radio" name="type" id="option3" autocomplete="off" value="4"> Government Leave
                                                    </label>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="form-group row my-5">
                                            <div class="col-1">
                                                <label for="start" class="form-label-control float-right align-middle font-weight-bold">DATE 1</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="date" name="start" class="form-control" required>
                                            </div>
                                            <div class="col-1">
                                                <label for="end" class="form-label-control float-right align-middle font-weight-bold">DATE 2</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="date" name="end" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row text-center">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success px-5">Submit</button>
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