﻿<!doctype html>
<html>
<head>
    <title>{{$result->title}}</title>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../fonts/obooko-font.css">   
</head>

<body>
<div class="container">
<header>
  <div class="banner"><img src="../images/{{$result->h_image}}" alt="THE OBOOKO BLOG"></div>
    <h1 class="header__tag minifont">{{$result->h_text}}</h1>
    <div class="row access-txt mttop33">
      <div class="col-sm-4"><p>{{$result->h_subtext}}</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!! $adds->a !!}<img src="../images/talktalk.jpg" alt="google adsans" class="smalladd mbottom20"></div>
    </div>

    
    <section class="mttop17">
@include('shared.nav')     
    </section>
</header> 

<section class="mttop33">
    <div class="row submission">
        <div class="col-sm-7 col-md-8 col-lg-8 msg text-justify">
        <h2>{{$resultSet->c_title}}</h2>
        
        
        
<p>{{$result->c_text}}</p>
        
        </div>
      </div>
        </div>
        
        <div class="col-sm-5 col-md-4 col-lg-3 section3">
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
            <div>{!!$adds->b!!}</div>
            </section>
            
            <div class="recent-post mttop32">
              <h5>Recent Posts</h5>
                <ul class="media-list">
                   @foreach($resultSet2 as $result)
                  <li class="media">
                    <a class="pull-left" href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/blog-post/{{$result->post_id}}">
                      <img style="  padding: 2px 2px;
  border: 1px solid #c0c0c0;
  width: 70px;
  height: 70px" class="media-object" src="../images/{{$result->image}}" alt="Blog">
                    </a>
                    <div class="media-body">
                      <a href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/blog-post/{{$result->post_id}}"><p>{{$result->title}}
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


<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/app.js"></script>

</body>
</html>
