@foreach($branches as $branch)
    @if ($branch->color == null)
        <style>
            .{{str_replace(" ", "-", strtolower($branch->name))}}{
                color: #000000;
            }
            
            .{{str_replace(" ", "-", strtolower($branch->name)).'b'}}{
                background-color: #000000;
            }
        </style>
    @else
        @if (substr($branch->color, -7, 1) == '#')
            <style>
                .{{str_replace(" ", "-", strtolower($branch->name))}}{
                    color: {{($branch->color)}};
                }
                
                .{{str_replace(" ", "-", strtolower($branch->name)).'b'}}{
                    background-color: {{($branch->color)}};
                }
            </style>
        @else
            <style>
                .{{str_replace(" ", "-", strtolower($branch->name))}}{
                    color: #{{($branch->color)}};
                }
                
                .{{str_replace(" ", "-", strtolower($branch->name)).'b'}}{
                    background-color: #{{($branch->color)}};
                }
            </style>
        @endif
    @endif
@endforeach

<style type="text/css" media="print">
    * {
        -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
        color-adjust: exact !important;  /*Firefox*/
    }
</style>