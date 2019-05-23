@extends('/cms/main')
@section('content')
 
 <h3>Obooko - Essential Tools - <b>Upload Image To General Folder</b></h3> 
  <hr size=1>

<div class="row">

<div class="col-sm-6">
  


<form enctype='multipart/form-data' method='post' action='/covers_upload'>

<h5>This tool will upload images that are already cropped, resized and cleaned.
Images must be less than 2Mb in size. Please follow the steps to ensure everything works out smoothly.</h5>
<p>
<h4>Image will be saved to folder <b>/images/</b></h4>
<p>



<div style='font-family:Oswald;font-size:18px;color:#003FC0;'>Step1: Please select image file</div>
<h6>Choose an image file from your computer.</h6>
<input type='file' name='image' id='file'/>
<input type='hidden' name='upload_type' value="covers" id='file'/>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
<p>

<p>
<div style='font-family:Oswald;font-size:18px;color:#003FC0;'>Step2: Click the UPLOAD button below</div>
<h6>After clicking this button please WAIT..<br> It may take a while for the image to be uploaded to the server. </h6>
<input type='submit' value='Upload' />
<p><br><p>

</form>

</td>
</table>



</div>


<div class="col-sm-6" style="padding:0px 25px; border:0px solid #000000;">
  @if(isset($path))
<font color=#000000><b>Upload Status :</b></font> 
<font color=#c00000><b>OK. Photo Uploaded</b></font>
<p>
    Upload: {{$filename}}<br>"
    Stored in: {{$path}}
</p>
  <p><img src='{{$path}}' class='img-responsive'>"
</p>

@endif
     
 
</div>
</div>
@endsection
 