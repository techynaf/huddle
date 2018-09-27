<label for="start[]" class="sm">Entry Time</label>
<div class="row">
    <div class="col-12">
        <input type="time" name="start[]" class="form-control input-sm" value="{{$schedule->start}}">
    </div>
</div>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin' || auth()->user()->roles->first()->name == 'HR')
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
    <div class="col-12">
        <input type="time" name="end[]" class="form-control input-sm" value="{{$schedule->end}}">
    </div>
</div>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin' || auth()->user()->roles->first()->name == 'HR')
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