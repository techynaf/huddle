<div class="row pr-2">
    <div class="col-12">
<<<<<<< HEAD
        <div class="row mb-1">
            <div class="col-md-6 mx-0 px-1">
                <input type="time" name="start[]" class="form-control input-sm">
            </div>
            <div class="col-md-6 mx-0 pl-0 pr-2">
                <input type="time" name="end[]" class="form-control input-sm">
=======
        <div class="row">
            <div class="col-md-6 mx-0 px-0">
                <input type="time" name="start[]" class="form-control input-sm input-sm-clock">
            </div>
            <div class="col-md-6 mx-0 px-0">
                <input type="time" name="end[]" class="form-control input-sm input-sm-clock">
>>>>>>> caa08ce52d43dda553b2dbc932ddda4be5d80e2b
            </div>
        </div>
    </div>
</div>

<<<<<<< HEAD


=======
>>>>>>> caa08ce52d43dda553b2dbc932ddda4be5d80e2b
@if(auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin' || auth()->user()->roles->first()->name == 'HR')
    <div class="row mt-1 pr-2">
        <div class="col-md-12">
<<<<<<< HEAD
            <div class="row ">
                <div class="col-md-6 mx-0 px-1">
                    <select name="entry_b[]" class="form-control schedular-branch-font-size">
=======
            <div class="row">
                <div class="col-md-6 mx-0 px-0">
                    <select name="entry_b[]" class="form-control input-sm">
>>>>>>> caa08ce52d43dda553b2dbc932ddda4be5d80e2b
                        <option value="{{$user->branch->id}}">{{$user->branch->name}}</option>
                        @foreach($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                        @endforeach
                    </select>
                </div>
<<<<<<< HEAD
                <div class="col-md-6 mx-0 pl-0 pr-2">
                    <select name="exit_b[]" class="form-control schedular-branch-font-size">
=======
                <div class="col-md-6 mx-0 px-0">
                    <select name="exit_b[]" class="form-control input-sm">
>>>>>>> caa08ce52d43dda553b2dbc932ddda4be5d80e2b
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
