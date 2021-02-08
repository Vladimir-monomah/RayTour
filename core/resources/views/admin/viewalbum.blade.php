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
<label class="col-sm-3 control-label">SHORT DESCRIPTION</label>
<div class="col-sm-6"><input name="des" value="" class="form-control input-lg" type="text"></div>
</div>




<div class="form-group">
<div class="form-group">
<label class="col-sm-3 control-label">Main IMAGE</label>
<div class="col-sm-2"><input name="mainimage" type="file" /></div>
<div class="col-sm-4"><b style="color:red; font-weight: bold;"> ONE IMAGE ONLY |  Will Resized to 1600 X 1200 </b></div>
</div>

<br><br>





              <div class="row">
              <div class="col-md-offset-3 col-md-6">
              <button type="submit" class="btn blue btn-block">Submit</button>
              </div>
              </div>






      </div>
      </form>
      </div>


<div class="row">


@foreach($imgs as $img)

<div class="col-md-3">
<img src="{{asset('frontend/images/albumdetails/')}}/{{ $img->img }}" alt="*" style="width:100%;">
<p>{{ $img->des }}</p>
<button type="button" class="btn btn-danger btn-block delete_button" 
data-toggle="modal" data-target="#DelModal"
data-id="{{ $img->id }}">
DELETE
</button><br><br>


</div>

@endforeach

</div>









</div>
</div>		
</div><!---ROW-->		

					
					


					   

  <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-    labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
      </div>

            <div class="modal-body">
                <strong>Are you sure you want to Delete ?</strong>
            </div>

          <div class="modal-footer">



<form method="post" action="{{ url('admin/deleteAlbumImg') }}" class="form-inline">
{!! csrf_field() !!}
{{ method_field('DELETE') }}
<input type="hidden" name="id" class="abir_id" value="0">

<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger">DELETE</button>

</form>

          </div>

    </div>
  </div>
    </div>


                

                    
@endsection



@section('scripts')




<script>
    $(document).ready(function(){
        

        
$(document).on( "click", '.delete_button',function(e) {
        var id = $(this).data('id');
        $(".abir_id").val(id);

    });



        
    });
</script>


@endsection
