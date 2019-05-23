
<script async src="{{ asset('/public') }}/js/jquery.min.js"></script>
<script async src="{{ asset('/public') }}/js/bootstrap.js"></script>
<script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>

 <!--<style>
	.close{position:relative;right:10px;background-color:#ff6611;border:0px solid;top:0px}
	.modal-content{padding:0px;width:80%;}
	.modal-body{padding:0px;padding-top:20px}
</style>-->
<style>
	.form input#placeholder::-webkit-input-placeholder {color:#C1C1C1;}
</style>
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog"> 
	<div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius:5px">
      <div class="modal-header" style="border-radius: 3px 3px 0px 0px;background-color:#ff6600">
        
	 <div class="row">
		<div class="col-md-7 col-xs-9">
			<h4 class="modal-title" style="font-size:22px;font-family:inherit;color:white;line-height:2.42857143;">Welcome Back!</h4>
		</div>
		<div class="col-md-5">
	
			<p style="text-align:right;margin-top:15%"><button type="button" class="close" style="padding: 1px 6px 1px;" data-dismiss="modal" aria-label="Close"><i style="font-style: normal;
    font-size: x-large;">&times;</i></button></p>
		</div>
	</div>

	
      </div>
      <div class="modal-body">
	<form name="form-1" action="{{ asset('') }}my-account" method="post" class="form" style="background:white;border:none;margin-bottom:0px;padding-left:30px;padding-right:30px;padding-bottom:0px;padding-top:0px">
	<div class="row">
		<div class="col-md-12">
        		<input style="" type="text" id="placeholder" name="username" value="" placeholder="Email or Username">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
        		<input style="" type="password" id="placeholder" name="password" value="" placeholder="Password">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
        		<input type="submit" name="submit" id="submit" value="LOG IN" class="login" style="border-top: 1px solid #ff6600;border-bottom: 2px solid #ff6600;
    border-left: 1px solid #ff6600;text-shadow:none;
    border-right: 1px solid #ff6600;background:#ff6600;width:100%;min-width:100%;color:white">
			
		</div>
	</div>
	<div class="row" id="error" style="display:none">
		<div class="col-md-12">
        		<p style="color:red"><strong>Authentication Failed! Please enter correct credentials</strong></p>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
        		<p style="text-align:left;margin-bottom:0px;padding-bottom:0px;color:#C1C1C1;font-size:16px"><input name="remember" type="checkbox" style="width: 18px;
    height: 18px;background:white" value="2" ><span>Remember Me</span></p>
		</div>
	</div>

		{!! csrf_field() !!}
	</form>
      </div>
      <div class="modal-footer" style="border-radius: 0px 0px 3px 3px;background-color:#f2f2f2">
        <div class="row" style="
    padding-right: 20px;
    padding-left: 20px;
">
		<div class="col-md-7" style="
    padding-left: 0px;
">
			<p style="color:#d6d6d6;text-align:center;font-size:16px"><a href="recover-password" style="text-decoration:none;color:#9e9a9a">FORGOT PASSWORD?</a></p>
		</div>
		<div class="col-md-5" style="
    padding-right: 0px;
    padding-left: 0px;
">
			<p style="color: #ff6600;text-align:center;font-size:16px;font-weight:900"><a href="{{url('registration')}}"><strong>REGISTER FREE</strong></a></p>
		</div>
	</div>        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->         
</div>


<nav class="navbar navbar-default">
      
    <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
          
  <div class="navbar-header">


   <a class="navbar-brand" href="{{ asset('') }}ebooks-books">
<img src="{{ asset('/public') }}/images/obooko.png" alt="obooko"></a>
        
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            
    <span class="sr-only">Toggle navigation</span>
             
   <span class="icon-bar"></span>
            
    <span class="icon-bar"></span>
            
    <span class="icon-bar"></span>
         
     </button>
      @if(Session::has('id'))  
     <form class="navbar-form navbar-right" style="margin-right:0px" role="search" action="{{ asset('') }}search-result" method="get">
     @else
 <form class="navbar-form navbar-right" style="margin-right:0px" role="search" action="{{ asset('') }}search-result" method="get">
 @endif
     
                <div class="form-group" style="margin-left:0px;">

			<input type="hidden" name="cx" value="partner-pub-7815644539382055:8047477479" />
			<input type="hidden" name="cof" value="FORID:11" />
			<input type="hidden" name="ie" value="UTF-8" />
			@if(Session::has('id'))
			<input type="text" name="q" style="margin-left:0px;margin-right:0px;" size="17" class="form-control loginn" placeholder="Search:" value=""  />
            @else
            <input type="text" name="q" style="margin-left:0px;margin-right:0px;" size="17" class="form-control" placeholder="Search:" value=""  />
            @endif
                  <!--<input type="text" name="search" class="form-control" placeholder="Search:">-->
 @if(Session::has('id'))
<button style="margin-left:0px;" type="submit" class="searchbtn"></button>
@else
<button style="margin-left:0px;" type="submit" class="searchbtn"></button>
@endif
                </div>
		{!! csrf_field() !!}
             </form>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                
                <li class="dropdown">
              
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Free Fiction<span class="caret"></span></a>
      
            <ul class="dropdown-menu" role="menu">
		@foreach($resultSet11 as $result11)
                    <li><a href="{{ asset('') }}category/{{$result11->slug}}">{{$result11->name}}</a></li>
		@endforeach
                                      </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Free Non-Fiction<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
		@foreach($resultSet12 as $result12)
                    <li><a href="{{ asset('') }}category/{{$result12->slug}}">{{$result12->name}}</a></li>
		@endforeach
                                      </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<span class="caret"></span></a>
                  
<ul class="dropdown-menu" role="menu">
                
    <!--<li><a href="">About obooko</a></li>-->
      @if(Session::has('id'))         
     <li><a href="{{url('submit-book')}}">submit book</a></li>
     @else
     <li data-toggle="modal" data-target="#login_modal"><a href="" onclick="return false">submit book</a></li>
     @endif
<li><a href="{{url('blog')}}">blog</a></li>
                 
   <!--<li><a href="">Privacy Policy</a></li>-->
              
      <!--<li><a href="">FAQ</a></li>-->
                 
   <!--<li><a href="">Terms and Conditions</a></li>-->
              
     <li><a href="/contact-us">Contact Us</a></li>
                    
                    <li><a href="/copyright-explained">Copyright explained</a></li>
                    
                    <!--<li><a href="">Sitemap</a></li>-->
                    <li><a href="/ebooks-books">Homepage</a></li>
                  </ul>
                </li>
                @if(Session::has('id'))
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{url('my-account')}}">View Your Account</a></li>
                    <li><a href="{{url('Logout')}}">Logout</a></li>
                  </ul>
                </li>
                @else
                <li data-toggle="modal" data-target="#login_modal"><a href="" onclick="return false">Log in</a></li>
		<li><a href="{{url('registration')}}">Register</a></li>
                @endif
                <li><a href="{{url('blog-gallery')}}">Blog</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
            
          </div><!-- /.container-fluid -->
        </nav>


<script>

$("#login").click(function() {
	$('#login_modal').modal('show');
});

</script>
<script>
@if(session()->has('loginError'))
$(document).ready(function(){
    
	$('#login_modal').modal('show');
	$('#error').show();
	
});
@endif
</script>
