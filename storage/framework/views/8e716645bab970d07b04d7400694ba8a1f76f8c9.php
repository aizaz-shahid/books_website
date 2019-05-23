<?php $__env->startSection('content'); ?>
  <h3>Obooko - Main Page Editor</h3> 
  <hr size=1>

<?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<br><form method=post action='/edited_mainpage'>


<div class='row'><div class=col-sm-4><b>Page Title</b><br><textarea class='form-control' rows=3 name='pgt'><?php echo e($mainpage->title); ?></textarea></div>

<div class=col-sm-4><b>Meta Description</b><br><textarea class='form-control' rows=3 name='mtdesc'><?php echo e($mainpage->m_description); ?></textarea></div>

<div class=col-sm-4><b>Meta Keywords</b><br><textarea class='form-control' rows=3 name='mtkeyw'><?php echo e($mainpage->m_keywords); ?></textarea></div></div><br><br>



<b>Top Header Image</b> - 
<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/<?php echo e($mainpage->h_image); ?>'>
</div><div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<h5><b>Change The Image</b>
<br>Find the image that will be used using the dropdown menu below.
<br>Remember to first upload it into the system using the IMAGE UPLOADER tool.</h5>
<h4>Select The Image To Use</h4><select class="form-control" name="itm1">

<option selected>
<?php echo e($mainpage->h_image); ?>



</option>
<?php
foreach($images as $image)
{
   echo '<option>' . basename($image) . '</option>';
}
?>
</select><p><br>
<b>Image Alt</b>
<input type="text" class="form-control" name="h_alt" value="<?php echo e($mainpage->h_alt); ?>" />

</div></div>
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

<p><b>Top Header Text</b><br><textarea class='form-control' rows=1 name='itm2'><?php echo e($mainpage->h_text); ?></textarea><p>

<p><b>Top Header Left Subtext</b><br><textarea class='form-control' rows=2 name='itm3'><?php echo e($mainpage->h_subtext); ?></textarea><p>


<p><b>Top Header Right Adsense Code</b><br><textarea class='form-control' rows=9 name='itm4'><?php echo e($mainpage->h_advert); ?></textarea><p>


<b>Middle Writeup 1 Image</b> - 
<?php echo e($mainpage->m1_image); ?>

<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/<?php echo e($mainpage->m1_image); ?>'>
</div><div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<h5><b>Change The Image</b>
<br>Find the image that will be used using the dropdown menu below.
<br>Remember to first upload it into the system using the IMAGE UPLOADER tool.</h5>
<h4>Select The Image To Use</h4><select class="form-control" name="itm5">

<option selected>
<?php echo e($mainpage->m1_image); ?>


</option>
<?php
foreach($images as $image)
{
     echo '<option>' . basename($image) . '</option>';
}
?>
</select><p><br>
<b>Image Alt</b>
<input type="text" class="form-control" name="m1_alt" value="<?php echo e($mainpage->m1_alt); ?>" />
</div></div>

<p><b>Middle Writeup 1 Title</b><br><textarea class='form-control' rows=1 name='itm6'><?php echo e($mainpage->m1_title); ?></textarea><p>

<p><b>Middle Writeup 1 Text</b><br><textarea class='ckeditor form-control' rows=3 name='itm7'><?php echo e($mainpage->m1_text); ?></textarea><p><hr size=1>

<b>Middle Writeup 2 Image</b> - 

<?php echo e($mainpage->m2_image); ?>


<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/<?php echo e($mainpage->m2_image); ?>'></div>
<div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<h5><b>Change The Image</b>
<br>Find the image that will be used using the dropdown menu below.
<br>Remember to first upload it into the system using the IMAGE UPLOADER tool.</h5>
<h4>Select The Image To Use</h4><select class="form-control" name="itm8">

<option selected>
<?php echo e($mainpage->m2_image); ?>


</option>
<?php
foreach($images as $image)
{
     echo '<option>' . basename($image) . '</option>';
}
?>
</select><p><br>
<b>Image Alt</b>
<input type="text" class="form-control" name="m2_alt" value="<?php echo e($mainpage->m2_alt); ?>" />
</div></div>

<b>Middle Writeup 2 Title</b><br><textarea class='form-control' rows=1 name='itm9'>
<?php echo e($mainpage->m2_title); ?>

</textarea><p>

<p><b>Middle Writeup 2 Text</b><br><textarea class='ckeditor form-control' rows=3 name='itm10'>
<?php echo e($mainpage->m2_text); ?>

</textarea><p>

<p><b>Bottom Right Adsense Code</b><br><textarea class='form-control' rows=9 name='itm12'>
<?php echo $mainpage->b_advert; ?>

</textarea><p><br><br>

<input class='btn btn-danger' type=submit value=Update></form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>