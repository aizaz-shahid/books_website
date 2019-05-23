<!doctype html>
<html>
<head>
    <title>Obooko Development Site</title>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../fonts/obooko-font.css">   
</head>

<body>
<div class="container">
<header>
	<div class="banner"><img src="../images/ROMANCE-&-WOMENS.png" alt="ROMANCE-&-WOMENS"></div>
    <h1 class="header__tag">quality books and books for women free of charge</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>Access to this website and every title in our free ebook categories is gratis. You may Download as many books as you wish 			with the compliments of our wonderful authors.</p></div>
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
<gcse:searchresults-only></gcse:searchresults-only>

    <!--<div class="row submission">
        <div class="col-sm-12 col-md-8 col-lg-8">

	

        <div class="row">
        	<div class="col-sm-8"><h2>By Title:</h2></div>
	
            <div class="col-sm-7">
                
        	</div>
          
          </div>
          <div class="clearfix"></div> 
          <div class="books">
          <div class="row">
          @if(isset($Title))
          @foreach($Title as $result)

            
          	<div class="col-ob-2"><a href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/{!! $result->category !!}/{!! $result->url !!}" ><img src="../images/covers/{{$result->cover_image}}" style="  padding: 1px 1px;
  border: 1px solid #c0c0c0;
  width: 150px;
  height: 200px" alt="Cover"></a></div>
          @endforeach
          
          @else	
		<h2 style="text-align:center">No Results</h2>
	@endif
            </div>  
       		
          </div>
	
         <div class="clearfix"></div>
        

	

		

	<div class="row">
        	<div class="col-sm-8"><h2>By Author:</h2></div>
	
            <div class="col-sm-7">
                
        	</div>
          
          </div>
          <div class="clearfix"></div> 
          <div class="books">
          <div class="row">
          @if(isset($Author))
          	@foreach($Author as $result)

            
          	<div class="col-ob-2"><a href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/{!! $result->category !!}/{!! $result->url !!}" ><img src="../images/covers/{{$result->cover_image}}" style="  padding: 1px 1px;
  border: 1px solid #c0c0c0;
  width: 150px;
  height: 200px" alt="Cover"></a></div>
          	@endforeach
          @else	

		<h2 style="text-align:center">No Results</h2>

	@endif

            </div>  
       		
          </div>
	
         <div class="clearfix"></div>
        

	

	

	<div class="row">
        	<div class="col-sm-8"><h2>By Description:</h2></div>
	
            <div class="col-sm-7">
                
        	</div>
          
          </div>
          <div class="clearfix"></div> 
          <div class="books">
          <div class="row">
          @if(isset($Description))
          @foreach($Description as $result)

            
          	<div class="col-ob-2"><a href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/{!! $result->category !!}/{!! $result->url !!}" ><img src="../images/covers/{{$result->cover_image}}" style="  padding: 1px 1px;
  border: 1px solid #c0c0c0;
  width: 150px;
  height: 200px" alt="Cover"></a></div>
          @endforeach
          @else	
		<h2 style="text-align:center">No Results</h2>
	@endif
            </div>  
       		
          </div>
	
         <div class="clearfix"></div>
        

	

	
	<div class="row">
        	<div class="col-sm-8"><h2>By Synopsis:</h2></div>
	
            <div class="col-sm-7">
                
        	</div>
          
          </div>
          <div class="clearfix"></div> 
          <div class="books">
          <div class="row">
          @if(isset($Synopsis))
          @foreach($Synopsis as $result)

            
          	<div class="col-ob-2"><a href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/{!! $result->category !!}/{!! $result->url !!}" ><img src="../images/covers/{{$result->cover_image}}" style="  padding: 1px 1px;
  border: 1px solid #c0c0c0;
  width: 150px;
  height: 200px" alt="Cover"></a></div>
          @endforeach
          @else	
		<h2 style="text-align:center">No Results</h2>
	@endif
            </div>  
       		
          </div>
	
         <div class="clearfix"></div>
        </div>
	
        
        <div class="col-sm-12 col-md-4 col-lg-3 section3">
            <span style="font-size: 18px;">Share the Words ...</span>
            <section class="xs-center mttop10">
            <ul class="social-buttons xs-center">
              <li><a target="_blank" href="" class="sprite sprite--social-buttons__facebook"></a></li>
              <li><a target="_blank" href="" class="sprite sprite--social-buttons__twitter"></a></li>
              <li><a target="_blank" href="" class="sprite sprite--social-buttons__"></a></li>
              <li><a target="_blank" href="" class="sprite sprite--social-buttons__linkedin"></a></li>
              <li><a target="_blank" href="" class="sprite sprite--social-buttons__pinterest"></a></li>
              <li><a target="_blank" href="" class="sprite sprite--social-buttons__google"></a></li>
            </ul>
            <div><img src="../images/talktalk.jpg" alt="Talk Talk"></div>
            </section>
            
            <div class="block dn mttop33">
       	    	<img src="../images/read-rate.jpg" alt="read-rate">
            </div>
            
            <div class="mttop33 dn">{!! $advertt->b !!}</div>
            
        </div> 
        
    </div>-->
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
<script type="text/javascript">
function submit_form(){
  
  
 document.getElementById("form1").submit();
  
  
}
</script>
</body>
</html>
