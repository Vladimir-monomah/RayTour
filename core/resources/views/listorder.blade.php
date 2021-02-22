@extends('layouts.profile')

@section('submain')


    @if(count($orders))




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
                    <th>№</th>                    
                    <th>Название тура</th>
                    <th>Адрес</th>
                    <th>Телефон</th>
                    <th>E-mail</th>
                    <th>Дата поездки</th>
                    <th>Число людей</th>
                    <th>Дата заказа</th>
                    <th>Статус заказа</th>
                </tr>
                </thead>

                <tbody>
                @foreach($orders as $ord)
                    <tr>

<td>{{ $ord->id }}</td>
<td>{{ $ord->tour_name }}</td>
<td>{{ $ord->address }}</td>
<td>{{ $ord->mobile }}</td>
<td>{{ $ord->email }}</td>
<td>{{ $ord->dt }}</td>
<td>{{ $ord->numppl }}</td>
<td>{{ date("d.m.Y", $ord->tm) }}</td>
<td>

  @if($ord->stat==0)
<button type="button" class="btn btn-xs btn-primary">АКТИВНЫЙ</button>
  @elseif($ord->stat==1)
<button type="button" class="btn btn-xs btn-success">ЗАВЕРШЕНО</button>
  @elseif($ord->stat==2)
<button type="button" class="btn btn-xs btn-danger">ОТКЛОНЕН</button>
  @endif


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
                {!! $orders->render() !!}
                </div>

                
    @else

    
                <div class="text-center">
                <h3>Нет доступных заказов</h3>
                </div>
    @endif







  <!-- Modal for Edit button -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-  labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"> <b class="abir_act"></b> <b> Категории</b></h4>
      </div>
      <form method="post" action="">
          <div class="modal-body">
              <div class="form-group">
          	    {!! csrf_field() !!}
                <input class="form-control abir_id" type="hidden" name="id">
                <input class="form-control input-lg abir_name" name="name" placeholder="Name" required>
              </div>
         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
          </div>
      </form>
    </div>
  </div>
    </div>












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



<form method="post" action="{{ url('admin/deletecat') }}" class="form-inline">
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
		
$(document).on( "click", '.edit_button',function(e) {

        var name = $(this).data('name');
        var id = $(this).data('id');
        var act = $(this).data('act');

        $(".abir_id").val(id);
        $(".abir_name").val(name);
        $(".abir_act").html(act);

    });







		
$(document).on( "click", '.delete_button',function(e) {
        var id = $(this).data('id');
        $(".abir_id").val(id);

    });



		
	});
</script>


@endsection
