@extends('layouts.frontend')




@section('main')


<div class="kd-subheader">
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="subheader-info">
<h1>{{$page_title}}</h1>
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
<div class="kd-package-detail">


<div class="row">
<div class="col-md-8">


<figure class="detail-thumb">
	<img src="{{asset('tourimages')}}/{{$tour->img}}" alt="*">	
</figure>

</div>
<div class="col-md-4">
<div class="kd-pkg-info">
<ul>
<li><i class="fa fa-map-marker"></i> <strong>Duration:</strong> {{$tour->dur}} Days</li>
<li><i class="fa fa-paper-plane"></i> <strong>Location:</strong> {{$tour->loc}}</li>
<li><i class="fa fa-tag"></i> <strong>Price:</strong> {{$tour->rate}} {{$General->currency}} </li>
</ul>
<a href="{{url('order')}}/{{$tour->id}}" class="kd-booking-btn thbg-color">Order Now</a>
</div>
</div>

</div> <!-- ROW -->               




<div class="kd-rich-editor">

<h1>Tour Description</h1><br>

{!! $tour->description !!}




<br><br><h1>Package Includes</h1><br>
{!! $tour->inc !!}


<br><br><h1>Package Excludes</h1><br>
{!! $tour->exc !!}
<br><br><br><br>
</div>




</div>
</div>
<!--// Package Detail //-->



</div>
</div>
</section>
<!--// Page Section //-->

</div>
                    
@endsection