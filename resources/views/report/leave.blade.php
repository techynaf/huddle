@extends('layouts.app')

@section('content')
    <div class="card-box pb-4">
        <h2 class="page-title-leave-request">Filter Options</h2>
        <div class="row">
            <div class="col-md-12">
                <br>
                <form action="/leave" method="GET">
                    <div class="row m-2">
                        <div class="col-md-1 text-right my-auto">From: </div>
                        <div class="col-md-3"><input type="date" name="from" class="form-control" required></div>
                        <div class="col-md-1 text-right my-auto">To: </div>
                        <div class="col-md-3"><input type="date" name="to" class="form-control" required></div>
                        <div class="col-md-1 text-right my-auto">Branch: </div>
                        <div class="col-md-3">
                            <select name="branch" class="form-control" required>
                                <option value="all">All</option>
                                @foreach(App\Branch::all() as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row m-2 my-auto">
                        <div class="col-md-1 text-right my-auto">Status: </div>
                            <div class="col-md-2 my-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="requested" name="requested" onchange="disableAll();" type="checkbox" value="1" >
                                    <label class="form-check-label" for="requested">Requested</label>
                                </div>
                            </div>
                            <div class="col-md-2 my-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="approved" name="approved" onchange="disableRequest()" type="checkbox" value="1">
                                    <label class="form-check-label" for="approved">Approved</label>
                                </div>
                            </div>
                            <div class="col-md-2 my-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="declined" name="declined" onchange="disableRequest()" type="checkbox" value="1">
                                    <label class="form-check-label" for="declined">Declined</label>
                                </div>
                            </div>
                            <div class="col-md-2 my-auto">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="pending" name="pending" onchange="disableRequest()" type="checkbox" value="1">
                                    <label class="form-check-label" for="pending">Pending</label>
                                </div>
                            </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary huddle-brown-btn w-100" type="submit">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($flow)
        <section>
            <div class="container-fluid">
                <h4 class="page-title mt-5">Please use Crtl + P to download</h4>
                <div class="row">
                    <div class="col-12 table-responsive text-center">
                        <table class="table table-striped table-bordered bg-white">
                            <thead>
                                <tr class="bg-warning">
                                    <th scope="col table-header">Employee Information</th>
                                    <th scope="col table-header">From</th>
                                    <th scope="col table-header">To</th>
                                    <th scope="col table-header">Leave Type</th>
                                    <th scope="col table-header">Status</th>
                                    <th scope="col table-header">Comment</th>
                                </tr>  
                            </thead>
                            <tbody>
                                @foreach($leaves as $leave)
                                    <tr class="hoverer">
                                        <td>
                                            {{$leave->user->name}}
                                            <div class="hoveree">
                                                {{$leave->user->religion}} <br>
                                                {{$leave->user->branch != null ? $leave->user->branch->name : 'Unassigned'}} <br>
                                                {{ucfirst($leave->user->roles->first()->name)}} <br>
                                            </div>
                                        </td>
                                        <td>{{Carbon\Carbon::parse($leave->start)->format('d M Y')}}</td>
                                        <td>{{Carbon\Carbon::parse($leave->end)->format('d M Y')}}</td>
                                        <td>{{$leave->leavetype->name}}</td>
                                        <td>{{$leave->is_approved == 0 ? 'Pending' : ($leave->is_approved == 1 ? 'Approved' : 'Declined')}}</td>
                                        <td>{{$leave->comment == null ? 'None' : $leave->comment}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
    @endif

    <script>
        function disableAll () {
            if (document.getElementById('requested').checked) {
                document.getElementById('approved').disabled = true;
                document.getElementById('declined').disabled = true;
                document.getElementById('pending').disabled= true;
            } else {
                document.getElementById('approved').disabled = false;
                document.getElementById('declined').disabled = false;
                document.getElementById('pending').disabled = false;
            }
        }

        function disableRequest () {
            a = document.getElementById('approved').checked;
            b = document.getElementById('declined').checked;
            c = document.getElementById('pending').checked;

            if (a || b || c) {
                document.getElementById('requested').disabled = true;
            } else {
                document.getElementById('requested').disabled = false;
            }

            if (a && b && c) {
                document.getElementById('approved').checked = false;
                document.getElementById('declined').checked = false;
                document.getElementById('pending').checked = false;
                document.getElementById('requested').disabled = false;
                document.getElementById('requested').checked = true;
                document.getElementById('approved').disabled = true;
                document.getElementById('declined').disabled = true;
                document.getElementById('pending').disabled= true;
            }
        }
    </script>
@endsection