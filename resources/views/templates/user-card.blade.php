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
        @foreach($schedules[$loop->index] as $schedule)
            @if($schedule == null)
                <div class="col-1"></div>
            @else
                <div class="col-1">
                    {{date("h:m A", strtotime($schedule->start))}}
                    <br>
                    {{date("h:m A", strtotime($schedule->end))}}
                </div>
            @endif
        @endforeach
    </div>
</a>