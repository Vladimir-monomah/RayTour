@extends('layouts.frontend')




@section('main')



<!--// Sub Header //-->
<div class="kd-subheader">
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="subheader-info">
<h1>ЗАКАЗАТЬ СЕЙЧАС</h1>
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
<!--  ==================================SESSION MESSAGES==================================  -->
@if (session()->has('message'))
<div class="alert alert-{{ session()->get('type') }} alert-dismissable">
{{ session()->get('message') }}
</div>
@endif
<!--  ==================================SESSION MESSAGES==================================  -->


            <div class="col-md-9">
              <div class="kd-rich-editor">
                <h2>Свяжись с нами!</h2>
              </div>







<div class="row">
<form action="" method="post" class="comments-form" id="">


{!! csrf_field() !!}

<div class="col-md-6">
<input type="text" placeholder="ФИО" class="form-control input-lg" required="" name="name"><br><br>
</div><div class="col-md-6">
<input type="text" placeholder="Адрес" class="form-control input-lg" required="" name="address"><br><br>
</div><div class="col-md-6">
<input type="text" placeholder="Телефон" class="form-control input-lg"  required="" name="mobile"><br><br>
</div><div class="col-md-6">
<input type="email" placeholder="Email" class="form-control input-lg" id="" required="" name="email"><br><br>
</div><div class="col-md-6">
<input type="text" placeholder="Дата поездки" class="form-control input-lg" id="datepicker" required="" name="date"><br><br>
</div><div class="col-md-6">
<input type="text" placeholder="Число людей" class="form-control input-lg" required="" name="numppl"><br><br>
</div><br><br>




<button type="submit" class="btn thbg-color btn-block"/>Подтвердить заказ</button>



</form>
</div>



        

            </div>


 


            <div class="col-md-3">
              <div class="widget kd-userinfo-widget">
                <div class="kd-widget-title"><h2>Связаться с нами</h2></div>
                <ul>
                    <li><i class="fa fa-map-marker"></i> {{$General->address}}</li>
                    <li><i class="fa fa-phone-square"></i> {{$General->mobile}}</li>
                    <li><i class="fa fa-envelope"></i> {{$General->email}}</li>
                  </ul>
              </div>
              <div class="widget kd-followus-widget">
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
            </div>
          </div>
        </div>
      </section>
      <!--// Page Section //-->



</div>
<!--// Content //-->



<script>
  

  
</script>



@endsection