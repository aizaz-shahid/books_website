<?php namespace App\Http\Controllers;
use File;
use Validator;
use Image;
use App\AdminUser;
use App\Advert;
use App\Footer;
use App\Links;
use App\SinglePage;
use App\Category;
use App\MainPage;
use App\Users;
use App\Message;
use App\BlogMain;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CmsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| CMS Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "CMS" for the application and
	| is configured to only allow Auth users. 
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('cms-index');
	}
  
  public function image_uploader(Request $request)
  {

if($request->hasFile('image') && $request->upload_type == 'general' )
        { 
        	$file=$request->image;
            $fileArray = array('image' => $file);

    // Tell the validator that this file should be an image
    $rules = array(
      'image' => 'mimes:jpeg,jpg,png,gif|required|max:20000' // max 10000kb
    );

    // Now pass the input and rules into the validator
    $validator = Validator::make($fileArray, $rules);

    // Check to see if validation fails or passes
    if ($validator->fails())
    {
          // Redirect or return json to frontend with a helpful message to inform the user 
          // that the provided file was not an adequate type
          return response()->json(['error' => $validator->errors()->getMessages()], 400);
    } else
    {
        // Store the File Now
        // read image from temporary file
         $path_image = public_path().'/images/'.$file->getClientOriginalName();
          Image::make($file->getRealPath())->save($path_image);
                
        
    }
    return view('cms/general-upload')->with('filename',$file->getClientOriginalName())->with('path', $path_image);
                
       } elseif($request->hasFile('image') && $request->upload_type == 'covers' )

 {
 		$file=$request->image;
            $fileArray = array('image' => $file);

    // Tell the validator that this file should be an image
    $rules = array(
      'image' => 'mimes:jpeg,jpg,png,gif|required|max:20000' // max 10000kb
    );

    // Now pass the input and rules into the validator
    $validator = Validator::make($fileArray, $rules);

    // Check to see if validation fails or passes
    if ($validator->fails())
    {
          // Redirect or return json to frontend with a helpful message to inform the user 
          // that the provided file was not an adequate type
          return response()->json(['error' => $validator->errors()->getMessages()], 400);
    } else
    {
        // Store the File Now
        // read image from temporary file
         $path_image = public_path().'/images/covers/'.$file->getClientOriginalName();
          Image::make($file->getRealPath())->save($path_image);
                
        
    }
       
       return view('cms/covers-upload')->with('filename',$file->getClientOriginalName())->with('path', $path_image);
  }

  //functionend
 }
public function delete_images(Request $request)
{
if($request->type == 'cover' && $request->fileToDelete != "" && $request->fileToDelete != " "):
    $filename=public_path().'/images/covers/'.$request->fileToDelete;
File::delete($filename);
return view('cms/view_covers_images');
	endif;
if($request->type == 'general' && $request->fileToDelete != "" && $request->fileToDelete != " "):
    $filename=public_path().'/images/'.$request->fileToDelete;
File::delete($filename);
return view('cms/view_general_images');
	endif;

}

public function add_admin(Request $request)
{
$validator = Validator::make($request->all(), [
       
     'user_name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'cpassword' => 'required',
        'display_name' => 'required'
   ]);
if ($validator->fails()):

    return view('cms/add-adminuser')->with('error',"some thing is missing or wrong");
elseif($request->password != $request->cpassword):
	return view('cms/add-adminuser')->with('error',"Password mismatch error...");
else:

$adminuser = new AdminUser;
$adminuser->username=$request->user_name; 
$adminuser->email=$request->email; 
$adminuser->displayname=$request->display_name; 
$adminuser->password= bcrypt($request->password); 
$adminuser->save();

return view('cms/add-adminuser')->with('success',"User Added Successfully");
endif;
}
public function list_adminusers()
{
 $adminusers=AdminUser::all();

 return view('cms/admin-users-list')->with('users',$adminusers);

}
public function edit_displayAdminUser(Request $request)
{
$validator = Validator::make($request->all(), [
       
     'id' => 'required'
   ]);
if ($validator->fails()):

    return view('cms/add-adminuser')->with('error',"User not found");
endif;

$user= AdminUser::find($request->id);

return view('cms/edit-adminusers')->with('user',$user);

}

