@extends ('layouts.app')

@section('content')
    <div class="row">
        <h4 class="page-title">Please use Crtl + P to download</h4>
    </div>
    @foreach($branches as $branch)
        <section>
            <div class="row">
                <h2>{{$branch->name}} Hour Report</h2>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 table-responsive text-center">
                        <table class="table table-striped table-bordered bg-white">
                            <thead>
                                <tr class="bg-warning">
                                <th scope="col">Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Status</th>
                                <th scope="col">Employee Code</th>
                                <th scope="col">Religion</th>
            
                                @foreach($weeks as $week)
                                    <th scope="col">
                                        {{date("d M", strtotime($week[0]))}} <br>
                                        {{date("d M", strtotime($week[1]))}}
                                    </th>
                                @endforeach
            
                                <th scope="col">Total Working Hour</th>
                                </tr>  
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @if ($user->branch_id == $branch->id)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{ucfirst($user->roles->first()->name)}}</td>
                                        <td>{{$user->status}}</td>
                                        <td>{{$user->employee_id}}</td>
                                        <td>{{$user->religion}}</td>
                                        @foreach($hours[$x++] as $hour)
                                            <td>{{$hour}}</td>
                                                
                                        @endforeach
                                    </tr>
                                    @endif
                                @endforeach
                                <tr>
                            </tbody>
                        </table> 
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <div class="page-break"></div>
    @endforeach
@endsection