@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
@endif