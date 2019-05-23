<?php namespace App\Http\Controllers;
use App\Visitor;
use Carbon\Carbon;
use App\AccessPoint;
use Input;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Response;
use File;
use Image;
use Storage;
use UploadedFile;
use App\Http\Controllers\Controller;
class bookCatalogueController extends Controller {


//function to redirect any page to the books catalogue page when a category is clicked
//while passing the details of the category selected,dynamically

public function category_redirect(Request $request,$category){

$r = DB::table('book_category')
->where('slug','=',$category)
->first();
$idi = $r->id;

$smallText = str_limit($r->br_text,720);


if(!$request->filter){
$result = DB::table('books')
->where('category', 'like', '%' .$idi. '%')
->where('status','=',1)
->orderBy('book_id','desc')
->paginate(20);

}
elseif ($request->filter == "old") {
	$result = DB::table('books')
->where('category', 'like', '%' .$idi. '%')
->where('status','=',1)
->paginate(20);
}
elseif ($request->filter == "new") {
	$result = DB::table('books')
->where('category', 'like', '%' .$idi. '%')
->where('status','=',1)
->orderBy('book_id','desc')
->paginate(20);
}
elseif ($request->filter == "pdf") {
	$result = DB::table('books')

->where('category', 'like', '%,' .$idi. ',%')
->where('status','=',1,'and')
->where([
    ['pdf', '<>', NULL],
    ['kindle', '=', NULL],
    ['epub', '=', NULL],
])
->orderBy('book_id','desc')
->paginate(20);
}
elseif ($request->filter == "kindle") {
    //select(DB::raw('select * from books where status=1'))
	$result = DB::table('books')->where('status','=',1)
->whereNotNull('kindle')
->where('category', 'like', '%' .$idi. '%')
->orderBy('book_id','desc')
->paginate(20);
}
elseif ($request->filter == "epub") {
    
	$result = DB::table('books')
->whereNotNull('epub')
->where('status','=',1)
->where('category', 'like', '%' .$idi. '%')
->orderBy('book_id','desc')
->paginate(20);
}

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$result2 = DB::table('blog')
->orderBy('post_id','desc')
->get();
//print $request->category;
return view('book-catalogue')
->with('resultSet', $result)
->with('Category',$category)
->with('resultSet2',$result2)
->with('resultSet11',$result11)
->with('resultSet12',$result12)
->with('filter',$request->filter)
->with('cat',$r)
->with('ST',$smallText);

}

public function downloadPage(Request $request,$category,$url){

$cat=DB::table('book_category')->where('slug','=',$category)->first();
$result = DB::table('books')
->where('url','=',$url)
->first();

$result2 = DB::table('books')
->where('author_name','=',$result->author_name)
->take(6)
->orderBy('book_id','desc')
->get();
foreach ($result2 as $key) {
   $cat=DB::table('book_category')->where('id','=',$result->category)->first();
$key->category=$cat->slug;
}
$author=DB::table('users')
->where('user_id','=',$result->author_id)
->first();


$r = DB::table('book_category')
->where('slug','=',$category)
->first();
$idi = $r->id;


$result3 = DB::table('books')
->where('category', 'like', '%,' .$idi. ',%')
->orWhere('category', 'like', '%' .$idi. ',%')
->orWhere('category', 'like', '%,' .$idi. '%')
->orWhere('category', 'like', '%' .$idi. '%','and')
->where('status','=',1)
->take(2)
->orderBy('book_id','desc')
->get();
foreach ($result3 as $key) {
	$str = $key->synopsis;
	$key->synopsis = str_limit($str,120);
   $cat=DB::table('book_category')->where('id','=',$result->category)->first();
$key->category=$cat->slug;
}

$synopsis = str_limit($result->synopsis,900);

$counter1 = 0;
$counter2 = 0;
$counter3 = 0;
$counter4 = 0;

if ($result->pdf != NULL) {
	$counter1 = 1;
	
}
if ($result->kindle != NULL) {
	$counter2 = 1;
	
}
if ($result->epub != NULL) {
	$counter3 = 1;
	
}
if ($result->word != NULL) {
	$counter4 = 1;
	
}


$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();
$advert=DB::table('advert')->where('id','=','1')->first();
return view('book-download')
->with('Synopsis',$synopsis)
->with('resultSet', $result)
->with('resultSet2', $result2)
->with('resultSet3', $result3)
->with('counter1', $counter1)
->with('counter2', $counter2)
->with('counter3', $counter3)
->with('counter4', $counter4)
->with('resultSet11',$result11)
->with('advert',$advert)
->with('resultSet12',$result12)
->with('author',$author)
->with('cat',$cat);

}

public function setIndex(Request $request){

$result = DB::table('books')
->where('status','=',1)
->orderBy('book_id','desc')
->take(4)
->get();

foreach ($result as $key) {
	$str = $key->synopsis;
	$key->synopsis = str_limit($str,193);
$cat=str_limit($key->category,1);
$category=DB::table('book_category')->where('id','=',$cat)->first();
$key->category=$category->slug;
}
$result3 = DB::table('books')
->orderBy('book_id','desc')
->take(7)
->get();

$result4 = DB::table('blog')
->orderBy('post_id','desc')
->take(2)
->get();
$str1="";
foreach ($result4 as $key) {
	$str1 = $key->summary;
	$key->summary = str_limit($str1,45);
}



$str=array("","");



	

	




$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();
$mainpage=DB::table('main_page')->where('id','=',1)->first();

$str[0] = str_limit($mainpage->m1_text,180);
$str[1] = str_limit($mainpage->m2_text,240);



//print $request->category;
return view('index')
->with('resultSet', $result)
->with('resultSet3', $result3)
->with('resultSet4', $result4)
->with('resultSet11', $result11)
->with('resultSet12', $result12)
->with('mainpage',$mainpage)
->with('shortSummary',$str);


}

public function bookSubmission(Request $request){
   
   
$user_id = $request->session()->get('id');
 $request->file('cover');
$error = "Book Title Already Exists!!!";
$exists = DB::table('books')
->where('title','=',$request->title)
->first();
$slug=str_slug($request->title, '-');

$bool = false;
$id = 0;

$result = DB::table('users')
			->where('user_id','=',$user_id)
			->first();

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$categories = DB::table('book_category')
->get();


if(!$exists) {

	$rules = ['captcha' => 'captcha'];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
		$error = "captcha not matched";
                return back()->with('status','Captcha not matched');
	if ($result->type == "author") {
		return view('author-submit-submission')
		->with('Error', $error)->with('resultSet11', $result11)
->with('resultSet12', $result12)->with('Categories',$categories);
	}
	elseif ($result->type == "free") {
		return view('submission-form')
		->with('Error', $error)->with('resultSet11', $result11)
->with('resultSet12', $result12)->with('Categories',$categories);
	}
            }
	    else{
$cat="";
$i=0;
	foreach($request->cat_sup as $a):
if($i == 0)
	$cat = $request->cat_sup[$i];
else
        $cat=$cat.','.$a;
$i++;
        endforeach;

	if($request->adult){
		$adult=$request->adult;
	}
	else{
		$adult="off";
	}
	
			

	if($request->author)
	{
		$authorpen=ucfirst($request->author);
		$id = DB::table('books')->insertGetId(
		    ['category' => $cat, 'author_name' => $authorpen, 'pdf_downloads' => 0, 'adult_filter' => $adult, 'title' => $request->title, 'rating' => 0, 'synopsis' => $request->synopsis, 'epub_downloads' => 0, 'kindle_downloads' => 0, 'word_downloads' => 0, 'author_id' => $user_id, 'url' => $slug, 'status' => 0]
		);
	}
	else
	{
		$name = $result->first_name . ' ' . $result->last_name;
		$name=ucfirst($name);
		$id = DB::table('books')->insertGetId(
		    ['category' => $cat, 'author_name' => $name, 'pdf_downloads' => 0, 'adult_filter' => $adult, 'title' => $request->title, 'rating' => 0, 'synopsis' => $request->synopsis, 'epub_downloads' => 0, 'kindle_downloads' => 0, 'word_downloads' => 0, 'author_id' => $user_id, 'url' => $slug, 'status' => 0]
		);
	}
	
			
	

	if($request->hasFile('pdf'))
        { 
            $bool = true;
            $request->file('pdf')->move(public_path().'/books/pdf', $slug.'-obooko.'.$request->file('pdf')->getClientOriginalExtension());
				DB::table('books')
				->where('book_id', $id)
				->update(['pdf' => $slug]);
         }

    if($request->hasFile('kindle'))
        { 
		$bool = true;
              $request->file('kindle')->move(public_path().'/books/kindle', $slug.'-obooko.'.$request->file('kindle')->getClientOriginalExtension());
				DB::table('books')
				->where('book_id', $id)
				->update(['kindle' => $slug]);
         }

    if($request->hasFile('epub'))
        { 
		$bool = true;
              $request->file('epub')->move(public_path().'/books/epub', $slug.'-obooko.'.$request->file('epub')->getClientOriginalExtension());
				DB::table('books')
				->where('book_id', $id)
				->update(['epub' => $slug]);
         }
	

	if($request->hasFile('word'))
        { 
		$bool = true;
              $request->file('word')->move(public_path().'/books/word', $slug.'-obooko.'.$request->file('word')->getClientOriginalExtension());
				DB::table('books')
				->where('book_id', $id)
				->update(['word' => $slug]);
         }


	

	if($request->web)
        { 
		DB::table('books')
		->where('book_id', $id)
		->update(['web' => $request->web]);

         }

	if($request->twitter)
        { 
		DB::table('books')
		->where('book_id', $id)
		->update(['twitter' => $request->twitter]);

         }

	if($request->fb)
        { 
		DB::table('books')
		->where('book_id', $id)
		->update(['fb' => $request->fb]);

         }

	if($request->blog)
        { 
		DB::table('books')
		->where('book_id', $id)
		->update(['blog' => $request->blog]);

         }

        if($request->hasFile('cover'))
        { 
        	
            $image = $request->file('cover');
            $filename  =  $slug.'.' .$request->file('cover')->getClientOriginalExtension();

            $path_image = public_path().'/images/covers/'.$filename;
                Image::make($image->getRealPath())->resize(235,341)->save($path_image);
                DB::table('books')
				->where('book_id', $id)
				->update(['cover_image' => $filename]);
                
         }
	 /*else{
         		DB::table('books')->where('book_id', '=', $id)->delete();
			
			if ($result->type == "author") {
				return view('author-submit-submission')
				->with('Error', "Please Upload a Cover Image")->with('resultSet11', $result11)
->with('resultSet12', $result12)->with('Categories',$categories);
			}
			elseif ($result->type == "free") {
				return view('submission-form')
				->with('Error', "Please Upload a Cover Image")->with('resultSet11', $result11)
->with('resultSet12', $result12)->with('Categories',$categories);
			}
			


         }*/

	

         $user = DB::table('users')
         ->where('user_id','=',$user_id)
         ->first();

         DB::table('users')
		->where('user_id','=',$user_id)
		->increment('books_uploaded',1);

	$categ = DB::table('book_category')
	->where('id','=',$cat)
	->first();
	
	$mail_name = DB::table('books')
	->where('book_id', '=',$id)
	->first();
	
	$aname = DB::table('users')
	->where('user_id', '=',$mail_name->author_id)
	->first();
    
    
    
	if ($result->type == "author") {

		

		Mail::send('book-submit-email',['book' => $request->title,'category' => $categ->name, 'firstname' => $aname->first_name,'lastname' => $aname->last_name,'author_email' => $aname->email,'country' => $aname->country,'synopsis' => $mail_name->synopsis,'author_web' => $mail_name->web,'optional1' => $mail_name->twitter,'optional2' => $mail_name->blog,'author_fb' => $mail_name->fb,'ipAddress' => '192.168.0.8'],	function($m) use ($result,$aname,$mail_name,$request,$categ){
				$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com','obooko');
				$m->to('writers@obooko.com','Dear Admin')->subject('Author New Book!');
			});	
	}
	elseif ($result->type == "free") {
        
		DB::table('users')->where('user_id','=' ,$user_id)->update(['type' => 'author']);

		Mail::send('book-submit-email',['book' => $request->title,'category' => $categ->name, 'firstname' => $aname->first_name,'lastname' => $aname->last_name,'author_email' => $aname->email,'country' => $aname->country,'synopsis' => $mail_name->synopsis,'author_web' => $mail_name->web,'optional1' => $mail_name->twitter,'optional2' => $mail_name->blog,'author_fb' => $mail_name->fb,'ipAddress' => '192.168.0.8'],	function($m) use ($result){
				$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com','obooko');
				$m->to('writers@obooko.com','Dear Admin')->subject('Author First Book!');
			});
	}


	

	return redirect('ebooks-books')->with('success',"yes");
	
	}
	
}
else{
	
	if ($result->type == "author") {
		return view('author-submit-submission')
		->with('Error', $error)->with('resultSet11', $result11)
->with('resultSet12', $result12)->with('Categories',$categories);
	}
	elseif ($result->type == "free") {
		return view('submission-form')
		->with('Error', $error)->with('resultSet11', $result11)
->with('resultSet12', $result12)->with('Categories',$categories);
	}
	
}


}

