
@extends('/cms/main')
@section('content')
  <h3>Obooko - Essential Tools - <b>Image Viewer/Deleter General Folder</b></h3> 
  <hr size=1>

<div class="row">
<div class="col-sm-12">
<h4>Folder location <b>/images/</b></h4>  
<h5>Here are the listing of all the images already uploaded and ready for use throughout the site.
<br>
You can delete the unwanted ones by clicking the DELETE button. This action is irreversible.
<p>
IMAGES ARE ALPHABETICALLY LISTED (20 images per tab)<br>
Use the Numbered Tabs To Navigate                         </h5>
<p>
<div id='paging_container1'><div class='page_navigation'></div>
<p>
	<ul class="content" style="margin-left:-40px;">
<?php
$dirFiles = array();
// opens images folder
if ($handle = opendir(public_path().'/images/')) {
    while (false !== ($file = readdir($handle))) {

    	// strips files extensions      
    	$crap   = array(".jpg", ".jpeg", ".JPG", ".JPEG", ".png", ".PNG", ".gif", ".GIF", ".bmp", ".BMP", "_", "-");    

    	$newstring = str_replace($crap, " ", $file );   

    	//asort($file, SORT_NUMERIC); - doesnt work :(

    	// hides folders, writes out ul of images and thumbnails from two folders

        if ($file != "." && $file != ".." && $file != "index.php" && $file != "Thumbnails") {
        	$dirFiles[] = $file;
        }
    }
    closedir($handle);
}

usort($dirFiles,'strnatcasecmp');
foreach($dirFiles as $file)
{


      echo "<table border=1 cellpadding=2 cellspacing=2>";
			echo "<td width=50%><img src=\"public/images/".$file."\"  height=\"50\"></td>";
			echo "<td width=45%><h6>Filename : ".$file."</h6></td>";
			
			echo "<td width=5%><form method=\"post\" name=\"deleteSomething\" action=\"view_general_images?delete=true\" >
			<input type=\"hidden\" name=\"fileToDelete\" value=".$file." >
             <input type=\"hidden\" name=\"type\" value=\"general\" >
             <input type=\"hidden\" name=\"_token\" value=".csrf_token().">
			<input type=\"submit\" value=\"Delete\"></form></td>";
            echo "<table>";


}



?>
</ul>


</div>



<div class="col-sm-0" style="padding:0px 25px; border:0px solid #000000;">
  

 
</div>
</div>

@endsection
@section('custom_javascript')
 <script type='text/javascript'>
      $(document).ready(function(){
        $('#paging_container1').pajinate({
          items_per_page : 39

          
        });
      });
        </script>
@endsection