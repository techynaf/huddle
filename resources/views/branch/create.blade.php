@extends('layouts.app')

@section('content')
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create New Branch</h4>
                        </div>
        
                        <div class="card-body">
                            <form method="POST" action="/branch/create">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Please enter the name of the branch" required autofocus>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-rounded">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection