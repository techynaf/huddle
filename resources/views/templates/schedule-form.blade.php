<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group mb-0">
                <label for="start[]">Entry Time</label>
                <div class="input-group">
                    <input type="time" class="form-control" name="start[]" value="{{$schedule->start}}" 
                    placeholder="HH:MM" required>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            @if(auth()->user()->roles->first() == 'district-manager' || auth()->user()->roles->first() == 'super-admin')
                <label for="entry_b[]" class="col-form-label">Entry Branch</label>
                <select name="entry_b[]">
                    <option value="{{$schedule->startingBranch->id}}">{{$schedule->startingBranch->name}}</option>
                    @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            @else
                <input type="hidden" value="{{$schedule->startingBranch->id}}" name="entry_b[]">
            @endif
        </div>
        <div class="col-sm-12">
            <div class="form-group mb-0">
                <label for="end[]">Exit Time</label>
                <div class="input-group">
                    <input type="time" class="form-control" name="end[]" value="{{$schedule->end}}" 
                    placeholder="HH:MM" required>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            @if(auth()->user()->roles->first() == 'district-manager' || auth()->user()->roles->first() == 'super-admin')
                <label for="exit_b[]" class="col-form-label">Exit Branch</label>
                <select name="exit_b[]">
                    <option value="{{$schedule->endingBranch->id}}">{{$schedule->endingBranch->name}}</option>
                    @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            @else
                <input type="hidden" value="{{$schedule->endingBranch->id}}" name="exit_b[]">
            @endif
        </div>
    </div>
</div>