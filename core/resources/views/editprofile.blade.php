
@extends('layouts.profile')


@section('submain')


<div class="row">
<div class="col-md-12">
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">

<div class="portlet-body form">
<form class="form-horizontal" action="" method="post" role="form">
<div class="form-body">


{!! csrf_field() !!}




	<div class="form-group">
	<label class="col-md-3 control-label"><strong>Имя пользователя</strong></label>
	<div class="col-md-6">
	<input class="form-control input-lg" name="name" required="required" placeholder="Имя" type="text" value="{{$user->name}}" >
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-3 control-label"><strong>Email</strong></label>
	<div class="col-md-6">
	<input class="form-control input-lg" name="email" required="required" placeholder="Email" type="email" value="{{$user->email}}" >
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-3 control-label"><strong>Телефон</strong></label>
	<div class="col-md-6">
	<input class="form-control input-lg" name="phone" required="required" placeholder="Телефон" type="text" value="{{$user->phone}}" >
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-3 control-label"><strong>Город</strong></label>
	<div class="col-md-6">
	<input class="form-control input-lg" name="city" required="required" placeholder="Город" type="text" value="{{$user->city}}" >
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-3 control-label"><strong>Адрес</strong></label>
	<div class="col-md-6">
	<input class="form-control input-lg" name="address" required="required" placeholder="Адрес" type="text" value="{{$user->address}}" >
	</div>
	</div>

	<div class="row">
	<div class="col-md-offset-3 col-md-6">
	<button type="submit" class="btn blue btn-block">Сохранить</button>
	</div>
	</div>





</div>
</form>
</div>
</div>
</div>      
</div><!---ROW-->


@endsection