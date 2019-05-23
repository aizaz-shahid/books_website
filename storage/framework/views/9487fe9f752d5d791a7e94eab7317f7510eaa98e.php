<?php $__env->startSection('content'); ?>
 <h3>Obooko - Single Pages Editor - <b style='text-transform: capitalize;'></b></h3> 
  <hr size=1>

<?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<br><form id="pageform" method=post action='/edit_spage'>

<div class='row'><div class=col-sm-4><b>Page Title</b><br><textarea class='form-control' rows=5 name='pgt'><?php echo e($newpage->title); ?></textarea></div>
 
 <input type="hidden" name="id" value='<?php echo $_GET['id']; ?>'>
<div class=col-sm-4><b>Meta Description</b><br><textarea class='form-control' rows=5 name='mtdesc'><?php echo e($newpage->m_description); ?></textarea></div>
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<div class=col-sm-4><b>Meta Keywords</b><br><textarea class='form-control' rows=5 name='mtkeyw'><?php echo e($newpage->m_keywords); ?></textarea></div></div><br><br>

<b>Top Header Image</b> - 

<br><div class='row'><div class='col-sm-6 col-xs-12'><img class='img-responsive' src='/public/images/<?php echo e($newpage->h_image); ?>'></div>
<div class='col-sm-6 col-xs-12'>

<?php $images = glob("images/*.{jpg,gif,png}", GLOB_BRACE);?>

<b>Change The Image</b><br>Find the image that will be used using the dropdown menu below. Remember to first upload it into the 
system using the IMAGE UPLOADER TOOL.<p>Select The Image To Use<br><select class="form-control" name="itm1">

<option selected>

<?php echo e($newpage->h_image); ?>

</option>
<?php
foreach($images as $image)
{
    echo '<option>' . basename($image) . '</option>';
}
?>
</select><p></div></div>
<p><b>Top Header Text</b><br><input type="text" class='form-control' value="<?php echo e($newpage->h_text); ?>" name='itm2'></textarea><p>
<?php if($newpage->slug != "" || $newpage->slug != " "): ?>
 <p>
             <b>Page Url</b><br><input type=text" class="form-control" disabled name="slug_url" value="<?php echo e(asset('')); ?>page/<?php echo e($newpage->slug); ?>">
     </p>
<?php endif; ?>
       <p>
             <b>Page Slug</b><br><input type=text" class="form-control" name="slug" value="<?php echo e($newpage->slug); ?>">
     </p>
 
<p><b>Top Header Left Subtext</b><br><textarea class='form-control' rows=3 name='itm3'><?php echo e($newpage->h_subtext); ?></textarea><p>

 </textarea><p>


<p><b>Content Title</b><br><textarea class='form-control' rows=1 name='itm5'><?php echo e($newpage->c_title); ?></textarea><p>

<p><b>The Content</b><br><textarea class='form-control ckeditor' rows=12 name='itm6'><?php echo e($newpage->c_text); ?></textarea>

<hr size=1>
<input class="btn" type=submit value='Update'> <a class="btn btn-primary" href="/deletepage?id=<?php echo $_GET['id']; ?>">Delete</a>

<br><br><br>

</div>

</div>   
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>