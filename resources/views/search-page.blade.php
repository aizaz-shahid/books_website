<!doctype html>
<html lang="en">
<head>
    <title>Obooko Development Site</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../public/css/mcss/style.css">
    <link rel="stylesheet" href="../public/css/custom.css">
    <link rel="stylesheet" href="../public/fonts/obooko-font.css"> 
    <style>
.close{position:relative;right:10px;background-color:#cf5300;border:0px solid;top:0px}
.modal-content{padding:0px;width:70%;margin-left:15%;}
.modal-header{padding-left:30px;padding-right:30px}
.modal-body{padding:0px;padding-top:20px}
@media (min-width: 768px){
.modal-dialog {
    width: 500px;
    
}
}
</style>
</head>

<body>
<div class="container">
<header>
	<div class="banner"><img src="../public/images/results-of-search.png" alt="ROMANCE-&-WOMENS"></div>
    <h1 class="header__tag">if what you are looking for is not listed, please let us know</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>Seek and ye shall find! The results below<br>display a list of free ebooks, blog posts<br>and information pages that are closely<br>related to your search term</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!! $advertt->a !!}</div>
    </div>
    
    <section class="mttop17">
@include('shared.nav')     
    </section>
</header>	

<section class="mttop33">

	<script>
  (function() {
    var cx = 'partner-pub-7815644539382055:8047477479';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<div class="row submission">
<div class="col-sm-12 col-md-8 col-lg-8">
<gcse:searchresults-only></gcse:searchresults-only>
</div>

<div class="col-sm-12 col-md-4 col-lg-3 section3">
            <span style="font-size: 18px;">Tell your friends</span>
            <section class="xs-center mttop10">
            <ul class="social-buttons xs-center">
              <li><a target="_blank" href="{!! $social->facebook !!}" class="sprite sprite--social-buttons__facebook"></a></li>
              <li><a target="_blank" href="{!! $social->twitter !!}" class="sprite sprite--social-buttons__twitter"></a></li>
              <li><a target="_blank" href="{!! $social->stumbled_upon !!}" class="sprite sprite--social-buttons__"></a></li>
              <li><a target="_blank" href="{!! $social->pinterest !!}" class="sprite sprite--social-buttons__linkedin"></a></li>
              <li><a target="_blank" href="{!! $social->googleplus !!}" class="sprite sprite--social-buttons__pinterest"></a></li>
              <li><a target="_blank" href="{!! $social->linkedin !!}" class="sprite sprite--social-buttons__google"></a></li>
            </ul>
            <div>{!!$advertt->b!!}</div>
            </section>
            
            <div class="block dn mttop33">
       	    	<img src="../public/images/read-rate.jpg" alt="read-rate">
            </div>
		<br>

		<div class="block dn mttop33">
       	    	<img src="../public/images/legal-downloads.jpg" alt="read-rate">
            </div>
		<br>

            
            <div class="mttop33 dn">{!!$advertt->b!!}</div>
		            

        </div>
        </div>
</section>

<footer>
<p class="xs-center">{{$footer->general_text}}</p>
{!! $footer->analytic_code !!}
{!! $footer->cookie_code !!}
</footer>


</div>


<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/bootstrap.js"></script>
<script src="../public/js/app.js"></script>
<script type="text/javascript">
function submit_form(){
  
  
 document.getElementById("form1").submit();
  
  
}
</script>
</body>
</html>
