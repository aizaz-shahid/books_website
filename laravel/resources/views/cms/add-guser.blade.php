
@extends('/cms/main')
@section('content')
<h3>Obooko - General Users Listing- <b>  New User </b></h3> 

 		 <hr size=1><br>
 		 @if(isset($error))
<div class="alert alert-danger">
  <strong>Error!</strong>{{$error}}
</div>
@endif
@if(isset($success))
<div class="alert alert-success">
  <strong>Success!</strong> {{$success}}
</div>
@endif
 		 <form method=post action='/add_user'>
 		 <div class=row>
 		 <div class=col-sm-6>
 		 <p><b>User Name</b><br><textarea class='form-control' rows=1 name='user_name'></textarea></div>
 		 <div class=col-sm-6><b>Gender</b><br>
<select class='form-control' name="gender">
            	<option selected value="M">Male</option>
            	<option  value="F">Female</option>
            	            </select>

</div>
 		 </div><input type="hidden" name="_token" value="{{ csrf_token() }}">
 		 <div class=row>
 		<div class=col-sm-6>
 		 <p><b>Email</b><br><input class='form-control' type='email' rows=1 name='email'>
 		 </div>
 		 <div class=col-sm-6>
            <p><b>User Group</b><br><select class='form-control' name="usr_grp">
            	<option selected value="free">Free User</option>
            	<option  value="author">Author</option>
            	            </select>
 		 </div>
 		</div>
<div class=row>
 		<div class=col-sm-6>
 		 <p><b>First Name</b><br><input class='form-control' type='text' rows=1 name='first_name'>
 		 </div>
 		 <div class=col-sm-6>
            <p><b>Last Name</b><br><input class='form-control' type='text' rows=1 name='last_name'>
 		 </div>
 		</div>     
<div class=row>
 		<div class=col-sm-6>
 		 <p><b>Country</b><br><input class='form-control' type='text' rows=1 name='country'>
 		 </div>
 		 <div class=col-sm-6>
            <p><b>Paid Type</b><br>
<select class='form-control' name="usr_paidtype">
                <option  value="1">Paid</option>
            	<option  value="0">Non Paid</option>
            </select>

 		 </div>
 		</div> 
 		  <p><b>Password</b><br>
 		 <input class='form-control' type="password" required='required' rows=1 name='password' placeholder='******' ><p><b>Re-Enter Password</b><br>
 		 <input class='form-control' type="password" required='required'  rows=1 name='cpassword' placeholder='******'><p><hr size=1>
 		 <input class='btn btn-danger' type=submit value='Add User'></form>

            </div>

        </div>
   @endsection