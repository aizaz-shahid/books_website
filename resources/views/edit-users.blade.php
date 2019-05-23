
@extends('/cms/main')
@section('content')
<h3>Obooko - Admin Users Listing- <b>Update User </b></h3> 
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
 		 <div class=col-sm-6><b>Display Name</b><br><select class='form-control' name="usr_gender">
            	<option selected value="M">Male	</option>
            	<option  value="F">Female</option>
            	
            </select></div></div>
             <div class=row>
            	 <div class=col-sm-6>
 		 <p><b>First Name</b><br><textarea class='form-control' rows=1 name='first_name'>{{$user->first_name}}</textarea></div>
 		 <div class=col-sm-6><b>Last Name</b><br>
 		 <textarea class='form-control' rows=1 name='last_name'>{{$user->last_name}}</textarea>
 		 </div></div>
 		  <div class=row>
 		       	 <div class=col-sm-4>
 		 <p><b>Books Dowmloaded</b><br><textarea class='form-control' rows=1 name='first_name'>{{$user->books_downloaded}}</textarea></div>
 		 <div class=col-sm-6><b>books Uploaded</b><br>
 		 <textarea class='form-control' rows=1 name='last_name'>{{$user->books_uploaded}}</textarea>
 		 </div>
 <div class=col-sm-4<b>books Uploaded</b><br>
 		 <select class='form-control' name="usr_grp">
            	<option selected value="free-user">Free User</option>
            	<option  value="author">Author</option>
            	<option  value="paid">Paid User</option>
            </select>
 		 </div>
 		 </div>
 		 <p><b>Email</b><br><input class='form-control' rows=1 name='email' value='{{$user->email}}'>  
 		 <p><hr size=1><b>Update Password:</b>(optional)<br><br>
 		 <b>Password</b><br><input class='form-control' rows=1 name='password' placeholder='******'>
 		 <p><b>Re-Enter Password</b><br><input class='form-control' rows=1 name='cpassword' placeholder='******'><p><hr size=1>
 		 <input type='hidden' name='id' value='{{$user->user_id}}'>
 		  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 		 <input class='btn btn-danger' type=submit value=Update></form>		</div>
	</div>   
</div>
   @endsection