@extends('layouts.app')

@section('content')
    <script>
        var count = {{ count($policies) }};
        function addNew () {
            if (document.getElementById('new').classList.contains('hidden')) {
                document.getElementById('new').classList.remove('hidden');
                document.getElementById('new').classList.contains('hidden');
                document.getElementById('add-btn').innerHTML = 'Cancel Addition';
                document.getElementById('last').value = null;
            } else {
                document.getElementById('new').classList.add('hidden');
                document.getElementById('add-btn').innerHTML = 'Add Policy';
                document.getElementById('last').value = 'none';
            }
        }
    </script>

    <div class="row mb-3">
        <div class="col-md-12">
            <h4>Policies on {{ $type->name.' for '.$type->role->name }}</h4>
        </div>
    </div>

    @if (count($policies) == 0)
        <div class="row mb-3">
            <div class="col-md-12">
                <h5 class="text-center">No Existing Policies</h5>
            </div>
        </div>
    @endif

    <form action="{{ route('leaves.policies', ['type' => $type->id]) }}" method="POST">
        @csrf

        @foreach ($policies as $policy)
            <input type="hidden" name="id[]" value="{{ $policy->id }}">

            <div class="row mb-3">
                <div class="col-md my-auto">
                    Max <br>
                    <input type="number" step="1" name="max[]" class="form-control" value="{{ $policy->max }}" placeholder="Max Approvals">
                </div>

                <div class="col-md my-auto">
                    Approval By <br>
                    <select name="role_id[]" class="form-control">
                        <option value="{{ $policy->role_id }}">{{ $policy->role->name }}</option>

                        @foreach (App\Role::all() as $role)
                            @if ($role->id != $policy->role_id)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="col-md my-auto">
                    Allow Overflow <br>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary {{ $policy->allow_overflow ? 'active' : '' }}">
                            <input type="radio" name="allow_overflow[{{ $loop->index }}]" id="1" value="1" autocomplete="off" {{ $policy->allow_overflow ? 'checked' : '' }}> Yes
                        </label>
                        <label class="btn btn-secondary {{ !$policy->allow_overflow ? 'active' : '' }}">
                            <input type="radio" name="allow_overflow[{{ $loop->index }}]" id="0" value="0" autocomplete="off" {{ !$policy->allow_overflow ? 'checked' : '' }}> No
                        </label>
                    </div>
                </div>
    
                <div class="col-md my-auto">
                    Allow Block <br>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary {{ $policy->allow_block ? 'active' : '' }}">
                            <input type="radio" name="allow_block[{{ $loop->index }}]" id="1" value="1" autocomplete="off" {{ $policy->allow_block ? 'checked' : '' }}> Yes
                        </label>
                        <label class="btn btn-secondary {{ !$policy->allow_block ? 'active' : '' }}">
                            <input type="radio" name="allow_block[{{ $loop->index }}]" id="0" value="0" autocomplete="off" {{ !$policy->allow_block ? 'checked' : '' }}> No
                        </label>
                    </div>
                </div>
    
                <div class="col-md-4 my-auto">
                    Message <br>
                    <textarea name="message[]" class="form-control" cols="30" rows="2" placeholder="Message">{{ $policy->message }}</textarea>
                </div>

                <div class="col-md-1 my-auto text-center">
                    <a href="{{ route('leaves.policies.delete', ['policy' => $policy->id]) }}"><i class="far fa-trash-alt"></i></a>
                </div>
            </div>
        @endforeach

        <div class="row mb-3 hidden" id="new">
            <input type="hidden" name="id[]" value="none" id="last">

            <div class="col-md my-auto float-left">
                Max <br>
                <input type="number" step="1" name="max[]" class="form-control" placeholder="Max Approvals">
            </div>

            <div class="col-md my-auto">
                Approval By <br>
                <select name="role_id[]" class="form-control">
                    <option value="">Select Approval By</option>
                    @foreach (App\Role::all() as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md my-auto float-left">
                Allow Overflow <br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio" name="allow_overflow[{{ count($policies) }}]" id="1" value="1" autocomplete="off"> Yes
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="allow_overflow[{{ count($policies) }}]" id="0" value="0" autocomplete="off"> No
                    </label>
                </div>
            </div>

            <div class="col-md my-auto float-left">
                Allow Block <br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio" name="allow_block[{{ count($policies) }}]" id="1" value="1" autocomplete="off"> Yes
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="allow_block[{{ count($policies) }}]" id="0" value="0" autocomplete="off"> No
                    </label>
                </div>
            </div>

            <div class="col-md-4 my-auto float-left clearfix">
                Message <br>
                <textarea name="message[]" class="form-control" cols="30" placeholder="Message"></textarea>
            </div>

            <div class="col-md-1"></div>
        </div>

        <div class="row mb-3 clearfix">
            <div class="col-md-4 clearfix">
                <button class="btn btn-primary w-100" type="submit" id="sub-btn">Save</button>
            </div>
            <div class="col-md-4 clearfix">
                <a href="#" class="btn btn-primary w-100" onclick="addNew()" id="add-btn">Add Policy</a>
            </div>
            <div class="col-md-4 clearfix">
                <a href="{{ route('leaves.type', ['name' => $type->name]) }}" class="btn btn-primary w-100">Go Back</a>
            </div>
        </div>
    </form>
@endsection