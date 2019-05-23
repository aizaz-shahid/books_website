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
	<div class="banner"><img src="images/RECOVER-PASSWORD.png" alt="Banner"></div>
    <h1 class="header__tag">life is hard enough without having to remember passwords!</h1>
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
    	<div class="col-sm-5 col-md-4 col-lg-3 section3">
        	<div>
       	    	<img src="images/read-rate.jpg" alt="Read and Rate">
                <br>
<br>
 
            </div>
            
      </div> 
        
        <div class="col-sm-7 col-md-8 col-lg-8 msg">
        <h2>Recover your password here</h2>
        <p>If you have lost or cannot remember your password,  please enter your username or email address in the box below.You will receive a link to create a new password via email.</p>
       
        
        	<form name="form" action="send-password" method="post" class="form mttop32">
		@if(isset($Error))
                <p style="color: red">{{$Error or ''}}</p>
		@endif
                <span>Enter your username or email address:</span>
                <input type="text" name="recover_p" id="recover_p" class="mttop10">
                
                <div class="clearfix"></div>
                <input type="submit" name="submit" id="submit" value="Send Password" class="mttop32">
                {!! csrf_field() !!}
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
