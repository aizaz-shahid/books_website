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
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!! $advertt->a !!}</div>
    </div>
    
    <section class="mttop17">
@include('shared.nav')      
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
    	<div class="col-sm-4 col-lg-3 section3" style="float:right">
        	<div class="block dn">
       	    	<img src="images/read-rate.jpg" alt="read-rate"> 
            </div>
<div class="block mttop33">
{!! $advertt->b !!}       	    	
            </div>
            
      </div> 
        
        <div class="col-sm-12 col-md-8 col-lg-8 msg" style="float:left">
        <h2>Send Feedback direct to the Author </h2>
        <p>You may use this form to send comments related to the author’s book (like how much you enjoyed it!) Please don’t 
discuss website technical issues: contact the obooko team for help. Authors may not always have time to respond, 
so please don't be offended if you do not receive a reply; the author will be delighted to have heard from you. </p>
              <p><font color="#ff6633">  Sending spam, offensive comments, or soliciting information will result in immediate termination of membership.</font></p><br>
        
<!--<a href="#"><img src="images/email.png" alt="email" class="mttop10"></a></p>-->
        
        
        
        	<form name="form" action="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/send-feedback-form" method="post" class="form mttop32">
@if(isset($Error))          
<p>{{$Error}}</p>
@endif
                <div class="row">
                
                <input type="hidden" name="author" value="{{$result}}">
              	<input type="hidden" name="title" value="{{$result2}}">
                <div class="col-sm-2 col-md-3"><label>First Name:</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="name" id="Name" class="fiftyper" required></div>
                
                <div class="col-sm-2 col-md-3"><label>Email Address:</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="email" id="email" class="fiftyper" required></div>
                
                <div class="col-sm-2 col-md-3"><label>Confirm Email</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="c_email" id="c_email" class="fiftyper" required></div>
                
       		  <div class="col-sm-2 col-md-3"><label>Message:</label></div>
              <div class="col-sm-10 col-md-9"><textarea name="message" cols="5" rows="8" required></textarea></div>
                
                <div class="clearfix"></div>
               <p class="m-left"><span class="orenge">Have you checked the</span> <a href="#"><u>FAQ</u></a> <span class="orenge">section?</span> You may find your answer there.</p>
                
              
              <div class="mttop25">
              <span>&nbsp;&nbsp;&nbsp;&nbsp;Please enter the code below:</span>
              <div class="clearfix"></div>
                  <div class="col-sm-2 col-md-3"><label>{!!captcha_img()!!}</label></div>
                  <div class="col-sm-10 col-md-9 mttop10"><input type="text" name="captcha" id="captcha" required></div>
              </div> 
              {!! csrf_field() !!}
                <input type="submit" name="submit" id="submit" value="Submit Form" class="m-left mttop32">
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
