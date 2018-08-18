@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manager Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="/manager-login">
                        @csrf

                        <div class="form-group row">
                            <label for="pin" class="col-sm-4 col-form-label text-md-right">Manager Pin</label>

                            <div class="col-md-6">
                                <input id="pin" type="number" class="form-control" name="pin" value="{{ old('pin') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
