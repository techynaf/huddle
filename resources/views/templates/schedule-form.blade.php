<label for="start[]">Entry Time</label>
<input type="time" class="form-control timepicker3" name="start[]" value="{{$schedule->start}}" min="1" max="12" required>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
    <label for="entry_b[]" class="col-form-label">Entry Branch</label>
    <select name="entry_b[]" class="form-control">
        <option value="{{$schedule->startingBranch->id}}">{{$schedule->startingBranch->name}}</option>
        @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->name}}</option>
        @endforeach
    </select>
@else
    <input type="hidden" value="{{$schedule->startingBranch->id}}" name="entry_b[]">
@endif

<label>Exit Time</label>
<input type="time" class="form-control timepicker3" name="end[]" value="{{$schedule->end}}" min="1" max="12" required>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
    <label for="exit_b[]" class="col-form-label">Exit Branch</label>
    <select name="exit_b[]" class="form-control">
        <option value="{{$schedule->endingBranch->id}}">{{$schedule->endingBranch->name}}</option>
        @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->name}}</option>
        @endforeach
    </select>
@else
    <input type="hidden" value="{{$schedule->endingBranch->id}}" name="exit_b[]">
@endif