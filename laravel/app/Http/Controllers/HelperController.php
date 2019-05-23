<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Socialize;
use Redirect;
use Validator;
use File;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class HelperController extends Controller
{


function resize(Request $request){

	if($request->w)
		$width=$request->w;
	else
		$width=0;

	if($request->h)
		$height=$request->h;
	else
		$height=0;

	$image =$request->image;

	if($image[0] != "/") { // Decide where to look for the image if a full path is not given
		if(!isset($_SERVER["HTTP_REFERER"])) { // Try to find image if accessed directly from this script in a browser
			$image = $_SERVER["DOCUMENT_ROOT"].implode("/", (explode('/', $_SERVER["PHP_SELF"], -1)))."/".$image;
		} else {
			$image = implode("/", (explode('/', $_SERVER["HTTP_REFERER"], -1)))."/".$image;
		}
	} else {
		$image = $_SERVER["DOCUMENT_ROOT"].$image;
	}
	$image_properties = getimagesize($image);
	$image_width = $image_properties[0];
	$image_height = $image_properties[1];
	$image_ratio = $image_width / $image_height;
	$type = $image_properties["mime"];

	if(!$width && !$height) {
		$width = $image_width;
		$height = $image_height;
	}
	if($width > $image_width || $height > $image_height)
	{
		$width = $image_width;
		$height = $image_height;	
	}
	if(!$width) {
		$width = round($height * $image_ratio);
	}
	if(!$height) {
		$height = round($width / $image_ratio);
	}

	if($type == "image/jpeg") {
		header('Content-type: image/jpeg');
		$thumb = imagecreatefromjpeg($image);
	} elseif($type == "image/png") {
		header('Content-type: image/png');
		$thumb = imagecreatefrompng($image);
	} else {
		return false;
	}

	$temp_image = imagecreatetruecolor($width, $height);
	imagecopyresampled($temp_image, $thumb, 0, 0, 0, 0, $width, $height, $image_width, $image_height);
	$thumbnail = imagecreatetruecolor($width, $height);
	imagecopyresampled($thumbnail, $temp_image, 0, 0, 0, 0, $width, $height, $width, $height);

	if($type == "image/jpeg") {
		imagejpeg($thumbnail);
    
	} else {
		imagepng($thumbnail);
	}

	imagedestroy($temp_image);
	imagedestroy($thumbnail);
}
public function resize2(Request $request)
{
	$img_src=$request->image;
$img = Image::make(asset($img_src));

// crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel
$image=$img->fit($request->h);
return Image::make($image)->response('jpg');
}

public function mkdir_location()
{
	$location_id=Input::get('location_id');
	$path_splash = public_path().'/locations/'.$location_id.'/splashpage/';
	$path_comm = public_path().'/locations/'.$location_id.'/comm/';
File::makeDirectory($path_splash, $mode = 0777, true, true);
File::makeDirectory($path_comm, $mode = 0777, true, true);
}



}