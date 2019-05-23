﻿<!doctype html>
<html>
<head>
    <title>Obooko Development Site</title>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/file-upload.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="fonts/obooko-font.css">
<style>

#progress-div {border:#ff6600 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
#targetLayer{width:100%;text-align:center;}
#progress-bar {background-color: #ff6600;height:20px;color: #FFFFFF;width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;}



.progress {

	width: 400px;
		border: 1px solid #ddd;
	padding: 1px;
	border-radius: 3px;
	 margin:0 auto 20px auto;
    padding:0px;
    position: relative;
    background:#cfcfcf;
    border-width:1px;
    border-style:solid;
    border-color: #aaa #bbb #fff #bbb;    
    box-shadow:inset 0px 2px 3px #bbb;    
	 border-radius:4px;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    -o-border-radius:4px;
}
.bar {
	background-color: orange !important;
	
	width: 0%;
	height: 20px;
	border-radius: 3px;  /*width:77%;  Change to actual percentage */
    height:100%;
    background:#999;
    
    background-size:18px 18px;
    background-color: #ac0;   
    background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%,
                        transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%,
                        transparent 75%, transparent) ;
    background-image: -moz-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%,
                        transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%,
                        transparent 75%, transparent) ;
    background-image: -ms-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%,
                        transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%,
                        transparent 75%, transparent) inherit;
    background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%,
                        transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%,
                        transparent 75%, transparent) ;
    background-image: linear-gradient(45deg, rgba(255, 255, 255, .2) 25%, transparent 25%,
                        transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%,
                        transparent 75%, transparent) !important;
    
    box-shadow:inset 0px 2px 8px rgba(255, 255, 255, .5), inset -1px -1px 0px rgba(0, 0, 0, .2) !important;
	  background-color:#fb5 !important;
}
.percent {
	display:none;
	position: absolute;
	display: inline-block;
	top: 0px;
	left: 48%;
}

.ccc{
	
	font-family: 'droid_sansregular', sans-serif;
	color: #333;
	background: url('http://www.obooko.com/free-ebooks/images/bg-button-light.jpg');

  border-top: 1px solid #c7c0c8;
  border-bottom: 2px solid #c7c0c8;
  border-left: 1px solid #c7c0c8;
  border-right: 1px solid #c7c0c8;
  border-radius: 2px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  clear: both;
  
  font-size: 14px;
  font-weight: bold;
  
  padding: 6px 12px;
  text-decoration: none;
  text-shadow: 1px 1px 0 white;
  letter-spacing: 1.2px;
  cursor: pointer;
}

.input-group label{
	  font-family: 'droid_sansregular', sans-serif;
  color: #333 !important;
  background: url('/images/bg-button-light.jpg') !important;
  border-top: 1px solid #c7c0c8;
  border-bottom: 2px solid #c7c0c8;
  border-left: 1px solid #c7c0c8;
  border-right: 1px solid #c7c0c8;
  border-radius: 2px !important;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1) !important;
  clear: both;
  font-size: 14px !important;
  font-weight: bold !important;
  padding: 8px !important;
  text-decoration: none;
  text-shadow: 1px 1px 0 white !important;
  letter-spacing: 1.2px;
  cursor: pointer !important;
  margin-left: 7% !important;
  background-size: 100% 101% !important;
	
	}	
	.form .input-group input[type="text"]{
height:40px;
font-weight:bold;
color:#666;
font-size:14px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script>
var re=1;
function addCategory()
{

if(re==3){
return false;
}else{

	var html=$('#select').html().replace('<a href="javascript:addCategory()"><i class="fa fa-plus" style="font-size: 20px;margin-left: 5px;"></i></a>','<a href="javascript:;" onclick="removeCategory(this)"><i class="fa fa-close" style="font-size: 20px;margin-left: 16px;"></i></a>');
	$('#select').after('<div><div class="col-sm-2 col-md-3"></div><div class="col-sm-10 col-md-9">'+html+'</div></div>');
re++;
}
}

function removeCategory(obj)
{
	$(obj).parent().parent().remove()
}

</script>  
<link rel='stylesheet' href='http://www.obooko.com/free-ebooks//models/obooko/fonts/obooko-font.css'>   
</head>

<body>
<!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    
      <!-- Modal content-->
      <div class="modal-content" style="padding:0px;width:120%">
        <div class="modal-header" style="border-bottom:0px;padding-bottom:0px">
        <div class="row">
		<div class="col-md-7">
		</div>
		<div class="col-md-5">
	
			<a href="{{url('ebooks-books')}}"><span style="margin-top:10px"><p style="text-align:right"><button type="button" class="close" style="position:relative;right:10px;background-color:darkgrey;border:0px solid;top:0px;padding-top:0px;padding-bottom:0px;padding-right:3px;padding-left:3px"  >&times;</button></p></span></a>
		</div>
	</div>
        
      </div>
        <div class="modal-body" style="padding-top:0px;margin-bottom:30px">
		<h2 id="submission_header" style="color:#ff6600;text-align:center">Submission in Progress</h2>
		<p id="progress_line" style="color:grey;text-align:center;font-size:20px">Please wait - do not close this window</p>
          <div class="progress progress-striped active" id="pgbar" style="display:none">
                                <div id="pbar" class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    <span class="sr-only" style="position:relative">0%</span>
                                </div>
                            </div>
        </div>
        
      </div>
</div>
</div>
<div class="container">
<header>
	<div class="banner"><img src="images/SUBMIT-YOUR-BOOK.png" alt="Banner"></div>
    <h1 class="header__tag">publish your book free of charge to our growing readership</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>Use this form to submit your book for free distribution on obooko. Here, you can also upload the files we need to process your submission.</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!! $advertt->a !!}</div>
    </div>
    
    <section class="mttop17">
