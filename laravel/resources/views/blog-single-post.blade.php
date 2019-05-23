<!doctype html>
<html>
<head>
    <title>Obooko Development Site</title>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/custom.css">
    <link rel="stylesheet" href="../../fonts/obooko-font.css">   
</head>

<body>
<div class="container">
<header>
	<div class="banner"><img src="../../images/THE-OBOOKO-BLOG.png" alt="THE OBOOKO BLOG"></div>
    <h1 class="header__tag minifont">news, opinion and comments about e-books and other stuff</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>This is our blog page, where we will post regular content about books, authors and readers. We will also include updates about popular trends and technology.</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!!$advertt->a!!}</div>
    </div>

    
    <section class="mttop17">
@include('..shared.nav')     
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
        <div class="col-sm-7 col-md-8 col-lg-8 msg text-justify">
        <h2>{{$resultSet->title}}</h2>
        
        <p><span class="datecolor">Posted by {{$resultSet->writer}}</span></p>
<br>
        {!! $resultSet->article !!}
      </div>
        
        
        <div class="col-sm-5 col-md-4 col-lg-3 section3">
            <span style="font-size: 18px;">Share the Words ...</span>
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
            
            <div class="recent-post mttop32">
            	<h5>Recent Posts</h5>
                <ul class="media-list">
                   @foreach($resultSet2 as $result)
                  <li class="media">
                    <a class="pull-left" href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/blog-post/article/{{$result->post_id}}">
                      <img style="  padding: 2px 2px;
  border: 1px solid #c0c0c0;
  width: 70px;
  height: 70px" class="media-object" src="../../resize?image=images/{{$result->image}}&h=70" alt="{{$result->img_alt}}">
                    </a>
                    <div class="media-body">
                      <a href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/blog-post/article/{{$result->post_id}}"><p>{{$result->title}}
             <span>{{$result->date}}</span></p></a>
                    </div>
                  </li>
                @endforeach
                  
                    
                </ul>
                
                <a href="#"><u>Archive</u></a>
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


<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/app.js"></script>

</body>
</html>
