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
<label class="col-sm-3 control-label">TOUR NAME</label>
<div class="col-sm-6"><input name="name" value="{{ $tour->name }}" class="form-control input-lg" type="text"></div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">TOUR COST</label>
<div class="col-sm-6">                
<div class="input-group mb15">
<input class="form-control input-lg" name="rate" type="text" value="{{ $tour->rate }}">
<span class="input-group-addon">{{$general->currency}}</span>
</div>
</div>
</div>





<div class="form-group">
<label class="col-sm-3 control-label">Duration</label>
<div class="col-sm-6">                
<div class="input-group mb15">
<input class="form-control input-lg" name="dur" value="{{ $tour->dur }}" type="text">
<span class="input-group-addon">DAYS</span>
</div>
</div>
</div>



<div class="form-group">
<label class="col-sm-3 control-label">Locations</label>
<div class="col-sm-6"><input name="loc" value="{{ $tour->loc }}" class="form-control input-lg" type="text"></div>
</div>








          

<div class="form-group">
<label class="col-sm-3 control-label">CATEGORY</label>
<div class="col-sm-6">
<select id="cat" name="cat" class="form-control input-lg">

<option value="{{ $tour->parent }}" selected="">[] SELECTED</option>


@foreach($cat as $par)
<option value="{{ $par->id }}">{{ $par->name }}</option>
@endforeach  

</select>

</div>
</div>
    

<br><br>

<div class="form-group">
<div class="form-group">
<label class="col-sm-3 control-label">Main IMAGE</label>
<div class="col-sm-2"><input name="mainimage" type="file" /></div>
<div class="col-sm-4"><img src="{{asset('tourimages/')}}/{{ $tour->img }}" alt="*" style="width:200px;"></div>

</div>

<br><br>

</div>




<div class="form-group">
<label class="col-sm-3 control-label">Tour Description</label>
<div class="col-sm-6">
<textarea class="wysihtml5 form-control" rows="10" name="description"> {{ $tour->description }}</textarea>
</div>
</div>



<div class="form-group">
<label class="col-sm-3 control-label">Package Includes</label>
<div class="col-sm-6">
<textarea class="wysihtml5 form-control" rows="5" name="inc"> {{ $tour->inc }}</textarea>
</div>
</div>


<div class="form-group">
<label class="col-sm-3 control-label">Package Excludes</label>
<div class="col-sm-6">
<textarea class="wysihtml5 form-control" rows="5" name="exc">{{ $tour->exc }}</textarea>
</div>
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



@section('scripts')

<link href="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css" />




<script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/pages/scripts/components-editors.min.js')}}" type="text/javascript"></script>


@endsection