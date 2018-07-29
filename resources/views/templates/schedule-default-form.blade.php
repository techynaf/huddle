<label for="start[]" class="">Entry Time</label>
<div class="row">
    <div class="col-7">
        <select name="startT[]" class="form-control" required>
            <option value=""></option>
            @foreach ($times as $time)
                <option value="{{$time}}">{{$time}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-5">
        <select name="sp[]" class="form-control" required>
            <option value="AM">AM</option>
            <option value="PM">PM</option>
        </select>
    </div>
</div>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
    <label for="entry_b[]" class="col-form-label ">Entry Branch</label>
    <select name="entry_b[]" class="form-control ">
        <option value="{{$user->branch->id}}">{{$user->branch->name}}</option>
        @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->name}}</option>
        @endforeach
    </select>
@else
    <input type="hidden" value="{{$user->branch->id}}" name="entry_b[]">
@endif

<label class="">Exit Time</label>
<div class="row">
    <div class="col-7">
        <select name="endT[]" class="form-control" required>
            <option value=""></option>
            @foreach ($times as $time)
                <option value="{{$time}}">{{$time}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-5">
        <select name="ep[]" class="form-control" required>
            <option value="AM">AM</option>
            <option value="PM">PM</option>
        </select>
    </div>
</div>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin')
    <label for="exit_b[]" class="col-form-label ">Exit Branch</label>
    <select name="exit_b[]" class="form-control ">
        <option value="{{$user->branch->id}}">{{$user->branch->name}}</option>
        @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->name}}</option>
        @endforeach
    </select>
@else
    <input type="hidden" value="{{$user->branch->id}}" name="exit_b[]">
@endif