public function checkLogin(Request $request){

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$categories = DB::table('book_category')
->get();

$id = $request->session()->get('id');
if ($id) {
	$result = DB::table('users')
	->where('user_id','=',$id)
	->first();

	if ($result->type == 'author') {
		return view('author-submit-submission')
		->with('resultSet11',$result11)
		->with('resultSet12',$result12)
		->with('Categories',$categories);
	}
	elseif($result->type == 'free'){
		return view('submission-form')
		->with('resultSet11',$result11)
		->with('resultSet12',$result12)
		->with('Categories',$categories);
	}
}
else{
	return redirect('registration');
}
//print $name;
/*return view('book-catalogue')
->with('resultSet', $result);*/

}

public function bookUpdate(Request $request){

$user_id = $request->session()->get('id');

$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title);
$result = DB::table('users')
			->where('user_id','=',$user_id)
			->first();

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();
$title = DB::table('books')
->where('title','=',$request->title)
->first();
$error = "Book with this title does not exist";



if ($title) {

	$slug=str_slug($request->title, '-');
	
	$id=DB::table('books')
	->where('book_id','=',$title->book_id)
	->update(['synopsis' => $request->synopsis]);


	$filename="";

	if($request->hasFile('pdf'))
        {
		$filename=$title->pdf."-obooko".".pdf";
		File::delete($filename); 
            
            $request->file('pdf')->move(public_path().'/books/pdf', $slug.'-obooko.'.$request->file('pdf')->getClientOriginalExtension());
				DB::table('books')
				->where('book_id', $title->book_id)
				->update(['pdf' => $slug]);
         }

    if($request->hasFile('kindle'))
        { 
		$filename=$book->kindle."-obooko".".mobi";
		File::delete($filename);
		
              $request->file('kindle')->move(public_path().'/books/kindle', $slug.'-obooko.'.$request->file('kindle')->getClientOriginalExtension());
				DB::table('books')
				->where('book_id', $title->book_id)
				->update(['kindle' => $slug]);
         }

    if($request->hasFile('epub'))
        { 
		$filename=$book->epub."-obooko".".epub";
		File::delete($filename);
              $request->file('epub')->move(public_path().'/books/epub', $slug.'-obooko.'.$request->file('epub')->getClientOriginalExtension());
				DB::table('books')
				->where('book_id', $title->book_id)
				->update(['epub' => $slug]);
         }

	if($request->hasFile('word'))
        { 
		       
              $request->file('word')->move(public_path().'/books/word', $slug.'-obooko.'.$request->file('word')->getClientOriginalExtension());
				DB::table('books')
				->where('book_id', $title->book_id)
				->update(['word' => $slug]);
         }

	if($request->web)
        { 
		DB::table('books')
		->where('book_id', $title->book_id)
		->update(['web' => $request->web]);

         }

	if($request->twitter)
        { 
		DB::table('books')
		->where('book_id', $title->book_id)
		->update(['twitter' => $request->twitter]);

         }

	if($request->fb)
        { 
		DB::table('books')
		->where('book_id', $title->book_id)
		->update(['fb' => $request->fb]);

         }

	if($request->blog)
        { 
		DB::table('books')
		->where('book_id', $title->book_id)
		->update(['blog' => $request->blog]);

         }

	if($request->hasFile('cover'))
        { 
        	
            $image = $request->file('cover');
            $filename  =  $slug.".".$request->file('cover')->getClientOriginalExtension();

            $path_image = public_path().'/images/covers/'.$filename;
                Image::make($image->getRealPath())->resize(235,341)->save($path_image);
                DB::table('books')
				->where('book_id', $title->book_id)
				->update(['cover_image' => $filename]);
                
         }

Mail::send('book-update-email',['book' => $request->title, 'author' => $title->author_name],	function($m) use ($result){
				$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com','obooko');
				$m->to('writers@obooko.com','Dear Admin')->subject('Book Update!');
			});

return redirect('ebooks-books')->with('success',"yo");


}
else{
	return redirect('author-updates')->with('Error',$error)->with('resultSet11', $result11)
->with('resultSet12', $result12);
}


}


