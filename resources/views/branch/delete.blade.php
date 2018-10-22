@extends('layouts.app')

@section('content')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>Select a Branch to delete</h4>
                        </div>
        
                        <div class="card-body">
                            <form method="POST" action="/branch/destroy">
                                @csrf
                                <div class="form-group row my-4">
                                    <label for="id" class="col-sm-4 col-form-label text-md-right pin">Select Branch</label>
        
                                    <div class="col-md-6">
                                        <select name="id" class="form-control">
                                            @foreach($branches as $branch)
                                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-danger huddle-red-btn">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection