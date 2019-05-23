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
	<div class="banner"><img src="<?php echo e(asset('/public')); ?>/images/SEND-US-A-MESSAGE.png" alt="Banner"></div>
    <h1 class="header__tag">contact obooko and we’ll get back to you as soon as we can</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>Access to this website and every title in our free ebook categories is gratis. You may Download as many books as you wish 			with the compliments of our wonderful authors.</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;"> <?php echo $advertt->a; ?></div>
    </div>
    
    <section class="mttop17">
<?php echo $__env->make('shared.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>      
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
    	<div class="col-sm-4 col-lg-3 section3">
        	<div class="block dn">
       	    	<img src="<?php echo e(asset('/public')); ?>/images/read-rate.jpg" alt="read-rate"> 
            </div>
	<div class="block dn" style="margin-top:5px;">
       	    	<div><?php echo $Advert->b; ?></div> 
            </div>
            <div class="block dn" style="margin-top:5px;">
       	    	<img src="<?php echo e(asset('/public')); ?>/images/legal-downloads.jpg" alt="legal-download"> 
            </div>
		<div class="block dn" style="margin-top:5px;">
       	    	<div><?php echo $Advert->b; ?></div> 
            </div>
      </div> 
        
        <div class="col-sm-12 col-md-8 col-lg-8 msg">
        <h2>Get in touch with obooko</h2>
        <p>If you have a technical problem and need an answer fast, try the <a href="#">FAQ</a> section first to see if a solution is listed. We will respond to your message as quickly as we can but, because of time-zone differences, please allow up to 12 hours (sometimes longer at weekends) for us to get back to you.  Alternatively, send an email message to: <br>
        
<a href="#"><img src="<?php echo e(asset('/public')); ?>/images/email.png" alt="email" class="mttop10"></a></p>
        
        
        
        	<form name="form" action="contact-us" method="post" class="form mttop32">
	<?php if(isset($Error)): ?>
          <p style="color:red"><?php echo e(isset($Error) ? $Error : ''); ?></p>
	<?php endif; ?>
                <div class="row">
                <div class="col-sm-2 col-md-3"><label>Subject:</label></div>
                <div class="col-sm-10 col-md-9">
                    <select name="subject" class="fourty" value="<?php echo e(old('subject')); ?>">
                          <option value="General enquiry">General enquiry</option>
                          <option value="Technical problem">Technical issue</option>
                          <option value="Author enquiry">Author enquiry</option>
                          <option value="Suggestions and Feedback">Suggestions and Feedback</option>
                    </select>
                </div>
              	
                <div class="col-sm-2 col-md-3"><label>First Name:</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="name" id="Name" value="<?php echo e(old('name')); ?>" class="fourty" required></div>
                
                <div class="col-sm-2 col-md-3"><label>Email Address:</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="email" id="email" value="<?php echo e(old('email')); ?>" class="fiftyper" required></div>
                
                <div class="col-sm-2 col-md-3"><label>Confirm Email</label></div>
                <div class="col-sm-10 col-md-9"><input type="text" name="c_email" id="c_email" value="<?php echo e(old('c_email')); ?>" class="fiftyper" required></div>
                
       		  <div class="col-sm-2 col-md-3"><label>Message:</label></div>
              <div class="col-sm-10 col-md-9"><textarea name="message" cols="5" rows="8" value="<?php echo e(old('message')); ?>" required></textarea></div>
                
                <div class="clearfix"></div>
               <p class="m-left"><span class="orenge">Have you checked the</span> <a href="#"><u>FAQ</u></a> <span class="orenge">section?</span> You may find your answer there.</p>
                
              <span>&nbsp;&nbsp;&nbsp;&nbsp;Please enter the code below:</span>
              <div class="mttop25">
              
              <div class="clearfix"></div>
                  <div class="col-sm-2 col-md-3"><label><?php echo captcha_img(); ?></label></div>
                  <div class="col-sm-5 col-md-4"><input type="text" name="captcha" id="captcha" required></div>
              </div> 
              <?php echo csrf_field(); ?>

		<div class="col-sm-12">
                <input type="submit" name="submit" id="submit" value="Submit Form" class="mttop32">
		</div>

             </div>
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
