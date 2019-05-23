  @extends('/cms/main')
@section('content')
<h3>Obooko - Admin Email - <b>		Update Admin Email Address</b></h3> 
 		 <hr size=1><br><form method=post action='/manage_adminpost'><br><b>Update Email Address</b><br><br><input type="hidden" name="_token" value="{{ csrf_token() }}"><input class='form-control' rows=1 name='email' value='{{$email->admin_email}}'><br><br><input class='btn btn-danger' type=submit value=Update></form>
@endsection