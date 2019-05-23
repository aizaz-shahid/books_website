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
	<div class="banner"><img src="<?php echo e(asset('/public')); ?>/images/RECOVER-PASSWORD.png" alt="Banner"></div>
    <h1 class="header__tag">life is hard enough without having to remember passwords!</h1>
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
        	<div>
       	    	<img src="public/images/read-rate.jpg" alt="Read and Rate">
                <br>
<br>
 
            </div>
            
      </div> 
        
        <div class="col-sm-7 col-md-8 col-lg-8 msg">
        <h2>Recover your password here</h2>
        <p>If you have lost or cannot remember your password,  please enter your username or email address in the box below.You will receive a link to create a new password via email.</p>
       
        
        	<form name="form" action="send-password" method="post" class="form mttop32">
		<?php if(isset($Error)): ?>
                <p style="color: red"><?php echo e(isset($Error) ? $Error : ''); ?></p>
		<?php endif; ?>
                <span>Enter your username or email address:</span>
                <input type="text" name="recover_p" id="recover_p" class="mttop10">
                
                <div class="clearfix"></div>
                <input type="submit" name="submit" id="submit" value="Send Password" class="mttop32">
                <?php echo csrf_field(); ?>

            </form>
        </div>
        
    </div>
</section>

<footer>
<p class="xs-center"><?php echo e($footer->general_text); ?></p>
<?php echo $footer->analytic_code; ?>

<?php echo $footer->cookie_code; ?>

</footer>


</div>


<script src="<?php echo e(asset('/public')); ?>/js/jquery.min.js"></script>
<script src="<?php echo e(asset('/public')); ?>/js/bootstrap.js"></script>
<script src="<?php echo e(asset('/public')); ?>/js/app.js"></script>

</body>
</html>
