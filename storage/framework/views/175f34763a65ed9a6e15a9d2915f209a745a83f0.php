<div style="padding:20px;">
      <h3><?php echo e($book->title); ?> | <b>Manage Files</b></h3>
      <hr size=1>
   <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
</div>
<div style="padding:50px;margin-top:-20px;">

             <div class="row">
                <div class="col-sm-2"><span style="font-size:12px;"><b>Type</b></span></div>
                <div class="col-sm-4"><span style="font-size:12px;"><b>File Name</b></span></div>
                <div class="col-sm-2"><span style="font-size:12px;"><b>Edit</b></span></div>
                <div class="col-sm-2"><span style="font-size:12px;"><b>Downoad</b></span></div>
                <div class="col-sm-2"><span style="font-size:12px;"><b>Del</b></span></div>
              </div>
              <hr size=1>
              

              <div class="row">
                <div class="col-sm-2"><span style="font-size:14px;line-height:1px;">PDF</span></div>
                <div class="col-sm-4"><span style="font-size:14px;line-height:1px;"><a href="edit_book?id=<?php echo e($book->book_id); ?>"><?php echo e($book->pdf); ?></a></span></div>
                <div class="col-sm-2"><span style="text-align:center;font-size:16px;"><a href="edit_book?id=<?php echo e($book->book_id); ?>"><i style="color:#1C5192" class="fa fa-file"></i> </a></span></div>
                <div class="col-sm-2"><span style="text-align:center;font-size:16px;"><a href="download_admin?url=books/pdf/<?php echo e($book->title); ?>.pdf"><i style="color:#91C000;" class="fa fa-download"></i> </a></span></div>
                <div class="col-sm-2"><span style="text-align:center;font-size:16px;"><a href="delete_bookfile?id=<?php echo e($book->book_id); ?>&target=pdf"><i style="color:#ff4040;" class="fa fa-times"></i> </a></span></div>
              </div>
   <hr size=1>
          
          <div class="row">
                <div class="col-sm-2"><span style="font-size:14px;line-height:1px;">E-pub</span></div>
                <div class="col-sm-4"><span style="font-size:14px;line-height:1px;"><a href="edit_book?id=<?php echo e($book->book_id); ?>"><?php echo e($book->epub); ?></a></span></div>
                <div class="col-sm-2"><span style="text-align:center;font-size:16px;"><a href="edit_book?id=<?php echo e($book->book_id); ?>"><i style="color:#1C5192" class="fa fa-file"></i> </a></span></div>
                <div class="col-sm-2"><span style="text-align:center;font-size:16px;"><a href="download_admin?url=books/epub/<?php echo e($book->title); ?>.epub"><i style="color:#91C000;" class="fa fa-download"></i> </a></span></div>
                <div class="col-sm-2"><span style="text-align:center;font-size:16px;"><a href="delete_bookfile?id=<?php echo e($book->book_id); ?>&target=epub"><i style="color:#ff4040;" class="fa fa-times"></i> </a></span></div>
              </div>
   <hr size=1>

             <div class="row">
                <div class="col-sm-2"><span style="font-size:14px;line-height:1px;">Kindle</span></div>
                <div class="col-sm-4"><span style="font-size:14px;line-height:1px;"><a href="edit_book?id=<?php echo e($book->book_id); ?>"><?php echo e($book->kindle); ?></a></span></div>
                <div class="col-sm-2"><span style="text-align:center;font-size:16px;"><a href="edit_book?id=<?php echo e($book->book_id); ?>"><i style="color:#1C5192" class="fa fa-file"></i> </a></span></div>
                <div class="col-sm-2"><span style="text-align:center;font-size:16px;"><a href="download_admin?url=books/kindle/<?php echo e($book->title); ?>.kindle"><i style="color:#91C000;" class="fa fa-download"></i> </a></span></div>
                <div class="col-sm-2"><span style="text-align:center;font-size:16px;"><a href="delete_bookfile?id=<?php echo e($book->book_id); ?>&target=kindle"><i style="color:#ff4040;" class="fa fa-times"></i> </a></span></div>
              </div>
   <hr size=1>
         </div>  






