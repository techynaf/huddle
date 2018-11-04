<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-6 mx-0 px-0">
                <input type="time" name="start[]" class="form-control input-sm">
            </div>
            <div class="col-md-6 mx-0 px-0">
                <input type="time" name="end[]" class="form-control input-sm">
            </div>
        </div>
    </div>
</div>

<br>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin' || auth()->user()->roles->first()->name == 'HR')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-0 px-0">
                    <select name="entry_b[]" class="form-control ">
                        <option value="{{$user->branch->id}}">{{$user->branch->name}}</option>
                        @foreach($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mx-0 px-0">
                    <select name="exit_b[]" class="form-control ">
                        <option value="{{$user->branch->id}}">{{$user->branch->name}}</option>
                        @foreach($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
@else
    <input type="hidden" value="{{$user->branch->id}}" name="entry_b[]">
    <input type="hidden" value="{{$user->branch->id}}" name="exit_b[]">
@endif
