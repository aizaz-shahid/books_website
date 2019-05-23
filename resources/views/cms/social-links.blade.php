 
@extends('/cms/main')
@section('content')
 <h3>Obooko - Essential Setup - <b>Social Media Links</b></h3> 
  <hr size=1>
  <br><form method=post action='/edit_social_links'>
  <p><b>Facebook</b><br><textarea class='form-control' rows=1 name='fb'>{{$social_links->facebook}}</textarea>
  <p><p><b>Twitter</b><br><textarea class='form-control' rows=1 name='t'>{{$social_links->twitter}}</textarea>
  <p><p><b>Stumbled Upon</b><br><textarea class='form-control' rows=1 name='s'>{{$social_links->stumbled_upon}}</textarea>
  <p><p><b>Linkedin</b><br><textarea class='form-control' rows=1 name='l'>{{$social_links->linkedin}}</textarea>
  <p><p><b>Pinterest</b><br><textarea class='form-control' rows=1 name='p'>{{$social_links->pinterest}}</textarea>
  <p><p><b>Google+</b><br><textarea class='form-control' rows=1 name='g'>{{$social_links->googleplus}}</textarea>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <input type="hidden" name="sent" value="1">
  <p><input class='btn btn-danger' type=submit value=Update></form>

  @endsection