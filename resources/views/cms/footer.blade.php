 
@extends('/cms/main')
@section('content')
  <h3>Obooko - Essential Setup - <b>Footer</b></h3> 
  <hr size=1><br><form method=post action='/edit_footer'>
  <p><b>General Text</b><br><textarea class='form-control' rows=10 name='general'>{{$footer->general_text}}</textarea>
  <p><b>Cookie Code</b><br><textarea class='form-control' rows=10 name='cookie'>{{$footer->cookie_code}}</textarea>
  <p><p><b>Analytic Code</b><br><textarea class='form-control' rows=10 name='analytic'>{{$footer->analytic_code}}</textarea>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="sent" value="1">
  <p><input class='btn btn-danger' type=submit value=Update></form>
@endsection