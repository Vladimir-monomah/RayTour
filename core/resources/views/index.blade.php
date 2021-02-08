@extends('layouts.frontend')

@section('main')



<!--// MainBanner //-->
<div id="mainbanner">
<ul class="bxslider">

@foreach($Sliders as $slide)

<li><img src="{{asset('frontend/images/slider')}}/{{$slide->img}}" alt="Slider" />
<div class="kd-caption">
<h2> &nbsp; {{$slide->stxt}}</h2>
<h1> &nbsp;  {{$slide->btxt}} </h1>
</div>
</li>

@endforeach

</ul>

    </div>
    <!--// MainBanner //-->






    <!--// Content //-->
    <div class="kd-content">





<!--// Page Section //-->
<section class="kd-pagesection">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="kd-modrentitle thememargin">
<h3>{{$General->head}}</h3>
<div class="kd-divider"><div class="short-seprator"><span><i class="fa fa-home"></i></span></div></div>
<br />
<p>{{!! $General->txt !!}}</p>
</div>
</div>
</div>
</div>
</section>
<!--// Page Section //-->















<!--// Page Section //-->
<section class="kd-pagesection" style=" padding: 50px 0px; background: url(frontend/images/pakege1.jpg); background-size: cover; ">
<div class="container">
<div class="row">

<div class="col-md-12">
<div class="kd-modrentitle thememargin">
<h3>Featured Tours</h3>
<div class="kd-divider"><div class="short-seprator"><span><i class="fa fa-globe"></i></span></div></div>
<br />
</div>
</div>

<div class="col-md-12">
<div class="kd-package-list">
<div class="row">


@foreach($featured as $tour)


<article class="col-md-4">
<figure><a href="#"><img src="{{asset('tourimages')}}/{{$tour->img}}" alt=""></a>
<figcaption>

<span class="package-price thbg-color">{{$tour->rate}} {{$General->currency}}</span>

<div class="kd-bottomelement">
	<h5>
		<a href="{{url('Tour')}}/{{$tour->id}}/{{urlencode(strtolower($tour->name))}}">
		{{$tour->name}}
		</a>
	</h5>	
<div class="days-counter" style="background-color: #087dc2;"><span>{{$tour->dur}}</span> <br> days</div>
</div>

</figcaption>
</figure>
</article>


@endforeach

</div>
</div>
</div>

</div>
</div>
</section>
<!--// Page Section //-->












<!--// Page Section //-->
<section class="kd-pagesection" style=" padding: 20px 0px 0px 0px; background: #fcfcfc; ">
<div class="container">
<div class="row">

<div class="col-md-12">
<div class="kd-modrentitle thememargin">
<h3>Our Tour Gallery</h3>
<div class="kd-divider"><div class="short-seprator"><span><i class="fa fa-globe"></i></span></div></div>
</div>
</div>

</div>
</div>
</section>
<!--// Page Section //-->



<!--// Page Section //-->
<section class="kd-pagesection" style=" padding: 40px 0px 0px 0px;">
<div class="container">
<div class="row">
<div class="col-md-12">
<!--// Gallery //-->
<div class="kd-gallery">
<ul class="row">

@foreach($Album as $alb)

<li class="col-md-6">
<figure>
<a href="{{url('albumdetails')}}/{{$alb->id}}/{{urlencode(strtolower($alb->name))}}">
<img src="{{asset('frontend/images/albums')}}/{{$alb->img}}" alt="">
</a>
<figcaption>
<a href="{{url('albumdetails')}}/{{$alb->id}}/{{urlencode(strtolower($alb->name))}}" class="fa fa-plus"></a>
</figcaption>
</figure>
<div class="kd-galleryinfo">
<h5><a href="{{url('albumdetails')}}/{{$alb->id}}/{{urlencode(strtolower($alb->name))}}">{{$alb->name}}</a></h5>
<span>{{$alb->des}}</span>
</div>
</li>

@endforeach


</ul>
</div>
<!--// Gallery //-->

</div>

</div>
</div>
</section>
<!--// Page Section //-->





<!--// Page Section //-->
<section class="kd-pagesection" style=" padding: 40px 0px 0px 0px; background: #ffffff; ">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="col-md-12">
<div class="kd-modrentitle thememargin">
<h3>Our Partner</h3>
<div class="kd-divider"><div class="short-seprator"><span><i class="fa fa-globe"></i></span></div></div>
</div>
</div>
<div class="kd-partner thememargin">
<ul>

@foreach($partner as $partner)

<li class="col-md-2"><img src="{{asset('frontend/images/partner')}}/{{$partner->img}}" alt="" style="width: 200px; height: 150px;"></li>

@endforeach
 
</ul>
</div>
</div>
</div>
</div>
</section>
<!--// Page Section //-->








    </div>
    <!--// Content //-->













                

                    
@endsection