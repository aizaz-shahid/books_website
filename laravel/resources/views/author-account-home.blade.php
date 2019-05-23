<!doctype html>
<html>
<head>
    <title>Account Home </title>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="fonts/obooko-font.css">   
</head>

<body>
<div class="container">
<header>
	<div class="banner"><img src="images/AUTHOR-ACCOUNT.png" alt="AUTHOR-ACCOUNT"></div>
    <h1 class="header__tag minifont">manage your free publishing account and view download figures</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>Access to this website and every title in our free ebook categories is gratis. You may Download as many books as you wish 			with the compliments of our wonderful authors.</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!! $advert->a !!}</div>
    </div>
    
    <section class="mttop17">
@include('shared.nav')     
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
    	<div class="col-sm-5 col-md-4 col-lg-3 section3">
           <ul class="author list-unstyled">
           		<li class="active"><a href="my-account">Author Account Home</a></li>
                <li><a href="author-download-figures">View Download Figures</a></li>
                <li><a href="author-submit-submission">Submit Another Book</a></li>
                <li><a href="author-updates">Revisions and Updates</a></li>
                <li><a href="author-change-password">Change Password</a></li>
                <li><a href="author-change-email">Change Email Address</a></li>
                <li><a href="Logout">Log out</a></li>
           </ul> 
      	</div> 
        
        <div class="col-sm-7 col-md-8 col-lg-8 msg">
        
        <h2 style="margin-bottom:20px;color:#666666">Hello <strong>{{$Name->first_name}}!</strong></h2>
        
        <!--<h2>Messages</h2>-->
        <p>{!!$message!!}</p>
        
        
        
        	
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
