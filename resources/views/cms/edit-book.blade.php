@extends('/cms/main')
@section('content')
  <h3>Obooko - Book/Catalogue Editor - <b>
Manage Book Listing</b></h3> 
  <hr size=1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<br><form method="post" enctype="multipart/form-data" action='edit_book_post'>
<div class="row"><div class="col-sm-4">
<p><b>Rating Offset:</b><br><input type="number" class="form-control" max="5" value="{{$book->rating}}" name="rating"></p>
</div>
<div class="col-sm-4">
<p><b>Adult Filter:</b><br><select class="form-control" name="ad_f">
<option <?php echo ($book->adult_filter == 'on' ? 'selected' : '');?> value ="on">On</option>
<option <?php  echo ($book->adult_filter == 'off' ? 'selected' : '');?>  value="off">Off</option>
</select></p>
</div>
<div class="col-sm-4">
<p><b>Total Votes:</b><br><input type="number" class="form-control" value="{{$book->total_votes}}" name="rating_offset_votes"></p>
</div></div>

<div class="row"><div class="col-sm-4">
<p><b>PDF Downloads</b><br><input type="number" class="form-control" value="{{$book->pdf_downloads}}" name="pdf_downloads"></p>
</div>
<div class="col-sm-4">
<p><b>EPUB Downloads</b><br><input type="number" class="form-control" value="{{$book->epub_downloads}}" name="epub_downloads"></p>
</div>
<div class="col-sm-4">
<p><b>KINDLE Downloads</b><br><input type="number" class="form-control" value="{{$book->kindle_downloads}}" name="kindle_downloads"></p>
</div></div>


<p><b>Robot Index</b><br><select class="form-control" name="r_index">
<option <?php echo ($book->robot_index == 'on' ? 'selected' : '');?> value ="on">On</option>
<option <?php  echo ($book->robot_index == 'off' ? 'selected' : '');?>  value="off">Off</option>
</select><p>
<p><b>Book Title</b><br><input class='form-control' value="{{$book->title}}" name='bktitle' />
<p><b>Book slug</b><br><input class='form-control' value="{{$book->url}}" name='bkslug' />

<p><b>Meta Title</b><br><input class='form-control' name='meta_title' value='{{$book->m_title}}'>
</input><p>

<p><b>Meta Description</b><br><textarea class='form-control' rows=1 name='metadescription'>{{$book->m_description}}</textarea><p>

<p><b>H1 Header Text</b><br><textarea class='form-control' rows=1 name='h1headertext'>{{$book->h_text}}</textarea><p>

<p><b>Top Left Text</b><br><textarea class='form-control' rows=1 name='toplefttext'>{{$book->t_text}}</textarea><p>

<p><b>Author Link 1</b><br><input type="text" class='form-control' rows=1 name='link1' value="{{$book->fb}}"><p>

<p><b>Author Link 2</b><br><input type="text" class='form-control' rows=1 name='link2' value="{{$book->blog}}"><p>

<p><b>Author Link 3</b><br><input type="text" class='form-control' rows=1 name='link3' value="{{$book->web}}"><p>

<p><b>Author Link 4</b><br><input type="text" class='form-control' rows=1 name='link4' value="{{$book->twitter}}"><p>

<b>Book Cover Image</b> - 
{{$book->cover_image}}
<br><div class='row'><div class='col-sm-4 col-xs-12'><img class='img-responsive' src='/public/images/covers/{{$book->cover_image}}'></div><div class='col-sm-8 col-xs-12'>

<?php $images = glob("images/covers/*.{jpg,gif,png}", GLOB_BRACE);
sort($images, SORT_NATURAL | SORT_FLAG_CASE);

?>

<h5><b>Change The Image</b>
<br>Find the image that will be used using the dropdown menu below.
<br>Remember to first upload it into the system using the IMAGE UPLOADER tool.</h5>
<h4>Select The Image To Use</h4><select class="form-control" name="bkimage">
<option selected>
{{$book->cover_image}}
</option>

<?php foreach($images as $image)
{
    echo'<option>' . basename($image) . '</option>';
}
?>
</select><p>

<p><b>Image Alt Text</b><br><textarea style='width:100%'  class='form-control' rows=1 name='bkimagealt'>{{$book->image_alt}}</textarea></p>

</div></div><p>
<b>Author Status</b><br><select class='form-control' name='status'><option selected>

{{$book->status}}
<option value='1'>Active</option><option value='0'>Not Active</option></select><p>

<p><b>Book Description</b><br><textarea class='ckeditor form-control' rows=10 name='bkdesc'>{{$book->synopsis}}</textarea><p>

<input type='hidden' name='bkid' value='{{$book->book_id}}'><p>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class='row'><div class='col-xs-3'></b><br>
</div>

<div class='col-xs-3'>
</div>

<div class='col-xs-3'></div>

<div class='col-xs-3'></div></div><p><br>


     <div class="panel panel-primary">
         <div class="panel-heading">Ebook Files</div>
         <div class="panel-body">
     <table class="table table-bordered" style="margin-top:10px">
         <tbody>
             <tr>
                 <th>PDF</th>
                 <td>
                     <input type="file" name="pdf" placeholder="">
                 </td>
                 <td><?=($book->pdf != "") ? '<a target="_blank" href="/public/books/pdf/'.$book->title.'.pdf">/public/books/pdf/'.$book->title.'.pdf</a>' : ''?></td>
             </tr>
             <tr>
                 <th>EPUB</th>
                 <td>
                     <input type="file" name="epub" placeholder="">
                 </td>
                 <td><?=($book->epub != "") ? '<a target="_blank" href="/public/books/epub/'.$book->title.'.epub">/public/books/epub/'.$book->title.'.epub</a>' : ''?></td>
             </tr>
             <tr>
                 <th>KINDLE</th>
                 <td>
                     <input type="file" name="kindle" placeholder="">
                 </td>
                 <td><?=($book->kindle != "") ? '<a target="_blank" href="/public/books/kindle/'.$book->title.'.kindle">/public/books/kindle/'.$book->title.'.kindle</a>' : ''?></td>
             </tr>
         </tbody>
     </table>
         </div>
         </div>

<input class='btn btn-danger' type=submit value=Update></form>

</div>

</div>   
@endsection
