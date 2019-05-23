<!doctype html>
<html>
<head>
    <title>{{$page->title}}</title>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="{{$page->m_description}}">
     <meta name="keywords" content="{{$page->m_keywords}}">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../fonts/obooko-font.css">   
</head>

<body>
<div class="container">
<header>
	<div class="banner"><img src="../images/{{$page->h_image}}" alt="COPYRIGHT-BOOKS"></div>
    <h1 class="header__tag minifont">{{$page->h_text}}</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>{{$page->h_subtext}}</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!! $advert->a !!}</div>
    </div>
    
    <section class="mttop17">
@include('shared.nav')     
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
        <div class="col-sm-7 col-md-8 col-lg-8 msg text-justify">
        <h2>{{$page->c_title}}</h2>
       
{!! $page->c_text !!}
     
        </div>
        
        <div class="col-sm-5 col-md-4 col-lg-3 section3">
            <span style="font-size: 18px;">Share the Words ...</span>
            <section class="xs-center mttop10">
            <ul class="social-buttons xs-center">
           <li><a  target="_blank"  href="{!!$social->facebook!!}"  class="sprite sprite--social-buttons__facebook"></a><br></li>
              <li><a  target="_blank"  href="{!!$social->twitter!!}"  class="sprite sprite--social-buttons__twitter"></a><br></li>
              <li><a  target="_blank"  href="{!!$social->stumbled_uopn!!}"  class="sprite sprite--social-buttons__"></a><br></li>
              <li><a  target="_blank"  href="{!!$social->linkedin!!}"  class="sprite sprite--social-buttons__linkedin"></a><br></li>
              <li><a  target="_blank"  href="{!!$social->pinterest!!}"  class="sprite sprite--social-buttons__pinterest"></a><br></li>
              <li><a  target="_blank"  href="{!!$social->googleplus!!}"  class="sprite sprite--social-buttons__google"></a><br></li>

            </ul>
            <div>            </section>
            
            <div class="block mttop33">
       	    	{!! $advert->b !!} 
            </div>
            
          <div class="block mttop33">
       	  	{!! $advert->b17 !!}          </div>
            
            <div class="mttop33">{!! $advert->a !!}</div>
            
        </div> 
        
    </div>
</section>

<footer>
<p class="xs-center">{{$footer->general_text}}</p>
{!! $footer->analytic_code !!}
{!! $footer->cookie_code !!}
</footer>


</div>


<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/app.js"></script>
<script>
@if(isset($success))
$(documents).ready(function() {
$('#myModal').modal('show');
});
@endif
</script>
</body>
</html>
