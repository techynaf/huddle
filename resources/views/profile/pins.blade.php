@extends('layouts.app')

@section('content')
    
    <section>
        <div class="container-fluid">
        <h4 class="page-title mt-5">Please use Crtl + P to download</h4>
            <div class="row">
                <div class="col-12 table-responsive text-center">
                    <table class="table table-striped table-bordered bg-white">
                        <thead>
                            <tr class="bg-warning">
                                <th scope="col">Name</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Pin</th>
                                <th scope="col">Secondary Pin</th>
                            </tr>  
                        </thead>
                        <tbody>
                            <tr>
                                <th class="bg-secondary" colspan="14" scope="row">Administrative</th>
                            </tr>
                            @if ($flow == 1)
                                <?php $user = App\User::where('id', 1)->first()?>
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>Administrative</td>
                                    <td>{{ucfirst($user->roles->first()->name)}}</td>
                                    <td>{{$user->pin}}</td>
                                    <td>------</td>
                                </tr>
                                <?php $user = App\User::where('id', 3)->first()?>
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>Administrative</td>
                                    <td>{{ucfirst($user->roles->first()->name)}}</td>
                                    <td>{{$user->pin}}</td>
                                    @if ($user->manager != null)
                                        <td>{{$user->manager->pin}}</td>
                                    @else
                                        <td>------</td>
                                    @endif
                                </tr>
                                <?php $user = App\User::where('id', 2)->first()?>
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>Administrative</td>
                                    <td>{{ucfirst($user->roles->first()->name)}}</td>
                                    <td>{{$user->pin}}</td>
                                    <td>------</td>
                                </tr>
                            @elseif ($flow == 2)
                                <?php $user = App\User::where('id', 3)->first()?>
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>Administrative</td>
                                    <td>{{ucfirst($user->roles->first()->name)}}</td>
                                    <td>{{$user->pin}}</td>
                                    @if ($user->manager != null)
                                        <td>{{$user->manager->pin}}</td>
                                    @else
                                        <td>------</td>
                                    @endif
                                </tr>
                            @elseif ($flow == 3)
                                <?php $user = App\User::where('id', 2)->first()?>
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->branch->name}}</td>
                                    <td>{{ucfirst($user->roles->first()->name)}}</td>
                                    <td>{{$user->pin}}</td>
                                    <td>------</td>
                                </tr>
                            @endif
                            @foreach($branches as $branch)
                                <tr>
                                    <th class="bg-secondary" colspan="14" scope="row">{{$branch->name}}</th>
                                </tr>
                                @foreach ($branch->users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->branch->name}}</td>
                                        <td>{{ucfirst($user->roles->first()->name)}}</td>
                                        <td>{{$user->pin}}</td>
                                        @if ($user->manager != null)
                                            <td>{{$user->manager->pin}}</td>
                                        @else
                                            <td>------</td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
@endsection