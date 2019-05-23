
@extends('/cms/main')
@section('content')
 
<h3>Obooko - Book/Catalogue Editor - <b>Manage Categories</b></h3> 
  <hr size=1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
 <div class="row">
 <div class="col-sm-4 col-xs-12">
 <h5>Category List - Fiction</b></h5> 
  <hr size=1>
    
  <div class="row">

<div class="col-sm-8"><span style="font-size:12px;"><b>Category Name</b></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><b>Edit</b></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><b>Del</b></span></div>
</div>
 @foreach($catF as $catF)
<div class="row">
<div class="col-sm-8"><span style="font-size:12px;"><a href="edit_category?id={{$catF->id}}">{{$catF->name}}</a></span></div>
<div class="col-sm-2"><span style="font-size:16px;"><a href="edit_category?id={{$catF->id}}"><i style="color:#1C5192" class="fa fa-file"></i>
</a></span></div>
<div class="col-sm-2"><span style="font-size:16px;"><a href="delete_category?id={{$catF->id}}"><i style="color:#ff4040;" class="fa fa-times"></i>
</a></span></div>
</div>
@endforeach
 
 </div>
 
 
  <div class="col-sm-4 col-xs-12">
 <h5>Category List - NonFiction</b></h5> 
  <hr size=1>
  
  <div class="row">
<div class="col-sm-8"><span style="font-size:12px;"><b>Category Name</b></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><b>Edit</b></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><b>Del</b></span></div>
</div>
 @foreach($catN as $catn)


<div class="row">
<div class="col-sm-8"><span style="font-size:12px;"><a href="edit_category?id={{$catn->id}}">{{$catn->name}}</a></span></div>
<div class="col-sm-2"><span style="font-size:16px;"><a href="edit_category?id={{$catn->id}}?>"><i style="color:#1C5192" class="fa fa-file"></i>
</a></span></div>
<div class="col-sm-2"><span style="font-size:16px;"><a href="delete_category?id={{$catn->id}}"><i style="color:#ff4040;" class="fa fa-times"></i>
</a></span></div>
</div>


@endforeach
 
 </div>
 

 
  <div class="col-sm-4">
 <h5>Create New Category</b></h5> 
  <hr size=1>
<form method=post action='add_category'>
Name of Category<br><textarea class='form-control' rows=1 name='catname'></textarea><p>
Category Type<br>
<select class='form-control' name="cattype">
<option value="">choose type</option>
<option value="F">Fiction</option>
<option value="NF">Non-Fiction</option>
</select>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <br>
<input type='submit' class='btn btn-danger' value='Add New Category'></form>  
  </div>

 
 </div>


 

</div>

</div>   
@endsection