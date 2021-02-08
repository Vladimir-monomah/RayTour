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
            <label class="col-md-3 control-label"> <i class="fa fa-facebook-official fa-2x"></i></label>
            <div class="col-md-6">
            <input class="form-control input-lg" name="fb" value="{{ $info->fb }}" type="text">
            </div>
            </div>





            <div class="form-group">
            <label class="col-md-3 control-label"> <i class="fa fa-twitter-square fa-2x"></i></label>
            <div class="col-md-6">
            <input class="form-control input-lg" name="tw" value="{{ $info->tw }}" type="text">
            </div>
            </div>





            <div class="form-group">
            <label class="col-md-3 control-label"> <i class="fa fa-google-plus-square fa-2x"></i></label>
            <div class="col-md-6">
            <input class="form-control input-lg" name="gp" value="{{ $info->gp }}" type="text">
            </div>
            </div>





            <div class="form-group">
            <label class="col-md-3 control-label"> <i class="fa fa-linkedin-square fa-2x"></i></label>
            <div class="col-md-6">
            <input class="form-control input-lg" name="li" value="{{ $info->li }}" type="text">
            </div>
            </div>





            <div class="form-group">
            <label class="col-md-3 control-label"> <i class="fa fa-youtube-square fa-2x"></i></label>
            <div class="col-md-6">
            <input class="form-control input-lg" name="yt" value="{{ $info->yt }}" type="text">
            </div>
            </div>









                  <div class="row">
                  <div class="col-md-offset-3 col-md-6">
                  <button type="submit" class="btn blue btn-block">Сохранить</button>
                  </div>
                  </div>


      </div>
      </form>
      </div>
      </div>



</div>		
</div><!---ROW-->		

					
					
					
					       


                

                    
@endsection