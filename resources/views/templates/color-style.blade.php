@foreach($branches as $branch)
    <style>
        .{{str_replace(" ", "-", strtolower($branch->name))}}{
            color: #{{($branch->color)}};
        }
        
        .{{str_replace(" ", "-", strtolower($branch->name)).'b'}}{
            background-color: #{{($branch->color)}};
        }
    </style>
@endforeach

<style type="text/css" media="print">
    * {
        -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
        color-adjust: exact !important;  /*Firefox*/
    }
</style>