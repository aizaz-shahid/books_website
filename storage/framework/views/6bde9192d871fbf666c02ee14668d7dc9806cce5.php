
<?php $__env->startSection('content'); ?>
 <h3> 
                 		Welcome To Your Custom Content Management System
                 </h3>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>