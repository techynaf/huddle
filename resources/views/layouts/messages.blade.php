@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="row text-center alert alert-danger mt-5 mb-0">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                {{$error}}
            </div>
            <div class="col-md-4"></div>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="row text-center alert alert-success m-t--40">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            {{session('success')}}
        </div>
        <div class="col-md-4"></div>
    </div>
@endif

@if(session('error'))
    <div class="row text-center alert alert-danger m-t--40">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            {{session('error')}}
        </div>
        <div class="col-md-4"></div>
    </div>
@endif