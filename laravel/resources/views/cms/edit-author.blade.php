@extends('/cms/main')
@section('content')
    <h3>Obooko - Book/Catalogue Editor - <b>Manage Author</b></h3> 
  <hr size=1><br>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<br><form method=post action='/edit_author_post'>

<div class=row><div class=col-sm-6><p><b>Author First Name</b><br><textarea class='form-control' rows=1 name='fname'>{{$author->first_name}}</textarea></div>

<div class=col-sm-6><b>Author Email</b><br><input type="email" class='form-control' name='email' value="{{$author->email}}" />
  </div></div><p>

 <b>Site Password </b><br><input class='form-control' type='password' name='pass' value='{{$author->password}}' ><br>

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<b>Author Status</b><br><select class='form-control' name='austatus'><option selected>

{{$author->active}}
<option value='A'>Active</option><option value='NA'>Not Active</option></select><p>

<p><input type='hidden' name='auid' value="{{$author->user_id}}">


<input class='btn btn-danger' type=submit value=Update></form>


    </div>
  </div>
</div>
@endsection