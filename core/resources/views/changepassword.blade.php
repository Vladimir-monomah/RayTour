
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
	<label class="col-md-3 control-label"><strong>Текущий пароль</strong></label>
	<div class="col-md-6">
	<input class="form-control input-lg" name="oldpassword" required="required" placeholder="Current Password" type="password" >
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-3 control-label"><strong>Новый пароль</strong></label>
	<div class="col-md-6">
	<input class="form-control input-lg" name="newpassword" required="required" placeholder="New Password" type="password">
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-3 control-label"><strong>Подтердите новый пароль</strong></label>
	<div class="col-md-6">
	<input class="form-control input-lg" name="repeatepassword" required="required" placeholder="New Password Again" type="password">
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