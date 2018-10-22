@extends('layouts.app')

@section('content')
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="card-title py-1 pl-3">
                            @if ($branch == 'Unassigned')
                                <form action="/branch/details/0" method="GET">
                            @else
                                <form action="{{'/branch/details/'.$branch->id}}" method="GET">
                            @endif
                            <div class="row">
                                <div class="col-4">
                                        @if ($branch == 'Unassigned')
                                            <h2>Unassigned</h2>
                                        @else
                                            <h2>{{$branch->name}}</h2>
                                        @endif
                                </div>
                                <div class="col-6"></div>
                                <div class="col-2">
                                    @if($flow == 'true')
                                        <div class="col-2">
                                            <input type="hidden" name="flow" value="false">
                                            <button class="btn btn-warning" type="submit">Switch to HR view</button>
                                        </div>
                                    @else
                                        <div class="col-2">
                                            <input type="hidden" name="flow" value="true">
                                            <button class="btn btn-warning" type="submit">Switch to DM view</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="row pl-2">
                            <div class="col-3"><strong>Employee Name</strong></div>
                            <div class="col-2"><strong>Role</strong></div>
                            <div class="col-2"><strong>Employee ID</strong></div>
                            @if ($flow == 'true')
                                <div class="col-3"><strong>Change Branch</strong></div>
                            @else
                                <div class="col-3"><strong>Change Role</strong></div>
                            @endif
                            <div class="col-1"></div>
                        </div>

                        <hr>

                        @foreach($users as $user)
                            <form action="/admin/change/{{$user->id}}" method="POST">
                                @csrf

                                @if ($branch == 'Unassigned')
                                    <input type="hidden" name="b_id" value="0">
                                @else
                                    <input type="hidden" name="b_id" value="{{$branch->id}}">
                                @endif

                                <div class="row pl-2">
                                    <div class="col-3">{{$user->name}}</div>
                                    <div class="col-2">{{ucfirst($user->roles->first()->name)}}</div>
                                    <div class="col-2">{{$user->employee_id}}</div>
                                    @if ($flow == 'true')
                                        <div class="col-3">
                                            <select name="branch" class="form-control">
                                                @if ($branch == 'Unassigned')
                                                    <option value="">Unassigned</option>
                                                @else
                                                    <option value="">{{$branch->name}}</option>
                                                @endif
                                                @foreach($branches as $b)
                                                    @if($b->id != $user->branch_id)
                                                        <option value="{{$b->id}}">{{$b->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-3">
                                            <select name="role" class="form-control">
                                                <option value="">{{ucfirst($user->roles->first()->name)}}</option>
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{ucfirst($role->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="col-1">
                                        <button class="btn btn-success btn-rounded" type="submit">Save</button>
                                    </div>
                                </div>
                                @if (!$loop->last)
                                    <hr>
                                @else
                                    <br>
                                @endif
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
@endsection