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
                
		
		return redirect()->to($this->getRedirectUrl())->with('Error', $error)->with('Advert', $advert)->with('resultSet11',$result11)
		->with('resultSet12',$result12)->withInput($request->input());
		
            }
            else
            {
                            
	

	if ($request->email == $request->c_email) {

		
        
		$subject = $request->subject."";
		$bodymessage = $request->message;
        if($subject=="General enquiry"){
		Mail::send('contact-email',['name' => $request->name,'subject' => $subject,'bodymessage' => $bodymessage ,'email' => $request->email],function($m) use ($request){
			$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com',$request->name);
			$m->to('librarian@obooko.com')->subject('Contact Request!');
			$m->replyTo($request->email,$request->name);
		});
        }
        elseif($subject=="Technical problem"){
           Mail::send('contact-email',['name' => $request->name,'subject' => $subject,'bodymessage' => $bodymessage ,'email' => $request->email],function($m) use ($request){
			$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com',$request->name);
			$m->to('support@obooko.com')->subject('Contact Request!');
			$m->replyTo($request->email,$request->name);
		}); 
        }
        elseif($subject=="Author enquiry"){
           Mail::send('contact-email',['name' => $request->name,'subject' => $subject,'bodymessage' => $bodymessage ,'email' => $request->email],function($m) use ($request){
			$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com',$request->name);
			$m->to('writers@obooko.com')->subject('Contact Request!');
			$m->replyTo($request->email,$request->name);
		}); 
        }
        elseif($subject=="Suggestions and Feedback"){
           Mail::send('contact-email',['name' => $request->name,'subject' => $subject,'bodymessage' => $bodymessage ,'email' => $request->email],function($m) use ($request){
			$m->from('noreply@books.cpweb5.temporarywebsiteaddress.com',$request->name);
			$m->to('librarian@obooko.com')->subject('Contact Request!');
			$m->replyTo($request->email,$request->name);
		}); 
        }

	return redirect('ebooks-books')->with('success',$error);
	}
	else
		return view('contact-form')
		->with('resultSet11',$result11)
		->with('resultSet12',$result12)
		->with('Error', $error)->with('Advert', $advert);
	}

	}
}















