@extends ('layouts.app')

@section('content')
    
    <section>
        <div class="container-fluid">
            <form action="/export/hour" method="POST">
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
            <h4 class="page-title mt-5">Please use Crtl + P to download <span class="text-right">here</span></h4>
            <div class="row">
                <div class="col-12 table-responsive text-center">
                    <table class="table table-striped table-bordered bg-white">
                        <thead>
                            <tr class="bg-warning">
                            <th scope="col table-header">Name</th>
                            <th scope="col table-header">Designation</th>
                            <th scope="col table-header">Status</th>
                            <th scope="col table-header">Employee Code</th>
                            <th scope="col table-header">Religion</th>
        
                            @foreach($weeks as $week)
                                <th scope="col table-header">
                                    <div class="table-header">
                                        {{date("d M", strtotime($week[0]))}} <br>
                                        {{date("d M", strtotime($week[1]))}}
                                    </div>
                                </th>
                            @endforeach
        
                            <th scope="col table-header">
                                Total Working Hour
                            </th>
                            </tr>  
                        </thead>
                        <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <th class="bg-secondary" colspan="14" scope="row">{{$branch->name}}</th>
                                </tr>
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