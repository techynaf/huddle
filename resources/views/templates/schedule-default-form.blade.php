<label for="start[]" class="">Entry Time</label>
<div class="row">
    <div class="col-12">
        <input type="time" name="start[]" class="form-control input-sm">
    </div>
</div>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin' || auth()->user()->roles->first()->name == 'HR')
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
    <div class="col-12">
        <input type="time" name="end[]" class="form-control input-sm">
    </div>
</div>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin' || auth()->user()->roles->first()->name == 'HR')
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