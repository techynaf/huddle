<div class="container-fluid">
    @if($role == 'owner')
        @foreach ($branches as $branch)
            <div class="row">
                <h3>{{$branch->name}}</h3>
            </div>
            <div class="row border-top border-bottom">
                <div class="col-md-4">
                    <strong>Name</strong>
                </div>
                <div class="col-md-3">
                    <strong>Role</strong>
                </div>
                <div class="col-md-2">
                    <strong>PIN</strong>
                </div>
                <div class="col-md-3">
                    <strong>Branch</strong>
                </div>
            </div>

            @foreach($users as $user)
                <div class="row border-bottom">
                    <div class="col-md-4">
                        <a href="/view/employee/{{$user->id}}">{{$user->name}}</a>
                    </div>
                    <div class="col-md-3">
                        {{$user->role}}
                    </div>
                    <div class="col-md-2">
                        {{$user->pin}}
                    </div>
                    <div class="col-md-3">
                        {{$user->branch}}
                    </div>
                </div>
            @endforeach
        @endforeach
    @else
        <div class="row">
            <h3>{{$branch->name}}</h3>
        </div>
        <div class="row border-top border-bottom">
            <div class="col-md-4">
                <strong>Name</strong>
            </div>
            <div class="col-md-3">
                <strong>Role</strong>
            </div>
            <div class="col-md-3">
                <strong>Branch</strong>
            </div>
        </div>

        @foreach($users as $user)
            <div class="row border-bottom">
                <div class="col-md-4">
                    {{$user->name}}
                </div>
                <div class="col-md-3">
                    {{$user->role}}
                </div>
                <div class="col-md-3">
                    {{$user->branch}}
                </div>
                <div class="col-md-2">
                    <a href="/schedule/create/{{$user->id}}">Create Schedule</a>
                </div>
            </div>
        @endforeach
    @endif
</div>