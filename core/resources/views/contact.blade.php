@extends('layouts.frontend')




@section('main')



<!--// Sub Header //-->
<div class="kd-subheader">
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="subheader-info">
<h1>Contact us</h1>
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








              <div id="respond">
                <form method="post" class="comments-form" id="" action="">

{!! csrf_field() !!}


                  <p><input type="text" name="name" placeholder="Имя *" /></p>
                  <p><input type="text" name="phone" placeholder="Телефон *" onkeyup="this.value = this.value.replace(/[^\d]/g,'');"/></p>
                  <p><input type="text" name="email" placeholder="Email *" / ></p>
                  <p><input type="text" name="website" placeholder="Сайт *" / ></p>
                  <p class="kd-textarea"><textarea name="message" placeholder="добавить комментарий"></textarea></p>
          <p class="clearfix"></p>
                  <p class="kd-button"><input type="submit" class="thbg-color" value="Отправить" /></p>
                </form>
            </div>
            </div>


 


            <div class="col-md-3">
              <div class="widget kd-userinfo-widget">
                <div class="kd-widget-title"><h2>Контакты</h2></div>
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





@endsection