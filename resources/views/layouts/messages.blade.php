@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row text-center alert alert-danger">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        {{$error}}
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
            <div class="row text-center alert alert-danger">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    {{session('success')}}
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row text-center alert alert-danger">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    {{session('error')}}
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
@endif