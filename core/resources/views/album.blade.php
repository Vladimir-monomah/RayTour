@extends('layouts.frontend')




@section('main')


<div class="kd-subheader">
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="subheader-info">
<h1>{{$page_title}}</h1>
<p>{{$album->des}}</p>
</div>
</div>
</div>
</div>
</div>


<div class="kd-content">

<!--// Page Section //-->
<section class="kd-pagesection" style=" padding: 0px 0px 0px 0px; background: #ffffff; ">
<div class="container">
<div class="row">

<!--// Package Detail //-->
<div class="col-md-12">

@if(count($imgs))
@foreach($imgs as $img)


<div class="col-md-6">


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">{{$img->des}}</h3>
  </div>
  <div class="panel-body">

<img src="{{asset('frontend/images/albumdetails/')}}/{{$img->img}}" alt="*" style="width: 100%;">
  </div>
</div>



	

</div>




@endforeach

</div>
<!--// Package Detail //-->

                <div class="text-center">
                    {!! $imgs->render() !!}
                </div>


    @else

                <div class="text-center" style="min-height:100px;">
                    <h3>No Image Found</h3>
                </div>
    @endif




</div>
</div>
</section>
<!--// Page Section //-->

</div>
                    
@endsection