 <!doctype html>
<html lang="en">
<head>
 <title>{{$mainpage->title}}</title>
 <meta charset="utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <meta name="description" content="{{$mainpage->m_description}}">
 <meta name="keywords" content="{{$mainpage->m_keywords}}">
 <link rel="stylesheet" href="{{ asset('/public/css/mcss/style.css') }}">
 <link rel="stylesheet" href="{{ asset('/public/css/custom.css') }}">
 
 <link rel="stylesheet" href="{{ asset('/public/fonts/obooko-font.css') }}"> 
<style>
p{
line-height:1.6em;
}
.book-thumb{
margin-bottom:1.49em;
padding:2.9px;
}
.latest-books__item-p:after{
height:1.6em;
}
</style>
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
<!-- Modal -->
 
<div class="container">
<header>
<div class="banner"><img src="{{ asset('/public') }}/images/{{$mainpage->h_image}}" alt="{{$mainpage->h_alt}}"></div>
 <h1 class="header__tag">{{$mainpage->h_text}}</h1>
 <div class="row access-txt mttop33">
 <div class="col-sm-4"><p>{{$mainpage->h_subtext}}</p></div>
 <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!! $mainpage->h_advert !!} </div>
 </div>
 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Thank You</h4>
      </div>
      <div class="modal-body" style="padding:15px;">
        <p>Your form has been submitted.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 <section class="mttop17">
@include('shared.nav')
 </section>
</header>



<section class="main mttop33">
<div class="row">
 <div class="col-sm-7 col-md-4 col-lg-5 section1">
 <h2 style="font-size:1.7em;">Our latest free ebooks, hot off the press!</h2>
 <section>
 @foreach($resultSet as $result)
 <div class="media book-thumb">
 <a class="pull-left" href="/download/{!! $result->category !!}/{!! $result->url !!}">
 <img class="media-object" style=" padding: 1px 1px;
 width: 82px;
 height: 119px" src="{{ asset('/public') }}/images/covers/{{$result->cover_image}}" alt="{{$result->image_alt}}" title="{{$result->image_alt}}">
 </a>
 <div class="media-body">
 <a href="/download/{!! $result->category !!}/{!! $result->url !!}"><h4 class="media-heading">{{$result->title}}</h4></a>
 <em class="author">by {{$result->author_name}}</em>
<div class="latest-books__item-p">{!!$result->synopsis or "Like the uncontrollable urge to sneeze, then to sneeze again, Bakoda Pak returns to The Outfit after attempting to adjust to day to day life in the real world..."!!}</div>
 </div>
 </div>
 @endforeach 
 
 
 </section>
 </div>
 <div class="col-sm-5 col-md-4 col-lg-3 section2">
 
 <div class="thumbnail">
 <img style="min-width:100%" src="{{ asset('/public') }}/images/{{$mainpage->m1_image}}" alt="{{$mainpage->m1_alt}}" title="{{$mainpage->m1_alt}}">
 <div class="caption">
 <h3>{{$mainpage->m1_title}}</h3>
 <div id="s_t1-0">{!!$shortSummary[0]!!}
 <a class="show_more below" href="javascript:togle(0)">Read more</a></div>
<div id="s_t2-0" style="display:none">{!!$mainpage->m1_text!!}
 <a class="show_more below" href="javascript:togle(0)">Read less</a></div>
 </div>
 </div>
 
<div class="thumbnail">
 <img style="min-width:100%" src="{{ asset('/public') }}/images/{{$mainpage->m2_image}}" alt="{{$mainpage->m2_alt}}" title="{{$mainpage->m2_alt}}">
 <div class="caption">
 <h3>{{$mainpage->m2_title}}</h3>
 <div id="s_t1-1">{!!$shortSummary[1] !!}
 <a href="javascript:togle(1)" class="show_more below" >Read more</a></div>
<div id="s_t2-1" style="display:none">{!! $mainpage->m2_text !!}
 <a href="javascript:togle(1)" class="show_more below" >Read less</a></div>
 </div>
 </div>

 
 </div>
 <div class="col-sm-12 col-md-4 col-lg-3 section3">
 <div class="blog" style="border:solid rgb(187,187,187) 1px;padding:10px">
 <h3><span>What’s new on the</span> Blog?</h3>
 <p>Check out the latest posts and comments</p>
 <ul class="media-list">
 @foreach($resultSet4 as $result4)
 <li class="media">
 <a class="pull-right" href="/blog-post/article/{{$result4->post_id}}">
 <img style=" padding: 2px 2px;height:70px;width:70px;over-flow:hidden;"
 

 class="media-object" src="resize?image=images/{{$result4->image}}&h=70" alt="Blog" title="Blog">
 </a>
 <div class="media-body">
 <a href="{{ asset('') }}blog-post/article/{{$result4->post_id}}"><h4 class="media-heading">{{$result4->title}}</h4></a>
 <p style="padding-top:8px;">{!!$result4->summary!!}...</p> </div>
 </li>
 @endforeach
 
 </ul>
 </div>
 
 <section class="xs-center mttop32">
 <ul class="social-buttons xs-center">
 <li><a target="_blank" href="{!!$social->facebook!!}" class="sprite sprite--social-buttons__facebook"></a></li>
 <li><a target="_blank" href="{!!$social->twitter!!}" class="sprite sprite--social-buttons__twitter"></a></li>
 <li><a target="_blank" href="{!!$social->stumbled_upon!!}" class="sprite sprite--social-buttons__"></a></li>
 <li><a target="_blank" href="{!!$social->linkedin!!}" class="sprite sprite--social-buttons__linkedin"></a></li>
 <li><a target="_blank" href="{!!$social->pinterest!!}" class="sprite sprite--social-buttons__pinterest"></a></li>
 <li><a target="_blank" href="{!!$social->googleplus!!}" class="sprite sprite--social-buttons__google"></a></li>
 </ul>
 <div>{!! $mainpage->b_advert !!}</div>
 </section>
 
 </div>
 </div>
</section>

<footer>
<p class="xs-center">{{$footer->general_text}}</p>
{!! $footer->analytic_code !!}
{!! $footer->cookie_code !!}
</footer>

</div>


<script async src="{{ asset('/public') }}/js/jquery.min.js"></script>
<script async src="{{ asset('/public') }}/js/bootstrap.js"></script>

<script>
@if (session('success'))
$(document).ready(function() {
$('#myModal').modal('show');
});
@endif
</script>
<script type="text/javascript">
function submit_form(){


document.getElementById("book_form").submit();


}
</script>
<script>
function togle($id){
 
 

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
