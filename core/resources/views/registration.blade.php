
@extends('layouts.frontend')


@section('head')

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script>
	var nav = responsiveNav('.nav-collapse', { // Selector
	animate: true, // Boolean: Use CSS3 transitions, true or false
	transition: 284, // Integer: Speed of the transition, in milliseconds
	label: 'Menu', // String: Label for the navigation toggle
	insert: 'before', // String: Insert the toggle before or after the navigation
	customToggle: '.nav-toggle'
	});
</script>
<link rel="stylesheet" media="screen" href="{{asset('frontend/css/index.css')}}">

@endsection

@section('main')


<!--// Sub Header //-->
<div class="kd-subheader">
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="subheader-info">
<h1>Вход/Регистрация</h1>
</div>
</div>
</div>
</div>
</div>
<!--// Sub Header //-->




<!--// Content //-->
<div class="kd-content">

      <!--// Page Section //-->
      <section class="kd-pagesection" style=" padding: 30px 0px 0px 0px; margin: 0px 0px 0px 0px; ">
        <div class="container">
          <div class="row">
            <div class="col-md-9">


	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="container user-login">
        <h1 class="user-login__heading">Завести аккаунт</h1>
		<form class="form-large" action="{{url('registration/')}}" id="login_form" name="login_form" accept-charset="UTF-8" method="post">
		{!! csrf_field() !!}
		<div class="col-lg-6 col-md-6 col-sm-6">
			<input type="text" placeholder="Имя" required="required" class="user-login__input user-login__input" name="name" id="name">
			<div class="err" id="name_err"></div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<input type="email" placeholder="Email" required="required" class="user-login__input user-login__input--email" name="email" id="email_id">
			<div class="err" id="email_err"></div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
		<input type="tel" placeholder="Телефон"   required="required" class="user-login__input user-login__input--tel" name="phone" id="pho_no">
		<div class="err" id="pho_no_err"></div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<input type="password" placeholder="Пароль" required="required" class="user-login__input user-login__input" name="password" id="pwd">
			<div class="err" id="pwd_err"></div>
		</div>	
		
		<div class="col-lg-6 col-md-6 col-sm-6">
			<input type="text" placeholder="Город" required="required" class="user-login__input user-login__input" name="city" id="city">
			<div class="err" id="city_err"></div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<input type="text" placeholder="Адрес" required="required" class="user-login__input user-login__input" name="address" id="address">
			<div class="err" id="address_err"></div>
		</div>
		<input type="submit" value="Зарегистрироваться" class="user-login__action" >
		</form>
		</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="container user-login">
	        <h1 class="user-login__heading">Войдите в свой аккаунт</h1>
			<form class="form-large" action="{{url('signUp/')}}" accept-charset="UTF-8" method="post">
				{!! csrf_field() !!}
				<input placeholder="Email" type="email"  required="required" class="user-login__input user-login__input" name="email" id="email" />
				<input placeholder="Пароль" required="required" class="user-login__input user-login__input--password" type="password" name="password" id="password" />
				<input type="submit" value="Войти в систему" class="user-login__action" />
				
				<input value="true" type="hidden" name="user[remember_me]" id="user_remember_me" />
				<input type="hidden" name="initial_origin" id="initial_origin" />				
			</form>
		</div>
		</div>

	</div>

            </div>
          </div>
        </div>
      </section>
      <!--// Page Section //-->



</div>
<!--// Content //-->





@endsection