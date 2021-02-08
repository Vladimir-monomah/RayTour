@extends('layouts.admin')

@section('main')
    
        
 







    @if(count($catlist))




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
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($catlist as $cat)
                    <tr>

<td>{{ $cat->id }}</td>
<td>{{ $cat->name }}</td>

<td>
<a href="{{url('admin/editcat')}}/{{ $cat->id }}" class="btn purple btn-xs"><i class="fa fa-edit"></i> EDIT</a>

<form method="post" action="{{ url('admin/deletecat') }}" class="form-inline">
{!! csrf_field() !!}
{{ method_field('DELETE') }}
<input type="hidden" name="id" value="{{ $cat->id }}">
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



                <div class="text-center">
                {!! $catlist->render() !!}
                </div>

                
    @else

    
                <div class="text-center">
                <h3>No Cats available</h3>
                </div>
    @endif









@endsection