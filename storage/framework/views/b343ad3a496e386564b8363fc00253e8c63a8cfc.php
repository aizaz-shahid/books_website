

<?php $__env->startSection('content'); ?>
 
<h3>Obooko - Book/Catalogue Editor - <b>Manage Categories</b></h3> 
  <hr size=1>
<?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
 <div class="row">
 <div class="col-sm-4 col-xs-12">
 <h5>Category List - Fiction</b></h5> 
  <hr size=1>
    
  <div class="row">

<div class="col-sm-8"><span style="font-size:12px;"><b>Category Name</b></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><b>Edit</b></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><b>Del</b></span></div>
</div>
 <?php foreach($catF as $catF): ?>
<div class="row">
<div class="col-sm-8"><span style="font-size:12px;"><a href="edit_category?id=<?php echo e($catF->id); ?>"><?php echo e($catF->name); ?></a></span></div>
<div class="col-sm-2"><span style="font-size:16px;"><a href="edit_category?id=<?php echo e($catF->id); ?>"><i style="color:#1C5192" class="fa fa-file"></i>
</a></span></div>
<div class="col-sm-2"><span style="font-size:16px;"><a href="delete_category?id=<?php echo e($catF->id); ?>"><i style="color:#ff4040;" class="fa fa-times"></i>
</a></span></div>
</div>
<?php endforeach; ?>
 
 </div>
 
 
  <div class="col-sm-4 col-xs-12">
 <h5>Category List - NonFiction</b></h5> 
  <hr size=1>
  
  <div class="row">
<div class="col-sm-8"><span style="font-size:12px;"><b>Category Name</b></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><b>Edit</b></span></div>
<div class="col-sm-2"><span style="font-size:12px;"><b>Del</b></span></div>
</div>
 <?php foreach($catN as $catn): ?>


<div class="row">
<div class="col-sm-8"><span style="font-size:12px;"><a href="edit_category?id=<?php echo e($catn->id); ?>"><?php echo e($catn->name); ?></a></span></div>
<div class="col-sm-2"><span style="font-size:16px;"><a href="edit_category?id=<?php echo e($catn->id); ?>?>"><i style="color:#1C5192" class="fa fa-file"></i>
</a></span></div>
<div class="col-sm-2"><span style="font-size:16px;"><a href="delete_category?id=<?php echo e($catn->id); ?>"><i style="color:#ff4040;" class="fa fa-times"></i>
</a></span></div>
</div>


<?php endforeach; ?>
 
 </div>
 

 
  <div class="col-sm-4">
 <h5>Create New Category</b></h5> 
  <hr size=1>
<form method=post action='add_category'>
Name of Category<br><textarea class='form-control' rows=1 name='catname'></textarea><p>
Category Type<br>
<select class='form-control' name="cattype">
<option value="">choose type</option>
<option value="F">Fiction</option>
<option value="NF">Non-Fiction</option>
</select>
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
 <br>
<input type='submit' class='btn btn-danger' value='Add New Category'></form>  
  </div>

 
 </div>


 

</div>

</div>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>