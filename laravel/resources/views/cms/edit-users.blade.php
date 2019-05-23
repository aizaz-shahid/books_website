
@extends('/cms/main')
@section('content')
<h3>Obooko - Users Listing- <b>Update User </b></h3> 
 		 <hr size=1><br>
@if(isset($success))
<div class="alert alert-success">
  <strong>Success!</strong> {{$success}}
</div>
@endif
	 @if(isset($error))
<div class="alert alert-danger">
  <strong>Error!</strong>{{$error}}
</div>
@endif
 		 <form method=post action='/edit_users'>
 		 <div class=row>
 		 <div class=col-sm-6>
 		 <p><b>User Name</b><br><textarea class='form-control' rows=1 name='user_name'>{{$user->username}}</textarea></div>
 		 <div class=col-sm-6><b>Gender</b><br><select class='form-control' name="usr_gender">
            	<option {{($user->gender == 'M') ? 'selected' : ''}} value="M">Male	</option>
            	<option {{($user->gender == 'F') ? 'selected' : ''}} value="F">Female</option>
            	
            </select></div></div>
             <div class=row>
            	 <div class=col-sm-6>
 		 <p><b>First Name</b><br><textarea class='form-control' rows=1 name='first_name'>{{$user->first_name}}</textarea></div>
 		 <div class=col-sm-6><b>Last Name</b><br>
 		 <textarea class='form-control' rows=1 name='last_name'>{{$user->last_name}}</textarea>
 		 </div></div>
 		  <div class=row>
 		  <div class=col-sm-4>
 		 <b>Books Downloaded</b><textarea class='form-control' rows=1 name='b_d'>{{$user->books_downloaded}}</textarea></div>
 		 <div class=col-sm-4><b>books Uploaded</b><br>
 		 <textarea class='form-control' rows=1 name='b_u'>{{$user->books_uploaded}}</textarea>
 		 </div>
 <div class="col-sm-4"><b>User group</b><br>
 		 <select class='form-control' name="usr_grp">
            	<option {{($user->type == "free") ? 'selected'  : ' '}} value='free'>Free User</option>
            	<option {{($user->type == "author") ? 'selected' : ' '}}  value="author">Author</option>
            </select>
 		 </div>
 		 </div>
<p></p>
<div class="row">
<div class="col-sm-4">
<b>User group</b><br>
 		 <select class='form-control' name="usr_paidtype">

            	<option {{($user->paid_type == "1") ? 'selected'  : ' '}} value="1">paid</option>
            	<option {{($user->paid_type == "0") ? 'selected'  : ' '}}  value="0">Non-paid</option>
            </select>

</div>
<div class="col-sm-4">
<b>Country</b><br>
 		 <input class="form-control" name="usr_country" type="text"/ value="{{$user->country}}">
</div>
<div class="col-sm-4">
<b>Registered</b><br>
 		<input class="form-control" name="usr_created" type="text"/ value="{{$user->created_at}}">

</div>
</div>
<p></p>
 		 <p><b>Email</b><br><input class='form-control' rows=1 name='email' value='{{$user->email}}'>  
 		 <p><hr size=1><b>Update Password:</b>(optional)<br><br>
 		 <b>Password</b><br><input class='form-control' rows=1 value="{{$user->password}}" name='password' placeholder='******'>
 		 <hr size=1>
 		 <input type='hidden' name='id' value='{{$user->user_id}}'>
 		  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 		 <input class='btn btn-danger' type=submit value=Update></form>		</div>
	</div>   
</div>
   @endsection