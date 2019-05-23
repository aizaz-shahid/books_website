<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo e(Lang::get('laravel-filemanager::lfm.title-page')); ?></title>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('vendor/laravel-filemanager/css/cropper.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('/vendor/laravel-filemanager/css/lfm.css')); ?>">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css">
</head>
<body>
  <div class="container">
    <div class="row fill">
      <div class="panel panel-primary fill">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo e(Lang::get('laravel-filemanager::lfm.title-panel')); ?></h3>
        </div>
        <div class="panel-body fill">
          <div class="row fill">
            <div class="wrapper fill">
              <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 left-nav fill" id="lfm-leftcol">
                <div id="tree2">
                </div>
              </div>
              <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10 right-nav" id="right-nav">
                <div class="row">
                  <div class="col-md-12">
                    <?php if($extension_not_found): ?>
                    <div class="alert alert-warning"><i class="glyphicon glyphicon-exclamation-sign"></i> <?php echo e(Lang::get('laravel-filemanager::lfm.message-extension_not_found')); ?></div>
                    <?php endif; ?>
                    <nav class="navbar navbar-default">
                      <div class="container-fluid">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                        </div>
                        <div class="collapse navbar-collapse">
                          <ul class="nav navbar-nav" id="nav-buttons">
                            <li>
                              <a href="#" id="to-previous">
                                <i class="fa fa-arrow-left"></i> <?php echo e(Lang::get('laravel-filemanager::lfm.nav-back')); ?>

                              </a>
                            </li>
                            <li><a style='cursor:default;'>|</a></li>
                         
                            <li>
                              <a href="#" id="thumbnail-display">
                                <i class="fa fa-picture-o"></i> <?php echo e(Lang::get('laravel-filemanager::lfm.nav-thumbnails')); ?>

                              </a>
                            </li>
                            <li>
                              <a href="#" id="list-display">
                                <i class="fa fa-list"></i> <?php echo e(Lang::get('laravel-filemanager::lfm.nav-list')); ?>

                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </nav>
                  </div>
                </div>

                <?php if(isset($errors) && $errors->any()): ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <ul>
                        <?php foreach($errors->all() as $error): ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <?php endif; ?>

                <div id="content" class="fill">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aia-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo e(Lang::get('laravel-filemanager::lfm.title-upload')); ?></h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('unisharp.lfm.upload')); ?>" role='form' id='uploadForm' name='uploadForm' method='post' enctype='multipart/form-data'>
            <div class="form-group" id="attachment">
              <label for='upload' class='control-label'><?php echo e(Lang::get('laravel-filemanager::lfm.message-choose')); ?></label>
              <div class="controls">
                <div class="input-group" style="width: 100%">
                  <input type="file" id="upload" name="upload">
                </div>
              </div>
            </div>
            <input type='hidden' name='working_dir' id='working_dir' value='<?php echo e($working_dir); ?>'>
            <input type='hidden' name='show_list' id='show_list' value='0'>
            <input type='hidden' name='type' id='type' value='<?php echo e($file_type); ?>'>
            <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(Lang::get('laravel-filemanager::lfm.btn-close')); ?></button>
          <button type="button" class="btn btn-primary" id="upload-btn"><?php echo e(Lang::get('laravel-filemanager::lfm.btn-upload')); ?></button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="fileViewModal" tabindex="-1" role="dialog" aria-labelledby="fileLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="fileLabel"><?php echo e(Lang::get('laravel-filemanager::lfm.title-view')); ?></h4>
        </div>
        <div class="modal-body" id="fileview_body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(Lang::get('laravel-filemanager::lfm.btn-close')); ?></button>
        </div>
      </div>
    </div>
  </div>

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.4.0/jquery-migrate.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <script src="<?php echo e(asset('vendor/laravel-filemanager/js/cropper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/laravel-filemanager/js/jquery.form.min.js')); ?>"></script>
  <?php echo $__env->make('laravel-filemanager::script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>