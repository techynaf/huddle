<a href="/view/employee/{{$user->id}}">
    <div class="row card-box btn-outline-primary">
        <div class="col-1">
            <i class="far fa-user 2x"></i>
        </div>
        <div class="col-3">
            {{$user->name}}
        </div>

        <div class="col-1">
            @if($user->logged_in)
                <i class="fas fa-check 2x"></i>
            @else
                <i class="fas fa-times 2x"></i>
            @endif
        </div>

        @foreach($schedules as $schedule)
            @foreach($dates as $date)
                @if ($schedule->user->id == $user->id && $schedule->date == $date)
                    <div class="col-1">
                        {{$schedule->start.' - '.$schedule->end}}
                    </div>
                    @break
                @endif
            @endforeach
        @endforeach

    </div>
</a>