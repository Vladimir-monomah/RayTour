@extends('layouts.admin')

@section('main')
    
        
 







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
                    <th>Имя клиента</th>
                    <th>Контактная информация</th>
                    <th>Статус заказа</th>
                    <th>Действие</th>
                </tr>
                </thead>

                <tbody>
                @foreach($orders as $ord)
                    <tr>

<td>{{ $ord->id }}</td>
<td>{{ $ord->name }}</td>
<td>{{ $ord->mobile }} - {{ $ord->email }}</td>
<td>

  @if($ord->stat==0)
<button type="button" class="btn btn-xs btn-primary">АКТИВНЫЙ</button>
  @elseif($ord->stat==1)
<button type="button" class="btn btn-xs btn-success">ЗАВЕРШЕНО</button>
  @elseif($ord->stat==2)
<button type="button" class="btn btn-xs btn-danger">ОТКЛОНЕН</button>
  @endif


</td>

<td>


<a href="{{url('admin/vieworder')}}/{{ $ord->id }}" class="btn btn-primary btn-sm" >Детали / Действие</a>

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