public function edit_adminuser(Request $request)
{

	$validator = Validator::make($request->all(), [
       
     'id' => 'required|exists:admin_users,id'
   ]);
if ($validator->fails()):

    return view('cms/add-adminuser')->with('error',"User not found");
elseif($request->password != "" && $request->password != $request->cpassword):
	return view('cms/add-adminuser')->with('error',"Password mismatch error...");
endif;

$adminuser=AdminUser::find($request->id);
$adminuser->username=$request->user_name;
$adminuser->email=$request->email; 
$adminuser->displayname=$request->display_name; 
if($request->password != "" && $request->password == $request->cpassword):
	$adminuser->password=$request->password;
	endif;
$adminuser->save();
return view('cms/edit-adminusers')->with('success',"User Updated Successfully")->with('user',$adminuser);
}

public function delete_adminuser(Request $request)
{
if(isset($request->id) && $request->id !="" && $request->id != " "):
	AdminUser::destroy($request->id);
    $adminusers=AdminUser::all();
	return view('cms/admin-users-list')->with('user_del',"User deleted Successfully!!")->with('users',$adminusers);;
	else:
		$adminusers=AdminUser::all();
 return view('cms/admin-users-list')->with('users',$adminusers);;
		endif;
}

public function edit_footer(Request $request)
{
if(!isset($request) || $request == " "):

$footer=Footer::find(1);
return view('cms/footer')->with('footer',$footer);
else:
	$footer=Footer::find(1);
$footer->general_text=$request->general;
$footer->cookie_code=$request->cookie;
$footer->analytic_code=$request->analytic;
$footer->save();
return view('cms/footer')->with('success',"Updated Successfully")->with('footer',$footer);

endif;


}

public function edit_advert(Request $request)

{
if(!isset($request) || $request == "" || $request == " "):
$advert=Advert::find(1);
return view('cms/edit-advert')->with('advert',$advert);
else:
	$advert=Advert::find(1);
$advert->a=$request->ga_728_90;
$advert->b=$request->ga_300_250;
$advert->c=$request->ga_300_600;
$advert->a17=$request->alt_728_90;
$advert->b17=$request->alt_300_250;
$advert->c17=$request->alt_300_250_2;
$advert->save();
return view('cms/edit-advert')->with('success',"Updated Successfully")->with('advert',$advert);
endif;
}
public function social_links(Request $request)
{
if(!isset($request) || $request == "" || $request == " "):
$social_links=Links::find(1);
return view('cms/social-links')->with('social_links',$social_links);
else:
	$social_links=Links::find(1);
$social_links->facebook=$request->fb;
$social_links->twitter=$request->t;
$social_links->stumbled_upon=$request->s;
$social_links->pinterest=$request->p;
$social_links->googleplus=$request->g;
$social_links->linkedin=$request->l;
$social_links->save();
return view('cms/social-links')->with('success',"Updated Successfully")->with('social_links',$social_links);
endif;
}

public function edit_mainpage(Request $request)
{

$mainpage = MainPage::find(1);
return view('cms/edit-mainpage')->with('mainpage',$mainpage);
}
public function edit_mainpost(Request $request)
{
$mainpage=MainPage::find(1);
$mainpage->title=$request->pgt;
$mainpage->m_description=$request->mtdesc;
$mainpage->m_keywords=$request->mtkeyw;
$mainpage->h_image=$request->itm1;
$mainpage->h_text=$request->itm2;
$mainpage->h_subtext=$request->itm3;
$mainpage->h_advert=$request->itm4;
$mainpage->m1_image=$request->itm5;
$mainpage->m1_title=$request->itm6;
$mainpage->m1_text=$request->itm7;
$mainpage->m2_image=$request->itm8;
$mainpage->m2_title=$request->itm9;
$mainpage->m2_text=$request->itm10;
$mainpage->b_advert=$request->item12;

$mainpage->save();
  return redirect('/edit_mainpage')->with('status', 'updated!');
}

