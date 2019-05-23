@extends('/cms/main')
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
@section('content')

  <h3>Obooko - Blog Editor - <b>
Manage Blog Content</b></h3> 
  <hr size=1>
   @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<br><form method=post action='edit_blog_post'>
<p><b>Blog Title</b><br><textarea class='form-control' rows=1 name='bltitle'>
{{$blog->title}}
</textarea><p>
    
<p><b>Blog Summary</b><br><textarea class='form-control' rows=5 name='blsummary'>
{{$blog->summary}}
</textarea><p>

<b>Blog Writer</b><br><textarea class='form-control' rows=1 name='blwriter'>{{$blog->writer}}</textarea><p>

<b>Blog Image 1</b> - 
{{$blog->image}}
<br><div class='row'><div class='col-sm-4 col-xs-12'><img class='img-responsive' src='/public/images/{{$blog->image}}'></div>
<div class='col-sm-8 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<h5><b>Change The Image</b>
<br>Find the image that will be used using the dropdown menu below.
<br>Remember to first upload it into the system using the IMAGE UPLOADER tool.</h5>
<h4>Select The Image To Use</h4><select class="form-control" name="blmedia1">

<option selected>
{{$blog->image}}
</option>
<?php
foreach($images as $image)
{
   echo '<option>' . basename($image) . '</option>';
}
?>
</select><p></div></div><p>
<b>Image alt</b><br><textarea class='form-control' rows=1 name='img_alt'>{{$blog->img_alt}}</textarea><p>
<p><b>Blog Text1</b><br><textarea id="my-editor" class='ckeditor form-control' rows=1 name='bltext1'>{!! old('bltext1', $blog->article) !!}</textarea><p>
<script>
  CKEDITOR.replace( 'my-editor', {
    filebrowserImageBrowseUrl: '/laravel-filemanager/r/b?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/r/b/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '/laravel-filemanager/r/b/?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/r/b/upload?type=Files&_token={{csrf_token()}}'
  });
</script>
<b>Blog Status</b><br><select class='form-control' name='blstatus'><option selected>
{{$blog->status}}
</option><option value='A'>Active</option><option value='NA'>Not Active</option></select>
<p><input type='hidden' name='blid' value='{{$blog->post_id}}'>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input class='btn btn-danger' type=submit value=Update>
</form>
</div>

</div>   
@endsection