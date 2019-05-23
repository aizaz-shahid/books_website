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
<script type="text/javascript" src="http://www.obooko.com/free-ebooks/js/rating_update.js"></script>
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

<body onload="Already()">
<div class="container">
<header>
	<div class="banner"><img src="public/images/download-ebook.png" alt="COPYRIGHT-BOOKS"></div>
    <h1 class="header__tag minifont">download and read this free ebook in your choosen format</h1>
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
        <div class="col-sm-7 col-md-8 col-lg-8 msg text-justify">
        <h2>Download Your Free E-Book to Your Computer or Mobile Device</h2>
       
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis lobortis dolor, eu posuere velit. Aenean rutrum turpis suscipit, tincidunt enim eget, blandit nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec mauris id odio faucibus luctus. Interdum et malesuada fames ac ante ipsum primis in faucibus. In pellentesque consectetur neque, sed porttitor urna. Integer pharetra orci nibh, nec dapibus erat pharetra et. Donec quis volutpat mi. Pellentesque bibendum consectetur ipsum a vehicula. Cras mattis purus metus.
Sed sollicitudin ornare lectus ac feugiat. Morbi aliquet scelerisque sapien, sed vehicula neque facilisis non. Ut et commodo tortor. Praesent viverra libero metus, dictum consequat orci faucibus et.</p>      <div class="col-md-6" style="margin-bottom:25px";> 
<?php echo $advertt->b; ?></div>

        
  <div  class="row">
        	<div  class="col-md-6 col-lg-3">
			<div  class="width290"><p>
            Title: <span><?php echo e($result->title); ?></span><br>
            Author: <span><?php echo e($result->author_name); ?></span> <br>
            File Type: <span><?php echo e($format); ?></span> <br>
        </p>
            <div  class="bookheading">DOWNLOAD YOUR FREE EBOOK</div>
            	<div  class="freebook" style="border: 2px solid;border-color: #ff6600">
                    <div  class="row">
                    	 <div  class="col-sm-6 ">

				<form name="download_form" id="download_form" action="<?php echo e(asset('')); ?>/download-book" method="post">
				<input type="hidden" name="id" value="<?php echo e($bookId); ?>">
				<input type="hidden" name="format" value="<?php echo e($format); ?>">
                        	<div style="margin-bottom: 16px; text-align: center ! important; width: 261px;">Don't Forget to Award a Star Rating       	<input class="mttop32" value="Download Your Free EBook" id="submit" name="submit" style="margin-top: 10px;" type="submit"></div>
				<?php echo csrf_field(); ?>

                        	</form>
                        </div>
                    </div>
                </div>
             </div>   
                
            </div> 
        </div>

        
  
      
      <p><strong>PDF Books</strong><br>Nam vel neque turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque faucibus est sit amet ligula vehicula pellentesque. Aenean aliquam imperdiet enim, sit amet condimentum erat convallis sagittis. Nulla lacus neque, ornare id felis eu, porta pulvinar enim. Sed sed erat at lectus facilisis laoreet. Sed vulputate facilisis dapibus. Proin molestie laoreet felis ut blandit. In turpis ex, convallis ut justo vel, porttitor venenatis felis. Fusce tincidunt felis non enim fringilla consequat. Fusce euismod orci neque, eu viverra justo interdum id. Quisque enim ante, accumsan id elit vel, ornare posuere lectus. Curabitur ac ligula ultrices, venenatis ex vitae, interdum neque. Nunc eget est eget justo fringilla faucibus in eu metus.</p>
      
      <p><strong>E-Pub Books</strong><br>Maecenas mattis vel tortor id pulvinar. Nunc nec turpis tincidunt, imperdiet metus vitae, convallis eros. Vivamus faucibus ac tortor egestas posuere. Mauris eget risus luctus, sollicitudin magna vel, scelerisque neque. Aenean ut nulla libero. Nunc enim tellus, dignissim ac tempus ac, laoreet mattis quam. Aenean mollis felis enim, semper vulputate tellus congue sit amet. Mauris pharetra accumsan neque at vehicula. In aliquam purus scelerisque nisi accumsan, eget tempor tortor interdum. Duis vel imperdiet nunc. Vivamus nec vestibulum erat. Maecenas ornare porttitor tortor, ut venenatis lorem tempus a. Phasellus suscipit sollicitudin molestie. In sollicitudin nunc pellentesque, placerat ipsum nec, tristique leo.</p>
      
      <p><strong>Kindie Books</strong><br>Pellentesque ornare mauris at blandit consectetur. Quisque fermentum nunc turpis, aliquet facilisis justo egestas sed. Sed et mi porttitor, placerat erat quis, tempor felis. Vestibulum odio risus, gravida in elit ac, tristique bibendum dui. Ut id faucibus lectus. Morbi condimentum feugiat tellus, sit amet dignissim magna dapibus et. Nulla eu interdum ligula, ut pharetra sem. Donec posuere massa sed ex lacinia, non laoreet libero euismod. Ut elementum dictum sapien ac tincidunt. Vestibulum ornare accumsan tempus. Maecenas fermentum, urna vitae accumsan tincidunt, eros lacus vulputate nisi, eu blandit justo nisi a nulla. Integer commodo quam ac diam malesuada, non ornare orci ultricies. In sollicitudin diam mauris, a varius augue semper varius. Nunc faucibus nunc ultricies metus vulputate, pretium luctus nunc iaculis. Fusce tellus magna, tempor eu luctus quis, vestibulum et elit.</p>
      
     
        </div>
        
        <div class="col-sm-5 col-md-4 col-lg-3 section3">
            
            <section class="xs-center mttop10">
            
            <div style="height:600px;width:300px"><?php echo $advertt->b; ?></div>
            </section>
            
            <div class="block mttop33">
       	    	<img src="public/images/read-rate.jpg" alt="read-rate"> 
            </div>
            
          <div class="block mttop33">
       	  	<img src="public/images/legal-downloads.jpg" alt="legal-downloads"> 
          </div>
            
            
        </div> 
        
    </div>
</section>

<!--<footer>
<p class="xs-center">obooko is a Registered Trade Mark.&nbsp;&nbsp; &nbsp;  Website Copyright © obooko 2014.  Synopses, descriptions, images and files provided by authors and publishers are protected by individual Copyright.</p>
</footer>-->
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
function Already() {
	var exist= <?php echo e(isset($already) ? $already : 'undefined'); ?>;

	if(exist == 1){
    		alert("Reminder: You have already downloaded this book");
	}
}
</script>
</body>
</html>
