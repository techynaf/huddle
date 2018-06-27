@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">	
                    <h2 class="page-title">Select date</h2>
                </div>
            </div>
            <div class="card-box">
                <form action="">
                    <div class="row">
                        <div class="col-3">
                            <label for="date" class="form-label-control">Date</label>
                        </div>
                        <div class="col-6">
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection