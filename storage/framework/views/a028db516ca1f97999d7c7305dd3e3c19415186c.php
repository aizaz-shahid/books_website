  
<?php $__env->startSection('content'); ?>
<h3>Obooko - Admin Email - <b>		Update Admin Email Address</b></h3> 
 		 <hr size=1><br><form method=post action='/manage_adminpost'><br><b>Update Email Address</b><br><br><input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><input class='form-control' rows=1 name='email' value='<?php echo e($email->admin_email); ?>'><br><br><input class='btn btn-danger' type=submit value=Update></form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>