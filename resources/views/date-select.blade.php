<div class="wrapper">
    <div class="container-fluid">
        @foreach($days as $day)
            <div class="col-4">
                <a href="/view/{{$month}}/{{$day}}">
                    {{$day}}
                </a>      
            </div>
        @endforeach
    </div>
</div>