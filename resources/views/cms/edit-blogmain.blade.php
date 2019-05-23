 @extends('/cms/main')
@section('content')
  <h3>Obooko - Blog Editor - <b>General Content</b></h3> 
  <hr size=1>
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<br><form method=post action='/blogmain_post'>

<div class='row'><div class=col-sm-4><b>Page Title</b><br><textarea class='form-control' rows=5 name='pgt'>{{$mainpage->title}}</textarea></div>

<div class=col-sm-4><b>Meta Description</b><br><textarea class='form-control' rows=5 name='mtdesc'>{{$mainpage->m_description}}</textarea></div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class=col-sm-4><b>Meta Keywords</b><br><textarea class='form-control' rows=5 name='mtkeyw'>{{$mainpage->m_keywords}}</textarea></div></div><br><br>

<b>Top Header Image</b> - 
{{$mainpage->h_image}}
<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/{{$mainpage->h_image}}'></div>
<div class='col-sm-6 col-xs-12'

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<b>Change The Image</b><br>Find the image that will be used using the dropdown menu below. Remember to first upload it into the 
system using the IMAGE UPLOADER TOOL.<p>Select The Image To Use<br><select class="form-control" name="itm1">

<option selected>
{{$mainpage->h_image}}
</option>
<?php
foreach($images as $image)
{
     echo '<option>' . basename($image) . '</option>';
}
?>
</select><p></div></div>


<p><b>Top Header Text</b><br><textarea class='form-control' rows=1 name='itm2'>
{{$mainpage->h_text}}
</textarea><p>

<p><b>Top Header Left Subtext</b><br><textarea class='form-control' rows=3 name='itm3'>
{{$mainpage->h_subtext}}
</textarea><p>

<br>

<b>Right Middle Image 2</b> - 
{{$mainpage->img1}}
<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/{{$mainpage->img1}}'>
</div><div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<b>Change The Image</b><br>Find the image that will be used using the dropdown menu below. Remember to first upload it into the 
system using the IMAGE UPLOADER TOOL.<p>Select The Image To Use<br><select class="form-control" name="itm4">

<option selected>
{{$mainpage->img1}}
</option>
<?php
foreach($images as $image)
{
     echo '<option>' . basename($image) . '</option>';
}
?>
</select><p></div></div><br><br>

 <b>Right Middle Image 2</b> - 
{{$mainpage->img2}}
<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/{{$mainpage->img2}}'></div>
<div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<b>Change The Image</b><br>Find the image that will be used using the dropdown menu below. Remember to first upload it into the 
system using the IMAGE UPLOADER TOOL.<p>Select The Image To Use<br><select class="form-control" name="itm5">

<option selected>
{{$mainpage->img2}}
</option>
<?php 
foreach($images as $image)
{
   echo '<option>' . basename($image) . '</option>';
}
?>
</select><p></div></div>

<input type=submit value=Update></form>


</div>

</div>   
</div>
@endsection