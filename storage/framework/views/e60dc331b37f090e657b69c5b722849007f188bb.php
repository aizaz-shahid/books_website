<!doctype html>
<html lang="en">
<head>
    <title>Obooko Development Site</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('/public/css/mcss/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/public/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/public/fonts/obooko-font.css')); ?>">   
</head>

<body>
<div class="container">
<header>
	<div class="banner"><img src="public/images/YOUR-ACCOUNT-PAGE.png" alt="YOUR-ACCOUNT-PAGE"></div>
    <h1 class="header__tag minifont">manage your account and pick up the latest news and offers</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>Access to this website and every title in our free ebook categories is gratis. You may Download as many books as you wish 			with the compliments of our wonderful authors.</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;"><?php echo $advertt->a; ?></div>
    </div>
    
    <section class="mttop17">
<?php echo $__env->make('shared.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>      
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
    	<div class="col-sm-5 col-md-4 col-lg-3 section3">
           <ul class="author list-unstyled">
           		<li><a href="my-account">Account Home</a></li>
                <li><a href="user-change-password">Change Password</a></li>
                <li class="active"><a href="user-change-email">Change Email Address</a></li>
                <li><a href="user-close-account">Close Account</a></li>
                <li><a href="Logout">Log out</a></li>
           </ul> 
           
          <div class="block mttop33">
   	  	  	<img src="public/images/read-rate.jpg" alt="read-rate">
          </div>
            
      	</div> 
        
        <div class="col-sm-7 col-md-8 col-lg-8">
      
        <h2>Change Your Email Address</h2>
        
        <p>Should you have a new email address or wish to use a different one, please enter it here so that we can keep in touch. Once saved, we will confirm via email. If you do not receive confirmation, please let us know.</p>
        
        <form name="form" action="change-email" method="post" class="form mttop32">
	<?php if(isset($Error)): ?>
        <p style="color: red"><?php echo e(isset($Error) ? $Error : ''); ?></p>
	<?php endif; ?>
	        
           <div class="row">
           		<div class="col-sm-10">
                <label>Enter new email address <span class="orenge">*</span></label>
                <input type="text" name="n_email" id="n-email" class="width100" style="margin-top:10px;">
                </div>
                
                <div class="col-sm-10">
                <label>Re-enter new email address <span class="orenge">*</span></label>
                <input type="text" name="r_email" id="r-email" class="width100" style="margin-top:10px;">
                </div>
           </div>    
                
                <input type="submit" name="submit" id="submit" value="Save Email Address" class="mttop32">
                <?php echo csrf_field(); ?>

            </form>
        
        	
        </div>
        
    </div>
</section>
<br>
<br>

<footer>
<p class="xs-center"><?php echo e($footer->general_text); ?></p>
<?php echo $footer->analytic_code; ?>

<?php echo $footer->cookie_code; ?>

</footer>


</div>


<script src="<?php echo e(asset('/public')); ?>/js/jquery.min.js"></script>
<script src="<?php echo e(asset('/public')); ?>/js/bootstrap.js"></script>
<script src="<?php echo e(asset('/public')); ?>/js/app.js"></script>
<script>
$(document).ready(function(){
<?php if(isset($success)): ?>
    alert("Email has been updated");
<?php endif; ?>
});
</script>
</body>
</html>
