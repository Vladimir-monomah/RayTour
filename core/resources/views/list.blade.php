@extends('layouts.frontend')




@section('main')






<!--// Sub Header //-->
<div class="kd-subheader">
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="subheader-info">
<h1> {{$page_title}} </h1>
</div>
</div>
</div>
</div>
</div>
<!--// Sub Header //-->





    <!--// Content //-->
    <div class="kd-content">

      <!--// Page Section //-->
      <section class="kd-pagesection" style=" padding: 0px 0px 10px 0px; ">
        <div class="container">
          <div class="row">

<!--// Tour Filter //-->
<form action="" method="post" class="comments-form" id="">
{!! csrf_field() !!}
<input type="text" placeholder="Название тура" class="form-control input-lg" name="tour_name"
  style="display: inline; width: 250px;">
<input type="number" placeholder="от" class="form-control input-lg" name="min_price" min="1" max="9999999" maxlength="7"
  style="display: inline; width: 150px;">
<input type="number" placeholder="до" class="form-control input-lg" name="max_price" min="1" max="9999999" maxlength="7"
  style="display: inline; width: 150px;">
  <input type="number" placeholder="дни" class="form-control input-lg" name="days" min="1" max="15" maxlength="2"
  style="display: inline; width: 150px;">

<button type="submit" class="btn thbg-color btn-block" style="display: inline; width: 150px;">Поиск</button>
</form>
<br><br>
<!--// Tour Filter //-->

            <div class="col-md-12">
              <div class="kd-package-list">
                <div class="row">



@if(count($allproperty))

			
@foreach($allproperty as $tour)
			



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



                <div class="text-center">
                    {!! $allproperty->render() !!}
                </div>


    @else

                <div class="text-center" style="min-height:100px;">
                    <h3>Туры не найдены</h3>
                </div>
    @endif




        </div>
      </section>
      <!--// Page Section //-->

    </div>
    <!--// Content //-->


















                

                    
@endsection