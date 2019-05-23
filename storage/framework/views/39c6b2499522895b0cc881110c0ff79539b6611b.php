<?php $__env->startSection('content'); ?>

<h3>Obooko - Blog Editor - <b>Manage Blog Content</b></h3> 
  <hr size=1>
   <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
 <div class="row">
 <div class="col-sm-9 col-xs-12">
 <h5>List of Blog Content Ordered By Date Added</b></h5> 
  <hr size=1>
  
  <div class="row">
<div class="col-sm-1"><span style="font-size:12px;"><b>#</b></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><b>Added</b></span></div>    
<div class="col-sm-7"><span style="font-size:12px;"><b>Content Title</b></span></div>
<div class="col-sm-1"><span style="font-size:12px;"><b>Edit</b></span></div>
<div class="col-sm-1"><span style="font-size:12px;"><b>Del</b></span></div>
</div>
<?php $num_rows=0;?>
<?php foreach($blogs as $blog): ?>
<?php $num_rows=$num_rows+1;?>
<div class="row">
<div class="col-sm-1"><span style="font-size:16px;line-height:1px;"><?php echo $num_rows; ?></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><?php echo e(date('m-d-Y', strtotime($blog->date))); ?></span></div>
<div class="col-sm-7"><span style="font-size:16px;"><i style="color:#91C000;" class="fa fa-pencil"></i>&nbsp;&nbsp;<b><a href="edit_blog?id=<?php echo e($blog->post_id); ?>"><?php echo e($blog->title); ?></b></a></span></div>
<div class="col-sm-1"><span style="font-size:16px;"><a href="edit_blog?id=<?php echo e($blog->post_id); ?>"><i style="color:#1C5192" class="fa fa-file"></i>
</a></span></div>
<div class="col-sm-1"><span style="font-size:16px;"><a href="delete_blog?id=<?php echo e($blog->post_id); ?>"><i style="color:#ff4040;" class="fa fa-times"></i>
</a></span></div>
</div>

<?php endforeach; ?>

 </div>
 
 


 
  <div class="col-sm-3">
 <h5>Create New Blog Content</b></h5> 
  <hr size=1>
<form method=post action='/add_blog'>
Blog Content Title<br><textarea class='form-control' rows=1 name='title'></textarea><p>
<input type="hidden" name="status" value="A">
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
 <br>
<input type='submit' class='btn btn-danger' value='Add New Content'></form>  
  </div>

 
 </div>


 

</div>

</div>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>