@extends('layouts.admin')

@section('main')
    
        








<div class="row">
<div class="col-md-12">

        <div class="portlet light bordered">
        <div class="portlet-body form">
        <form class="form-horizontal" action="" method="post" role="form">
        <div class="form-body">



{!! csrf_field() !!}




                
    <div class="form-group">
    <label class="col-sm-3 control-label">MENU NAME</label>
    <div class="col-sm-6"><input name="name" value="{{ $details->name }}" class="form-control" type="text"></div>
    </div>


    <div class="form-group">
    <label class="col-sm-3 control-label">Menu Text</label>
    <div class="col-sm-6">
    <textarea id="" placeholder="" class="wysihtml5 form-control" rows="20" name="btxt">{{ $details->btxt }}</textarea>
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