public function download_Page(Request $request){
$user_id = $request->session()->get('id');
	$result = DB::table('books')
	->where('book_id', '=', $request->id)->first();
	$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();
	
	$already = DB::table('downloads')
	->where([
    	['user_id', '=', $user_id],
    	['book_id', '=', $request->id],
	])->first();
//return $already;
	if($already){
		return view('download-page')->with('bookId',$request->id)->with('format',$request->format)->with('result',$result)
	->with('resultSet11', $result11)
->with('resultSet12', $result12)->with('already',1);
	}
	else{
	return view('download-page')->with('bookId',$request->id)->with('format',$request->format)->with('result',$result)
	->with('resultSet11', $result11)
	->with('resultSet12', $result12);
	}


}


public function downloadFile(Request $request){
	$user_id = $request->session()->get('id');
	
	$result = DB::table('downloads')
	->where([
    	['user_id', '=', $user_id],
    	['book_id', '=', $request->id],
	])->first();
	$book = DB::table('books')
		->where('book_id','=',$request->id)
		->first();
	$slug=str_slug($book->title, '-');
	if ($result) {
		echo "You have downloaded this book Once";
		$user = DB::table('users')
		->where('user_id','=',$user_id)
		->first();
		DB::table('users')
		->where('user_id','=',$user_id)
		->increment('books_downloaded',1);

		
		if ($request->format == "pdf") {
			DB::table('books')
			->where('book_id','=',$request->id)
			->increment('pdf_downloads',1);
			$pathToFile = 'books/pdf/'.$slug.'-obooko'.'.pdf';
		}
		elseif($request->format == "epub") {
			DB::table('books')
			->where('book_id','=',$request->id)
			->increment('epub_downloads',1);
			$pathToFile = 'books/epub/'.$slug.'-obooko'.'.epub';
		}
		elseif ($request->format == "kindle") {
			DB::table('books')
			->where('book_id','=',$request->id)
			->increment('kindle_downloads',1);
			$pathToFile = 'books/kindle/'.$slug.'-obooko'.'.mobi';
		}
		elseif ($request->format == "word") {
			DB::table('books')
			->where('book_id','=',$request->id)
			->increment('word_downloads',1);
			$pathToFile = 'books/word/'.$slug.'-obooko'.'.doc';
		}
		
		return response()->download($pathToFile);
	}
	else{
		
		DB::table('downloads')->insert(
	    	['user_id' => $user_id, 'book_id' => $request->id]
		);

		$user = DB::table('users')
		->where('user_id','=',$user_id)
		->first();
		DB::table('users')
		->where('user_id','=',$user_id)
		->increment('books_downloaded',1);

		
		if ($request->format == "pdf") {
			DB::table('books')
			->where('book_id','=',$request->id)
			->increment('pdf_downloads',1);
			$pathToFile = 'books/pdf/'.$slug.'-obooko'.'.pdf';
		}
		elseif($request->format == "epub") {
			DB::table('books')
			->where('book_id','=',$request->id)
			->increment('epub_downloads',1);
			$pathToFile = 'books/epub/'.$slug.'-obooko'.'.epub';
		}
		elseif ($request->format == "kindle") {
			DB::table('books')
			->where('book_id','=',$request->id)
			->increment('kindle_downloads',1);
			$pathToFile = 'books/kindle/'.$slug.'-obooko'.'.mobi';
		}
		elseif ($request->format == "word") {
			DB::table('books')
			->where('book_id','=',$request->id)
			->increment('word_downloads',1);
			$pathToFile = 'books/word/'.$slug.'-obooko'.'.doc';
		}

		return response()->download($pathToFile); 
		//return redirect('index');
	}
}

