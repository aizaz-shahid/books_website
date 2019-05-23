@extends('/cms/main')
@section('content')

<h3>Obooko - Book/Catalogue Editor - <b>
Manage Category Listing</b></h3> 
  <hr size=1>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<br><form method=post action='edit_category_post'>

<p><b>Category Name</b><br><textarea class='form-control' rows=1 name='catname'>{{$cat->name}}</textarea><p>

<p><b>Category Name Slug (SEO Friendly Name)</b><br><input type="text" class='form-control' value="{{$cat->slug}}" name='catslug'>
<p>

<div class='row'><div class=col-sm-4><b>Category Page Title</b><br><textarea class='form-control' rows=5 name='catpgt'>{{$cat->title}}</textarea></div>

<div class=col-sm-4><b>Category Page Meta Description</b><br><textarea class='form-control' rows=5 name='catmtdesc'>{{$cat->m_description}}</textarea></div>

<div class=col-sm-4><b>Category Page Meta Keywords</b><br><textarea class='form-control' rows=5 name='catmtkeyword'>{{$cat->m_keywords}}</textarea></div></div><br><br>


<p><b>Category Type</b><br><select class='form-control' name='cattype'><option selected>
{{$cat->type}}
<option value='F'>Fiction</option><option value='NF'>Non Fiction</option></select><p>
<b>Category Header Image</b> - 
{{$cat->h_image}}
<br><div class='row'><div class='col-sm-4 col-xs-12'><img class='img-responsive' src='images/
{{$cat->h_image}}'></div><div class='col-sm-8 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<b>Change The Image</b><br>Find the image that will be used using the dropdown menu below. Remember to first upload it into the 
system using the IMAGE UPLOADER TOOL.<p>Select The Image To Use<br><select class="form-control" name="itm1">

<option selected>


{{$cat->h_image}}

</option>
<?php
foreach($images as $image)
{
    echo '<option>' . basename($image) . '</option>';
}
?>
</select>

<p><b>Alt image text:</b><br><textarea class='form-control' rows=1 name='itm2'>{{$cat->h_image_alt}}</textarea><p>

<p></div></div><p>



<p><b>Category Header Text</b><br><textarea class='form-control' rows=3 name='itm3'>{{$cat->h_text}}</textarea><p>
<input type='hidden' name='catid' value='{{$cat->id}}'>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<p><b>Social Media Share Text</b><br><textarea class='form-control' rows=1 name='itm4'>{{$cat->s_text}}</textarea><p>
<p><b>Top Left Text</b><br><textarea class='form-control' rows=3 name='itm5'>{{$cat->l_text}}</textarea><p>
<p><b>Bottom Right Custom text</b><br><textarea class='form-control' rows=9 name='itm9'>{{$cat->br_text}}</textarea><p>


<input type=submit value=Update></form>




</div>

</div>   
@endsection