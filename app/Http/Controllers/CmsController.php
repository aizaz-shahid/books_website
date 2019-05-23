<?php namespace App\Http\Controllers;
use File;
use Validator;
use Image;
use App\AdminUser;
use App\Advert;
use App\User;
use App\Footer;
use App\Links;
use App\SinglePage;
use App\Category;
use App\MainPage;
use App\Users;
use App\Message;
use App\BlogMain;
use App\Blog;
use App\Book;
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
		$this->middleware('auth');
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
         if (File::exists($path_image))
{
	$pathtosend='/public/images/'.$file->getClientOriginalName();
	
   return view('cms/general-upload')->with('filename',$file->getClientOriginalName())->with('error',"File already exists")
   ->with('path', $pathtosend);
}
          Image::make($file->getRealPath())->save($path_image);
                
        $pathtosend='/public/images/'.$file->getClientOriginalName();
    }
    return view('cms/general-upload')->with('filename',$file->getClientOriginalName())->with('path', $pathtosend);
                
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
          if (File::exists($path_image))
{
	$pathtosend='/public/images/covers/'.$file->getClientOriginalName();
   return view('cms/covers-upload')->with('filename',$file->getClientOriginalName())->with('path', $pathtosend)
   ->with('error',"File already exists");
}
          Image::make($file->getRealPath())->save($path_image);
                
        $pathtosend='/public/images/covers/'.$file->getClientOriginalName();
    }
       
       return view('cms/covers-upload')->with('filename',$file->getClientOriginalName())->with('path', $pathtosend);
  }

  //functionend
 }
public function delete_images(Request $request)
{
if($request->type == 'cover' && $request->fileToDelete != "" && $request->fileToDelete != " "):
    $filename=public_path().'/images/covers/'.$request->fileToDelete;
File::delete($filename);
return view('cms/view-covers-images');
	endif;
if($request->type == 'general' && $request->fileToDelete != "" && $request->fileToDelete != " "):
    $filename=public_path().'/images/'.$request->fileToDelete;
File::delete($filename);
return view('cms/view-general-images');
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
 $adminusers=AdminUser::paginate(10);

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
 return view('cms/admin-users-list')->with('users',$adminusers);
		endif;
}
//eneral users


