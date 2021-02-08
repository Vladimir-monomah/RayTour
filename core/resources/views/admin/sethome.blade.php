@extends('layouts.admin')

@section('main')
    




					

<div class="row">
<div class="col-md-12">
<div class="portlet light bordered">

      <div class="portlet-body form">
      <form class="form-horizontal" action="" method="post">
      <div class="form-body">



{!! csrf_field() !!}
										


<div class="form-group">
<label class="col-sm-3 control-label">Heading</label>
<div class="col-sm-6"><input name="head" value="{{ $info->head }}" class="form-control input-lg" type="text"></div>
</div>



<div class="form-group">
<label class="col-sm-3 control-label">Text</label>
<div class="col-sm-6">
<textarea class="wysihtml5 form-control" rows="15" name="txt">{{ $info->txt }}</textarea>
</div>
</div>



            <div class="form-group">
            <label class="col-md-3 control-label"><strong>About Text</strong></label>
            <div class="col-md-6">
            <textarea name="about" rows="5" class="form-control">{{ $info->about }}</textarea>
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