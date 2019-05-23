<?php namespace App\Http\Controllers;
use App\Visitor;
use Carbon\Carbon;
use App\AccessPoint;
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
class contactController extends Controller {




public function contact(Request $request){

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$advert = DB::table('advert')
->first();

	$error = "Email Mismatch";
	
            $rules = ['captcha' => 'required|captcha'];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
		$error = "captcha not matched";
                return view('contact-form')
		->with('resultSet11',$result11)
		->with('resultSet12',$result12)
		->with('Error', $error)->with('Advert', $advert);
            }
            else
            {
                            
	

	if ($request->email == $request->c_email) {

		

		$subject = $request->subject."";
		$message = strval($request->message);

		Mail::send('contact-email',['name' => $request->name,'subject' => $subject ,'email' => $request->email],function($m){
			$m->from('from@example.com','duz');
			$m->to('aizazshahid47@gmail.com','Shahid Iqbal')->subject('Contact Request!');
		});
		

	return redirect('ebooks-books');
	}
	else
		return view('contact-form')
		->with('resultSet11',$result11)
		->with('resultSet12',$result12)
		->with('Error', $error)->with('Advert', $advert);
	}

	}
}















