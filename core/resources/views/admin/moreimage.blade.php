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
<label class="col-sm-3 control-label">ADD MORE IMAGE</label>
<div class="col-sm-3"><input type="file" name="images[]" multiple><br>
<b style="color:red; font-weight: bold;"> MULTIPLE IMAGE CAN BE UPLOADED</b>
</div>
</div>


<div class="row">
<div class="col-md-offset-3 col-md-3">
<button type="submit" class="btn blue btn-block">Submit</button>
</div>
</div>

      </div>
      </form>
      </div>



<br><br><br><br>
<hr>

<div class="row">
  


@if(count($moreimage))


                @foreach($moreimage as $mimg)
        
<div class="col-md-3">

<img src="{{asset('propertyimg/')}}/{{ $mimg->img }}" alt="**" style="width:100%;">

<form method="post" action="{{ url('admin/deleteMoreImage') }}" class="form-inline" role="form">
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
                <h3>No Images Added Yet</h3>
                </div>
    @endif




</div>









</div>
</div>		
</div><!---ROW-->		

					
					
					
					   
                

                    
@endsection