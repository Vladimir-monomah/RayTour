@extends('layouts.admin')

@section('main')
    

@if(count($TourList))



        <div class="row">
        <div class="col-md-12">
                            

<div class="portlet light bordered">
<div class="portlet-title">
<div class="caption font-dark">
</div>
<div class="tools"> </div>
</div>
<div class="portlet-body">
<table class="table table-striped table-bordered table-hover" id="sample_1">





                <thead>
                <tr>
                    <th>ID#</th>
                    <th>NAME</th>
                    <th>Category</th>
                    <th>Featured</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($TourList as $tour)
                    <tr>
                     
<td>{{ $tour->id }}</td>
<td>{{ $tour->name }}</td>
<td>{{ $tour->cat->name }}</td>
<td>

<form method="post" action="{{ url('admin/tourFeatured') }}" class="form-inline">
{!! csrf_field() !!}
<input type="hidden" name="id" value="{{ $tour->id }}">

  @if($tour->featured)
<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> REMOVE</button>
  @else
<button type="submit" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> ADD</button>
  @endif

</form>
</td>



<td>




<a href="{{url('admin/edittour')}}/{{ $tour->id }}" class="btn purple btn-sm"><i class="fa fa-edit"></i> Редактировать</a>


<button type="button" class="btn btn-danger btn-sm delete_button" 
data-toggle="modal" data-target="#DelModal"
data-id="{{ $tour->id }}">
<i class='fa fa-times'></i> Удалить
</button>




</td>

                    </tr>
                @endforeach


                                            

</tbody>
</table>
</div>
</div>

        </div>
        </div><!-- ROW-->





                <div class="text-center">
                    {!! $TourList->render() !!}
                </div>

    @else

                <div class="text-center">
                    <h3>Нет доступных туров</h3>
                </div>
    @endif






  <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-    labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Удалить !</h4>
      </div>

            <div class="modal-body">
                <strong>Вы уверены, что хотите удалить ?</strong>
            </div>

          <div class="modal-footer">



<form method="post" action="{{ url('admin/deletetour') }}" class="form-inline">
{!! csrf_field() !!}
{{ method_field('DELETE') }}
<input type="hidden" name="id" class="abir_id" value="0">

<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
<button type="submit" class="btn btn-danger">Удалить</button>

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
