@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        @foreach ($types as $type)
            <div class="col-md-6"><a href="{{ route('leaves.type', ['name' => $type->name]) }}"><h2 class="text-center">{{ $type->name }}</h2></a></div>

            @if ($loop->iteration % 2 == 0)
                </div>
                <div class="row mb-3">
            @endif
        @endforeach
    </div>
@endsection