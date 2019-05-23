<!doctype html>
<html lang="en">
<head>
    <title>Change Email</title>
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
	<div class="banner"><img src="{{ asset('/public') }}/images/AUTHOR-ACCOUNT.png" alt="AUTHOR-ACCOUNT"></div>
    <h1 class="header__tag minifont">manage your free publishing account and view download figures</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>Access to this website and every title in our free ebook categories is gratis. You may Download as many books as you wish 			with the compliments of our wonderful authors.</p></div>
        <div class="col-sm-12 col-md-8" style="padding-left:0px;">{!! $advertt->a !!}</div>
    </div>
    
    <section class="mttop17">
@include('shared.nav')      
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
    	<div class="col-sm-5 col-md-4 col-lg-3 section3">
           <ul class="author list-unstyled">
           		<li><a href="my-account">Author Account Home</a></li>
                <li><a href="author-download-figures">View Download Figures</a></li>
                <li><a href="author-submit-submission">Submit Another Book</a></li>
                <li><a href="author-updates">Revisions and Updates</a></li>
                <li><a href="author-change-password">Change Password</a></li>
                <li class="active"><a href="author-change-email">Change Email Address</a></li>
                <li><a href="Logout">Log out</a></li>
           </ul> 
           <br>
           <div class="block">
       	    	<img src="public/images/read-rate.jpg" alt="Read and Rate it"> 
           </div>
            
            
      	</div> 
        
        <div class="col-sm-7 col-md-8 col-lg-8 msg">
      
        <h2>Change Your Email Address</h2>
        
        <p>Should you have a new email address or wish to use a different one, please enter it here so that we can keep in touch. Once saved, we will confirm via email. If you do not receive confirmation, please let us know.</p>
        
        <form name="form" action="change-email" method="post" class="form mttop32">
@if(isset($Error))        
<p style="color: red">{{$Error}}</p>
@endif
           <div class="row">
           		<div class="col-sm-10">
                <label>Enter new email address <span class="orenge">*</span></label>
                <input type="text" name="n_email" id="n_email" class="width100" style="padding: 7px 8px;margin-top:10px;">
                </div>
                
                <div class="col-sm-10">
                <label>Re-enter new email address <span class="orenge">*</span></label>
                <input type="text" name="r_email" id="r_email" class="width100" style="padding: 7px 8px;margin-top:10px;">
                </div>
           </div>    
                
                <input type="submit" name="submit" id="Submit" value="Save Email Address" class="mttop32">
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


<script src="{{ asset('/public') }}/js/jquery.min.js"></script>
<script src="{{ asset('/public') }}/js/bootstrap.js"></script>
<script src="{{ asset('/public') }}/js/app.js"></script>
<script>
$(document).ready(function(){
@if(isset($success))
    alert("Email has been updated");
@endif
});
</script>
</body>
</html>