public function add_page(Request $request)
{
   $newpage= new SinglePage;
$newpage->title=$request->pgt;
$newpage->m_description=$request->mtdesc;
$newpage->m_keywords=$request->mtkeyw;
$newpage->h_image=$request->itm1;
$newpage->h_text=$request->itm2;
$newpage->slug=$request->itm3;
$newpage->h_subtext=$request->itm4;
$newpage->c_title=$request->itm5;
$newpage->c_text=$request->itm6;
$newpage->img1=$request->itm7;
$newpage->img2=$request->itm8;
$newpage->img3=$request->itm9;
$newpage->save();
return redirect('/edit_page?id='.$newpage->id)->with('status','updated')->with('newpage',$newpage);
}
public function edit_page(Request $request)
{
$newpage = SinglePage::find($request->id);
return view('cms/edit-spage')->with('newpage',$newpage);
}
public function edit_postpage(Request $request)
{

$newpage=SinglePage::find($request->id);
$newpage->title=$request->pgt;
$newpage->m_description=$request->mtdesc;
$newpage->m_keywords=$request->mtkeyw;
$newpage->h_image=$request->itm1;
$newpage->h_text=$request->itm2;
$newpage->slug=$request->itm3;
$newpage->h_subtext=$request->itm4;
$newpage->c_title=$request->itm5;
$newpage->c_text=$request->itm6;
$newpage->img1=$request->itm7;
$newpage->img2=$request->itm8;
$newpage->img3=$request->itm9;
$newpage->save();
return redirect('/edit_page?id='.$newpage->id)->with('status','updated')->with('newpage',$newpage);

}

public function list_category()
{

	$catF= Category::where('type','=','F')->get();
	$catN= Category::where('type','=','NF')->get();
	return view('cms/list-category')->with('catF',$catF)->with('catN',$catN);
}
public function add_category(Request $request)
{
if(isset($request) && $request != "" || $request->cattype != "" || $request->cattype != " "):
 $cat=new Category;
$cat->name=$request->catname;
$cat->type=$request->cattype;
$cat->save();

return redirect('/list_category')->with('status','Added Successfully');   
	endif;
}

public function edit_category(Request $request)
{
$cat=Category::find($request->id);
return view('cms/edit-category')->with('cat',$cat);

}

public function edit_category_post(Request $request)
{
	if($request == "" || $request == " ")
		return redirect('/list_category')->with('status','Failed');   
	
$cat=Category::find($request->catid);
$cat->name=$request->catname;
$cat->slug=$request->catslug;
$cat->title=$request->catpgt;
$cat->m_description=$request->catmtdesc;
$cat->m_keywords=$request->catmtkeywords;
$cat->h_image=$request->itm1;
$cat->h_image_alt=$request->itm2;
$cat->h_text=$request->itm3;
$cat->s_text=$request->itm4;
$cat->l_text=$request->itm5;
$cat->h_advert=$request->itm6;
$cat->r_advert=$request->itm7;
$cat->b_advert=$request->itm8;
$cat->br_text=$request->itm9;

$cat->save();
return redirect('/edit_category?id='.$request->catid)->with('status','Updated Successfully');
}
public function delete_category(Request $request)
{
	if(isset($request->id) && $request->id !="" && $request->id != " "):

Category::destroy($request->id);
return redirect('/list_category')->with('status',"Deleted Successfully");
	else:

return redirect('/list_category')->with('status',"Failed");
		endif;
}
public function list_authors()
{
	$authors=Users::where('type','=','author')->get();
	return view('cms/list-authors')->with('authors',$authors);
}
public function add_authors(Request $request)
{
if($request == "" || $request == " ")
		return redirect('/list_authors')->with('status','Failed');   

$user=new Users;
$user->first_name=$request->name;
$user->email=$request->email;
$user->password=$request->pass;
$user->type="author";
$user->save();
return redirect('/list_authors')->with('status',"Author Added Successfully");

}
public function edit_author(Request $request)
{
if($request == "" || $request == " ")
		return redirect('/list_authors')->with('status','Failed'); 

	$author=Users::where('user_id','=',$request->id)->first();
	
	return view('cms/edit-author')->with('author',$author);		
}
public function edit_author_post(Request $request)
{
if($request == "" || $request == " ")
		return redirect('/list_authors')->with('status','Failed');   

$author=Users::where('user_id','=',$request->auid)->first();
$author->first_name=$request->fname;
$author->email=$request->email;
$author->password=$request->pass;
$author->active=$request->austatus;
$author->web=$request->auwebsite;
$author->blog=$request->aublog;
$author->fb=$request->aufacebook;
$author->twitter=$request->autwitter;
$author->save();
return redirect('/edit_author?id='.$author->user_id)->with('status','Updated Successfully');
}
public function delete_author(Request $request)
{
if(isset($request->id) && $request->id !="" && $request->id != " "):

	Users::destroy($request->id);
return redirect('/list_authors')->with('status',"Deleted Successfully");
else:
return redirect('/list_authors')->with('status',"Failed");
endif;
}

public function author_msg()
{
	$msg=Message::where('type','=','a')->first();

	return view('cms/msg-author')->with('msg',$msg);
}
public function user_msg()
{
	$msg=Message::where('type','=','u')->first();
	return view('cms/msg-user')->with('msg',$msg);
}
public function msg_post(Request $request)
{
	
		$msg=Message::find($request->msgid);
	$msg->content=$request->message;
	$msg->save();
	if($msg->type == 'a')
	return redirect('/msg_author')->with('status',"Message Updated");
    if($msg->type == 'u')
    	return redirect('/msg_user')->with('status',"Message Updated");

	
}
public function edit_blogmain(Request $request)
{

$mainpage = BlogMain::find(1);
return view('cms/edit-blogmain')->with('mainpage',$mainpage);
}
public function edit_bmainpost(Request $request)
{
$mainpage=BlogMain::find(1);
$mainpage->title=$request->pgt;
$mainpage->m_description=$request->mtdesc;
$mainpage->m_keywords=$request->mtkeyw;
$mainpage->h_image=$request->itm1;
$mainpage->h_text=$request->itm2;
$mainpage->h_subtext=$request->itm3;
$mainpage->img1=$request->itm4;
$mainpage->img2=$request->itm5;

$mainpage->save();
  return redirect('/edit_blogpage')->with('status', 'updated!!');
}

public function list_blogs()
{

	$blog=Blog::all();
	return view('cms/list-blog')->with('blogs',$blog);
}

public function edit_blog(Request $request)
{
    if(isset($request->id) && $request->id !="" && $request->id != " "):

	$blog=Blog::find($request->id);
return view('cms/edit-blog')->with('blog',$blog);
else:
return redirect('/list_blog')->with('status',"Failed");
endif;
}

public function edit_blogpost(Request $request)
{
$blog=Blog::find($request->blid);
$blog->title=$request->bltitle;
$blog->writer=$request->blwriter;
$blog->image=$request->blmedia1;
$blog->img_alt=$request->img_alt;
$blog->article=$request->bltext1;
$blog->status=$request->blstatus;
$blog->save();
return redirect('edit_blog?id='.$blog->id)->with('status',"Updated Successfully!!");
}

public function add_blog(Request $request)
{
	if(isset($request->title) && $request->title !="" && $request->title != " "):
echo "knj";
$blog= new Blog;
$blog->title=$request->title;
$blog->status=$request->status;
$blog->save();
return back()->with('status',"Deleted Successfully");
endif;
//return "000";
}
public function delete_blog(Request $request)
{
if(isset($request->id) && $request->id !="" && $request->id != " "):

Blog::destroy($request->id);
return redirect('/list_blog')->with('status',"Deleted Successfully");
	else:

return redirect('/list_blog')->with('status',"Failed");
		endif;
}
public function list_books(Request $request)
{
	if($request->cid == "" ||$request->cid == " "):
		$cat=Category::all();
	    $authors=Users::where('type','=','author')->get();
	return view('cms/list-books')->with('cat',$cat)->with('authors',$authors);
	else:
             $cat=Category::all();
	    $authors=Users::where('type','=','author')->get();
	    $idi=$request->cid;
	    echo $idi;
	   
 $book = DB::table('books')
->where('category', 'like', '%,' .$idi. ',%')
->orWhere('category', 'like', '%' .$idi. ',%')
->orWhere('category', 'like', '%,' .$idi. '%')
->orWhere('category', 'like', '%' .$idi. '%')
->orderBy('book_id','desc')
->get();
	return view('cms/list-books')->with('cat',$cat)->with('authors',$authors)->with('books',$book);
  endif;

}

//classend
}
