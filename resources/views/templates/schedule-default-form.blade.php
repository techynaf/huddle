<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <label for="start[]" class="schedule-label">Entry Time</label>
                <input type="time" name="start[]" class="form-control input-sm-schedule" required>
            </div>
            <div class="col-6">
                <label class="schedule-label">Exit Time</label>
                <input type="time" name="end[]" class="form-control input-sm-schedule" required>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                @if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
                <label for="entry_b[]" class="col-form-label schedule-label">Entry Branch</label>
                <select name="entry_b[]" class="form-control input-sm-schedule-branch">
                    <option value="{{$user->branch->id}}">{{$user->branch->name}}</option>
                    @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
                @else
                    <input type="hidden" value="{{$user->branch->id}}" name="entry_b[]">
                @endif
            </div>
            <div class="col-6">
                @if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
                <label for="exit_b[]" class="col-form-label schedule-label">Exit Branch</label>
                <select name="exit_b[]" class="form-control input-sm-schedule-branch">
                    <option value="{{$user->branch->id}}">{{$user->branch->name}}</option>
                    @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
                @else
                    <input type="hidden" value="{{$user->branch->id}}" name="exit_b[]">
                @endif
            </div>
        </div>
    </div>
</div>