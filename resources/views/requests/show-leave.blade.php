@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="page-title">Leave Requests</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <hr>
                        @if(count($leaves) == 0)
                            <h2 class="text-center">No pending requests</h2>
                            <hr>
                        @else
                            @foreach($leaves as $leave)
                                @if($leave->user->roles->first()->name != 'manager' || $leave->user->roles->first()->name != 'assitant-manager' || $leave->user_id != auth()->user()->id)
                                    <form action="/request/{{$leave->id}}/process" method="POST">
                                        @csrf
                                        <div class="row ml-3">
                                            <div class="col-1 border-right">
                                                <div class="row">
                                                    <h4>{{$leave->leavetype->name}}</h4>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    {{$leave->user->name}}
                                                </div>
                                                <div class="row">
                                                    {{$leave->user->roles->first()->name}}
                                                </div>
                                            </div>
                                            <div class="col-1 ml-3 border-right" >
                                                <div class="row">
                                                    From
                                                </div>
                                                <div class="row">
                                                    {{date("D d M", strtotime($leave->start))}}
                                                </div>
                                                <br>
                                                <div class="row">
                                                    To
                                                </div>
                                                <div class="row">
                                                    {{date("D d M", strtotime($leave->end))}}
                                                </div>
                                            </div>
                                            <div class="col-5 ml-3 border-right">
                                                <div class="row">
                                                    <h4>{{$leave->subject}}</h4>
                                                </div>
                                                <div class="row">
                                                    {{$leave->body}}
                                                </div>
                                            </div>
                                            <div class="col-3 ml-2">
                                                <select name="status" class="form-control">
                                                    @if($leave->is_approved == 0)
                                                        <option value="0">Pending</option>
                                                        <option value="1">Approve</option>
                                                        <option value="2">Decline</option>
                                                    @elseif ($leave->is_approved == 1)
                                                        <option value="1">Approved</option>
                                                        <option value="2">Decline</option>
                                                    @else
                                                        <option value="2">Declined</option>
                                                        <option value="1">Approve</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-1 mx-auto">
                                                <button class="btn btn-primary btn-rounded" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection