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
    <label class="col-sm-3 control-label"><strong>SLIDER IMAGE</strong></label>
    <div class="col-sm-3"><input type="file" name="image"></div>
    <div class="col-sm-3"><b style="color:red; font-weight: bold;"> Will Resized To 1200 X 600</b></div>
    </div>


    <div class="form-group">
    <label class="col-sm-3 control-label"><strong>Bold Text</strong></strong></label>
    <div class="col-sm-6"><input type="text" name="boldtxt" class="form-control input-lg"></div>         
    </div>

    <div class="form-group">
    <label class="col-sm-3 control-label"><strong>Small Text</strong></strong></label>
    <div class="col-sm-6"><input type="text" name="smalltxt" class="form-control input-lg"></div>
    </div>


    <div class="row">
    <div class="col-md-offset-3 col-md-6">
    <button type="submit" class="btn blue btn-block">ADD NEW</button>
    </div>
    </div>



      </div>
      </form>
      </div>



<br><br><br><br>
<hr>

<div class="row">
  


@if(count($sliders))


                @foreach($sliders as $mimg)
        
<div class="col-md-6">

<img src="{{asset('frontend/images/slider/')}}/{{ $mimg->img }}" alt="**" style="width:100%;"> <br>

<h1 style="min-height:40px;">{{ $mimg->btxt }}</h1>
<br>{{ $mimg->stxt }}<br><br>



<form method="post" action="{{ url('admin/deleteSlider') }}" class="form-inline" role="form">
{!! csrf_field() !!}
{{ method_field('DELETE') }}
<input type="hidden" name="id" value="{{ $mimg->id }}">
<button type="submit" class="btn btn-block btn-danger"><i class="fa fa-times"></i> DELETE</button>
</form>
<br><br><br>

</div>


                @endforeach

    @else

                <div class="text-center">
                <h3>No Slider Added Yet</h3>
                </div>
    @endif




</div>









</div>
</div>		
</div><!---ROW-->		

					
					
					
					   
                

                    
@endsection