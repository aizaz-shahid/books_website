﻿<!doctype html>
<html lang="en">
<head>
    <title>Change Password</title>
    <meta charset="utf-8" />
    <meta name="robots" content="noindex, follow"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo e(asset('/public/css/mcss/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/public/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/public/fonts/obooko-font.css')); ?>">   
</head>

<body>
<div class="container">
<header>
	<div class="banner"><img src="<?php echo e(asset('/public')); ?>/images/AUTHOR-ACCOUNT.png" alt="AUTHOR-ACCOUNT"></div>
    <h1 class="header__tag minifont">manage your free publishing account and view download figures</h1>
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
           		<li><a href="my-account">Author Account Home</a></li>
                <li><a href="author-download-figures">View Download Figures</a></li>
                <li><a href="author-submit-submission">Submit Another Book</a></li>
                <li><a href="author-updates">Revisions and Updates</a></li>
                <li class="active"><a href="author-change-password">Change Password</a></li>
                <li><a href="author-change-email">Change Email Address</a></li>
                <li><a href="Logout">Log out</a></li>
           </ul>  
          
            
      	</div> 
        
        <div class="col-sm-7 col-md-8 col-lg-8">
      
        <h2>Change Your Password</h2>
        
        <p>Use this form to change your password whenever you wish. You will receive a confirmation message via email.
</p>
        
        <form name="form" action="change-password" method="post" class="form mttop32">
<?php if(isset($Error)): ?>
        <p style="color: red"><?php echo e($Error); ?></p>
<?php endif; ?>
           <div class="row">
           		<div class="col-sm-10">
                <label>Enter new password <span class="orenge">*</span></label>
                <input style="margin-top:10px;" type="text" name="n_password" id="n_password" class="width100">
                </div>
                
                <div class="col-sm-10">
                <label>Re-enter new password <span class="orenge">*</span></label>
                <input style="margin-top:10px;" type="text" name="r_password" id="r_password" class="width100">
                </div>
           </div>    
                
                <input type="submit" name="submit" id="submit" value="Save Password" class="mttop32">
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
    alert("Password has been updated");
<?php endif; ?>
});
</script>
</body>
</html>
