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
            <label class="col-md-3 control-label"><strong>Website Name</strong></label>
            <div class="col-md-6">
            <input class="form-control input-lg" name="sitename" value="{{ $info->sitename }}" type="text">
            </div>
            </div>



            <div class="form-group">
            <label class="col-md-3 control-label"><strong>Address</strong></label>
            <div class="col-md-6">
            <input class="form-control input-lg" name="address" value="{{ $info->address }}" type="text">
            </div>
            </div>


            <div class="form-group">
            <label class="col-md-3 control-label"><strong>Mobile</strong></label>
            <div class="col-md-6">
            <input class="form-control input-lg" name="mobile" value="{{ $info->mobile }}" type="text">
            </div>
            </div>


            <div class="form-group">
            <label class="col-md-3 control-label"><strong>Email</strong></label>
            <div class="col-md-6">
            <input class="form-control input-lg" name="email" value="{{ $info->email }}" type="text">
            </div>
            </div>


            <div class="form-group">
            <label class="col-md-3 control-label"><strong>Currency</strong></label>
            <div class="col-md-6">
            <input class="form-control input-lg" name="currency" value="{{ $info->currency }}" type="text">
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