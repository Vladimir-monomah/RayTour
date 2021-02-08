@extends('layouts.admin')

@section('main')
    




					

<div class="row">
<div class="col-md-12">
<div class="portlet light bordered">

      <div class="portlet-body form">
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="form-body">



{!! csrf_field() !!}
										





            <div class="form-group">
              <label class="col-sm-3 control-label">FOR</label>
              <div class="col-sm-6">
<select  name="fr" class="form-control input-lg">

  @if($pro->fr)
  <option value="1" selected="">SELL [SELECTED]</option>
  @else
  <option value="0" selected="">RENT [SELECTED]</option>
  @endif

  <option value="0">RENT</option>
  <option value="1">SELL</option>
</select>
              
              </div>
            </div>





<div class="form-group">
<label class="col-sm-3 control-label">NAME</label>
<div class="col-sm-6"><input name="name" value="{{ $pro->name }}" class="form-control input-lg" type="text"></div>
</div>





<div class="form-group">
<label class="col-sm-3 control-label">PRICE</label>

<div class="col-sm-6">                

<div class="input-group mb15">
<input class="form-control" name="rate" value="{{ $pro->rate }}" type="text">
<span class="input-group-addon">{{$general->currency}}</span>
</div>

</div>


</div>













<div class="form-group">
<label class="col-sm-3 control-label">CATEGORY</label>
<div class="col-sm-6">

Currently Selected As <b> {{ $pro->property->category->name }} &rarr; {{ $pro->property->name }} </b>

<select id="cat" name="cat" class="form-control input-lg">
<option value="">--</option>


@foreach($cat as $par)
<option value="{{ $par->id }}{{ $par->name }}">{{ $par->name }}</option>
@endforeach  

</select>

</div>
</div>



<div class="form-group">
<label class="col-sm-3 control-label">SUB CATEGORY</label>
<div class="col-sm-6">

<select id="subcat" name="subcat" class="form-control input-lg">
<option value="">--</option>


@foreach($subcat as $sub)
<option value="{{ $sub->id }}" class="{{ $sub->parent }}{{ $sub->category->name }}">{{ $sub->name }}</option>
@endforeach  






</select>

</div>
</div>



<br><br>

<div class="form-group">
<label class="col-sm-3 control-label">Main IMAGE</label>
<div class="col-sm-2"><input name="mainimage" type="file" /></div>
<div class="col-sm-4"><img src="{{asset('propertyimg/')}}/{{ $pro->img }}" alt="*" style="width:100px;"></div>
</div>

<br><br>

<div class="form-group">
<label class="col-sm-3 control-label">Overview</label>
<div class="col-sm-6">
<textarea id="" placeholder="" class="wysihtml5 form-control" rows="10" name="overview">{{ $pro->quick }}</textarea>
</div>
</div>




<div class="form-group">
<label class="col-sm-3 control-label">Public Facilities</label>
<div class="col-sm-6">
<textarea id="" placeholder="" class="wysihtml5 form-control" rows="10" name="public">{{ $pro->public }}</textarea>
</div>
</div>




<div class="form-group">
<label class="col-sm-3 control-label">Property Address</label>
<div class="col-sm-6"><input name="address" value="{{ $pro->address }}" class="form-control input-lg" type="text"></div>
</div>




<div class="form-group">
<label class="col-sm-3 control-label">Facing</label>
<div class="col-sm-6"><input name="facing" value="{{ $pro->facing }}" class="form-control input-lg" type="text"></div>
</div>




<div class="form-group">
<label class="col-sm-3 control-label"> Number of Room </label>
<div class="col-sm-6"><input name="room" value="{{ $pro->room }}" class="form-control input-lg" type="text"></div>
</div>




<div class="form-group">
<label class="col-sm-3 control-label"> Number of Bathroom </label>
<div class="col-sm-6"><input name="broom" value="{{ $pro->broom }}" class="form-control input-lg" type="text"></div>
</div>




<div class="form-group">
<label class="col-sm-3 control-label"> Total Area </label>
<div class="col-sm-6"><input name="area" value="{{ $pro->area }}" class="form-control input-lg" type="text"></div>
</div>







              <div class="row">
              <div class="col-md-offset-3 col-md-6">
              <button type="submit" class="btn blue btn-block">Submit</button>
              </div>
              </div>






      </div>
      </form>
      </div>


</div>
</div>		
</div><!---ROW-->		

					
					
					
					   
                

                    
@endsection