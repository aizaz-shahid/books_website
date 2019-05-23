  
<?php $__env->startSection('content'); ?>
  <h3>Obooko - User Panel Pages - <b>Advert Manager</b></h3> 
						 <hr size=1>
		
		
					<br><form method=post action='/edit_advertpost'>
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
		 <!-- Nav tabs -->
  <ul class="nav nav-tabs" style="margin-bottom:20px;" role="tablist">
    <li role="presentation" class="active"><a href="#adsense_pane" aria-controls="home" role="tab" data-toggle="tab">Adsense</a></li>
    <li role="presentation"><a href="#adult_pane" aria-controls="profile_pane" role="tab" data-toggle="tab">Adult (17+)</a></li>  
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="adsense_pane">
        <div class="form-group">
            <label>728x90</label>
            <textarea name="ga_728_90" class="form-control" rows="8"><?php echo e($advert->a); ?></textarea>
        </div>
           <div class="form-group">
            <label>300x250</label>
            <textarea name="ga_300_250" class="form-control" rows="8"><?php echo e($advert->b); ?></textarea>
        </div>
           <div class="form-group">
            <label>300x600</label>
            <textarea name="ga_300_600" class="form-control" rows="8"><?php echo e($advert->c); ?></textarea>
        </div>
      </div>
    <div role="tabpanel" class="tab-pane" id="adult_pane">
        <div class="form-group">
            <label>728x90</label>
            <textarea class="form-control" rows="9" name="alt_728_90"><?php echo e($advert->a17); ?></textarea>
        </div>
	<div class="form-group">
            <label>300x250 (1)</label>
            <textarea class="form-control" rows="9" name="alt_300_250"><?php echo e($advert->b17); ?></textarea>
        </div>
        <div class="form-group">
            <label>300x250 (2)</label>
	<textarea class="form-control" rows="9" name="alt_300_250_2"><?php echo e($advert->c17); ?></textarea>
        </div>
        
    </div>
  </div>
					
		
  <button type=submit class="btn btn-primary pull-right">Save Ads</button></form>
  <br><br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>