<!doctype html>
<html>
<head>
    <title>Obooko Development Site</title>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="fonts/obooko-font.css">   
<script type="text/javascript" src="http://www.obooko.com/free-ebooks/js/rating_update.js"></script>	
</head>

<body onload="Already()">
<div class="container">
<header>
	<div class="banner"><img src="images/download-ebook.png" alt="COPYRIGHT-BOOKS"></div>
    <h1 class="header__tag minifont">download and read this free ebook in your choosen format</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>Access to this website and every title in our free ebook categories is gratis. You may Download as many books as you wish 			with the compliments of our wonderful authors.</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!! $advertt->a !!}</div>
    </div>
    
    <section class="mttop17">
      @include('shared.nav')
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
        <div class="col-sm-7 col-md-8 col-lg-8 msg text-justify">
        <h2>Download Your Free E-Book to Your Computer or Mobile Device</h2>
       
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis lobortis dolor, eu posuere velit. Aenean rutrum turpis suscipit, tincidunt enim eget, blandit nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec mauris id odio faucibus luctus. Interdum et malesuada fames ac ante ipsum primis in faucibus. In pellentesque consectetur neque, sed porttitor urna. Integer pharetra orci nibh, nec dapibus erat pharetra et. Donec quis volutpat mi. Pellentesque bibendum consectetur ipsum a vehicula. Cras mattis purus metus.
Sed sollicitudin ornare lectus ac feugiat. Morbi aliquet scelerisque sapien, sed vehicula neque facilisis non. Ut et commodo tortor. Praesent viverra libero metus, dictum consequat orci faucibus et.</p>      <div class="col-md-6" style="margin-bottom:25px";> 
{!! $advertt->b !!}</div>

        
  <div  class="row">
        	<div  class="col-md-6 col-lg-3">
			<div  class="width290"><p>
            Title: <span>{{$result->title}}</span><br>
            Author: <span>{{$result->author_name}}</span> <br>
            File Type: <span>{{$format}}</span> <br>
        </p>
            <div  class="bookheading">DOWNLOAD YOUR FREE EBOOK</div>
            	<div  class="freebook" style="border: 2px solid;border-color: #ff6600">
                    <div  class="row">
                    	 <div  class="col-sm-6 ">

				<form name="download_form" id="download_form" action="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/download-book" method="post">
				<input type="hidden" name="id" value="{{$bookId}}">
				<input type="hidden" name="format" value="{{$format}}">
                        	<div style="margin-bottom: 16px; text-align: center ! important; width: 261px;">Don't Forget to Award a Star Rating       	<input class="mttop32" value="Download Your Free EBook" id="submit" name="submit" style="margin-top: 10px;" type="submit"></div>
				{!! csrf_field() !!}
                        	</form>
                        </div>
                    </div>
                </div>
             </div>   
                
            </div> 
        </div>

        
  
      
      <p><strong>PDF Books</strong><br>Nam vel neque turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque faucibus est sit amet ligula vehicula pellentesque. Aenean aliquam imperdiet enim, sit amet condimentum erat convallis sagittis. Nulla lacus neque, ornare id felis eu, porta pulvinar enim. Sed sed erat at lectus facilisis laoreet. Sed vulputate facilisis dapibus. Proin molestie laoreet felis ut blandit. In turpis ex, convallis ut justo vel, porttitor venenatis felis. Fusce tincidunt felis non enim fringilla consequat. Fusce euismod orci neque, eu viverra justo interdum id. Quisque enim ante, accumsan id elit vel, ornare posuere lectus. Curabitur ac ligula ultrices, venenatis ex vitae, interdum neque. Nunc eget est eget justo fringilla faucibus in eu metus.</p>
      
      <p><strong>E-Pub Books</strong><br>Maecenas mattis vel tortor id pulvinar. Nunc nec turpis tincidunt, imperdiet metus vitae, convallis eros. Vivamus faucibus ac tortor egestas posuere. Mauris eget risus luctus, sollicitudin magna vel, scelerisque neque. Aenean ut nulla libero. Nunc enim tellus, dignissim ac tempus ac, laoreet mattis quam. Aenean mollis felis enim, semper vulputate tellus congue sit amet. Mauris pharetra accumsan neque at vehicula. In aliquam purus scelerisque nisi accumsan, eget tempor tortor interdum. Duis vel imperdiet nunc. Vivamus nec vestibulum erat. Maecenas ornare porttitor tortor, ut venenatis lorem tempus a. Phasellus suscipit sollicitudin molestie. In sollicitudin nunc pellentesque, placerat ipsum nec, tristique leo.</p>
      
      <p><strong>Kindie Books</strong><br>Pellentesque ornare mauris at blandit consectetur. Quisque fermentum nunc turpis, aliquet facilisis justo egestas sed. Sed et mi porttitor, placerat erat quis, tempor felis. Vestibulum odio risus, gravida in elit ac, tristique bibendum dui. Ut id faucibus lectus. Morbi condimentum feugiat tellus, sit amet dignissim magna dapibus et. Nulla eu interdum ligula, ut pharetra sem. Donec posuere massa sed ex lacinia, non laoreet libero euismod. Ut elementum dictum sapien ac tincidunt. Vestibulum ornare accumsan tempus. Maecenas fermentum, urna vitae accumsan tincidunt, eros lacus vulputate nisi, eu blandit justo nisi a nulla. Integer commodo quam ac diam malesuada, non ornare orci ultricies. In sollicitudin diam mauris, a varius augue semper varius. Nunc faucibus nunc ultricies metus vulputate, pretium luctus nunc iaculis. Fusce tellus magna, tempor eu luctus quis, vestibulum et elit.</p>
      
     
        </div>
        
        <div class="col-sm-5 col-md-4 col-lg-3 section3">
            
            <section class="xs-center mttop10">
            
            <div style="height:600px;width:300px">{!! $advertt->b !!}</div>
            </section>
            
            <div class="block mttop33">
       	    	<img src="images/read-rate.jpg" alt="read-rate"> 
            </div>
            
          <div class="block mttop33">
       	  	<img src="images/legal-downloads.jpg" alt="legal-downloads"> 
          </div>
            
            
        </div> 
        
    </div>
</section>

<!--<footer>
<p class="xs-center">obooko is a Registered Trade Mark.&nbsp;&nbsp; &nbsp;  Website Copyright © obooko 2014.  Synopses, descriptions, images and files provided by authors and publishers are protected by individual Copyright.</p>
</footer>-->
<footer>
<p class="xs-center">{{$footer->general_text}}</p>
{!! $footer->analytic_code !!}
{!! $footer->cookie_code !!}
</footer>

</div>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/app.js"></script>
<script>
function Already() {
	var exist= {{ $already or 'undefined' }};

	if(exist == 1){
    		alert("Reminder: You have already downloaded this book");
	}
}
</script>
</body>
</html>
