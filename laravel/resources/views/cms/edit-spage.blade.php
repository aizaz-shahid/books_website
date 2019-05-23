@extends('/cms/main')
@section('content')
 <h3>Obooko - Single Pages Editor - <b style='text-transform: capitalize;'></b></h3> 
  <hr size=1>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<br><form id="pageform" method=post action='/edit_spage'>

<div class='row'><div class=col-sm-4><b>Page Title</b><br><textarea class='form-control' rows=5 name='pgt'>{{$newpage->title}}</textarea></div>
 
 <input type="hidden" name="id" value='<?php echo $_GET['id']; ?>'>
<div class=col-sm-4><b>Meta Description</b><br><textarea class='form-control' rows=5 name='mtdesc'>{{$newpage->m_description}}</textarea></div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class=col-sm-4><b>Meta Keywords</b><br><textarea class='form-control' rows=5 name='mtkeyw'>{{$newpage->m_keywords}}</textarea></div></div><br><br>

<b>Top Header Image</b> - 

<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='images/{{$newpage->h_image}}'></div>
<div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<b>Change The Image</b><br>Find the image that will be used using the dropdown menu below. Remember to first upload it into the 
system using the IMAGE UPLOADER TOOL.<p>Select The Image To Use<br><select class="form-control" name="itm1">

<option selected>

{{$newpage->h_image}}
</option>
<?php
foreach($images as $image)
{
    echo '<option>' . basename($image) . '</option>';
}
?>
</select><p></div></div>
<p><b>Top Header Text</b><br><input type="text" class='form-control' value="{{$newpage->h_text}}" name='itm2'></textarea><p>
@if($newpage->slug != "" || $newpage->slug != " ")
 <p>
             <b>Page Url</b><br><input type=text" class="form-control" disabled name="slug_url" value="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/page/{{$newpage->slug}}">
     </p>
@endif
       <p>
             <b>Page Slug</b><br><input type=text" class="form-control" name="slug" value="{{$newpage->slug}}">
     </p>
 
<p><b>Top Header Left Subtext</b><br><textarea class='form-control' rows=3 name='itm3'>{{$newpage->h_subtext}}</textarea><p>

 </textarea><p>


<p><b>Content Title</b><br><textarea class='form-control' rows=1 name='itm5'>{{$newpage->c_title}}</textarea><p>

<p><b>The Content</b><br><textarea class='form-control ckeditor' rows=12 name='itm6'>{{$newpage->c_text}}</textarea>

<hr size=1>
<input class="btn" type=submit value='Update'> <a class="btn btn-primary" href="/deletepage?id=<?php echo $_GET['id']; ?>">Delete</a>

<br><br><br>

</div>

</div>   
</div>
@endsection