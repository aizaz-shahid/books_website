<?php namespace App\Http\Controllers;
use App\Visitor;
use Carbon\Carbon;
use App\AccessPoint;
use Input;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use File;
use Redirect;
use Image;
use Storage;
use App\Http\Controllers\Controller;
class loginRegisterController extends Controller {


//function to redirect any page to the books catalogue page when a category is clicked
//while passing the details of the category selected,dynamically

public function login(Request $request){

$error = "Authentication Failed";

//$data = bcrypt($request->password);

if(filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
        $result1 = DB::table('users')->where([
	    ['email', '=', $request->username],
	    ['password', '=', $request->password],
	])->first();    }
    else {
        $result1 = DB::table('users')->where([
	    ['username', '=', $request->username],
	    ['password', '=', $request->password],
	])->first();
    }




$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

//checking if the user logged in is a valid user
//if yes then is he a free user or an author
if($result1)
{
	
	$request->session()->put('id' , $result1->user_id);
	return redirect()->back()->with('resultSet11',$result11)->with('resultSet12',$result12);
	/*if ($result1->type == "author") {
		
		$msg1 = DB::table('messages')->where('type','=','a')->first();
		$request->session()->put('id' , $result1->user_id);
		//print ($request->session()->get('id'));
		return redirect('my-account')->with('resultSet11',$result11)->with('message',$msg1->content)->with('resultSet12',$result12);
	}
	elseif($result1->type == "free") {
		
		$msg2 = DB::table('messages')->where('type','=','u')->first();
		$request->session()->put('id' , $result1->user_id);
		//print ($request->session()->get('id'));
		return redirect('my-account')->with('resultSet11',$result11)->with('message',$msg2->content)->with('resultSet12',$result12);
	}*/
}
else{
	return redirect()->back()->with('loginError', $error)->with('resultSet11',$result11)->with('resultSet12',$result12);
}
//return $data;
/*if (Auth::attempt(['email' => $request->email, 'password' => $data])) {
            // Authentication passed...
            //return redirect()->intended('index');
        return 'logged in';
}*/


}

public function register(Request $request){


$error2 = "Email Already Exists!!!";
$usernameError = "Username Already Exists!!!";
//$password=bcrypt($request->password);
$exists = DB::table('users')
->where('email','=',$request->email)
->first();

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$username = DB::table('users')
->where('email','=',$request->email)
->first();

if(!$exists){
	//checking for duplicate username
	
	//matching the password and re-enter password fields value
	 

	
		$rules = ['captcha' => 'required|captcha'];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
		$error = "captcha not matched";
                return view('login-registration')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('firstname',$request->firstname)->with('lastname',$request->lastname)->with('email',$request->email)->with('password',$request->password)->with('username',$request->username)
		->with('Error', $error);

            }
	    else{
		$firstname=ucfirst($request->firstname);
		$lastname=ucfirst($request->lastname);
		//inserting users credentials into database
		$id = DB::table('users')->insertGetId(
		    ['email' => $request->email, 'password' => $request->password, 'gender' => $request->gender, 'country' => $request->country, 'first_name' => $firstname, 'last_name' => $lastname, 'books_downloaded' => 0, 'books_uploaded' => 0,'type' => "free", 'active' => "A"]
		);
		//fetching recently added users details
		$result = DB::table('users')
		->where('user_id','=',$id)
		->first();

		Mail::send('register-email',['name' => $request->firstname],function($m) use ($request){
			$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com','obooko');
			$m->to($request->email,'Dear User')->subject('Congragulations!');
		});

		Mail::send('register-email',['name' => 'Admin','Name' => $request->firstname.' '.$request->lastname],function($m){
			$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com','obooko');
			$m->to('bitf14m024@pucit.edu.pk','Aizaz')->subject('Congragulations!');
		});
		//displaying the user's account page
		$msg2 = DB::table('messages')->where('type','=','u')->first();
		$request->session()->put('id' , $id);
		
		return view('user-account-home')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('message',$msg2->content)
		->with('Name', $result);

		}


	
     

}
else{
	return view('login-registration')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('firstname',$request->firstname)->with('lastname',$request->lastname)->with('password',$request->password)->with('username',$request->username)
	->with('Error', $error2);
}



}

public function myAccount(Request $request){

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();



$id=$request->session()->get('id');
$result=DB::table('users')->where('user_id', '=', $id)->first();
//displaying the user's account page with his name dynamically
if ($result->type == "author") {

	$msg1 = DB::table('messages')->where('type','=','a')->first();
$advert=DB::table('advert')->where('id','=','1')->first();
	return view('author-account-home')->with('resultSet11',$result11)->with('resultSet12',$result12)
	->with('Name', $result)->with('message',$msg1->content)->with('advert',$advert);
}
elseif ($result->type == "free") {

	$msg2 = DB::table('messages')->where('type','=','u')->first();
$advert=DB::table('advert')->where('id','=','1')->first();
	return view('user-account-home')->with('resultSet11',$result11)->with('resultSet12',$result12)
	->with('Name', $result)->with('message',$msg2->content)->with('advert',$advert);
}

}

