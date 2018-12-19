@extends('layouts.app')

@section('content')
    <section>
        <div class="container-fluid">
        <form action="/export/late" method="POST">
            @csrf
            <input type="hidden" name="year" value="{{ $year }}">
            <input type="hidden" name="month" value="{{ $month }}">
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Export Excel</button>
                </div>
            </div>
        </form>
        <h4 class="page-title mt-5">Please use Crtl + P to download</h4>
            <div class="row">
                <div class="col-12 table-responsive text-center">
                    <table class="table table-bordered bg-white">
                        <thead>
                            <tr class="bg-warning">
                            <th scope="col table-header">Name</th>
                            <th scope="col table-header">Designation</th>
                            <th scope="col table-header">Status</th>
                            <th scope="col table-header">Employee Code</th>
                            <th scope="col table-header">Religion</th>
                            <th scope="col table-header">Date</th>
                            <th scope="col table-header">Actual Schedule</th>
                            <th scope="col table-header">Login Time</th>
                            <th scope="col table-header">Duration</th>
                            <th scope="col table-header">Late Type</th>
                            <th scope="col table-header">Comment</th>
                            <th scope="col table-header">Commented By</th>
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
    {{-- <script>
        window.print();
    </script> --}}
@endsection