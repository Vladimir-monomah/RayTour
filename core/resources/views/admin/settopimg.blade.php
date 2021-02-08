@extends('layouts.admin')

@section('main')
    




					

<div class="row">

<div class="col-md-4">
<div class="portlet light bordered">





      <div class="portlet-body form">
      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="form-body">



{!! csrf_field() !!}
										






<div class="form-group">
<br>
<div class="col-md-8 col-md-offset-2"><input type="file" name="image"><br>
<b style="color:red;"> WILL RESIZED TO 1920 X 320</b>
</div>
</div>
<br>

<div class="row">
<div class="col-md-offset-2 col-md-8">
<button type="submit" class="btn blue btn-block">Upload New Image</button>
</div><br>
</div>



      </div>
      </form>
      </div>









</div>
</div>		



<div class="col-md-8">
<div class="portlet light bordered">

<h3>Current Image</h3><br>

<img src="{{asset('frontend/images/inner-banner.jpg')}}" alt="**" style="width:100%;">

</div>
</div>    






</div><!---ROW-->		

					
					
					
					   
                

                    
@endsection