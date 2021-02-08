@extends('layouts.admin')

@section('main')
    
        
 





                
<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="dashboard-stat yellow">
<div class="visual">
<i class="fa fa-list"></i>
</div>
<div class="details">
<div class="number">{{ $num_tour }} </div>
<div class="desc">Количество туров </div>
</div>
</div>
</div>
<!-- END -->



<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="dashboard-stat green">
<div class="visual">
<i class="fa fa-list"></i>
</div>
<div class="details">
<div class="number">{{ $num_cat }}</div>
<div class="desc"> Количество стран</div>
</div>
</div>
</div>
<!-- END -->
    



<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="dashboard-stat blue">
<div class="visual">
<i class="fa fa-list"></i>
</div>
<div class="details">
<div class="number">{{ $num_order }}</div>
<div class="desc">Заказы </div>
</div>
</div>
</div>
<!-- END -->

















@endsection