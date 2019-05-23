 @extends('/cms/main')
@section('content')
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
 <h3>Obooko - Author Panel Pages - <b>Manage Message</b></h3> 
  <hr size=1><br><form method=post action='msg_post'><p><b>Message</b><br>
<textarea id="my-editor" class='ckeditor form-control' rows='1' name='message'>{!!$msg->content!!}</textarea>
<script>
  CKEDITOR.replace( 'my-editor', {
    filebrowserImageBrowseUrl: '/laravel-filemanager/r/b?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/r/bupload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '/laravel-filemanager/r/b?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/r/b/upload?type=Files&_token={{csrf_token()}}'
  });
</script>
  <p><input type='hidden' name='msgid' value="{{$msg->id}}">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type=submit value=Update></form>
  @endsection