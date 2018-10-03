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
                                            <div class="col-12 text-center">
                                                <div class="btn-group btn-group-toggle mt-3 mb-4" data-toggle="buttons">
                                                    @foreach ($types as $type)
                                                        <label class="btn btn-success p-3">
                                                            <input type="radio" name="type" autocomplete="off" value="{{$type->id}}"> {{$type->name}}
                                                        </label>
                                                    @endforeach
                                                  </div>
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
                                        <div class="form-group row">
                                            <div class="col-1">
                                                <label for="comment" class="form-label-control float-right align-middle">Comment</label>
                                            </div>
                                            <div class="col-11">
                                                <textarea name="comment" class="form-control" cols="30" rows="10"></textarea>
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
                    </div>
                </div>
            </div>
@endsection