public function add_user(Request $request)
{
$validator = Validator::make($request->all(), [
       
     
        'email' => 'required|email',
        'password' => 'required',
        'cpassword' => 'required',
        'gender' => 'required'
   ]);
if ($validator->fails()):

    return redirect()->to($this->getRedirectUrl())->withInput($request->input())->with('error',"some thing is missing or wrong");
elseif($request->password != $request->cpassword):
    return redirect()->to($this->getRedirectUrl())->with('error',"Password mismatch error...")->withInput($request->input());
    
else:
$exist=Users::where('email','=',$request->email)->first();
if(!$exist){
$user = new Users;
$user->username=$request->user_name; 
$user->email=$request->email; 
$user->gender=$request->gender; 
$user->first_name=ucfirst($request->first_name); 
$user->last_name=ucfirst($request->last_name);
$user->password= $request->password; 
$user->type=$request->usr_grp;
$user->active='A';
$user->paid_type=$request->usr_paidtype;
$user->country=$request->country;
$user->save();

return view('cms/add-guser')->with('success',"User Added Successfully");
}else{
    return redirect()->to($this->getRedirectUrl())->with('error',"Email already exists")->withInput($request->input());
}
endif;
}
public function list_users(Request $request)
{
if($request->q == "male" || $request->q == "Male" || $request->q == "MALE"):
$request->q="M";
$adminusers_count=Users::where('gender','=',$request->q)->count();
$adminusers=Users::where('gender','=',$request->q)->paginate(20);
return view('cms/general-users-list')->with('users',$adminusers)->with('selected_items',$adminusers_count);
elseif($request->q == "female" || $request->q == "Female" || $request->q == "FEMALE"):
$request->q="F";
$adminusers_count=Users::where('gender','=',$request->q)->count();
$adminusers=Users::where('gender','=',$request->q)->paginate(20);
return view('cms/general-users-list')->with('users',$adminusers)->with('selected_items',$adminusers_count);

endif;

if($request->q != "" && $request->r != "" ):


if($request->r == "male" || $request->r == "Male" || $request->r == "MALE"){
$request->r="M";
$adminusers=Users::where([
	['gender', '=', $request->r ],
	['country', 'like', '%' . $request->q . '%'], 
])
->paginate(20);
$adminusers_count=Users::where([
	['gender', '=', $request->r ],
	['country', 'like', '%' . $request->q . '%'], 
])
->count();
}
elseif($request->r == "female" || $request->r == "Female" || $request->r == "FEMALE"){
$request->r="F";
$adminusers=Users::where([
	['gender', '=', $request->r ],
	['country', 'like', '%' . $request->q . '%'], 
])
->paginate(20);
$adminusers_count=Users::where([
	['gender', '=', $request->r ],
	['country', 'like', '%' . $request->q . '%'], 
])
->count();
}
elseif($request->r == "free" || $request->r == "Free" || $request->r == "FREE"){
$request->r="free";
$adminusers=Users::where([
	['type', '=', $request->r ],
	['first_name', 'like', '%' . $request->q . '%'], 
])
->paginate(20);
$adminusers_count=Users::where([
	['type', '=', $request->r ],
	['first_name', 'like', '%' . $request->q . '%'], 
])
->count();
}
elseif($request->r == "author" || $request->r == "Author" || $request->r == "AUTHOR"){
$request->r="author";
$adminusers=Users::where([
	['type', '=', $request->r ],
	['first_name', 'like', '%' . $request->q . '%'], 
])
->paginate(20);
$adminusers_count=Users::where([
	['type', '=', $request->r ],
	['first_name', 'like', '%' . $request->q . '%'], 
])
->count();
}
return view('cms/general-users-list')->with('users',$adminusers)->with('selected_items',$adminusers_count);

elseif($request->q != ""  && $request->r == "" ):

$adminusers=Users::where('email', '=',$request->q)->orwhere('username','=',$request->q)
    ->orWhere('username', '=', $request->q)->orWhere('first_name', 'like', '%' . $request->q . '%')
->orWhere('gender', '=', $request->q)
->orWhere('country', '=', $request->q)
->orWhere('type', '=', $request->q)
->paginate(20);
$adminusers_count=Users::where('email', '=',$request->q)->orwhere('username','=',$request->q)
    ->orWhere('username', '=', $request->q)->orWhere('first_name', 'like', '%' . $request->q . '%')
->orWhere('gender', '=', $request->q)
->orWhere('country', '=', $request->q)
->orWhere('type', '=', $request->q)
->count();
return view('cms/general-users-list')->with('users',$adminusers)->with('selected_items',$adminusers_count);

else:
 $adminusers=Users::paginate(20);
$adminusers_count=DB::select( DB::raw("SELECT count(first_name) as cnt FROM users"));
//dd($adminusers_count[0]->cnt);
$adminusers_count=$adminusers_count[0]->cnt.'';
//$adminusers_count=count($adminusers);
endif;
 return view('cms/general-users-list')->with('users',$adminusers)->with('selected_items',$adminusers_count);

}
public function edit_displayUser(Request $request)
{
$validator = Validator::make($request->all(), [
       
     'id' => 'required'
   ]);
if ($validator->fails()):

    return view('cms/add-guser')->with('error',"User not found");
endif;

$user= Users::find($request->id);

return view('cms/edit-users')->with('user',$user);

}

public function edit_user(Request $request)
{

	$validator = Validator::make($request->all(), [
       
     'id' => 'required|exists:users,user_id'
   ]);
if ($validator->fails()):

    return view('cms/add-guser')->with('error',"User not found");

endif;
$exist=Users::where('email','=',$request->email)->where('user_id','<>',$request->id)->first();
if(!$exist){
$user=Users::find($request->id);
$user->username=$request->user_name;
$user->email=$request->email; 
$user->first_name=$request->first_name; 
if($request->password != ""):
    
	$user->password=$request->password;
	endif;
	$user->last_name=$request->last_name;
	$user->type=$request->usr_grp;
	$user->gender=$request->usr_gender;
	$user->books_downloaded=$request->b_d;
	$user->books_uploaded=$request->b_u;
        $user->country=$request->usr_country;
       $user->paid_type=$request->usr_paidtype;
      $user->created_at=$request->usr_created;
$user->save();
}else{
    return redirect()->to($this->getRedirectUrl())->with('error',"Email already exists")->withInput($request->input());
}
return view('cms/edit-users')->with('success',"User Updated Successfully")->with('user',$user);
}

public function delete_user(Request $request)
{
if(isset($request->id) && $request->id !="" && $request->id != " "):
	Users::destroy($request->id);
    $adminusers=Users::paginate(20);
	return view('cms/admin-users-list')->with('user_del',"User deleted Successfully!!")->with('users',$adminusers);;
	else:
		$adminusers=Users::pagiante(20);
 return view('cms/admin-users-list')->with('users',$adminusers);;
		endif;
}


