 
<?php $__env->startSection('content'); ?>
 <h3>Obooko - Admin Users Listing - <b>Manage Users</b></h3>
                    <hr size=1>
<?php if(isset($user_del)): ?>
<div class="alert alert-success">
  <strong>Success!</strong> <?php echo e($user_del); ?>

</div>
<?php endif; ?>
                    <div class="row">
                        <div class="col-sm-8 col-xs-12 col-md-12">
                            <h5>List of All Users Sorted By Last Name</b></h5>
                            <hr size=1>
<?php echo e($users->links()); ?>

                            <div class="row">
                                <div class="col-sm-1"><span style="font-size:12px;"><b>#</b></span></div>
                                <div class="col-sm-7"><span style="font-size:12px;"><b>UserName</b></span></div>
                                <div class="col-sm-2"><span style="font-size:12px;"><b>Edit</b></span></div>
                                <div class="col-sm-2"><span style="font-size:12px;"><b>Del</b></span></div>
                            </div>
<?php $num_rows=0;?>
<?php foreach($users as $user): ?>
<?php $num_rows=$num_rows+1;?>
                                <div class="row">
                                    <div class="col-sm-1">
                                            <span style="font-size:16px;">
                                                    <?php echo $num_rows; ?>
                                            </span>
                                    </div>
                                    <div class="col-sm-7">
                                            <span style="font-size:16px;">
                                                    <i style="color:#91C000;" class="fa fa-user"></i>&nbsp;&nbsp;<b>
                                                    <a href='<?php echo e(URL::to('/edit_adminuser?id='.$user->id)); ?>'><?php echo e($user->username); ?></b>, &nbsp;
                                                     <?php echo e($user->email); ?>

                                                    </a>
                                            </span>
                                    </div>

                                    <div class="col-sm-2">
                                            <span style="font-size:16px;">
                                                    <a href='<?php echo e(URL::to('/edit_adminuser?id='.$user->id)); ?>'>
                                                        <i style="color:#1C5192" class="fa fa-file"></i>
                                                    </a>
                                            </span>
                                    </div>
 
                                    <div class="col-sm-2">
                                            <span style="font-size:16px;">
                                         <?php if($user->email != "tony@moontalk.com"): ?>
                                                    <a href='<?php echo e(URL::to('/delete_adminuser?id='.$user->id)); ?>' onclick="return confirm('Are you sure you want to delete this item?');">
                                                        <i style="color:#ff4040;" class="fa fa-times"></i>
                                                    </a>
                                          <?php endif; ?>
                                            </span>
                                     </div>

                                </div>
                                 <?php endforeach; ?>
                                     </div>
                             <div class="col-sm-4">
                         </div>
                    </div>

                    <?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>