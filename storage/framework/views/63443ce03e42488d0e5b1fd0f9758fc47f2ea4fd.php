<?php $__env->startSection('content'); ?>
<h3>Obooko - Admin Users Listing- <b>Update User </b></h3> 
 		 <hr size=1><br>
<?php if(isset($success)): ?>
<div class="alert alert-success">
  <strong>Success!</strong> <?php echo e($success); ?>

</div>
<?php endif; ?>
	 <?php if(isset($error)): ?>
<div class="alert alert-danger">
  <strong>Error!</strong><?php echo e($error); ?>

</div>
<?php endif; ?>
 		 <form method=post action='/edit_adminusers'>
 		 <div class=row>
 		 <div class=col-sm-6>
 		 <p><b>User Name</b><br><textarea class='form-control' rows=1 name='user_name'><?php echo e($user->username); ?></textarea></div>
 		 <div class=col-sm-6><b>Display Name</b><br><textarea class='form-control' rows=1 name='display_name'><?php echo e($user->displayname); ?></textarea></div>
 		 </div>
 		 <p><b>Email</b><br><input class='form-control' rows=1 name='email' value='<?php echo e($user->email); ?>'>  
 		 <p><hr size=1><b>Update Password:</b>(optional)<br><br>
 		 <b>Password</b><br><input class='form-control' rows=1 name='password' placeholder='******'>
 		 <p><b>Re-Enter Password</b><br><input class='form-control' rows=1 name='cpassword' placeholder='******'><p><hr size=1>
 		 <input type='hidden' name='id' value='<?php echo e($user->id); ?>'>
 		  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
 		 <input class='btn btn-danger' type=submit value=Update></form>		</div>
	</div>   
</div>
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>