@include('shared.nav')     
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
    	<div class="col-sm-12 col-md-4 col-lg-3 section3">

		<h5>Submission notes</h5>
        <p>We are currently accepting English language fiction and non-fiction from published and unpublished writers.</p>
        <p>After submitting this form you will be presented with a page confirming receipt of your details and files. Submissions are processed manually so please allow up to 72 hours, excluding weekends and public holidays, for your ebook to appear in your chosen category. Should you require assistance please do not hesitate to contact us.</p>
        <p>Our service is absolutely free of charge. All we ask is that you adhere to our submission procedure and agree to keep your book available to our members for a minimum of 90 days. Please do not submit your work if you cannot guarantee this minimum term.</p>
        <p>You may submit fiction and non-fiction in all genres and categories listed in our menu. We do not however accept work written in other languages; nor do we accept promotional material or ebooks containing advertising links, articles, part-works, samplers, chapter-limited works or books that do not comply with our terms and conditions. All books for inclusion in our main categories (other than short stories) must contain a minimum of 10,000 words.</p>
        <p>Please read the instructions below carefully to ensure you provide us with the required files and leave the rest to us:</p>
        <p>IMPORTANT: please name all files with the title of your book. We require a minimum of a PDF and an EPUB file, plus a cover image in jpg format to the same size as your page dimensions or to a minimum of 800 x 600 pixels at 96ppi. Also, If you have one, a MOBI or AZW file will be useful for readers with Kindle devices. It's a good idea to also send us your manuscript as a Word (or similar) document in case we have to make any formatting changes.</p>
        <p>If layout is critical, as with poetry for example, you may upload just a PDF and cover image. Short stories may also be submitted as a PDF file only.</p>
        
	
        	      </div> 
        
      <div class="col-sm-12 col-md-8 col-lg-8 msg">
        	<form name="form" id="uploadForm" action="submit-book" method="post" enctype="multipart/form-data" files=true class="form">
                <h2>Submit your ebook for free publication</h2>
