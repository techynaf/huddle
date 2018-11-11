<div class="row pr-2">
    <div class="col-12">
        <div class="row mb-1">
            <div class="col-md-6 mx-0 px-1">
                <input type="time" name="start[]" class="form-control input-sm input-sm-clock">
            </div>
            <div class="col-md-6 mx-0 pl-0 pr-2">
                <input type="time" name="end[]" class="form-control input-sm input-sm-clock">
            </div>
        </div>
    </div>
</div>

@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin' || auth()->user()->roles->first()->name == 'HR')
    <div class="row mt-1 pr-2">
        <div class="col-md-12">
            <div class="row ">
                <div class="col-md-6 mx-0 px-1">
                    <select name="entry_b[]" class="form-control schedular-branch-font-size input-sm">
                        <option value="{{$user->branch->id}}">{{$user->branch->name}}</option>
                        @foreach($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mx-0 pl-0 pr-2">
                    <select name="exit_b[]" class="form-control schedular-branch-font-size input-sm">
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
