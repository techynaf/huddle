@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Select a Branch to delete</h4>
                        </div>
        
                        <div class="card-body">
                            <form method="POST" action="/branch/destroy">
                                @csrf
                                <div class="form-group row">
                                    <label for="id" class="col-sm-4 col-form-label text-md-right">Select Branch</label>
        
                                    <div class="col-md-6">
                                        <select name="id" class="form-control">
                                            @foreach($branches as $branch)
                                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="shift" class="col-sm-4 col-form-label text-md-right">Move employees to</label>
            
                                        <div class="col-md-6">
                                            <select name="shift" class="form-control">
                                                @foreach($branches as $branch)
                                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-danger btn-rounded">
                                            Delete
                                        </button>
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