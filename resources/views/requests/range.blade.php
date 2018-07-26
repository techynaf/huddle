@extends('layouts.app')

@section('content')
            <div class="row">
                <h2 class="page-title">Select Leave Range</h2>
            </div>

            <form action="" method="POST">
                <input type="hidden" name="type" value="{{$type}}">
                <div class="row">
                    <div class="col-12 card-box">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <div class="form-group row">
                                    <label class="control-label col-sm-4">Date Range</label>
                                    <div class="col-sm-8">
                                        <div class="input-daterange input-group" id="date-range">
                                            <input type="text" class="form-control" name="start" />
                                            <input type="text" class="form-control" name="end" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-11"></div>
                            <div class="col-1">
                                <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
@endsection