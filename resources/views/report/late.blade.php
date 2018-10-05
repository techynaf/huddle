@extends('layouts.app')

@section('content')
    <div class="row">
        <h4 class="page-title">Please use Crtl + P to download</h4>
    </div>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 table-responsive text-center">
                    <table class="table table-bordered bg-white">
                        <thead>
                            <tr class="bg-warning">
                            <th scope="col">Name</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Status</th>
                            <th scope="col">Employee Code</th>
                            <th scope="col">Religion</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actual Schedule</th>
                            <th scope="col">Login Time</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Late Type</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Commented By</th>
                            </tr>  
                        </thead>
                        <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <th class="bg-secondary" colspan="14" scope="row">{{$branch->name}}</th>
                                </tr>
                                @foreach ($lates as $late)
                                    @if ($late->user->branch_id == $branch->id)
                                        <tr>
                                            <td>{{$late->user->name}}</td>
                                            <td>{{ucfirst($late->user->roles->first()->name)}}</td>
                                            <td>{{$late->user->status}}</td>
                                            <td>{{$late->user->employee_id}}</td>
                                            <td>{{$late->user->religion}}</td>
                                            <td>{{$late->date}}</td>
                                            <td>{{date("g:i A", strtotime($late->log->schedule->start))}}</td>
                                            <td>{{date("g:i A", strtotime($late->log->start))}}</td>
                                            <td>{{$duration[$x++].' mins'}}</td>
                                            <td>{{$late->type}}</td>
                                            <td>{{$late->comment}}</td>
                                            <td>
                                                @if ($late->alteredBy == null)
                                                    <strong>NOT COMMENTED</strong>
                                                @else
                                                    <a href="/view/employee/{{$late->alteredBy->id}}" target="_blank">
                                                        {{$late->alteredBy->name}}
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <script>
        window.print();
    </script>
@endsection