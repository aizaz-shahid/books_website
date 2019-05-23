 
<?php $__env->startSection('content'); ?>
  <h3>Obooko - Blog Editor - <b>General Content</b></h3> 
  <hr size=1>
  <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>

<br><form method=post action='/blogmain_post'>

<div class='row'><div class=col-sm-4><b>Page Title</b><br><textarea class='form-control' rows=5 name='pgt'><?php echo e($mainpage->title); ?></textarea></div>

<div class=col-sm-4><b>Meta Description</b><br><textarea class='form-control' rows=5 name='mtdesc'><?php echo e($mainpage->m_description); ?></textarea></div>
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div class=col-sm-4><b>Meta Keywords</b><br><textarea class='form-control' rows=5 name='mtkeyw'><?php echo e($mainpage->m_keywords); ?></textarea></div></div><br><br>

<b>Top Header Image</b> - 
<?php echo e($mainpage->h_image); ?>

<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/<?php echo e($mainpage->h_image); ?>'></div>
<div class='col-sm-6 col-xs-12'

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<b>Change The Image</b><br>Find the image that will be used using the dropdown menu below. Remember to first upload it into the 
system using the IMAGE UPLOADER TOOL.<p>Select The Image To Use<br><select class="form-control" name="itm1">

<option selected>
<?php echo e($mainpage->h_image); ?>

</option>
<?php
foreach($images as $image)
{
     echo '<option>' . basename($image) . '</option>';
}
?>
</select><p></div></div>


<p><b>Top Header Text</b><br><textarea class='form-control' rows=1 name='itm2'>
<?php echo e($mainpage->h_text); ?>

</textarea><p>

<p><b>Top Header Left Subtext</b><br><textarea class='form-control' rows=3 name='itm3'>
<?php echo e($mainpage->h_subtext); ?>

</textarea><p>

<br>

<b>Right Middle Image 2</b> - 
<?php echo e($mainpage->img1); ?>

<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/<?php echo e($mainpage->img1); ?>'>
</div><div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<b>Change The Image</b><br>Find the image that will be used using the dropdown menu below. Remember to first upload it into the 
system using the IMAGE UPLOADER TOOL.<p>Select The Image To Use<br><select class="form-control" name="itm4">

<option selected>
<?php echo e($mainpage->img1); ?>

</option>
<?php
foreach($images as $image)
{
     echo '<option>' . basename($image) . '</option>';
}
?>
</select><p></div></div><br><br>

 <b>Right Middle Image 2</b> - 
<?php echo e($mainpage->img2); ?>

<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/<?php echo e($mainpage->img2); ?>'></div>
<div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<b>Change The Image</b><br>Find the image that will be used using the dropdown menu below. Remember to first upload it into the 
system using the IMAGE UPLOADER TOOL.<p>Select The Image To Use<br><select class="form-control" name="itm5">

<option selected>
<?php echo e($mainpage->img2); ?>

</option>
<?php 
foreach($images as $image)
{
   echo '<option>' . basename($image) . '</option>';
}
?>
</select><p></div></div>

<input type=submit value=Update></form>


</div>

</div>   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>