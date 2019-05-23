<?php $__env->startSection('content'); ?>
<h3>Obooko - Users Listing- <b>Update User </b></h3> 
 		 <hr size=1><br>
<?php if(isset($success)): ?>
<div class="alert alert-success">
  <strong>Success!</strong> <?php echo e($success); ?>

</div>
<?php endif; ?>
<?php if(Session::has('error')): ?>
<div class="alert alert-danger">
  <strong>Error!</strong><?php echo e(Session::get('error')); ?>

</div>
<?php endif; ?>
	 <?php if(isset($error)): ?>
<div class="alert alert-danger">
  <strong>Error!</strong><?php echo e($error); ?>

</div>
<?php endif; ?>
 		 <form method=post action='/edit_users'>
 		 <div class=row>
 		 <div class=col-sm-6>
 		 <p><b>User Name</b><br><textarea class='form-control' rows=1 name='user_name' value="<?php echo e(old('user_name')); ?>"><?php echo e($user->username); ?></textarea></div>
 		 <div class=col-sm-6><b>Gender</b><br><select class='form-control' name="usr_gender" value="<?php echo e(old('usr_gender')); ?>">
            	<option <?php echo e(($user->gender == 'M') ? 'selected' : ''); ?> value="M">Male	</option>
            	<option <?php echo e(($user->gender == 'F') ? 'selected' : ''); ?> value="F">Female</option>
            	
            </select></div></div>
             <div class=row>
            	 <div class=col-sm-6>
 		 <p><b>First Name</b><br><textarea class='form-control' rows=1 name='first_name' value="<?php echo e(old('first_name')); ?>"><?php echo e($user->first_name); ?></textarea></div>
 		 <div class=col-sm-6><b>Last Name</b><br>
 		 <textarea class='form-control' rows=1 name='last_name' value="<?php echo e(old('last_name')); ?>"><?php echo e($user->last_name); ?></textarea>
 		 </div></div>
 		  <div class=row>
 		  <div class=col-sm-4>
 		 <b>Books Downloaded</b><textarea class='form-control' rows=1 name='b_d' value="<?php echo e(old('b_d')); ?>"><?php echo e($user->books_downloaded); ?></textarea></div>
 		 <div class=col-sm-4><b>books Uploaded</b><br>
 		 <textarea class='form-control' rows=1 name='b_u' value="<?php echo e(old('b_u')); ?>"><?php echo e($user->books_uploaded); ?></textarea>
 		 </div>
 <div class="col-sm-4"><b>User group</b><br>
 		 <select class='form-control' name="usr_grp" value="<?php echo e(old('usr_grp')); ?>">
            	<option <?php echo e(($user->type == "free") ? 'selected'  : ' '); ?> value='free'>Free User</option>
            	<option <?php echo e(($user->type == "author") ? 'selected' : ' '); ?>  value="author">Author</option>
            </select>
 		 </div>
 		 </div>
<p></p>
<div class="row">
<div class="col-sm-4">
<b>User group</b><br>
 		 <select class='form-control' name="usr_paidtype" value="<?php echo e(old('usr_paidtype')); ?>">

            	<option <?php echo e(($user->paid_type == "1") ? 'selected'  : ' '); ?> value="1">paid</option>
            	<option <?php echo e(($user->paid_type == "0") ? 'selected'  : ' '); ?>  value="0">Non-paid</option>
            </select>

</div>
<div class="col-sm-4">
<b>Country</b><br>
 		 <input class="form-control" name="usr_country" type="text"/ value="<?php echo e(isset($user->country) ? $user->country : ''); ?>">
</div>
<div class="col-sm-4">
<b>Registered</b><br>
 		<input class="form-control" name="usr_created" type="text"/ value="<?php echo e(isset($user->created_at) ? $user->created_at : ''); ?>">

</div>
</div>
<p></p>
 		 <p><b>Email</b><br><input class='form-control' rows=1 name='email' value='<?php echo e(isset($user->email) ? $user->email : ''); ?>'>  
 		 <p><hr size=1><b>Update Password:</b>(optional)<br><br>
 		 <b>Password</b><br><input class='form-control' rows=1 value="<?php echo e(isset($user->password) ? $user->password : ''); ?>" name='password' placeholder='******'>
 		 <hr size=1>
 		 <input type='hidden' name='id' value='<?php echo e($user->user_id); ?>'>
 		  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
 		 <input class='btn btn-danger' type=submit value=Update></form>		</div>
	</div>   
</div>
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>