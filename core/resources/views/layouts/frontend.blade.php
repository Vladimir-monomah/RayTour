
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$site_title}} - {{$page_title}}</title>
<link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/bootstrap-theme.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/font-awesome.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/color.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/themetypo.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/bxslider.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/datepicker.css')}}" rel="stylesheet">
@yield('head')
</head><body>

<header id="mainheader">
<!--// Top Baar //-->
<div class="kd-topbar">
<div class="container">
<div class="row">
<div class="col-md-7">
<ul class="kd-topinfo">



<li>
		<i class="fa fa-phone"></i> Телефон: {{$General->mobile}}
</li>

<li>
		<i class="fa fa-envelope-o"></i>
		<a href="mailto:{{$General->email}}">Email: {{$General->email}}</a>
</li>

</ul>

</div>
<div class="col-md-5">
<ul class="kd-userinfo">
<li>
<div class="kd-social-network">
<ul>
  


<li><a href="{{$Social->fb}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
<li><a href="{{$Social->tw}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
<li><a href="{{$Social->gp}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
<li><a href="{{$Social->li}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
<li><a href="{{$Social->yt}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
</ul>
</div>
</li>


</ul>
</div>
</div>
</div>
</div>
<!--// Top Baar //--><!--// Header Baar //-->
<div class="kd-headbar">
<div class="container">
<div class="row">
<div class="col-md-3"><a href="{{url('/')}}" class="logo"><img src="{{asset('frontend/images/logo.png')}}" alt=""></a></div>
<div class="col-md-9">
<div class="kd-rightside">
<nav class="navbar navbar-default navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>






<div class="collapse navbar-collapse" id="navbar-collapse-1">
<ul class="nav navbar-nav">
<li><a href="{{url('/')}}">Главная</a></li>

@foreach($catlist as $cat)

<li>
	<a href="{{url('category/')}}/{{$cat->id}}/{{urlencode(strtolower($cat->name))}}">
		<span>{{ $cat->name }}</span>
	</a>
</li>

@endforeach

<!--<li><a href="{{url('contact/')}}">Свяжитесь с нами</a></li>-->

@if(isset($user))
<li><a href="{{url('profile/')}}">Профиль {{$user->name}}</a></li>
@else
<li><a href="{{url('registration/')}}">Регистрация</a></li>
@endif

</ul>
</div>
<!-- /.navbar-collapse -->
</nav>

</div>
</div>
</div>
</div>
</div>
<!--// Header Baar //-->

</header>







<!-- different body part -->

@yield('main')

<!-- different body part -->









<!--// Footer //-->
<footer id="footer-widget">
<div class="container">
<div class="row">
    
<div class="widget col-md-6 kd-textwidget">
<div class="kd-widget-title"><h2>О {{$General->sitename}} </h2></div>
<div class="kd-contactinfo">
<p>

{{$General->about}}

</p>
</div>
</div>

<div class="widget col-md-3 kd-followus-widget">
<div class="kd-widget-title"><h2>Подписывайтесь на нас</h2></div>
<ul>


<li>
	<a href="{{$Social->fb}}" data-original-title="Facebook">
	<i class="fa fa-facebook"></i></a>
</li>

<li>
	<a href="{{$Social->tw}}" data-original-title="Twitter">
	<i class="fa fa-twitter"></i></a>
</li>

<li>
	<a href="{{$Social->gp}}" data-original-title="Google-Plus">
	<i class="fa fa-google-plus"></i></a>
</li>

<li>
	<a href="{{$Social->li}}" data-original-title="Linkedin">
	<i class="fa fa-linkedin"></i></a>
</li>

<li>
	<a href="{{$Social->yt}}" data-original-title="Youtube">
	<i class="fa fa-youtube"></i></a>
</li>

</ul>
</div>

          <div class="widget col-md-3 kd-userinfo-widget">
            <div class="kd-widget-title"><h2>Связаться с нами</h2></div>
            <ul>
                <li><i class="fa fa-map-marker"></i> {{$General->address}}</li>
                <li><i class="fa fa-phone-square"></i> {{$General->mobile}}</li>
                <li><i class="fa fa-envelope"></i> {{$General->email}}</li>
              </ul>
          </div>

           <center><div class="col-md-6"><p>© Copyright 2021  All Rights Reserved by {{$General->sitename}} </p></div><center>

        </div>
      </div>
    </footer>
    <!--// Footer //-->

    
    <!--// CopyRight //-->
    <!-- jQuery (Necessary For JavaScript Plugins) -->
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.bxslider.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('frontend/js/waypoints-min.js')}}"></script>
    <script src="{{asset('frontend/js/functions.js')}}"></script>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

</body>
</html>
