 <style>
	.close{position:relative;right:10px;background-color:#ff6611;border:0px solid;top:0px}
	.modal-content{padding:0px;width:80%}
	.modal-body{padding:0px;padding-top:20px}
</style>
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog"> 
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#ff6600">
        
	 <div class="row">
		<div class="col-md-7">
			<h4 class="modal-title" style="color:white"><strong>Welcome Back!</strong></h4>
		</div>
		<div class="col-md-5">
	
			<span style="margin-top:10px"><p style="text-align:right"><button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button></p></span>
		</div>
	</div>

	
      </div>
      <div class="modal-body">
	<form name="form-1" action="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/my-account" method="post" class="form" style="background:white;border:none;margin-bottom:0px;padding-bottom:0px;padding-top:0px">
	<div class="row">
		<div class="col-md-12">
        		<input style="" type="text" name="username" value="" placeholder="Email or Username">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
        		<input style="" type="password" name="password" value="" placeholder="Password">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
        		<input type="submit" name="submit" id="submit" value="LOGIN" class="login" style="background:#ff6600;width:100%;min-width:100%;color:white">
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
        		<p style="text-align:left;margin-bottom:0px;padding-bottom:0px"><input name="remember" type="checkbox" style="background:white" value="2" ><span>Remember Me</span></p>
		</div>
	</div>

		{!! csrf_field() !!}
	</form>
      </div>
      <div class="modal-footer">
        <div class="row">
		<div class="col-md-7">
			<p style="color:#d6d6d6;text-align:center;font-size:18px"><a href="recover-password" style="text-decoration:none;color:gray">FORGOT PASSWORD?</a></p>
		</div>
		<div class="col-md-5">
			<p style="color: #ff6600;text-align:center;font-size:18px"><a href="{{url('registration')}}"><strong>REGISTER FREE</strong></a></p>
		</div>
	</div>        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->         
</div>


<nav class="navbar navbar-default" role="navigation">
      
    <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
          
  <div class="navbar-header">


   <a class="navbar-brand" href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/ebooks-books">
<img src="../../images/obooko.png" alt="obooko"></a>
        
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            
    <span class="sr-only">Toggle navigation</span>
             
   <span class="icon-bar"></span>
            
    <span class="icon-bar"></span>
            
    <span class="icon-bar"></span>
         
     </button>
      @if(Session::has('id'))  
     <form class="navbar-form navbar-right" style="margin-right:-15px;width:26%" role="search" action="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/search-result" method="get">
     @else
 <form class="navbar-form navbar-right" style="margin-right:-15px;width:22%" role="search" action="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/search-result" method="get">
 @endif
     
                <div class="form-group" style="margin-left:0px;width:100%">

			<input type="hidden" name="cx" value="partner-pub-7815644539382055:8047477479" />
			<input type="hidden" name="cof" value="FORID:11" />
			<input type="hidden" name="ie" value="UTF-8" />
			<input type="text" name="q" style="margin-left:-10px;" size="17" class="form-control" placeholder="Search:" value=""  />


                  <!--<input type="text" name="search" class="form-control" placeholder="Search:">-->
 @if(Session::has('id'))
<button style="margin-left:-8px;" type="submit" class="searchbtn"></button>
@else
<button style="margin-left:-18px;" type="submit" class="searchbtn"></button>
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
                    <li><a href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/category/{{$result11->slug}}">{{$result11->name}}</a></li>
		@endforeach
                                      </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Free Non-Fiction<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
		@foreach($resultSet12 as $result12)
                    <li><a href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/category/{{$result12->slug}}">{{$result12->name}}</a></li>
		@endforeach
                                      </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<span class="caret"></span></a>
                  
<ul class="dropdown-menu" role="menu">
                
    <!--<li><a href="">About obooko</a></li>-->
               
     <li><a href="{{url('submit-book')}}">submit book</a></li>
                    
<li><a href="{{url('blog')}}">blog</a></li>
                 
   <!--<li><a href="">Privacy Policy</a></li>-->
              
      <!--<li><a href="">FAQ</a></li>-->
                 
   <!--<li><a href="">Terms and Conditions</a></li>-->
              
     <li><a href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/contact-us">Contact Us</a></li>
                    <li><a href="/copyright-explained">Copyright explained</a></li>
                    <!--<li><a href="">Sitemap</a></li>-->
                    <li><a href="http://ec2-54-149-113-132.us-west-2.compute.amazonaws.com/ebooks-books">Homepage</a></li>
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
$(document).ready(function(){
$("#login").click(function() {
	$('#login_modal').modal('show');
});
});
</script>
