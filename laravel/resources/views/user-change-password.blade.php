﻿<!doctype html>
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
	<div class="banner"><img src="images/YOUR-ACCOUNT-PAGE.png" alt="YOUR-ACCOUNT-PAGE"></div>
    <h1 class="header__tag minifont">manage your account and pick up the latest news and offers</h1>
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
           <ul class="author list-unstyled">
           		<li><a href="my-account">Account Home</a></li>
                <li class="active"><a href="user-change-password">Change Password</a></li>
                <li><a href="user-change-email">Change Email Address</a></li>
                <li><a href="user-close-account">Close Account</a></li>
                <li><a href="Logout">Log out</a></li>
           </ul> 
           
           <div class="block mttop33">
   	  	  	<img src="images/read-rate.jpg" alt="read-rate">
          </div>
            
      	</div> 
        
        <div class="col-sm-7 col-md-8 col-lg-8">
      
        <h2>Change Your Password</h2>
        
        <p>Use this form to change your password whenever you wish. You will receive a confirmation message via email.
</p>
        
        <form name="form" action="change-password" method="post" class="form mttop32">
	@if(isset($Error))
        <p style="color: red">{{$Error or ''}}</p>
	@endif
           <div class="row">
           		<div class="col-sm-6">
                <label>Enter new password <span class="orenge">*</span></label>
                <input style="margin-top:10px;" type="text" name="n_password" id="n-password" class="width100">
                </div>
                
                <div class="col-sm-6">
                <label>Re-enter new password <span class="orenge">*</span></label>
                <input style="margin-top:10px;" type="text" name="r_password" id="r-password" class="width100">
                </div>
           </div>    
                
                <input type="submit" name="submit" id="submit" value="Save Password" class="mttop32">
                {!! csrf_field() !!}
            </form>
        
        	
        </div>
        
    </div>
</section>
<br>
<br>

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
