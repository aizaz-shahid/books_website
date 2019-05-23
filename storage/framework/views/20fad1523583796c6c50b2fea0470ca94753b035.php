<!doctype html>
<html lang="en">
<head>
    <title><?php echo e($page->title); ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="<?php echo e($page->m_description); ?>">
     <meta name="keywords" content="<?php echo e($page->m_keywords); ?>">
    <link rel="stylesheet" href="../public/css/mcss/style.css">
    <link rel="stylesheet" href="../public/css/custom.css">
    <link rel="stylesheet" href="../public/fonts/obooko-font.css"> 
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
	<div class="banner"><img src="../public/images/<?php echo e($page->h_image); ?>" alt="COPYRIGHT-BOOKS"></div>
    <h1 class="header__tag minifont"><?php echo e($page->h_text); ?></h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p><?php echo e($page->h_subtext); ?></p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;"><?php echo $advert->a; ?></div>
    </div>
    
    <section class="mttop17">
<?php echo $__env->make('shared.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>     
    </section>
</header>	

<section class="mttop33">
    <div class="row submission">
        <div class="col-sm-7 col-md-8 col-lg-8 msg text-justify">
        <h2><?php echo e($page->c_title); ?></h2>
       
<?php echo $page->c_text; ?>

     
        </div>
        
        <div class="col-sm-5 col-md-4 col-lg-3 section3">
            <span style="font-size: 18px;">Share with friends ...</span>
            <section class="xs-center mttop10">
            <ul class="social-buttons xs-center">
           <li><a  target="_blank"  href="<?php echo $social->facebook; ?>"  class="sprite sprite--social-buttons__facebook"></a><br></li>
              <li><a  target="_blank"  href="<?php echo $social->twitter; ?>"  class="sprite sprite--social-buttons__twitter"></a><br></li>
              <li><a  target="_blank"  href="<?php echo $social->stumbled_uopn; ?>"  class="sprite sprite--social-buttons__"></a><br></li>
              <li><a  target="_blank"  href="<?php echo $social->linkedin; ?>"  class="sprite sprite--social-buttons__linkedin"></a><br></li>
              <li><a  target="_blank"  href="<?php echo $social->pinterest; ?>"  class="sprite sprite--social-buttons__pinterest"></a><br></li>
              <li><a  target="_blank"  href="<?php echo $social->googleplus; ?>"  class="sprite sprite--social-buttons__google"></a><br></li>

            </ul>
            <div>       
            <div><?php echo $advertt->b; ?></div>
            </section>
            
            
            
          <!--<div class="block mttop33">
       	  	<?php echo $advert->b17; ?>          </div>-->
            <div class="block dn mttop33">
       	    	<img src="../public/images/read-rate.jpg" alt="read-rate">
            </div>
            <div class="mttop33"><?php echo $advert->a; ?></div>
            <div class="block dn mttop33">
       	    	<img src="../public/images/legal-downloads.jpg" alt="read-rate">
            </div>
            
        </div> 
        
    </div>
</section>

<footer>
<p class="xs-center"><?php echo e($footer->general_text); ?></p>
<?php echo $footer->analytic_code; ?>

<?php echo $footer->cookie_code; ?>

</footer>


</div>


<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/bootstrap.js"></script>
<script src="../public/js/app.js"></script>
<script>
<?php if(isset($success)): ?>
$(documents).ready(function() {
$('#myModal').modal('show');
});
<?php endif; ?>
</script>
</body>
</html>
