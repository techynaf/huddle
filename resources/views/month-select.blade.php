<div class="wrapper">
    <div class="container-fluid">
        <div class="card">
            @foreach($months as $month)
                <div class="col-4">
                    <a href="/view/{{$month}}">
                        {{$day}}
                    </a>      
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- for current url: $request->url() -->