<label for="start[]" class="sm">Entry Time</label>
<input type="time"  class="form-control input-sm xm" name="start[]" value="{{$schedule->start}}" placeholder="HH:MM AM/PM" required>

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
<input type="time" class="form-control input-sm xm" name="end[]" value="{{$schedule->end}}" placeholder="HH:MM AM/PM" required>

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