@if(isset($Error))              
<p style="color: red">{{$Error}}</p>
@else
<p style="padding-top:0px;font-size:13px">Note: your author name will be listed as the first and last name in your membership account unless your book is written under a pen name, in which case please enter this in the box provided. Leave blank if not required</p>
@endif
                <div class="row">
                
                               
                <div class="col-sm-2 col-md-3"><label>Book Title</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="title" id="Title" class="fiftyper" required></div>
                
                <div class="col-sm-2 col-md-3"><label>Author (if pen name)</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="author" id="Author" class="fiftyper"></div>
                
                <div class="col-sm-2 col-md-3"><label>Genre/Category</label></div>
 <div class="col-sm-10 col-md-9" id="select">
              <select name="cat_sup[]" id="category" class="fiftyper" required="required">
                <option disabled selected value> Select Category</option>
			@foreach($Categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach        
                              </select>
                              
 <a href="javascript:addCategory()"><i class="fa fa-plus" style="font-size: 20px;margin-left: 5px;"></i></a>
                
</div>
                <div class="col-sm-2 col-md-3"><label style="vertical-align: top;">Synopsis</label></div>
                <div class="col-sm-10 col-md-9"><textarea name="synopsis" cols="5" rows="8" required></textarea></div>
                
               <div class="col-sm-2 col-md-3"><label>Website Link</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="web" id="web" class="fiftyper"></div>
<div class="col-sm-2 col-md-3"><label>Facebook Link</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="fb" id="fb" class="fiftyper"></div>
<div class="col-sm-2 col-md-3"><label>Optional Link</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="blog" id="blog" class="fiftyper"></div>
<div class="col-sm-2 col-md-3"><label>Optional Link</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="twitter" id="twitter" class="fiftyper"></div>                 

                <div class="col-sm-2 col-md-3 mttop10">
              <p>Upload Files</p>
            </div>
            <div class="col-sm-10 col-md-9 mttop10"><br><span>Files accepted: pdf, epub, mobi, azw, doc, docx, jpg, jpeg, png</span></div>
            
           <div class="col-sm-10 col-md-5 mttop10">
              <div class="control-group">
                <div class="controls" >                         
                 <input type="file" name="pdf" id="pdfFile" class="filestyle" data-placeholder="PDF" style="margin-top:-10px;">
                </div>
              </div>
		<div class="control-group">
                  <div class="controls">
                    <input type="file" name="epub" id="epubFile" class="filestyle" data-placeholder="EPUB" style="margin-top:-10px;">
                  </div>
                </div>
            <div class="control-group">
                  <div class="controls">
                    <input type="file" name="kindle" id="kindleFile" class="filestyle" data-placeholder="KINDLE" style="margin-top:-10px;">
                  </div>
                </div>     
                <div class="control-group">
                  <div class="controls">
                    <input type="file" name="word" id="wordFile" class="filestyle" data-placeholder="WORD DOC" style="margin-top:-10px;">
                  </div>
                </div>   
		<div class="control-group">
                  <div class="controls">
                    <input type="file" name="cover" id="imgFile" class="filestyle" data-placeholder="Cover Image" style="margin-top:-10px;">
                  </div>
                </div>            
               



                               </div>

                
                
                <div class="clearfix"></div>
             <div class="mttop25">
             <div class="col-sm-2 col-md-3">Adult Content?</div>
             <div class="col-sm-10 col-md-9"><span> <input type="checkbox" name="adult" > My book is strictly for adults only (minimum reader age 17+)</span></div>
                
                <div class="clearfix"></div>
                <div class="col-sm-2 col-md-3">Agreement</div>
                <div class="col-sm-10 col-md-9"><span><input type="checkbox" name="agreement" required> I have read and accept the obooko <a href="#"><u>terms and conditions</u></a> and agree to publish my ebook on obooko.com for a minimum of 90 days. </span></div>
              </div>
                
              <div class="clearfix"></div>
                            {!! csrf_field() !!}
                <div class="col-sm-12"><input type="submit" name="submit" id="submit" value="Submit Form" class="mttop32"></div>
                </div>
            </form>
        </div>
        
    </div>
</section>

<footer>
<p class="xs-center">{{$footer->general_text}}</p>
{!! $footer->analytic_code !!}
{!! $footer->cookie_code !!}
</footer>


</div>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/app.js"></script>
<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>


<script src="http://malsup.github.com/jquery.form.js"></script>

<script type="text/javascript">
$(document).ready(function() { 
	 $('#uploadForm').submit(function(e) {	
		if($('#pdfFile').val() || $('#epubFile').val() || $('#kindleFile').val() || $('#wordFile').val() || $('#imgFile').val() ) {
			e.preventDefault();
			
			$('#myModal').modal('toggle');
			$(this).ajaxSubmit({ 
				beforeSend: function() {

				window.setTimeout(function(){
                 			$('#progress_line').hide();
					$("#pbar").width('0%');
					$('#pgbar').show();
				  	$("#pbar").width('0%');     
                  		}, 4000);
				window.setTimeout(function(){
				  	$("#pbar").width('10%'); 
					$('.sr-only').html(10+'%');    
                  		}, 2000);
				window.setTimeout(function(){
				  	$("#pbar").width('20%'); 
					$('.sr-only').html(20+'%');    
                  		}, 4000);
				window.setTimeout(function(){
				  	     
                  		}, 6000);
					
				},
				uploadProgress: function (event, position, total, percentComplete){	
							var percentVal = percentComplete + '%';		
					$("#pbar").width(percentVal);
					$('.sr-only').html(percentComplete+'%');
					
				},
				success:function (){
					window.setTimeout(function(){
					$("#pbar").width('80%');
					$('.sr-only').html(80+'%');
                 			     
                  		}, 2000);
				window.setTimeout(function(){
					$("#pbar").width('100%');
					$('.sr-only').html(100+'%');
                 			     
                  		}, 2000);
				  window.setTimeout(function(){
					
                 			$('#pgbar').hide();
					$('#submission_header').html("Submission Complete");
					$('#progress_line').html("Thank you!");
					$('#progress_line').show();     
                  		}, 4000);
					
				},
				resetForm: true 
			}); 
			return false; 
		}
	});
}); 

</script>



</body>
</html>