public function authorFeedback(Request $request){
	$error = "Email Mismatch!!!";
	$author = DB::table('users')
		->where('user_id','=',$request->author)
		->first();
		
		$book = DB::table('books')
		->where([
    ['author_id', '=', $author->user_id],
    ['title', '=', $request->title],
])->first();

		
		$msg = serialize($request->message);

		$rules = ['captcha' => 'required|captcha'];
            $validator = Validator::make($request->all(), $rules);
if ($validator->fails()) {
	$error = "Captcha did not match";
	return redirect('send-feedback')->with('Error', $error);            

}else{

		if ($request->email == $request->c_email) {	
			Mail::send('feedback-email',['name' => $book->title,'personName' => $request->name, 'feedback'=>$request->message , 'email' => $request->email],	function($m) use ($author,$request){
				$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com','obooko');
				$m->to($author->email,$author->first_name)->subject('Feedback!');
				$m->replyTo($request->email,$request->name);
			});
			return redirect('ebooks-books')->with('success',$error);
		}
		else{
			return redirect('send-feedback')
			->with('Error', $error);
		}

}
		
}
public function update_rating(Request $request){
$book = DB::table('books')
		->where('book_id','=',$request->id)
		->first();
if($book->rating == 0){
	$votes = $request->rate;
}
else{
	$votes=ceil(($book->rating+$request->rate)/2);
}

$bookss=DB::table('books')
	->where('book_id','=',$request->id)
	->update(['rating' => $votes]);
	DB::table('books')
			->where('book_id','=',$request->id)
			->increment('total_votes',1);


return $book->total_votes+1;
}

