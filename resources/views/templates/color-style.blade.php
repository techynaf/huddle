@if (count($branches) == 0)
    <style>
        .{{str_replace("-", " ", strtolower($branches->name))}}{
            color: #{{($branches->color)}};
        }

        .{{str_replace("-", " ", strtolower($branches->name)).'b'}}{
            background: #{{($branches->color)}};
        }
    </style>
@else
    @foreach($branches as $branch)
        <style>
            .{{str_replace("-", " ", strtolower($branch->name))}}{
                color: #{{($branch->color)}};
            }
            
            .{{str_replace("-", " ", strtolower($branch->name)).'b'}}{
                background: #{{($branch->color)}};
            }
        </style>
    @endforeach
@endif