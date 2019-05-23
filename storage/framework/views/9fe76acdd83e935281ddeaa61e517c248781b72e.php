<?php $__env->startSection('content'); ?>
<h3>Obooko - General Users Listing- <b>  New User </b></h3> 

 		 <hr size=1><br>
 		 <?php if(Session::has('error')): ?>
<div class="alert alert-danger">
  <strong>Error!</strong><?php echo e(Session::get('error')); ?>

</div>
<?php endif; ?>
<?php if(isset($success)): ?>
<div class="alert alert-success">
  <strong>Success!</strong> <?php echo e($success); ?>

</div>
<?php endif; ?>
 		 <form method=post action='/add_user'>
 		 <div class=row>
 		 
 		 <div class=col-sm-6><b>Gender</b><br>
<select class='form-control' name="gender">
            	<option selected value="M">Male</option>
            	<option  value="F">Female</option>
            	            </select><br>

</div>
<div class=col-sm-6>
 		 </div>

 		 </div><input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
 		 <div class=row>
 		<div class=col-sm-6>
 		 <p><b>Email</b><br><input class='form-control' type='email' value="<?php echo e(old('email')); ?>" rows=1 name='email' required>
 		 </div>
 		 <div class=col-sm-6>
            <p><b>User Group</b><br><select class='form-control' name="usr_grp">
            	<option selected value="free">Free User</option>
            	<option  value="author">Author</option>
            	            </select>
 		 </div>
 		</div>
<div class=row>
 		<div class=col-sm-6>
 		 <p><b>First Name</b><br><input class='form-control' type='text' value="<?php echo e(old('first_name')); ?>" rows=1 name='first_name' required>
 		 </div>
 		 <div class=col-sm-6>
            <p><b>Last Name</b><br><input class='form-control' type='text' value="<?php echo e(old('last_name')); ?>" rows=1 name='last_name' required>
 		 </div>
 		</div>     
<div class=row>
 		<div class=col-sm-6>
 		 <p><b>Country</b><br><input class='form-control' type='text' value="<?php echo e(old('country')); ?>" rows=1 name='country' required>
 		 </div>
 		 <div class=col-sm-6>
            <p><b>Paid Type</b><br>
<select class='form-control' name="usr_paidtype">
                <option  value="0">Non Paid</option>
                <option  value="1">Paid</option>
            	
            </select>

 		 </div>
 		</div> 
 		  <p><b>Password</b><br>
 		 <input class='form-control' type="text" required='required' rows=1 value="<?php echo e(old('password')); ?>" name='password' ><p><b>Re-Enter Password</b><br>
 		 <input class='form-control' type="text" required='required'  rows=1 value="<?php echo e(old('cpassword')); ?>" name='cpassword'><p><hr size=1>
 		 <input class='btn btn-danger' type=submit value='Add User'></form>

            </div>

        </div>
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>