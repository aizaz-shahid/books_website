<!doctype html>
<html lang="en">
<head>
    <title>Download Figures</title>
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
           		<li><a href="my-account">Author Account Home</a></li>
                <li class="active"><a href="author-download-figures">View Download Figures</a></li>
                <li><a href="author-submit-submission">Submit Another Book</a></li>
                <li><a href="author-updates">Revisions and Updates</a></li>
                <li><a href="author-change-password">Change Password</a></li>
                <li><a href="author-change-email">Change Email Address</a></li>
                <li><a href="Logout">Log out</a></li>
           </ul>  
          
            
      	</div> 
        
        <div class="col-sm-7 col-md-8 col-lg-8">
      
        <h2>How many people are downloading your work?</h2>
        
        <p>For a true picture, these figures show the total amount of <strong>people</strong> who have downloaded your book/s in each format. 
Only one download is recorded per unique user: subsequent downloads by the same person are not recorded.</p>
        
        <div class="figures mttop32">
        @foreach($resultSet as $result)
        	<div class="col-sm-12">
            	<a href="{{ asset('') }}download/{!! $result->category !!}/{!! $result->url !!}" onClick="submit_form();">{{$result->title}}</a>
                
                
                <ul>
                	<li>PDF <span>{{$result->pdf_downloads}}</span></li>
                    <li>EPUB <span>{{$result->epub_downloads}}</span></li>
                    <li>KINDLE <span>{{$result->kindle_downloads}}</span></li>
                </ul>
            </div>
        @endforeach
            <!--<div class="col-sm-12">
            	<a href="#">Tales of Horror and the Supernatural</a>
                <ul>
                	<li>PDF <span>5023</span></li>
                    <li>EPUB <span>1372</span></li>
                    <li>KINDLE <span>1127</span></li>
                </ul>
            </div>
            
            <div class="col-sm-12">
            	<a href="#">Sludge Management: An Exploratory Research in Bangladesh by Md. Lokman Hossain </a>
                <ul>
                	<li>PDF <span>7023</span></li>
                    <li>EPUB <span>2172</span></li>
                    <li>KINDLE <span>1627</span></li>
                </ul>
            </div>-->
        </div>
        
        	
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
<script type="text/javascript">
function submit_form(){
    
    
    document.getElementById("book_form").submit();
    
    
}
</script>

</body>
</html>
