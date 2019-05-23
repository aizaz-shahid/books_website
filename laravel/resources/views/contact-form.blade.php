<!doctype html>
<html>
<head>
    <title>Obooko Development Site</title>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="fonts/obooko-font.css">   
</head>

<body>
<div class="container">
<header>
	<div class="banner"><img src="images/SEND-US-A-MESSAGE.png" alt="Banner"></div>
    <h1 class="header__tag">contact obooko and we’ll get back to you as soon as we can</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>Access to this website and every title in our free ebook categories is gratis. You may Download as many books as you wish 			with the compliments of our wonderful authors.</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;"> {!! $advertt->a !!}</div>
    </div>
    
    <section class="mttop17">
@include('shared.nav')      
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
    	<div class="col-sm-4 col-lg-3 section3">
        	<div class="block dn">
       	    	<img src="images/read-rate.jpg" alt="read-rate"> 
            </div>
	<div class="block dn" style="margin-top:5px;">
       	    	<div>{!! $Advert->b !!}</div> 
            </div>
            <div class="block dn" style="margin-top:5px;">
       	    	<img src="images/legal-downloads.jpg" alt="legal-download"> 
            </div>
		<div class="block dn" style="margin-top:5px;">
       	    	<div>{!! $Advert->b !!}</div> 
            </div>
      </div> 
        
        <div class="col-sm-12 col-md-8 col-lg-8 msg">
        <h2>Get in touch with obooko</h2>
        <p>If you have a technical problem and need an answer fast, try the <a href="#">FAQ</a> section first to see if a solution is listed. We will respond to your message as quickly as we can but, because of time-zone differences, please allow up to 12 hours (sometimes longer at weekends) for us to get back to you.  Alternatively, send an email message to: <br>
        
<a href="#"><img src="images/email.png" alt="email" class="mttop10"></a></p>
        
        
        
        	<form name="form" action="contact-us" method="post" class="form mttop32">
	@if(isset($Error))
          <p style="color:red">{{$Error or ''}}</p>
	@endif
                <div class="row">
                <div class="col-sm-2 col-md-3"><label>Subject:</label></div>
                <div class="col-sm-10 col-md-9">
                    <select name="subject" class="fourty">
                          <option value="General enquiry">General enquiry</option>
                          <option value="Technical problem">Technical issue</option>
                          <option value="Author enquiry">Author enquiry</option>
                          <option value="Suggestions and Feedback">Suggestions and Feedback</option>
                    </select>
                </div>
              	
                <div class="col-sm-2 col-md-3"><label>First Name:</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="name" id="Name" class="fourty" required></div>
                
                <div class="col-sm-2 col-md-3"><label>Email Address:</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="email" id="email" class="fiftyper" required></div>
                
                <div class="col-sm-2 col-md-3"><label>Confirm Email</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="c_email" id="c_email" class="fiftyper" required></div>
                
       		  <div class="col-sm-2 col-md-3"><label>Message:</label></div>
              <div class="col-sm-10 col-md-9"><textarea name="message" cols="5" rows="8" required></textarea></div>
                
                <div class="clearfix"></div>
               <p class="m-left"><span class="orenge">Have you checked the</span> <a href="#"><u>FAQ</u></a> <span class="orenge">section?</span> You may find your answer there.</p>
                
              <span>&nbsp;&nbsp;&nbsp;&nbsp;Please enter the code below:</span>
              <div class="mttop25">
              
              <div class="clearfix"></div>
                  <div class="col-sm-2 col-md-3"><label>{!!captcha_img()!!}</label></div>
                  <div class="col-sm-5 col-md-4"><input type="text" name="captcha" id="captcha" required></div>
              </div> 
              {!! csrf_field() !!}
		<div class="col-sm-12">
                <input type="submit" name="submit" id="submit" value="Submit Form" class="mttop32">
		</div>

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

</body>
</html>
