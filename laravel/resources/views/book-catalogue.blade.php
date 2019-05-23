
<!doctype html>
<html>
<head>
     <title>{{$cat->title}}</title>    
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <meta name="description" content="{{$cat->m_description}}">
     <meta name="keywords" content="{{$cat->m_keywords}}">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../fonts/obooko-font.css">   
</head>

<body>
<div class="container">
<header>
	<div class="banner"><img src="../images/{{$cat->h_image}}" alt="{{$cat->h_image_alt}}"></div>
    <h1 class="header__tag">{{$cat->h_text}}</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>{!! $cat->l_text !!}</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!!$advertt->a!!} </div>
    </div>
    
    <section class="mttop17">
     @include('shared.nav')
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
        <div class="col-sm-12 col-md-8 col-lg-8">
        <div class="row">
        	<div class="col-sm-8 pagination">
@if(isset($filter))
{{$resultSet->appends(['filter' => $filter])->links()}}
@else
{{$resultSet->links()}}
@endif
</div>
          
                     <div class="col-sm-2 col-md-4 col-lg-4" style="margin-top:-10px;margin-left:-10px;margin-bottom:20px">
 <form name="form" id="form1" action="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/category/{{$Category}}" method="get">

                <p><select name="filter" id="filter" onChange="submit_form(this.value)" style=" float: right;
    height: 35px;
    width: 169.63px;margin-right:-9px;">
		
		  <?php 
                   if($filter == 'new'):
			echo '<option selected value="new">Latest Books First</option>';
                   echo '<option value="old">Earlier Books First</option>';
                  echo '<option value="epub">EPUB Books Only</option>';
                  echo '<option value="kindle">KINDLE Books Only</option>';
                  

                  elseif($filter == 'old'):
                  echo '<option selected value="old">Earlier Books First</option>';
                  echo '<option value="new">Latest Books First</option>';
                  echo '<option value="epub">EPUB Books Only</option>';
                  echo '<option value="kindle">KINDLE Books Only</option>';
                  
                                    
                 elseif($filter == 'kindle'):
                  echo '<option selected value="kindle">KINDLE Books Only</option>';
                echo '<option value="old">Earlier Books First</option>';
                  echo '<option value="new">Latest Books First</option>';
                  
                  echo '<option value="epub">EPUB Books Only</option>';
                  
                 elseif($filter == 'epub'):
                  echo '<option selected value="epub">EPUB Books Only</option>';
                   echo '<option value="old">Earlier Books First</option>';
                  echo '<option value="new">Latest Books First</option>';
                  
                  echo '<option value="kindle">KINDLE Books Only</option>';

                  elseif($filter == ""):
		   echo '<option selected value="new">Latest Books First</option>';
                   echo '<option value="old">Earlier Books First</option>';
                  echo '<option  value="epub">EPUB Books Only</option>';
                  echo '<option value="kindle">KINDLE Books Only</option>';
                  

endif;
                  ?>
                 
                </select></p></a>
     </form>
      </div>
 
          </div>
          <div class="clearfix"></div> 
          <div class="books">
          <div class="row">
          
          @foreach($resultSet as $result)

            
          	<div class="col-md-3 col-sm-4 col-xs-6" style="margin-bottom: 20px; display: block;"><a href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/{!! $cat->slug !!}/{!! $result->url !!}" ><img class="cat_pic" src="../images/covers/{{$result->cover_image}}"></a></div>
          @endforeach
          
                      </div>  
       		
          </div>
         <div class="clearfix"></div>
        </div>
        
        <div class="col-sm-12 col-md-4 col-lg-3 section3">
            <span style="font-size: 18px;">{!! $cat->s_text !!}</span>
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
       	    	<img src="../images/read-rate.jpg" alt="read-rate">
            </div
		<br>

		<div class="block dn mttop33">
       	    	<img src="../images/legal-downloads.jpg" alt="read-rate">
            </div
		<br>

            
            <div class="mttop33 dn">{!!$advertt->b!!}</div>
		<div class="block dn mttop33">
		<p id="s_t1-1">{{$ST}}<a href="javascript:toggle(1)" class="show_more below" >Read more</a></p></span>
       	    	<p id="s_t2-1" style="display:none;">{{$cat->br_text}}<a href="javascript:toggle(1)" class="show_more below" >Read less</a></p></span>
            </div>            

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
function submit_form($val){
	
	document.getElementById("form1").value=$val;
	document.getElementById("form1").submit();
	
	
}
</script>
<script>
function toggle($id){

var el = document.getElementById("s_t1-"+$id);

	if ( el.style.display != 'none' ) {

		el.style.display = 'none';

	}

	else {

		el.style.display = '';

	}
  
var el = document.getElementById("s_t2-"+$id);

	if ( el.style.display != 'none' ) {

		el.style.display = 'none';

	}

	else {

		el.style.display = '';

	}
}
</script>
</body>
</html>
