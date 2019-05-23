<?php $__env->startSection('custom_css'); ?>
<style>
.fa
{
	margin-top: 8px;
	margin-left: 8px
}
.fa-close
{
	float: left;
	display: inline-block;
	margin-top: 30px!important;
}

#select
{
	float:left;
	width: 93%!important;
}
.custom-select
{
	float:left;
	width: 100%!important;
}
.custom-select select
{
	float:left;
	display:inline-block;
	width: 93%!important;
}
[id^="ccategory-"]
{
	margin-top:25px;
}
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
      <h3>Obooko - Book/Catalogue Editor - <b>Manage Book Listings</b></h3>
      <hr size=1>

<div class="row">
                        <div class="col-sm-10 col-xs-12 col-md-12">
                        <div class="row">
                        <div class="col-lg-12">
                            <h5>Search by Book Title or Author</b></h5>
                            </div>
                            <div class="col-lg-6">
                            <form method="get" action='search_books'>
  <div class="input-group">
     
      <input type="text" name="q" class="form-control" placeholder="Search by book title or author">
       <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Search</button>
      </span>
    </div><!-- /input-group -->
                            </form>
                            </div>
<div class="col-lg-4" style="text-align:right;">
<?php if(isset($selected_items)): ?>
 <strong><?php echo e($selected_items); ?> Users</strong>
<?php else: ?>
<strong>0 Selected</strong>
<?php endif; ?>
</div>
                           
</div>

	<hr size=1>

      <div class="row">
        <div class="col-sm-7 col-xs-12">
          <h5>List of Books</b></h5>
 
<hr size="1" style="  margin: 3px 0 !important;">
   <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
<?php
$i=1;
?>
<?php foreach($cat as $c): ?>
<?php
if (isset($_REQUEST['cid']) && $_REQUEST['cid'] == $c->id ) { 
$catselect = '<strong>';
$catselectend = '</strong>';
}else{
$catselect = '';
$catselectend = '';
  
}
?>
         <a href="list_books?cid=<?php echo e($c->id); ?>"> <h5 style="float:left; width:240px"><?php echo $catselect;?><?php echo e($c->name); ?><?php echo $catselectend;?> </b></h5>
         </a>
        <?php if($i%2 =='0'){?>
         <hr size="1" style="clear:both;  margin: 3px 0 !important;">
         <?php } ?>
 <?php
   $i++;  
 ?>
 <?php endforeach; ?>
          <div id='paging_container1'>
            <div class='page_navigation'></div>
            <p>
            
            <ul class="content" style="margin-left:-40px;">
              <div class="row">
                <div class="col-sm-1"><span style="font-size:12px;"><b>#</b></span></div>
                <div class="col-sm-7"><span style="font-size:12px;"><b>Book Title</b></span></div>
                <div class="col-sm-1"><span style="font-size:12px;"><b>Edit</b></span></div>
                <div class="col-sm-1"><span style="font-size:12px;"><b>Files</b></span></div>
                <div class="col-sm-1"><span style="font-size:12px;"><b>Del</b></span></div>
                <div class="col-sm-1"><span style="font-size:12px;"><b>Status</b></span></div>
              </div>
              <hr size=1>
              
<?php if(isset($books)): ?>
<?php $num_rows=0;?>
<?php foreach($books as $book): ?>
<?php $num_rows=$num_rows+1;?>
              <div class="row">
                <div class="col-sm-1"><span style="font-size:14px;line-height:1px;"><?php echo $num_rows; ?></span></div>
                <div class="col-sm-7"><span style="font-size:14px;line-height:1px;"><a href="edit_book?id=<?php echo e($book->book_id); ?>"><?php echo e($book->title); ?></a></span></div>
                <div class="col-sm-1"><span style="text-align:center;font-size:16px;"><a href="edit_book?id=<?php echo e($book->book_id); ?>"><i style="color:#1C5192" class="fa fa-file"></i> </a></span></div>
                <div class="col-sm-1"><span style="text-align:center;font-size:16px;"><a data-toggle="modal" data-target="#myModal" href="open_book?id=<?php echo e($book->book_id); ?>"><i style="color:#91C000;" class="fa fa-download"></i> </a></span></div>
                <div class="col-sm-1"><span style="text-align:center;font-size:16px;"><a href="delete_book?id=<?php echo e($book->book_id); ?>"><i style="color:#ff4040;" class="fa fa-times"></i> </a></span></div>
               <?php if($book->status == 0 || $book->status == " "): ?> 
                <div class="col-sm-1"><span class="label label-danger"><?php echo e($book->status); ?></span></div> 
                <?php elseif($book->status == 1): ?>
                <div class="col-sm-1"><span class="label label-success"><?php echo e($book->status); ?></span></div> 
               <?php endif; ?>             
</div>
   <hr size=1>
              <?php endforeach; ?>
            <?php endif; ?>  


           

      </ul>
          </div>
        </div>
        <div class="col-sm-5" id="add-new">
          <h5>Create New Book Listing</b></h5>
          <hr size=1>
          <form method=post action='/add_book'>
            Choose The Book Author<br>
            <select class="form-control" name="cauthor">
              <option value="">.. choose ..</option>
              <?php foreach($authors as $author): ?>
<option value="<?php echo e($author->user_id); ?>"><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></option>   
<?php endforeach; ?>
            </select>
            Choose Book Category<br>
              <div id='select'>
			  <select id="ccategory" class="form-control" name="cat_sup[]">
                <option value="">.. choose ..</option>
<?php foreach($cat as $c): ?>
<option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>   

<?php endforeach; ?>
              </select>

			  </div>
				<a href="javascript:addCategory()"><i class="fa fa-plus"></i></a>
              <br>
				<div style='display:inline-block'>What Is The Book Title</div>
			  <br>
       
              <textarea class='form-control' rows=1 name='ctitle' onkeypress="this.value=this.value.replace(/[^a-zA-Z0-9 _]/g,' ')"></textarea>
                 
            <p> <br>
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
              <input type='submit' class='btn btn-danger' value='Add New Book Listing'>
          </form>
    
        </div>
      </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_javascript'); ?>
<script>
function addCategory()
{
  var l=$('.custom-select').length;
  if(l>5)
  {
    $('.fa-plus').parent().attr('href','javascript:;');
  }
  var select_html=$('#select').html().replace('name="cat_sup[]"','name="cat_sup[]"');
  $('#select').after('<div class="custom-select">'+select_html+'<a href="javascript:;" onclick="removeCategory(this)"><i class="fa fa-close"></i></div>');
}
function removeCategory(obj)
{
  $(obj).parent().remove();
}
$(document.body).on('hidden.bs.modal', function () {
    $('#myModal').removeData('bs.modal');
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('/cms/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>