public function logout(Request $request){
$request->session()->forget('id');
return redirect('registration');
}

public function deleteAccount(Request $request){
$note = $request->close_account;
DB::table('feedback')
->insert(['message' => $note]);
$id = $request->session()->get('id');
//deleting the record of the user
DB::table('users')->where('user_id', '=', $id)->delete();
$request->session()->forget('id');
//displaying the home page
return redirect('ebooks-books');

}

public function changeEmail(Request $request){

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$id = $request->session()->get('id');
$error = "Authentication Failed";
$user=DB::table('users')
	->where('user_id', $id)->first();
	
if($user->type=='free'){
    
if ($request->n_email == $request->r_email) {
	DB::table('users')
	->where('user_id', $id)
	->update(['email' => $request->r_email]);
    Mail::send('change-email',['thing' => 'Email','Name' => $user->first_name.' '.$user->last_name,'email'=>$request->r_email],function($m) use ($user,$request){
			$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com','obooko');
			$m->to($request->r_email,$user->first_name)->subject('Email Updated!');
		});
	return view('user-change-email')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('success', $error);
}
else{
	return view('user-change-email')->with('resultSet11',$result11)->with('resultSet12',$result12)
	->with('Error', $error);
}
}
elseif($user->type=='author'){
    
    if ($request->n_email == $request->r_email) {
	DB::table('users')
	->where('user_id', $id)
	->update(['email' => $request->r_email]);
    Mail::send('change-email',['thing' => 'Email','Name' => $user->first_name.' '.$user->last_name,'email'=>$request->r_email],function($m) use ($user,$request){
			$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com','obooko');
			$m->to($request->r_email,$user->first_name)->subject('Email Updated!');
		});
	return view('author-change-email')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('success', $error);
}
else{
	return view('author-change-email')->with('resultSet11',$result11)->with('resultSet12',$result12)
	->with('Error', $error);
}
}


//displaying the home page


}

public function changePassword(Request $request){

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$id = $request->session()->get('id');
$error = "Authentication Failed";
$user=DB::table('users')
	->where('user_id', $id)->first();

if($user->type=='free'){
    
if ($request->n_password == $request->r_password) {
	DB::table('users')
	->where('user_id', $id)
	->update(['password' => $request->r_password]);
    Mail::send('change-email',['thing' => 'Password','Name' => $user->first_name.' '.$user->last_name,'email'=>$request->r_password],function($m) use ($user,$request){
			$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com','obooko');
			$m->to($user->email,$user->first_name)->subject('Password Updated!');
		});
	return view('user-change-password')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('success', $error);
}
else{
	return view('user-change-password')->with('resultSet11',$result11)->with('resultSet12',$result12)
	->with('Error', $error);
}
}
elseif($user->type=='author'){
    
    if ($request->n_password == $request->r_password) {
	DB::table('users')
	->where('user_id', $id)
	->update(['password' => $request->r_password]);
    Mail::send('change-email',['thing' => 'Password','Name' => $user->first_name.' '.$user->last_name,'email'=>$request->r_password],function($m) use ($user,$request){
			$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com','obooko');
			$m->to($user->email,$user->first_name)->subject('Password Updated!');
		});
	return view('author-change-password')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('success', $error);
}
else{
	return view('author-change-password')->with('resultSet11',$result11)->with('resultSet12',$result12)
	->with('Error', $error);
}
}


}

public function recoverPassword(Request $request){

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$error = "Email does not exist";
//Fetching the user's credentials
$result = DB::table('users')->where('email', '=', $request->recover_p)->first();
if ($result) {
	Mail::send('password-recovery-email',['name' => $result->first_name,'password' => $result->password],function($m){
		$m->from('from@example.com','duz');
		$m->to('aizazshahid47@gmail.com','Shahid Iqbal')->subject('Password Recovery!');
	});
}
else{
	return view('lost-password')->with('resultSet11',$result11)->with('resultSet12',$result12)
	->with('Error', $error);
}
//displaying the login page
return redirect('registration');

}

public function downloadFigures(Request $request){

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$id = $request->session()->get('id');

$result = DB::table('books')->where('author_id', '=', $id)->orderBy('book_id','desc')->get();
foreach ($result as $key) {
	if(strlen($key->category) == 1){
		$cat=$key->category[0];
	}
	elseif(strlen($key->category) > 1){
		$cat=substr($key->category, 0, 2);
	}
	
$category=DB::table('book_category')->where('id','=',$cat)->first();
$key->category=$category->slug;
}
//displaying the home page
return view('author-download-figures')->with('resultSet11',$result11)->with('resultSet12',$result12)
->with('resultSet',$result);
}

}













