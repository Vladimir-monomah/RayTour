@extends('layouts.admin')

@section('main')
    
        
 
<div class="row">



<form action="" method="post">
{!! csrf_field() !!}

<div class="col-md-3">
<input type="text" class="form-control input-lg" name="n1" value="{{ $info->n1 }}" placeholder="Footer Heading 1">
</div>

<div class="col-md-3">
<input type="text" class="form-control input-lg" name="n2" value="{{ $info->n2 }}" placeholder="Footer Heading 2">
</div>

<div class="col-md-3">
<input type="text" class="form-control input-lg" name="n3" value="{{ $info->n3 }}" placeholder="Footer Heading 3">
</div>

<div class="col-md-3">
<input type="submit" class="btn btn-success btn-block" name="head" value="UPDATE">
</div>


</form>


<br><br><hr><br>

</div>      
                        

<div class="row">



<form action="addfoter" method="post">

{!! csrf_field() !!}

<div class="col-md-4">
<input type="text" class="form-control" name="name" placeholder="MENU NAME">
</div>



<div class="col-md-4">
<select name="parent" class="form-control">

  <option value="1">{{ $info->n1 }}</option>
  <option value="2">{{ $info->n2 }}</option>
  <option value="3">{{ $info->n3 }}</option>

</select>



</div>

<div class="col-md-4">
<input type="submit" class="btn btn-success btn-block" name="new" value="ADD NEW">
</div>


</form>


<br><br><hr><br>

</div>            

					


@if(count($menulist))



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
                    <th>NAME</th>
                    <th>Parent</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($menulist as $menu)
                    <tr>
                     
<td>{{ $menu->name }}</td>
<td>Position -  {{ $menu->parent }}</td>

<td>




<a href="{{url('admin/editfootmenu')}}/{{ $menu->id }}" class="btn purple btn-xs"><i class="fa fa-edit"></i> EDIT</a>



<form method="post" action="{{ url('admin/deletefootmenu') }}" class="form-inline" role="form">
{!! csrf_field() !!}
{{ method_field('DELETE') }}
<input type="hidden" name="id" value="{{ $menu->id }}">
<button type="submit" class="btn btn-xs btn-danger abir"><i class="fa fa-times"></i> DELETE</button>
</form>





</td>

                    </tr>
                @endforeach


                                            

</tbody>
</table>
</div>
</div>

        </div>
        </div><!-- ROW-->




    @else

                <div class="text-center">
                    <h3>No Menu available Yet</h3>
                </div>
    @endif
       
                              
                              
                              
                  
					
					
					
					       


                

                    
@endsection