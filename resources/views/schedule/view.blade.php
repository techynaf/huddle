@extends('layouts.app')

@section('content')
    <script>
        let current = 0;

        function showInfo(id) {
            if (current != id) {
                if (current !== 0) {
                    document.getElementById('r-'+current).classList.add('hidden');
                }

                document.getElementById('r-'+id).classList.remove('hidden');
            }

            current = id;
        }
    </script>

        <div class="row">
            <div class="col-md-12">
                <div class="bg-white scheduler">
                    <div class="header page-title-schedule text-uppercase">
                        <div class="row pt-3">
                            <div class="col-md-1 text-center">Name</div>
                            @for($i = (new App\Http\Controllers\Controller)->findSun(null); $i <= (new App\Http\Controllers\Controller)->findSun(null)->addDays(6); $i->addDays(1))
                                <div class="col-md">
                                    {{ $i->copy()->format('DdM') }}
                                    
                                    {{ $i->copy()->format('Y') }}
                                </div>
                            @endfor
                        </div>
                        <hr>
                    </div>
                    @foreach (auth()->user()->branch->employees as $user)
                        <div class="row mt-3 pb-3 text-center border-bottom">
                            <div class="col-md-1 my-auto">{{ $user->name }}</div>
                            @for($i = (new App\Http\Controllers\Controller)->findSun(null); $i <= (new App\Http\Controllers\Controller)->findSun(null)->addDays(6); $i->addDays(1))
                                <div class="col-md my-auto {{ (new App\Helper\ScheduleHelper)->scheduleLeaveFinder($i->toDateString(), $user)[0] ? 'btn btn-outline-danger' : '' }}">
                                    @if ((new App\Helper\ScheduleHelper)->scheduleLeaveFinder($i->toDateString(), $user)[0])
                                        {{ (new App\Helper\ScheduleHelper)->scheduleLeaveFinder($i->toDateString(), $user)[1] }}
                                    @else
                                        {{ $user->scheduleStart($i->copy()->toDateString()).' - '.$user->scheduleEnd($i->copy()->toDateString()) }}
                                    @endif
                                </div>
                            @endfor
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection