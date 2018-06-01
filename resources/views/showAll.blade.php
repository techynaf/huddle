<div class="container-fluid">
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
</div>