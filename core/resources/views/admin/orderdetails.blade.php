@extends('layouts.admin')

@section('main')
    
        
 




<div class="col-md-12">
<!-- BEGIN Portlet PORTLET-->
<div class="portlet box green-meadow">
<div class="portlet-title">
<div class="caption">
<strong>  <i class="fa fa-shopping-cart"></i>  Информация для заказа </div></strong>
<div class="tools">


  @if($ord->stat==0)
<button type="button" class="btn btn-sm btn-primary">АКТИВНЫЙ</button>
  @elseif($ord->stat==1)
<button type="button" class="btn btn-sm btn-success">ЗАВЕРШЕНО</button>
  @elseif($ord->stat==2)
<button type="button" class="btn btn-sm btn-danger">ОТКЛОНЕН</button>
  @endif


</div>
</div>
<div class="portlet-body"><h2>Заказ № {{$ord->id}}</h2>


<h3 style="font-weight: bold; color: red;">{{$ord->tours->name }}</h3><br>


<h4>Клиент: {{$ord->name}}</h4>
<h4>Адрес: {{$ord->address}}</h4>
<h4>Телефон: {{$ord->mobile}}</h4>
<h4>Email: {{$ord->email}}</h4>
<h4>Дата поездки: {{$ord->dt}}</h4>
<h4>Число людей: {{$ord->numppl}}</h4>
<h4 style="font-weight: bold;">ЗАКАЗАНО: {{$odt}}</h4>

<br><br><br>




<div class="row pull-bottom">
<div class="col-sm-4">
<a href="?action=status&amp;do=0" class="btn btn-info btn-block">АКТИВНЫЙ</a>
</div>
<div class="col-sm-4">
<a href="?action=status&amp;do=1" class="btn btn-success btn-block">ЗАВЕРШЕНО</a>
</div>
<div class="col-sm-4">
<a href="?action=status&amp;do=2" class="btn btn-danger btn-block">ОТКЛОНЕН</a>
</div>
</div>

                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
</div>













@endsection