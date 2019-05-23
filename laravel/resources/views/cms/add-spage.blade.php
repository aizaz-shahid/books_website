@extends('/cms/main')
@section('content')
 <h3>Obooko - Single Pages Editor - <b style='text-transform: capitalize;'></b></h3> 
  <hr size=1>


<br><form id="pageform" method=post action='/add_spage'>
<div class='row'><div class=col-sm-4><b>Page Title</b><br><textarea class='form-control' rows=5 name='pgt'>

</textarea></div>

<div class=col-sm-4><b>Meta Description</b><br><textarea class='form-control' rows=5 name='mtdesc'>

</textarea></div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class=col-sm-4><b>Meta Keywords</b><br><textarea class='form-control' rows=5 name='mtkeyw'>

</textarea></div></div><br><br>

<b>Top Header Image</b> - 

<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='images/'></div>
<div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<b>Change The Image</b><br>Find the image that will be used using the dropdown menu below. Remember to first upload it into the 
system using the IMAGE UPLOADER TOOL.<p>Select The Image To Use<br><select class="form-control" name="itm1">

<option selected>

</option>
<?php
foreach($images as $image)
{
    echo '<option>' . basename($image) . '</option>';
}
?>
</select><p></div></div>
<p><b>Top Header Text</b><br><textarea class='form-control' rows=1 name='itm2'>
</textarea><p>

       <p>
             <b>Page Slug</b><br><input type="text" class="form-control" name="slug" />
     </p>
  
<p><b>Top Header Left Subtext</b><br><textarea class='form-control' rows=3 name='itm3'>

</textarea><p>

 </textarea><p>


<p><b>Content Title</b><br><textarea class='form-control' rows=1 name='itm5'>
</textarea><p>

<p><b>The Content</b><br><textarea class='form-control ckeditor' rows=12 name='itm6'>

</textarea>

<hr size=1>

<input type=submit value='Update'>
</form>

<br><br><br>

</div>

</div>   
</div>
@endsection