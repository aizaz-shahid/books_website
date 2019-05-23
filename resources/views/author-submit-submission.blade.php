<!doctype html>
<html lang="en">
<head>
    <title>Author Book Submission</title>
    <meta charset="utf-8" />
    <meta name="robots" content="noindex, follow"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
<link rel="stylesheet" href="{{ asset('/public/css/mcss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/fonts/obooko-font.css') }}">
 <link rel="stylesheet" href="{{ asset('/public/css/file-upload.css') }}">
 
 <script src="{{ asset('/public') }}/js/jquery.min.js"></script>
<script src="{{ asset('/public') }}/js/bootstrap.js"></script>
<script src="{{ asset('/public') }}/js/app.js"></script>
<script type="text/javascript" src="{{ asset('public/js/bootstrap-filestyle.min.js') }}"> </script>
<script src="{{ asset('public/js/jquery.inputfile.js') }}"></script>
<script src="{{ asset('public/js/bootstrap-fileupload-.js') }}"></script>
     
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

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
	background: url('public/images/bg-button-light.jpg');

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
  background: url('public/images/bg-button-light.jpg') !important;
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
<script>
var re=1;
function addCategory()
{

if(re==3){
return false;
}else{

	var html=$('#select').html().replace('<a href="javascript:addCategory()"><i class="fa fa-plus" style="font-size: 20px;margin-left: 16px;"></i></a>','<a href="javascript:;" onclick="removeCategory(this)"><i class="fa fa-close" style="font-size: 20px;margin-left: 16px;"></i></a>');
	$('#select').after('<div><div class="col-sm-2 col-md-3"></div><div class="col-sm-10 col-md-9">'+html+'</div></div>');
re++;
}
}

function removeCategory(obj)
{
	$(obj).parent().parent().remove();
re--;
}

</script>  

</head>

<body>
<!--<style>
	.close{position:relative;right:10px;background-color:darkgrey;border:0px solid;top:0px;padding:0}
	.modal-content{padding:0px;width:120%}
	</style>-->
 <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    
      <!-- Modal content-->
      <div class="modal-content" style="padding:0px;width:100%">
        <div class="modal-header" style="border-bottom:0px;padding-bottom:0px">
        <div class="row">
		<div class="col-md-7">
		</div>
		<div class="col-md-5">
	
			<a href="{{url('ebooks-books')}}"><p style="margin-top:10px;text-align:right"><button type="button" class="close" style="position:relative;right:10px;background-color:darkgrey;border:0px solid;top:0px;padding-top:0px;padding-bottom:0px;padding-right:3px;padding-left:3px"  >&times;</button></p></a>
		</div>
	</div>
        
      </div>
        <div class="modal-body" style="padding-top:0px;margin-bottom:30px">
		<h2 id="submission_header" style="color:#ff6600;text-align:center">Submission in Progress</h2>
		<p id="progress_line" style="color:grey;text-align:center;font-size:20px">Please wait - do not close this window</p>
          <div class="progress progress-striped active" id="pgbar" style="width:100%;display:none">
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
	<div class="banner"><img src="{{ asset('/public') }}/images/AUTHOR-ACCOUNT.png" alt="AUTHOR-ACCOUNT"></div>
    <h1 class="header__tag minifont">manage your free publishing account and view download figures</h1>
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
        <ul class="author list-unstyled">
           		<li><a href="my-account">Author Account Home</a></li>
                <li><a href="author-download-figures">View Download Figures</a></li>
                <li class="active"><a href="author-submit-submission">Submit Another Book</a></li>
                <li><a href="author-updates">Revisions and Updates</a></li>
                <li><a href="author-change-password">Change Password</a></li>
                <li><a href="author-change-email">Change Email Address</a></li>
                <li><a href="Logout">Log out</a></li>
           </ul> 
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
 <span class="label label-danger">{{$Error}}</span>
