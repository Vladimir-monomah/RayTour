@extends('layouts.admin')

@section('main')
    
        
 




<div class="col-md-12">
<!-- BEGIN Portlet PORTLET-->
<div class="portlet box green-meadow">
<div class="portlet-title">
<div class="caption">
<strong>  <i class="fa fa-shopping-cart"></i>  Order Details </div></strong>
<div class="tools">


  @if($ord->stat==0)
<button type="button" class="btn btn-sm btn-primary">ACTIVE</button>
  @elseif($ord->stat==1)
<button type="button" class="btn btn-sm btn-success">COMPLETED</button>
  @elseif($ord->stat==2)
<button type="button" class="btn btn-sm btn-danger">REJECTED</button>
  @endif


</div>
</div>
<div class="portlet-body"><h2>ORDER # {{$ord->id}}</h2>


<h3 style="font-weight: bold; color: red;">{{$ord->tours->name }}</h3><br>


<h4>Client: {{$ord->name}}</h4>
<h4>Address: {{$ord->address}}</h4>
<h4>Mobile: {{$ord->mobile}}</h4>
<h4>Email: {{$ord->email}}</h4>
<h4>Journy Date: {{$ord->dt}}</h4>
<h4>Number Of People: {{$ord->numppl}}</h4>
<h4 style="font-weight: bold;">ORDERED ON: {{$odt}}</h4>

<br><br><br>




<div class="row pull-bottom">
<div class="col-sm-4">
<a href="?action=status&amp;do=0" class="btn btn-info btn-block">ACTIVE</a>
</div>
<div class="col-sm-4">
<a href="?action=status&amp;do=1" class="btn btn-success btn-block">COMPLETED</a>
</div>
<div class="col-sm-4">
<a href="?action=status&amp;do=2" class="btn btn-danger btn-block">REJECTED</a>
</div>
</div>

                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
</div>













@endsection