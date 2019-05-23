<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{$resultSet->m_title}}</title>
    <meta  name="viewport"  content="width=device-width, initial-scale=1, maximum-scale=1">
@if($resultSet->robot_index == "on")
<meta name="robots" content="noindex" /> 
@endif
 <meta name="description" content="{{$resultSet->m_description}}">
         <link  rel="stylesheet"  href="../../public/css/mcss/style.css">
    <link  rel="stylesheet"  href="../../public/css/custom.css">
    <link  rel="stylesheet"  href="../../public/fonts/obooko-font.css">
    <link  rel="stylesheet"  href="../../public/css/rating_css.css">
	<style>
.book-cover{
margin-bottom:1.49em !important;
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
    <div  class="container">
      <header>
        <div  class="banner"><img  src="../../public/images/{{$cat->h_image}}"  alt="{{$cat->h_image_alt}}" title="{{$cat->h_image_alt}}"></div>
        <h1  class="header__tag">{{$resultSet->h_text}}</h1>
        <div  class="row access-txt mttop33">
          <div  class="col-sm-4">
            <p>{{$resultSet->t_text}}</p>
          </div>
@if($resultSet->adult_filter == "on")
          <div  class="col-sm-12 col-md-8 xs-center"  style="padding-left:0px;">{!! $advert->a17 !!}</div>
@else
 <div  class="col-sm-12 col-md-8 xs-center"  style="padding-left:0px;">{!! $advert->a !!}</div>

@endif
        </div>
        <section  class="mttop17">
 @include('shared.nav')
        </section>
      </header>
      <section  class="mttop33">
        <div  class="row submission msg">
          <div  class="col-sm-4 col-md-3"> <img style="width:235px;height:341px" title="{{$resultSet->title}}"
               src="../../public/images/covers/{{$resultSet->cover_image}}"
               alt="{{$resultSet->image_alt}}"
               class="bookcover">
          </div>
          <div  class="col-sm-12 col-md-8 col-dw-6">
            <h3>{{$resultSet->title}} <br>
              <span  class="gray" style="padding-top:8px;display:block;">By {{$resultSet->author_name}}<br>
              </span></h3>
       <p class="graycolor">Officially licensed for obooko members.<span style='font-weight:bold;margin-left:5px;color:#000;'> {{($resultSet->adult_filter == 'on') ? 'Age Rating 17+' : ''}}</span></p>
            <hr>
        
            <div  class="row">
             <div class="col-sm-12 col-md-12"><h4 style="margin-bottom:-7px;">Read it and Rate it!</h4>        
			<script>
				var site_url="http://www.obooko.com/free-ebooks/";
			</script>
			<ul class="star-rating" id="rater_{{$resultSet->book_id}}">
				<li class="current-rating" style="width:{{($resultSet->rating/5)*100}}%;" id="ul_{{$resultSet->book_id}}"></li>
				<li><a onclick="rate('1','{{$resultSet->book_id}}'); return false;" href="#"  title="1 star out of 5" class="one-star" >1</a></li>
				<li><a onclick="rate('2','{{$resultSet->book_id}}'); return false;" href="#" title="2 stars out of 5" class="two-stars">2</a></li>
				<li><a onclick="rate('3','{{$resultSet->book_id}}'); return false;" href="#" title="3 stars out of 5" class="three-stars">3</a></li>
				<li><a onclick="rate('4','{{$resultSet->book_id}}'); return false;" href="#" title="4 stars out of 5" class="four-stars">4</a></li>
				<li><a onclick="rate('5','{{$resultSet->book_id}}'); return false;" href="#" title="5 stars out of 5" class="five-stars">5</a></li>
			</ul>
 <div class="rated_text" style="margin-top:10px;font-size:12px;">Rated <span id="outOfFive_{{$resultSet->book_id}}" class="out5Class">{{$resultSet->rating}}</span>/5(<span id="showvotes_{{$resultSet->book_id}}" class="votesClass" style="padding-top: 10px; padding-bottom: 0px; margin: 0px;">{{$resultSet->total_votes}} votes</span>)</div>
			<div id="loading_2"></div> 

              
                   </div><div class="col-md-7 alert alert-success" id="rated-success" style="margin-left:15px;display: none;border:none;background-color:rgba(255, 102, 0, 0.13);color:#ff6600;"></div>
                   
            </div>
            <hr>
            <h4>The author welcomes your comments:</h4>
            <form action="{{ asset('') }}send-feedback" method="post">
            <input type="hidden" name="author" value="{{$resultSet->author_id}}">
            <input type="hidden" name="title" value="{{$resultSet->title}}">
            <input  class="mttop32"  value="Send Feedback"  id="Submit"  name="submit"
 style="margin-top: -10px;"
 type="submit">
 {!! csrf_field() !!}
            </form>
        <hr>
        
        
        <h4>Book Synopsis</h4>
        <article id="s_t1" style="margin-bottom:20px">{!!$Synopsis!!}<br/>
 <a class="read_more" href="javascript:void(0)" onClick="togle();">Read more</a></article>
	<article id="s_t2" style="display:none;margin-bottom:20px">{!!$resultSet->synopsis!!}
 <a class="show_more below" href="javascript:void(0)" onClick="togle();">Read less</a></article>
 
 		<h4>Catch up with the author online:</h4>
        <p>
             <a  href="{{$resultSet->web}}">{{$resultSet->web}}</a><br>
             <a  href="{{$resultSet->blog}}">{{$resultSet->blog}}</a> <br>
             <a  href="{{$resultSet->fb}}">{{$resultSet->fb}}</a> <br>
             <a  href="{{$resultSet->twitter}}">{{$resultSet->twitter}}</a> <br>
        </p>
        
        <div  class="row" >
        	<div  class="col-md-12 col-lg-7">
			<div  class="width290">	
            <div  class="bookheading">SELECT FREE EBOOK FORMAT</div>
            	<div  class="freebook" style="border: 2px solid;border-color: #ff6600;padding:16px;">
                    <div  class="row">
                    @if(Session::has('id'))
                    	<div  class="col-sm-12 col-xs-8">
                        <form name="download_form" id="download_form" action="{{ asset('') }}download-page" method="post">
                        	<p> Select from available eBook Format*</p>
                            <select  name="format" id="load_download" required>
                            <option>Please Select</option>
                            @if($counter1 == 1)	
                              <option value="pdf">PDF</option>
			    @endif
                            @if($counter2 == 1)	
                              <option value="kindle">KINDLE</option>
			    @endif
			    @if($counter3 == 1)	
                              <option value="epub">EPUB</option>
			    @endif
			    
                            </select>
                        </div>
                        <input type="hidden" name="id" value="{{$resultSet->book_id}}">
                        <!--<div  class="col-sm-6 ">
                        	<p><span  class="orenge">2.</span> Click to Download</p>
                        	<a  href="#" onClick="submit_form();"><img  src="../images/download-button.jpg"  alt="Download Button"></a> 

                      
                        </div>-->
                      {!! csrf_field() !!}
                        </form>
                    @else
                      <div  class="col-md-12 col-sm-12 col-xs-12"><div style="margin-bottom: 22px; text-align: center ! important; width: 249px;">From available file formats*</div>
                          
                          <input  class="mttop32"  value="Login or Register to Download"  id="submit"  name="submit"
 style="margin-top: -10px;margin-bottom:11px;width:100%;padding-right:0px;padding-left:0px"
 type="submit" data-toggle="modal" data-target="#login_modal">
                                                     
                        </div>
                    @endif
                    </div>
                </div>
             </div>   
                
            </div>
            <div  class="col-md-12 col-lg-5">
            	<a  href="#">File Formats</a><br>
                <p  class="f-format">*If your favourite<br>
 format is not listed
 this may be 
because the author
 has restricted  files
 available for free
 ebook editions.</p>
            </div>
        </div>
        <div class="mttop25" style="margin-left:0px !important">Also by the author on obooko :</div>
        <div  class="books" style="margin-left:15px;">
        
          <div  class="row" style="margin-top:15px;">
		
          	@foreach($resultSet2 as $result2)
		
            <div  class="col-md-2 col-sm-3 col-xs-3" style="margin-bottom:15px;margin-left:0px;padding-left:0px;padding-right:0px;margin-right:16px"><a  href="{{ asset('') }}download/{!! $result2->category !!}/{!! $result2->url !!}"><img  src="../../public/images/covers/{{$result2->cover_image}}"
 alt="Cover"
 title="Cover"
 class="img-responsive"></a></div>
 			@endforeach
            <!--<div  class="col-sm-3 col-xs-4"><a  href="#"><img  src="images/covers/sea-shadows-edwards.jpg"
 alt="Cover"
 class="book-border"></a></div>
            <div  class="col-sm-3 col-xs-4"><a  href="#"><img  src="images/covers/zhang-stephen-leather.jpg"
 alt="Cover"
 class="book-border"></a></div>
            <div  class="col-sm-3 col-xs-4"><a  href="#"><img  src="images/covers/invisible-armies-evans.jpg"
 alt="Cover"
 class="book-border"></a></div>-->
         </div>
       </div>
        
        </div>
        
        <div  class="col-sm-12 col-md-4 col-lg-3 section3">
            <span  style="font-size: 18px;">{!! $cat->s_text !!}</span>
            <section  class="xs-center mttop10">
            <ul  class="social-buttons xs-center">
              <li><a  target="_blank"  href="{!!$social->facebook!!}"  class="sprite sprite--social-buttons__facebook"></a><br></li>
              <li><a  target="_blank"  href="{!!$social->twitter!!}"  class="sprite sprite--social-buttons__twitter"></a><br></li>
              <li><a  target="_blank"  href="{!!$social->stumbled_uopn!!}"  class="sprite sprite--social-buttons__"></a><br></li>
              <li><a  target="_blank"  href="{!!$social->linkedin!!}"  class="sprite sprite--social-buttons__linkedin"></a><br></li>
              <li><a  target="_blank"  href="{!!$social->pinterest!!}"  class="sprite sprite--social-buttons__pinterest"></a><br></li>
              <li><a  target="_blank"  href="{!!$social->googleplus!!}"  class="sprite sprite--social-buttons__google"></a><br></li>
            </ul>
            
            <div  class="releated dn" style="margin-bottom:32px;">
            <h3>Latest books in this category</h3>
            @foreach($resultSet3 as $result3)
            	<div  class="media book-cover" style="margin-bottom:15px !important;">
                  <a  class="pull-left"  href="{{ asset('') }}download/{!! $result3->category !!}/{!! $result3->url !!}">
                    <img  class="media-object"  style="  padding: 2px 2px;width: 82px;
  height: 119px" src="../../public/images/covers/{{$result3->cover_image}}"  alt="{{$result3->image_alt}}" title="{{$result3->image_alt}}">
                  </a>
                  <div  class="media-body">
                    <a href="{{ asset('') }}download/{!! $result3->category !!}/{!! $result3->url !!}" style="text-decoration:none"><h4  class="media-heading">{{$result3->title}}</h4></a>
                    <em class="author">by {{$result3->author_name}}</em>
					<span  class="latest-books__item-p">{!!$result3->synopsis!!}...</span>
                  </div>
                </div>
            @endforeach    
                <!--<div  class="media">
                  <a  class="pull-left"  href="#">
                    <img  class="media-object"  src="images/book2.png"  alt="book2">
                  </a>
                  <div  class="media-body">
                    <h4  class="media-heading">Seducing Miss Dunaway</h4>
                    <span  class="author">by Kate Rothwell</span>
					<p  class="latest-books__item-p">The well-regarded matron of the foundlings' home all of her adult life, Miss Dunaway is ready for...</p>
                  </div>
                </div>-->
            </div>
            
            <div>
@if($resultSet->adult_filter == "on")
            	{!! $advert->b17 !!}   
@else
          {!! $advert->b !!}   
@endif
            </div>
            </section>
            
            <div  class="block dn mttop33">
       	    	<img  src="../../public/images/read-rate.jpg"  alt="Read and Rate"> 
            </div>
            @if($resultSet->adult_filter == "on")
            <div  class="mttop33 dn">{!! $advert->b17 !!}</div>
            @else
            <div  class="mttop33 dn">{!! $advert->b !!}</div>

@endif
        </div> 
        
    </div>
</section>

<footer>
<p class="xs-center">{{$footer->general_text}}</p>
{!! $footer->analytic_code !!}
{!! $footer->cookie_code !!}
</footer>


</div>


<script  src="../../public/js/jquery.min.js"></script>
<script  src="../../public/js/bootstrap.js"></script>
<script  src="../../public/js/app.js"></script>
<script  src="../../public/js/rating.js"></script>
<script type="text/javascript">
var rate_set=1;
function rate(vote,id){
var current_rate={{$resultSet->rating}};
var update_rate=current_rate+1;
if(rate_set)
{
$.ajax({
            url: "../../get_votes",
            type: "GET",
            data: {rate: vote,id:id},
            success: function(data){
             $("#rated-success").html('<strong>Thanks For Voting</strong>');
             $("#rated-success").show();
            $('.votesClass').html(data);
            $('.out5Class').html(vote);
           $(".current-rating").css("width",(vote/5)*100+"%");
            rate_set=0;
}
  });
}

}
function submit_form(){
  
  
  document.getElementById("download_form").submit();
  
  
}
function togle(){
  
  

var el = document.getElementById("s_t1");

	if ( el.style.display != 'none' ) {

		el.style.display = 'none';

	}

	else {

		el.style.display = '';

	}
  

var el = document.getElementById("s_t2");

	if ( el.style.display != 'none' ) {

		el.style.display = 'none';

	}

	else {

		el.style.display = '';

	}


  
}

$(function(){
    $('#star-rating').rating(function(vote, event){
      var b_id={{$resultSet->book_id}};
        // we have vote and event variables now, lets send vote to server.
        $.ajax({
            url: "../get_votes",
            type: "GET",
            data: {rate: vote,id:b_id},
            success: function(data){
             $("#rated-success").html('<strong>Thanks For Voting</strong>');
             $("#rated-success").show();
            $("#votes").html(data);

  },
  error: function(){
    alert('failure');
  }
        });
    
    });

});

$('#load_download').on('change', function() {
  //alert( this.value );
	$('#download_form').submit();
})

</script>


</body></html>