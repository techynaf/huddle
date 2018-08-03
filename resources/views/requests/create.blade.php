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
                                            <div class="col-8">
                                                <div class="btn-group btn-group-toggle mt-3 mb-4" data-toggle="buttons">
                                                    <label class="btn btn-success active">
                                                        <input type="radio" name="type" id="option1" autocomplete="off" value="1" checked> Weekly Leave
                                                    </label>
                                                    <label class="btn btn-success">
                                                        <input type="radio" name="type" id="option2" autocomplete="off" value="2"> Sick Leave
                                                    </label>
                                                    <label class="btn btn-success">
                                                        <input type="radio" name="type" id="option3" autocomplete="off" value="3"> Annual Leave
                                                    </label>
                                                    <label class="btn btn-success">
                                                        <input type="radio" name="type" id="option3" autocomplete="off" value="4"> Government Leave
                                                    </label>
                                                  </div>
                                            </div>
                                            <div class="col-2"></div>
                                            <div class="col-2">
                                                @if ($flow == 'false')
                                                    <input type="hidden" name="flow" value="false">
                                                    <a href="/request?flow=true" class="btn btn-info mt-3 pull-right">Enable Range</a>
                                                @else
                                                    <input type="hidden" name="flow" value="true">
                                                    <a href="/request?flow=false" class="btn btn-info mt-3 pull-right">Disable Range</a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-1">
                                                <label for="start" class="form-label-control float-right align-middle">Date 1</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="date" name="start" class="form-control" required>
                                            </div>
                                            <div class="col-1">
                                                <label for="end" class="form-label-control float-right align-middle">Date 2</label>
                                            </div>
                                            <div class="col-5">
                                                <input type="date" name="end" class="form-control" required>
                                            </div>
                                        </div>
                                        @if ($flow == 'true')
                                            <div class="form-group row">
                                                <div class="col-1">
                                                    <label for="s" class="form-label-control float-right align-middle">Start</label>
                                                </div>
                                                <div class="col-5">
                                                    <input type="date" name="s" class="form-control" required>
                                                    <p class="hint">Please select the starting date to be a Sunday</p>
                                                </div>
                                                <div class="col-1">
                                                    <label for="e" class="form-label-control float-right align-middle">End</label>
                                                </div>
                                                <div class="col-5">
                                                    <input type="date" name="e" class="form-control" required>
                                                    <p class="hint">Please select the ending date to be a Saturday</p>
                                                </div>
                                            </div>
                                        @endif
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