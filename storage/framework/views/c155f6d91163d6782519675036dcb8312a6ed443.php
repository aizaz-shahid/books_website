 
<?php $__env->startSection('content'); ?>

</head>        <header class='header-main'>


            <div class='navbar navbar-default sticky-nav' role='navigation'>
                <div class='container'>
                    <div class='navbar-header'>
                        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                            <span class='sr-only'>Toggle navigation</span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                        </button>
                        <a class='navbar-brand nav-toplogo img-responsive' href='/'><img src="<?php echo e(asset('/public')); ?>/images/obooko.png" alt=''></a>
                    </div>
                    <div class='navbar-collapse collapse'>
                                                  
                        <ul class='nav navbar-nav navbar-right'>
                            <li class='page-scroll'><a href='index.php'> Home</a></li>
                                                    </ul>

                    </div><!--/.nav-collapse -->
                </div><!--/.container-->
            </div><!--navigation end-->
        </header><!--header main end-->




<div class='container'>
	
	 <div class='row'>
		
		 <div class='col-lg-3'>

				<h2 style='font-face:Lato; line-height:1px;padding-top:25px'>
							CMS
				</h2><br/>
				<h4 >
							Site Administration Panel
				</h4>
            <div class='row' style='background-color:#FFFFFF;'>
        
            </div>
            <!-- /.row -->
	</div>

 <div class='col-lg-9'>

		<h2></h2>


            <div class='row' style='background-color:#FFFFFF;padding:20px 10px;'>

				<div class='col-sm-6 col-xs-12'>

					<div class='login-wrapper'>
							<div class='text-center'>

							</div>
							<div class='login-widget animation-delay1'>	
								<div class='panel panel-default'>
										<div class='panel-heading clearfix'>
												<div class='pull-left'>
								<i class='fa fa-lock fa-lg'></i> Authorised Admin Login
		
										</div>
								</div>
						<div class='panel-body'>
								<form name='login' action='/login' method='post'>
						<div class='form-group'>
								<label>Username</label>
								<input type='text' name='username' placeholder='username' class='form-control input-xs bounceIn animation-delay2' >
						</div>
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
						<div class='form-group'>
								<label>Password</label>
								<input type='password' name='password' placeholder='password' class='form-control input-sm bounceIn animation-delay4'>
						</div>

		
							<div class='seperator'></div>
						<div class='form-group'>

						</div>

						<hr/>
           							 <input class='btn btn-default' type='reset' value='Cancel'/>
						  			<input class='btn btn-danger' type=submit value=Login><p> 
							</form>
				</div>

		</div> 
	 </div>
</div> 
  </div>

	 <div class='col-sm-6 col-xs-12'>

	 </div>
            <!-- /.row -->

</div>

</div>

</div>
</body>
</html>
      <footer>
        <h6>www.obooko.com | This Content Management System must be used only by authorised administrators appointed by obooko</h6>
      </footer>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('/cms/authmain', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>