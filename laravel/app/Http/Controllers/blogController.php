<?php namespace App\Http\Controllers;
use App\Visitor;
use Carbon\Carbon;
use App\BlogMain;
use Input;
use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use File;
use Image;
use Storage;
use App\Http\Controllers\Controller;
class blogController extends Controller {


//function to redirect any page to the books catalogue page when a category is clicked
//while passing the details of the category selected,dynamically

public function index(Request $request){

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

	$recent = DB::table('blog')
	->where('status','=',"A")
	->take(7)
	->orderBy('post_id','desc')
	->get();

	$result = DB::table('blog')
	->where('status','=',"A")
	->orderBy('post_id','desc')
	->paginate(7);

	foreach ($result as $key) {
		$str = $key->article;
		$key->summary = str_limit($str,250);
	}


	$page_settings = DB::table('blog_mainpage')
	->first();

	$add = DB::table('advert')
	->first();	
$blog=BlogMain::find(1);
	return view('blog-gallery')->with('resultSet', $result)->with('Recent',$recent)
	->with('resultSet11',$result11)
	->with('resultSet12',$result12)
	->with('PageSetting',$page_settings)
        ->with('blog',$blog)
	->with('adds',$add);

}

public function singlePost(Request $request,$post_id){

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

	$result = DB::table('blog')
	->where('post_id','=',$post_id)
	->first();

	$result2 = DB::table('blog')
	->orderBy('post_id','desc')
	->get();

	$add = DB::table('advert')
	->first();

	return view('blog-single-post')->with('resultSet', $result)
	->with('resultSet2', $result2)
	->with('resultSet11',$result11)
	->with('resultSet12',$result12)
	->with('adds',$add);

}



}