//general-users end//
public function edit_footer(Request $request)
{
if(!isset($request->sent) || $request->sent == " "):

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
public function edit_advertpost(Request $request)
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

public function edit_advert(Request $request)

{

$advert=Advert::find(1);
return view('cms/edit-advert')->with('advert',$advert);

}
public function social_links(Request $request)
{
if(!isset($request->sent) || $request->sent == "" || $request->sent == " "):
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
$mainpage->h_alt=$request->h_alt;
$mainpage->h_text=$request->itm2;
$mainpage->h_subtext=$request->itm3;
$mainpage->h_advert=$request->itm4;
$mainpage->m1_image=$request->itm5;
$mainpage->m1_alt=$request->m1_alt;
$mainpage->m1_title=$request->itm6;
$mainpage->m1_text=$request->itm7;
$mainpage->m2_image=$request->itm8;
$mainpage->m2_alt=$request->m2_alt;
$mainpage->m2_title=$request->itm9;
$mainpage->m2_text=$request->itm10;
$mainpage->b_advert=$request->itm12;

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
$newpage->slug=$request->slug;
$newpage->h_subtext=$request->itm3;
$newpage->c_title=$request->itm5;
$newpage->c_text=$request->itm6;
$newpage->img1=$request->itm7;
$newpage->img2=$request->itm8;
$newpage->img3=$request->itm9;
$newpage->save();
return redirect('/edit_page?id='.$newpage->id)->with('status','updated')->with('newpage',$newpage);

}
public function delete_page(Request $request)
{
	if(isset($request->id)):
SinglePage::destroy($request->id);
return redirect('/admin?delete=page is deleted');
	else:
	return redirect('/edit_page?id='.$request->id);

endif;

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

	$blog=Blog::orderBy('post_id', 'desc')->get();
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
$blog->summary=$request->blsummary;
$blog->img_alt=$request->img_alt;
$blog->article=$request->bltext1;
$blog->status=$request->blstatus;
$blog->save();
return redirect('edit_blog?id='.$request->blid)->with('status',"Updated Successfully!!");
}

public function add_blog(Request $request)
{
	if(isset($request->title) && $request->title !="" && $request->title != " "):

$blog= new Blog;
$blog->title=$request->title;
$blog->status=$request->status;
$blog->save();
return redirect('/list_blog')->with('status',"Added Successfully");
		else:
return redirect('/list_blog')->with('status',"Failed");

			endif;
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

public function search_books(Request $request)
{
	$cat=Category::all();
	    $authors=Users::where('type','=','author')->get();
	    $idi=$request->q;

	    $user = DB::table('users')->where('username', 'like', '%' .$idi. '%')->first();

if($user){
 $book = DB::table('books')
->where('title', 'like', '%' .$idi. '%')
->orWhere('author_id', '=' , $idi)
->orWhere('author_name', 'like', '%' .$idi. '%')
->orWhere('author_id', '=', $user->user_id)
->orderBy('book_id','desc')
->get();
}
else{
$book = DB::table('books')
->where('title', 'like', '%' .$idi. '%')
->orWhere('author_id', '=' , $idi)
->orWhere('author_name', 'like', '%' .$idi. '%')
->orderBy('book_id','desc')
->get();
}
	
	
	
	return view('cms/list-books')->with('cat',$cat)->with('authors',$authors)->with('books',$book);

}


public function list_books(Request $request)
{
	if($request->cid == "" ||$request->cid == " "):
		$cat=Category::all();
	    $authors=Users::where('type','=','author')->orderBy('first_name','asc')->get();
	return view('cms/list-books')->with('cat',$cat)->with('authors',$authors);
	else:
             $cat=Category::all();
	    $authors=Users::where('type','=','author')->orderBy('first_name','asc')->get();
	    $idi=$request->cid;
	    
 $book = DB::table('books')
->where('category', 'like', '%,' .$idi. ',%')
->orWhere('category', 'like', '%' .$idi. ',%')
->orWhere('category', 'like', '%,' .$idi. '%')
->orWhere('category', 'like', '%' .$idi. '%')
->orderBy('book_id','desc')
->get();
	
//sort($authors);

	return view('cms/list-books')->with('cat',$cat)->with('authors',$authors)->with('books',$book);
  endif;

}
public function edit_book(Request $request)
{
if($request->id == "" || $request->id == " ")
	return redirect('/list_books');

$book=DB::table('books')->where('book_id','=',$request->id)->first();
$user=DB::table('users')->where('user_id','=',$book->author_id)->first();
return view('cms/edit-book')->with('book',$book)->with('user',$user);

}

public function edit_book_post(Request $request)
{
if($request->bkid == "" || $request->bkid == " ")
     return redirect('/list_books');

$slugTitle=str_slug($request->bktitle, '-');
 $book= Book::find($request->bkid);
 $book->rating=$request->rating;
 $book->total_votes=$request->rating_offset_votes;
 $book->title=$request->bktitle;
$book->adult_filter=$request->ad_f;
$book->robot_index=$request->r_index;
$book->url=$slugTitle;
 $book->m_title=$request->meta_title;
 $book->m_description=$request->metadescription;
 $book->h_text=$request->h1headertext;
 $book->fb=$request->link1;
 $book->blog=$request->link2;
 $book->web=$request->link3;
 $book->twitter=$request->link4;
 $book->pdf_downloads=$request->pdf_downloads;
 $book->epub_downloads=$request->epub_downloads;
 $book->kindle_downloads=$request->kindle_downloads;
 $book->t_text=$request->toplefttext;
 $book->cover_image=$request->bkimage;
 $book->image_alt=$request->bkimagealt;
 $book->synopsis=$request->bkdesc;
 $book->status=$request->status;
 

	if($request->hasFile('pdf') && $book->title != "")
        { 
            $request->file('pdf')->move(public_path().'/books/pdf', $slugTitle.'-obooko.'.$request->file('pdf')->getClientOriginalExtension());
		       $book->pdf=$book->url;
$user=User::where('user_id','=',$book->author_id)->first();
if($user->books_uploaded == 0):
$user->books_uploaded++;
$user->save();
endif;
         }
if($request->hasFile('kindle') && $book->title != "")
        { 
            $request->file('kindle')->move(public_path().'/books/kindle', $slugTitle.'-obooko.'.$request->file('kindle')->getClientOriginalExtension());
		       $book->kindle=$book->url;
$user=User::where('user_id','=',$book->author_id)->first();
if($user->books_uploaded == 0):
$user->books_uploaded++;
$user->save();
endif;
         }
         if($request->hasFile('epub') && $book->title != "")
        { 
            $request->file('epub')->move(public_path().'/books/epub', $slugTitle.'-obooko.'.$request->file('epub')->getClientOriginalExtension());
		       $book->epub=$book->url;
$user=User::where('user_id','=',$book->author_id)->first();
if($user->books_uploaded == 0):
$user->books_uploaded++;
$user->save();
endif;
         }

$book->save();
return redirect('/edit_book?id='.$request->bkid)->with('status',"Updated Successfully");
}
public function view_mail(Request $request)
{
$email=Links::find(1);
return view('cms/manage-admin')->with('email',$email);
}
public function open_book(Request $request)
{
$book=Book::find($request->id);
return view('cms/open-book')->with('book',$book);
}
public function delete_bookfile(Request $request)
{
$book=Book::find($request->id);
$filename="";
if($request->target == "pdf")
{
$filename=public_path().'/books/pdf/'.$book->pdf."-obooko".".pdf";
//return $filename;
File::delete($filename);
$book->pdf="";
$book->save();
return redirect('/list_books?PDF file is deleted');
}elseif($request->target == "epub"){
$filename=public_path().'/books/epub/'.$book->epub."-obooko".".epub";
File::delete($filename);
$book->epub="";
$book->save();
return redirect('/list_books?epub file is deleted');
}elseif($request->target == "kindle"){
$filename=public_path().'/books/kindle/'.$book->kindle."-obooko".".mobi";
File::delete($filename);
$book->kindle="";
$book->save();
return redirect('/list_books?Kindle file is deleted');
}else{
return redirect('/list_books?file is not deleted');
}
}
public function download_fileadmin(Request $request)
{

return response()->download($request->url);
}
public function edit_webmail(Request $request)
{
$email=Links::find(1);
$email->admin_email=$request->email;
$email->save();
return redirect('/manage_admin')->with('status'."Updated Successfully");
}

public function add_book(Request $request)
{
if($request == "" || $request == " ")
	redirect('/list_books');
$user=User::where('user_id','=',$request->cauthor)->first();
if($user->first_name != "")
$username=$user->first_name." ".$user->last_name;
else
$username="";
$book= new Book;
$book->author_id=$request->cauthor;
$book->title=$request->ctitle;
$book->author_name=$username;

$cat="";
$i=0;
	foreach($request->cat_sup as $a):
if($i == 0)
	$cat = $request->cat_sup[$i];
else
        $cat=$cat.','.$a;
$i++;
        endforeach;
        $book->category=$cat;
        $book->save();
	
	DB::table('users')
		->where('user_id', $user->user_id)
		->increment('books_uploaded',1);

        return redirect('/list_books')->with('status',"Book Added Successfully");
}

public function delete_book(Request $request)
{
if($request->id == "" || $request->id == " ")
	return redirect('/list_books')->with('status',"error Book NOT found");
	Book::destroy($request->id);
 return redirect('/list_books')->with('status',"Book Deleted Successfully");
}
//classend
}