@else
<p style="padding-top:0px;font-size:13px">Note: your author name will be listed as the first and last name in your membership account unless your book is written under a pen name, in which case please enter this in the box provided. Leave blank if not required</p>
@endif
             
                <div class="row">
                
                               
                <div class="col-sm-2 col-md-3"><label>Book Title</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="title" id="Title" class="fiftyper" required="required"></div>
                
                <div class="col-sm-2 col-md-3"><label>Author (if pen name)</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="author" id="Author" class="fiftyper"></div>
                
                <div class="col-sm-2 col-md-3"><label>Genre/Category</label></div>
 <div class="col-sm-10 col-md-9" id="select">
                <select name="cat_sup[]" id="category" class="fiftyper" required="required">
                <option disabled selected value> Select Category</option>
			@foreach($Categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach        
                              </select><a href="javascript:addCategory()"><i class="fa fa-plus" style="font-size: 20px;margin-left: 16px;"></i></a>
                              </div>
 
                
                <div class="col-sm-2 col-md-3"><label>Synopsis</label></div>
                <div class="col-sm-10 col-md-9"><textarea name="synopsis" cols="5" rows="8"></textarea></div>
                
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
            
           <div class="col-sm-10 col-md-8 mttop10">
              <div class="control-group">
                <div class="controls" >                         
                 <input type="file" name="pdf" id="pdfFile" class="filestyle font" data-placeholder="PDF" style="margin-top:-10px;">
                </div>
              </div>
            <div class="control-group">
                  <div class="controls">
                    <input type="file" name="epub" id="epubFile" class="filestyle font" data-placeholder="EPUB" style="margin-top:-10px;">
                  </div>
                </div>
            <div class="control-group">
                  <div class="controls">
                    <input type="file" name="kindle" id="kindleFile" class="filestyle font" data-placeholder="KINDLE" style="margin-top:-10px;">
                  </div>
                </div>     
                <div class="control-group">
                  <div class="controls">
                    <input type="file" name="word" id="wordFile" class="filestyle font" data-placeholder="WORD DOC" style="margin-top:-10px;">
                  </div>
                </div>
		<div class="control-group">
                  <div class="controls">
                    <input type="file" name="cover" id="imgFile" class="filestyle font" data-placeholder="Cover Image" style="margin-top:-10px;">
                  </div>
                </div>            
               
		

              

                 </div>

                
                
                <div class="clearfix"></div>
             <div class="mttop25">
             <div class="col-sm-2 col-md-3">Adult Content?</div>
             <div class="col-sm-10 col-md-9"><span> <input type="checkbox" name="adult" > My book is strictly for adults only (minimum reader age 17+)</span></div>
                
                <div class="clearfix"></div>
                <div class="col-sm-2 col-md-3">Agreement</div>
                <div class="col-sm-10 col-md-9"><span><input type="checkbox" name="agreement" required> I have read and accept the obooko <a href="#"><u>terms and conditions</u></a> and agree to publish my ebook on obooko.com for a minimum of 90 days. </span></div>                <div class="col-sm-12"><input type="submit" name="submit" id="submitForm" value="Submit Form" class="mttop32"></div>

              </div>
                
              <div class="clearfix"></div>
              
              {!! csrf_field() !!}
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




<!--<script>
@if(isset($success))
$(documents).ready(function() {
$('#myModal').modal('show');
});
@endif
</script>-->

<script src="http://malsup.github.com/jquery.form.js"></script>

<!--<script type="text/javascript">
$('#uploadForm').submit(function(e) {	
		e.preventDefault();
		if($('#pdfFile').val() || $('#epubFile').val() || $('#kindleFile').val() || $('#wordFile').val() || $('#imgFile').val() ) {
			e.preventDefault();
			
			
        	$('#myModal').modal('toggle');
        	 $('#pgbar').show();
			$(this).ajaxSubmit({ 
				xhr: function(){
       var xhr = new window.XMLHttpRequest();
         // Handle progress
         //Upload progress
       xhr.upload.addEventListener("progress", function(evt){
           if (evt.lengthComputable) {
              var percentComplete = evt.loaded / evt.total;
              //Do something with upload progress
              var percentVal = percentComplete + '%';
              percentComplete=percentComplete*100;
              $("#pbar").width(percentVal);
					$('.sr-only').html(percentComplete+'%');
              console.log(percentComplete);
              
           }
       }, false);
       //Download progress
       xhr.addEventListener("progress", function(evt){
            if (evt.lengthComputable) {
              var percentComplete = evt.loaded / evt.total;
              //Do something with download progress
              console.log(percentComplete);
            }
       }, false);

       return xhr;
    },
    success:function (){
					
				  
					
                 			$('#pgbar').hide();
					$('#submission_header').html("Submission Complete");
					$('#progress_line').html("Thank you!");
					$('#progress_line').show();     
                  		
					
				},
    complete:function(){
        console.log("Request finished.");
    }	
		});
		
		}			
	}); 

</script>-->

<script type="text/javascript">
  $(document).ready(function(){
   //button click function
    $('#uploadForm').submit(function(e) {
        e.preventDefault();
         
  
    var form = $("#uploadForm");
    var params = form.serializeArray();
    var formData = new FormData();
    $(params).each(function (index, element) {
                formData.append(element.name, element.value);
            });
            
            var pdf=$("#pdfFile")[0].files;
            var epub=$("#epubFile")[0].files;
            var kindle=$("#kindleFile")[0].files;
            var word=$("#wordFile")[0].files;
            var img=$("#imgFile")[0].files;
            if(pdf){
                formData.append("pdf", pdf[0]);
            }
            if(epub){
                formData.append("epub", epub[0]);
            }
            if(kindle){
                formData.append("kindle", kindle[0]);
            }
            if(word){
                formData.append("word", word[0]);
            }
            if(img){
                formData.append("cover", img[0]);
            }
            var token = "{{ csrf_token() }}";
            formData.append("_token", token);
  
	$('#myModal').modal('toggle');
	setTimeout(function(){
	$('#progress_line').hide();
        	 $('#pgbar').show();
	

  $.ajax({
         
         xhr: function(){
       var xhr = new window.XMLHttpRequest();
         // Handle progress
         //Upload progress
       xhr.upload.addEventListener("progress", function(evt){
           console.log("progress shown");
           console.log(evt);
           if (evt.lengthComputable) {
              var percentComplete = evt.loaded / evt.total;
              //Do something with upload progress
              
              percentComplete=percentComplete*100;
              percentComplete=Math.floor(percentComplete);
              var percentVal = percentComplete + '%';
              $("#pbar").width(percentVal);
					$('.sr-only').html(percentComplete+'%');
              console.log(percentComplete);
           }
       }, false);
       //Download progress
       xhr.addEventListener("progress", function(evt){
            if (evt.lengthComputable) {
              var percentComplete = evt.loaded / evt.total;
              //Do something with download progress
              percentComplete=percentComplete*100;
              console.log(percentComplete);
            }
       }, false);

       return xhr;
    },
    complete:function(){
        console.log("Request finished.");
    },

        
            type:'POST',
            url: 'submit-book',
            data: formData,
            enctype: 'multipart/form-data',
            cache: false,
            async:true,
            contentType: false,
            processData: false,
            /*beforeSend: function() {
                    
			
				    $('#myModal').modal('toggle');
					
					$("#pbar").width('0%');
					$('.sr-only').html(0+'%');
					$('#progress_line').hide();
					$('#pgbar').show();
				// 	windows.setTimeout(function(){
				// 	}, 3000);
				  	
					
                  
                 			   
				
                  		
				console.log("rola pe gya");
				  	
					
				},
				progress: function(progress)
                {
                    console.log("raste lag gae beta");
                    var percentage = Math.floor((progress.total / progress.totalSize) * 100);
                    console.log('progress', percentage);
                    if (percentage === 100)
                    {
                        console.log('DONE!');
                    }
                },
				uploadProgress: function (event, position, total, percentComplete){	
				    
							var percentVal = percentComplete + '%';	
						console.log(event);
						console.log(total);
						console.log(percentComplete);
					$("#pbar").width(percentVal);
					$('.sr-only').html(percentComplete+'%');
					
					
				},*/
				success:function (){
					
				  
					
                 			$('#pgbar').hide();
					$('#submission_header').html("Submission Complete");
					$('#progress_line').html("Thank you!");
					$('#progress_line').show();     
                  		
					
				},
				error: function(data) {
				    console.log(data);
                }
            
        });
 
	},3000);
    });
  

     
});
</script>

</body>
</html>
