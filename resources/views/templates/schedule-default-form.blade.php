<label for="start[]">Entry Time</label>
<input type="time" class="form-control input-sm" name="start[]" placeholder="HH:MM AM/PM" required>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
    <label for="entry_b[]" class="col-form-label">Entry Branch</label>
    <select name="entry_b[]" class="form-control">
        <option value="{{$user->branch->id}}">{{$user->branch->name}}</option>
        @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->name}}</option>
        @endforeach
    </select>
@else
    <input type="hidden" value="{{$user->branch->id}}" name="entry_b[]">
@endif

<label>Exit Time</label>
<input type="time" class="form-control input-sm" name="end[]" placeholder="HH:MM AM/PM" required>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
    <label for="exit_b[]" class="col-form-label">Exit Branch</label>
    <select name="exit_b[]" class="form-control">
        <option value="{{$user->branch->id}}">{{$user->branch->name}}</option>
        @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->name}}</option>
        @endforeach
    </select>
@else
    <input type="hidden" value="{{$user->branch->id}}" name="exit_b[]">
@endif