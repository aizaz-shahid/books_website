<!doctype html>
<html lang="en">
<head>
     <title>{{$blog->title}}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="{{$blog->m_description}}">
    <meta name="keywords" content="{{$blog->m_keywords}}">

    <link rel="stylesheet" href="{{ asset('/public/css/mcss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/fonts/obooko-font.css') }}"> 
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
	<div class="banner"><img src="../public/images/{{$PageSetting->h_image}}" alt="THE OBOOKO BLOG"></div>
    <h1 class="header__tag minifont">{{$PageSetting->h_text}}</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>{{$PageSetting->h_subtext}}</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!! $adds->a !!}</div>
    </div>
    
    <section class="mttop17">
   @include('shared.nav')
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
        <div class="col-sm-7 col-md-8 col-lg-8 msg text-justify">
      
      <div class="row gallery">
      <div class="col-md-12">{{$resultSet->links()}}</div>
      	@foreach($resultSet as $result)
        <div>
            <div class="col-sm-12 col-md-6 col-lg-5"><a href="blog-post/article/{{$result->post_id}}"><img src="public/images/{{$result->image}}" style="width:100%" alt="{{$result->img_alt}}"></a></div>
            <div class="col-sm-12 col-md-6 col-lg-7">
                <a href="blog-post/article/{{$result->post_id}}" style="text-decoration: none;"><h2 class="media-heading">{{$result->title}}</h2></a>
                <p><span class="datecolor">By {{$result->writer}}</span> <br>{!!$result->summary!!}<a href="blog-post/article/{{$result->post_id}}">Read more</a></p>
            </div>
        <div class="clearfix"></div>
        </div>
        
        <div class="bdr"></div>
        @endforeach

        
      </div>
      
      
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
            <div>{!! $adds->b !!}</div>
            </section>
            
            <div class="recent-post mttop32">
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#home" role="tab" data-toggle="tab">Recent Posts</a></li>
              
            </ul>
            
            <div class="tab-content">
                  <div class="tab-pane active" id="home">
                <ul class="media-list">
                @foreach($Recent as $result)
                  <li class="media">
                    <a class="pull-left" href="blog-post/article/{{$result->post_id}}">
                      <img style="  padding: 2px 2px;
  border: 1px solid #c0c0c0;
  width: 70px;
  height: 70px" class="media-object" src="resize?image=images/{{$result->image}}&h=70" alt="Blog">
                    </a>
                    <div class="media-body">
                      <a href="blog-post/article/{{$result->post_id}}"><p>{{$result->title}}
						 <span>{{$result->date}}</span></p></a>
                    </div>
                  </li>
                @endforeach  
                  
                    </ul>
                </div>
             </div>
           </div>
         <div>{!!$adds->b!!}</div>
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
