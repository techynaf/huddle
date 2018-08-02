<label for="start[]" class="sm">Entry Time</label>
<div class="row">
    <div class="col-7">
        <select name="startT[]" class="form-control" required>
            <option value="{{date("g:i", strtotime($schedule->start))}}">{{date("g:i", strtotime($schedule->start))}}</option>
            @foreach ($times as $time)
                <option value="{{$time}}">{{$time}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-5">
        <select name="sp[]" class="form-control" required>
            <option value="{{date("A", strtotime($schedule->start))}}">{{date("A", strtotime($schedule->start))}}</option>
            <option value="AM">AM</option>
            <option value="PM">PM</option>
        </select>
    </div>
</div>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
    <label for="entry_b[]" class="col-form-label">Entry Branch</label>
    <select name="entry_b[]" class="form-control input-sm">
        <option value="{{$schedule->startingBranch->id}}">{{$schedule->startingBranch->name}}</option>
        @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->name}}</option>
        @endforeach
    </select>
@else
    <input type="hidden" value="{{$schedule->startingBranch->id}}" name="entry_b[]">
@endif

<label>Exit Time</label>
<div class="row">
        <div class="col-7">
            <select name="endT[]" class="form-control" required>
                <option value="{{date("g:i", strtotime($schedule->end))}}">{{date("g:i", strtotime($schedule->end))}}</option>
                @foreach ($times as $time)
                    <option value="{{$time}}">{{$time}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-5">
            <select name="ep[]" class="form-control" required>
                <option value="{{date("A", strtotime($schedule->end))}}">{{date("A", strtotime($schedule->end))}}</option>
                <option value="AM">AM</option>
                <option value="PM">PM</option>
            </select>
        </div>
    </div>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
    <label for="exit_b[]" class="col-form-label sm">Exit Branch</label>
    <select name="exit_b[]" class="form-control input-sm">
        <option value="{{$schedule->endingBranch->id}}">{{$schedule->endingBranch->name}}</option>
        @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->name}}</option>
        @endforeach
    </select>
@else
    <input type="hidden" value="{{$schedule->endingBranch->id}}" name="exit_b[]">
@endif