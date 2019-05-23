<!doctype html>
<html lang="en">
<head>
    <title>Obooko Account</title>
    <meta charset="utf-8" />
    <meta name="robots" content="noindex, follow"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('/public/css/mcss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/fonts/obooko-font.css') }}">   
</head>

<body>
<div class="container">
<header>
	<div class="banner"><img src="{{ asset('/public') }}/images/YOUR-ACCOUNT-PAGE.png" alt="YOUR-ACCOUNT-PAGE"></div>
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
                <li><a href="user-change-password">Change Password</a></li>
                <li><a href="user-change-email">Change Email Address</a></li>
                <li class="active"><a href="user-close-account">Close Account</a></li>
                <li><a href="Logout">Log out</a></li>
           </ul> 
            
      	</div> 
        
        <div class="col-sm-7 col-md-8 col-lg-8">
      
        <h2>You are going to break our hearts ... but if you must</h2>
        
        <p>Closing your account will result in all of your details being removed permanently from our system.</p>
        
        <p>To help us improve our site, please tell us your reason for leaving:</p>
        
        <form name="form" action="delete-user" method="post" style="margin-top:15px;">
           <div class="row">
           		<div class="col-sm-6 mttop13">
                 <textarea name="close_account" cols="5" rows="8" class="width100"></textarea>
                 <input style="margin-top:10px;" type="submit" name="submit" id="submit" value="Close Account" class="mttop32">
                </div>
                
                <div class="col-sm-6 xs-center">
           	    	<img src="public/images/heart-woman.jpg" alt="Heart Woman" style="margin-bottom: -21px;"> 
                </div>
           </div>    
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


<script src="{{ asset('/public') }}/js/jquery.min.js"></script>
<script src="{{ asset('/public') }}/js/bootstrap.js"></script>
<script src="{{ asset('/public') }}/js/app.js"></script>

</body>
</html>
