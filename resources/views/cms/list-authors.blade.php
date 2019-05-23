@extends('/cms/main')
@section('content')

<h3>Obooko - Book/Catalogue Editor - <b>Manage Authors</b></h3> 
  <hr size=1>
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
 <div class="row">
 <div class="col-sm-8 col-xs-12">
 <h5>List of Active Authors Sorted By Last Name</b></h5> 
  <hr size=1>
  
  <div class="row">
  <div class="col-sm-1"><span style="font-size:12px;"><b>#</b></span></div>
<div class="col-sm-7"><span style="font-size:12px;"><b>Author's Name</b></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><b>Edit</b></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><b>Del</b></span></div>
</div>
<?php $num_rows=0;?>
@foreach($authors as $author)
<?php $num_rows=$num_rows+1;?>
<div class="row">
<div class="col-sm-1"><span style="font-size:16px;"><?php echo $num_rows; ?></span></div>
<div class="col-sm-7"><span style="font-size:16px;"><i style="color:#91C000;" class="fa fa-user"></i>&nbsp;&nbsp;<b><a href="edit_author?id={{$author->user_id}}">{{$author->first_name}}</b>, &nbsp;{{$author->email}}</a></span></div>
<div class="col-sm-2"><span style="font-size:16px;"><a href="edit_author?id={{$author->user_id}}"><i style="color:#1C5192" class="fa fa-file"></i>
</a></span></div>
<div class="col-sm-2"><span style="font-size:16px;"><a href="delete_author?id={{$author->user_id}}"><i style="color:#ff4040;" class="fa fa-times"></i>
</a></span></div>
</div>

@endforeach

 </div>
 
 


 
  <div class="col-sm-4">
 <h5>Create New Author Record</b></h5> 
  <hr size=1>
<form method=post action='/add_authors'>
<p>
Author Firstname<br><input type="text" class='form-control' name='name'></p>
<p>Author Email<br><input type="email" required class="form-control" name="email"></p>
<p>Author Password<br><input type="password" required class="form-control" name="pass"></p>
<input type="hidden" name="status" value="A">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
 <br>
<input type='submit' class='btn btn-danger' value='Add New Author'></form>  
  </div>

 
 </div>


 

</div>

</div>   
@endsection