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
<label class="col-sm-3 control-label">НАЗВАНИЕ АЛЬБОМА</label>
<div class="col-sm-6"><input name="name" value="{{ $album->name }}" class="form-control input-lg" type="text"></div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">КРАТКОЕ ОПИСАНИЕ</label>
<div class="col-sm-6"><input name="des" value="{{ $album->des }}" class="form-control input-lg" type="text"></div>
</div>




<div class="form-group">
<div class="form-group">
<label class="col-sm-3 control-label">Основное изображение</label>
<div class="col-sm-2"><input name="mainimage" type="file" /></div>
<div class="col-sm-4"> <img src="{{asset('frontend/images/albums/')}}/{{ $album->img }}" alt="*" style="width:200px;"></div>
</div>

<br><br>





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



@section('scripts')

<link href="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" rel="stylesheet" type="text/css" />




<script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}" type="text/javascript"></script>

        <script src="{{asset('assets/pages/scripts/components-editors.min.js')}}" type="text/javascript"></script>


@endsection