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
<label class="col-sm-3 control-label">Логотип партнера</label>
<div class="col-sm-3"><input type="file" name="images[]" multiple><br>
<b style="color:red; font-weight: bold;"> МОЖНО ЗАГРУЗИТЬ НЕСКОЛЬКО ИЗОБРАЖЕНИЙ <br> БУДЕТ ИЗМЕНЕН РАЗМЕР ДО 300 X 200 </b>
</div>
</div>


<div class="row">
<div class="col-md-offset-3 col-md-3">
<button type="submit" class="btn blue btn-block">Сохранить</button>
</div>
</div>

      </div>
      </form>
      </div>



<br><br><br><br>
<hr>

<div class="row">
  


@if(count($partnerimg))


                @foreach($partnerimg as $mimg)
        
<div class="col-md-3">

<img src="{{asset('frontend/images/partner')}}/{{ $mimg->img }}" alt="**" style="width:100%;">

<form method="post" action="{{ url('admin/deletePartnerImage') }}" class="form-inline" role="form">
{!! csrf_field() !!}
{{ method_field('DELETE') }}
<input type="hidden" name="id" value="{{ $mimg->id }}">
<button type="submit" class="btn btn-block btn-danger"><i class="fa fa-times"></i> УДАЛИТЬ</button>
</form>
<br><br><br>

</div>


                @endforeach

    @else

                <div class="text-center">
                <h3>Изображения еще не добавлены</h3>
                </div>
    @endif




</div>









</div>
</div>		
</div><!---ROW-->		

					
					
					
					   
                

                    
@endsection