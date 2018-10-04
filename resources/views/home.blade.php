@extends('layouts.app')

@section('content')
            <form action="/branch/filter" method="GET">
                @csrf
                <div class="row">
                    <div class="col-8">
                        @if (auth()->user() != null)
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="/schedule/print" class="btn btn-primary w-100">Print</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-1 align-middle">
                        <label for="id" class="form-label-control">Filter Branch</label>
                    </div>
                    <div class="col-2">
                        <select class="form-control" name="id">
                            @if (count($branches) > 1)
                                <option value="all">All</option>
                            @else
                                <option value="{{$branches[0]->id}}">{{$branches[0]->name}}</option>
                                <option value="all">All</option>
                            @endif
                            @foreach($filters as $filter)
                                <option value="{{$filter->id}}">{{$filter->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-primary btn-rounded" type="submit">Go</button>
                    </div>
                </div>
            </form>
            <div class="page-break"></div>
            @if($flow)
                <div class="row">
                    <div class="col-sm-8">	
                        <h2 class="page-title">{{$branches->name}}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th class="text-center">Logged In</th>
                                        <th class="text-center">Sunday</th>
                                        <th class="text-center">Monday</th>
                                        <th class="text-center">Tuesday</th>
                                        <th class="text-center">Wednesday</th>
                                        <th class="text-center">Thursday</th>
                                        <th class="text-center">Friday</th>
                                        <th class="text-center">Saturday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        @if($user->branch_id == $branch->id)
                                            <tr>
                                                <td><a href="/view/employee/{{$user->id}}">{{$user->name}}</a></td>
                                                <td class="text-center">
                                                    @if($user->logged_in)
                                                        <i class="fas fa-check 2x"></i>
                                                    @else
                                                        <i class="fas fa-times 2x"></i>
                                                    @endif
                                                </td>
                                                @foreach($schedules[$loop->index] as $schedule)
                                                    @if($schedule == null)
                                                        <td class="text-center">OFF</td>
                                                    @else
                                                        @if (($user->noSchedule->where('date', $schedule->date)->first()) != null)
                                                            <td>OFF</td>
                                                        @else
                                                            <td class="text-center">
                                                                <div class="text-center {{strtolower($schedule->startingBranch->name)}}">
                                                                    {{date("g:i A", strtotime($schedule->start))}}
                                                                </div>
                                                                
                                                                <div class="text-center {{strtolower($schedule->endingBranch->name)}}">
                                                                    {{date("g:i A", strtotime($schedule->end))}}   
                                                                </div>
                                                            </td>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                @foreach($branches as $branch)
                    @if(count($branches) > 1)
                        <div class="row">
                            <div class="col-sm-8">	
                                <h2 class="page-title">{{$branch->name}}</h2>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm-8">	
                                <h2 class="page-title">{{$branch->name}}</h2>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th class="text-center">Logged In</th>
                                            <th class="text-center">Sunday</th>
                                            <th class="text-center">Monday</th>
                                            <th class="text-center">Tuesday</th>
                                            <th class="text-center">Wednesday</th>
                                            <th class="text-center">Thursday</th>
                                            <th class="text-center">Friday</th>
                                            <th class="text-center">Saturday</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            @if($user->branch_id == $branch->id)
                                                <tr>
                                                    <td><a href="/view/employee/{{$user->id}}">{{$user->name}}</a></td>
                                                    <td class="text-center">
                                                        @if($user->logged_in)
                                                            <i class="fas fa-check 2x"></i>
                                                        @else
                                                            <i class="fas fa-times 2x"></i>
                                                        @endif
                                                    </td>
                                                    @foreach($schedules[$loop->index] as $schedule)
                                                        @if($schedule == null)
                                                            <td class="text-center">OFF</td>
                                                        @else

                                                            @if (($user->noSchedule->where('date', $schedule->date)->first()) != null)
                                                                <td class="text-center">OFF</td>
                                                            @else
                                                                <td class="text-center">
                                                                    <div class="text-center {{strtolower($schedule->startingBranch->name)}}">
                                                                        {{date("g:i A", strtotime($schedule->start))}}
                                                                    </div>
                                                                    
                                                                    <div class="text-center {{strtolower($schedule->endingBranch->name)}}">
                                                                        {{date("g:i A", strtotime($schedule->end))}}   
                                                                    </div>
                                                                </td>
                                                            @endif
                                                            
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="page-break"></div>
                @endforeach
            @endif
@endsection