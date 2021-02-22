@extends('layouts.frontend')

@section('head')

<!-- ASSETS -->
<link href="{{asset('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
<!-- END ASSETS -->

@endsection

@section('main')

<div class="clearfix"> </div>
<div class="page-container">
<div class="page-sidebar-wrapper">
<div class="page-sidebar navbar-collapse collapse">


<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
<li class="sidebar-toggler-wrapper hide">
<div class="sidebar-toggler"> </div>
</li>



                        
<li class="nav-item start">
	<a href="{{url('profile/')}}" class="nav-link ">
		<span class="title">Информационная панель</span>
	</a>
</li>

<li class="nav-item">
	<a href="{{url('edit-profile/')}}" class="nav-link ">
		<span class="title">Редактировать профиль</span>
	</a>
</li>
		
<li class="nav-item">
	<a href="{{url('change-password/')}}" class="nav-link ">
		<span class="title">Изменить пароль</span>
	</a>
</li>						

<li class="nav-item">
	<a href="{{url('logout/')}}" class="nav-link ">
		<span class="title">Выход</span>
	</a>
</li>						

</ul>
<!-- END SIDEBAR MENU -->
</div>
</div>
<!-- END SIDEBAR -->


<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<div class="page-content">
<h3 class="page-title"> {{ $page_title }} </h3>
<hr>



@yield('submain')



</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

@endsection