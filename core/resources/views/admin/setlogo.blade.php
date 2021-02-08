@extends('layouts.admin')

@section('main')
    




					

<div class="row">

<div class="col-md-6">
<div class="portlet light bordered">





      <div class="portlet-body form">
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="form-body">



{!! csrf_field() !!}
										






<div class="form-group">
<br>
<div class="col-md-6 col-md-offset-3"><input type="file" name="image"><br>
</div>
</div>
<br>

<div class="row">
<div class="col-md-offset-3 col-md-4">
<button type="submit" class="btn blue btn-block">Upload New Logo</button>
</div><br>
</div>



      </div>
      </form>
      </div>









</div>
</div>		



<div class="col-md-6">
<div class="portlet light bordered">

<h3>Current Logo</h3><br>

<img src="{{asset('frontend/images/logo.png')}}" alt="**" style="height:100px;">

</div>
</div>    






</div><!---ROW-->		

					
					
					
					   
                

                    
@endsection