
@extends('/cms/main')
@section('content')
<h3>Obooko - Admin Users Listing- <b>  New  Admin User </b></h3> 

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
 		 <form method=post action='/add_adminuser'>
 		 <div class=row>
 		 <div class=col-sm-6>
 		 <p><b>User Name</b><br><textarea class='form-control' rows=1 name='user_name'></textarea></div>
 		 <div class=col-sm-6><b>Display Name</b><br><textarea class='form-control' rows=1 name='display_name'></textarea></div>
 		 </div><input type="hidden" name="_token" value="{{ csrf_token() }}"><p><b>Email</b><br><input class='form-control' type='email' rows=1 name='email'> <p><b>Password</b><br>
 		 <input class='form-control' type="password" required='required' rows=1 name='password' placeholder='******' ><p><b>Re-Enter Password</b><br>
 		 <input class='form-control' type="password" required='required'  rows=1 name='cpassword' placeholder='******'><p><hr size=1>
 		 <input class='btn btn-danger' type=submit value='Add Admin User'></form>

            </div>

        </div>
   @endsection