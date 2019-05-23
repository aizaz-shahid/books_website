<?php
use Illuminate\Support\Facades\DB;
?>
    <h3>
        <a href="/admin">
                Obooko Menu List
        </a>
    </h3>
<hr size=1>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse0">
                        Tools & Essential Setups
                </a>
            </h4>
        </div>
    <div id="collapse0" class="panel-collapse collapse">
        <div class="panel-body">
                        <h6>
                                IMAGE MANAGER<br>
                                Images must already be uploaded into the system prior to using them.
                        </h6>
                  <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a href="/general_upload">
                                    Image Uploader - General
                            </a><br>      
                  <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a href="/covers_upload">
                                    Image Uploader - Books
                            </a><br>
                  <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a href="view_general_images">
                                    Image Viewer - Generals
                            </a><br>
                  <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a href="view_covers_images">
                                    Image Viewer - Books
                            </a><br>      
                        <h6>
                            ESSENTIAL SETUPS<br>
                            These items must be setup properly in order for the system to work.
                        </h6>             
                  <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a href="edit_social_links">
                                    Social Media Setup
                            </a><br> 
                  <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a href="edit_footer">
                                    Footer Editor
                            </a><br>  
        </div>
    </div>
</div>
  
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
             <a  href="/manage_admin">
                     Manage Admin Email 
             </a>
        </h4>
    </div>
</div> 
  
<div class="panel panel-default">
    <div class="panel-heading">
         <h4 class="panel-title">
              <a  href="edit_advert">
                      Advert Manager
              </a>
         </h4>
    </div>
</div>    
 
<div class="panel panel-default">
    <div class="panel-heading">
         <h4 class="panel-title">
             <a data-toggle="collapse" data-parent="#accordion" href="#collapse16">
                     Manage Admin User's
             </a>
         </h4>
    </div>
    <div id="collapse16" class="panel-collapse collapse  ">
          <div class="panel-body">
                  <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                        <a href="/add_adminuser">
                                Create Admin User
                        </a><br>      
                  <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                        <a href="/admin_users_list">
                                Admin Users Listing
                        </a><br>       
        
    </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
         <h4 class="panel-title">
             <a data-toggle="collapse" data-parent="#accordion" href="#collapse101">
                     Manage Members
             </a>
         </h4>
    </div>
    <div id="collapse101" class="panel-collapse collapse  ">
          <div class="panel-body">
                  <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                        <a href="/add_user">
                                Create User
                        </a><br>      
                  <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                        <a href="/users_list">
                                Users Listing
                        </a><br>       
        
    </div>
    </div>
</div>

<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                 <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                         Main Page Editor
                  </a>
            </h4>
        </div>
    <div id="collapse1" class="panel-collapse collapse">
         <div class="panel-body">
                <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                        <a href="/edit_mainpage">
                                Main Page Content
                        </a><br>      
                  
                 <h6>
                 List of latest books and list of latest blog postings on mainpage are editable from the BOOK EDITOR & BLOG EDITOR respectively.
                 </h6> 
         </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
         <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                     Single Pages Editor
              </a>
         </h4>
    </div>
    
    <div id="collapse2" class="panel-collapse collapse">
         <div class="panel-body">
                     <?php
                   $pages=DB::table('single_page')->get();
                     ?>
                     @foreach($pages as $page)
                 <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a style='text-transform: capitalize;' href="edit_page?id={{$page->id}}">
                           {{$page->title}}
                            </a>
                            <br>
                        @endforeach
                     <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a style='text-transform: capitalize;' href="/add_page">
                                    Add New Page
                            </a><br>                         
      
            </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
             <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    Book/Catalogue Editor
             </a>
        </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
                    <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a href="/list_category">
                                Manage Categories
                            </a><br>
                    <!--<i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a href="/list_authors">
                                Manage Authors
                            </a><br>-->
                    <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a href="/list_books">
                                Manage Book Listings
                            </a><br>                              
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                      Blog Editor
                </a>
        </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
                   <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a href="/edit_blogpage">
                                    Manage Blog Main Page
                            </a><br>      
                   <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                            <a href="/list_blog">
                                    Manage Blog Content
                            </a><br>
                              
      
      
        </div>
    </div>
</div>
    
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
             <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                     User Panel Pages
             </a>
        </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
            <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                    <a href="msg_user">
                            Messages
                    </a><br>
          
        </div>
    </div>
</div>  
  
<div class="panel panel-default">
    <div class="panel-heading">
         <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                         Author Panel Pages
                </a>
         </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">
                <i style="text-align:center;" class="fa fa-plus-square fa-sm"></i>&nbsp;
                        <a href="msg_author">
                                Messages
                        </a><br>
                 
        </div>
    </div>
</div>


</div>