public function search(Request $request){

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$title = DB::table('books')
		->where('title','like','%'.$request->search.'%')->get();

$author = DB::table('books')
		->where('author_name','like','%'.$request->search.'%')->get();

$description = DB::table('books')
		->where('m_description','like','%'.$request->search.'%')->get();

$synopsis = DB::table('books')
		->where('synopsis','like','%'.$request->search.'%')->get();


foreach ($title as $key) {
	
   $cat=DB::table('book_category')->where('id','=',$key->category)->first();
$key->category=$cat->slug;
}
foreach ($author as $key) {
	
   $cat=DB::table('book_category')->where('id','=',$key->category)->first();
$key->category=$cat->slug;
}
foreach ($description as $key) {
	
   $cat=DB::table('book_category')->where('id','=',$key->category)->first();
$key->category=$cat->slug;
}
foreach ($synopsis as $key) {
	
   $cat=DB::table('book_category')->where('id','=',$key->category)->first();
$key->category=$cat->slug;
}

return view('search-page')->with('Title',$title)->with('Author',$author)->with('Description',$description)->with('Synopsis',$synopsis)->with('resultSet11',$result11)->with('resultSet12',$result12);
}


//single page
public function single_page(Request $request)
{
    
if(!isset($request) || $request == "" || $request == " ")
	return redirect('/');
$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$page=DB::table('single_page')->where('slug','=',$request->slug)->first();
$advert=DB::table('advert')->where('id','=',1)->first();
return view('single-page')->with('page',$page)->with('resultSet11',$result11)->with('resultSet12',$result12)->with('advert',$advert);
}

}











