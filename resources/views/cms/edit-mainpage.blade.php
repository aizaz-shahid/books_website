
@extends('/cms/main')
@section('content')
  <h3>Obooko - Main Page Editor</h3> 
  <hr size=1>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<br><form method=post action='/edited_mainpage'>


<div class='row'><div class=col-sm-4><b>Page Title</b><br><textarea class='form-control' rows=3 name='pgt'>{{$mainpage->title}}</textarea></div>

<div class=col-sm-4><b>Meta Description</b><br><textarea class='form-control' rows=3 name='mtdesc'>{{$mainpage->m_description}}</textarea></div>

<div class=col-sm-4><b>Meta Keywords</b><br><textarea class='form-control' rows=3 name='mtkeyw'>{{$mainpage->m_keywords}}</textarea></div></div><br><br>



<b>Top Header Image</b> - 
<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/{{$mainpage->h_image}}'>
</div><div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<h5><b>Change The Image</b>
<br>Find the image that will be used using the dropdown menu below.
<br>Remember to first upload it into the system using the IMAGE UPLOADER tool.</h5>
<h4>Select The Image To Use</h4><select class="form-control" name="itm1">

<option selected>
{{$mainpage->h_image}}


</option>
<?php
foreach($images as $image)
{
   echo '<option>' . basename($image) . '</option>';
}
?>
</select><p><br>
<b>Image Alt</b>
<input type="text" class="form-control" name="h_alt" value="{{ $mainpage->h_alt}}" />

</div></div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<p><b>Top Header Text</b><br><textarea class='form-control' rows=1 name='itm2'>{{$mainpage->h_text}}</textarea><p>

<p><b>Top Header Left Subtext</b><br><textarea class='form-control' rows=2 name='itm3'>{{$mainpage->h_subtext}}</textarea><p>


<p><b>Top Header Right Adsense Code</b><br><textarea class='form-control' rows=9 name='itm4'>{{$mainpage->h_advert}}</textarea><p>


<b>Middle Writeup 1 Image</b> - 
{{$mainpage->m1_image}}
<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/{{$mainpage->m1_image}}'>
</div><div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<h5><b>Change The Image</b>
<br>Find the image that will be used using the dropdown menu below.
<br>Remember to first upload it into the system using the IMAGE UPLOADER tool.</h5>
<h4>Select The Image To Use</h4><select class="form-control" name="itm5">

<option selected>
{{$mainpage->m1_image}}

</option>
<?php
foreach($images as $image)
{
     echo '<option>' . basename($image) . '</option>';
}
?>
</select><p><br>
<b>Image Alt</b>
<input type="text" class="form-control" name="m1_alt" value="{{ $mainpage->m1_alt}}" />
</div></div>

<p><b>Middle Writeup 1 Title</b><br><textarea class='form-control' rows=1 name='itm6'>{{$mainpage->m1_title}}</textarea><p>

<p><b>Middle Writeup 1 Text</b><br><textarea class='ckeditor form-control' rows=3 name='itm7'>{{$mainpage->m1_text}}</textarea><p><hr size=1>

<b>Middle Writeup 2 Image</b> - 

{{$mainpage->m2_image}}

<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/{{$mainpage->m2_image}}'></div>
<div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<h5><b>Change The Image</b>
<br>Find the image that will be used using the dropdown menu below.
<br>Remember to first upload it into the system using the IMAGE UPLOADER tool.</h5>
<h4>Select The Image To Use</h4><select class="form-control" name="itm8">

<option selected>
{{$mainpage->m2_image}}

</option>
<?php
foreach($images as $image)
{
     echo '<option>' . basename($image) . '</option>';
}
?>
</select><p><br>
<b>Image Alt</b>
<input type="text" class="form-control" name="m2_alt" value="{{ $mainpage->m2_alt}}" />
</div></div>

<b>Middle Writeup 2 Title</b><br><textarea class='form-control' rows=1 name='itm9'>
{{$mainpage->m2_title}}
</textarea><p>

<p><b>Middle Writeup 2 Text</b><br><textarea class='ckeditor form-control' rows=3 name='itm10'>
{{$mainpage->m2_text}}
</textarea><p>

<p><b>Bottom Right Adsense Code</b><br><textarea class='form-control' rows=9 name='itm12'>
{!! $mainpage->b_advert !!}
</textarea><p><br><br>

<input class='btn btn-danger' type=submit value=Update></form>

</div>

@endsection