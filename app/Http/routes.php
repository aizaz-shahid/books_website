<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Http\Request;


Route::get('/', function () {
    return redirect('/ebooks-books');
});
Route::get('/ebooks-books', 'bookCatalogueController@setIndex' );
Route::get('/category/{category}', 'bookCatalogueController@category_redirect');
Route::get('/download/{category}/{url}', 'bookCatalogueController@downloadPage');

Route::get('contact-us', function () {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$advert = DB::table('advert')
->first();

    return view('contact-form')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('Advert',$advert);
});
/*Route::get('/page/{slug}', function () {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

    return view('single-page')->with('resultSet11',$result11)->with('resultSet12',$result12);
});*/
Route::get('/page/{slug}', 'bookCatalogueController@single_page');
Route::get('submit-book', 'bookCatalogueController@checkLogin');
Route::get('blog', 'blogController@index');
Route::get('blog-gallery', 'blogController@index');
Route::get('registration', function () {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();
$advert=DB::table('advert')->where('id','=','1')->first();
    return view('login-registration')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('advert',$advert);
});

Route::get('recover-password', function () {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

    return view('lost-password')->with('resultSet11',$result11)->with('resultSet12',$result12);
});
Route::post('my-account', 'loginRegisterController@login');
Route::post('welcome-user', 'loginRegisterController@register');
Route::get('my-account', 'loginRegisterController@myAccount');
Route::get('user-change-password', function () {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

    return view('user-change-password')->with('resultSet11',$result11)->with('resultSet12',$result12);
});
Route::get('user-change-email', function () {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

    return view('user-change-email')->with('resultSet11',$result11)->with('resultSet12',$result12);
});
Route::get('author-change-password', function () {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

    return view('author-change-password')->with('resultSet11',$result11)->with('resultSet12',$result12);
});
Route::get('author-change-email', function () {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

    return view('author-change-email')->with('resultSet11',$result11)->with('resultSet12',$result12);
});
Route::get('user-close-account', function () {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

    return view('user-close-account')->with('resultSet11',$result11)->with('resultSet12',$result12);
});
Route::post('delete-user', 'loginRegisterController@deleteAccount');
Route::post('change-password', 'loginRegisterController@changePassword');
Route::post('change-email', 'loginRegisterController@changeEmail');
Route::post('submit-book', 'bookCatalogueController@bookSubmission');
Route::post('contact-us', 'contactController@contact');
Route::get('Logout', 'loginRegisterController@logout');
Route::post('send-password', 'loginRegisterController@recoverPassword');
Route::get('author-download-figures', 'loginRegisterController@downloadFigures');
Route::get('author-submit-submission', function () {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$categories = DB::table('book_category')
->get();


    return view('author-submit-submission')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('Categories',$categories);
});
Route::get('author-updates', function () {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$user_id = Session::get('id');

$books = DB::table('books')
->where('author_id','=',$user_id)
->get();

    return view('author-updates')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('books',$books);
});
Route::post('author-updates', 'bookCatalogueController@bookUpdate');
Route::post('download-book', 'bookCatalogueController@downloadFile');
Route::post('download-page', 'bookCatalogueController@download_Page');
Route::get('/blog-post/article/{id}', 'blogController@singlePost');
Route::any('/get_votes', 'bookCatalogueController@update_rating');
Route::post('send-feedback', function (Request $request) {

$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

    return view('feedback')->with('resultSet11',$result11)->with('resultSet12',$result12)
    ->with('result',$request->author)
    ->with('result2',$request->title);
});
Route::post('send-feedback-form', 'bookCatalogueController@authorFeedback');
//Route::post('search-result', 'bookCatalogueController@search');
Route::get('search-result', function () {
	
	$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

    return view('search-page')->with('resultSet11',$result11)->with('resultSet12',$result12);
});
Route::get('copyright-explained', function () {
	
	$result11 = DB::table('book_category')
->where('type','=','F')
->get();

$result12 = DB::table('book_category')
->where('type','=','NF')
->get();

$page = DB::table('single_page')
->where('slug','=','copyright-explained')
->first();
$advert=DB::table('advert')->where('id','=','1')->first();
    return view('single-page')->with('resultSet11',$result11)->with('resultSet12',$result12)->with('page',$page)->with('advert',$advert);
});




//CMS routes start

Route::get('/login', 'Auth\AuthController@showlogin');
Route::post('/login', 'Auth\AuthController@dologin');
Route::get('/logout', 'Auth\AuthController@logout');
Route::get('/admin', function () {
    return view('/cms/cms-index');
})->middleware('auth');
Route::get('/admin_login', function () {
    return view('/cms/login');
});
Route::get('/general_upload', function () {
    return view('/cms/general-upload');
})->middleware('auth');
Route::get('/manage_admin', function () {
    return view('/cms/manage-admin');
})->middleware('auth');
Route::get('/covers_upload', function () {
    return view('/cms/covers-upload');
})->middleware('auth');
Route::get('/view_general_images', function () {
    return view('/cms/view-general-images');
})->middleware('auth');
Route::get('/view_covers_images', function () {
    return view('/cms/view-covers-images');
})->middleware('auth');
Route::get('/add_adminuser', function () {
    return view('/cms/add-adminuser');
})->middleware('auth');
Route::get('/add_page', function () {
    return view('/cms/add-spage');
})->middleware('auth');

Route::get('/admin_users_list', 'CmsController@list_adminusers');
Route::get('/edit_adminuser', 'CmsController@edit_displayAdminUser');
Route::get('/delete_adminuser', 'CmsController@delete_adminuser');

Route::post('/general_upload', 'CmsController@image_uploader');
Route::post('/covers_upload', 'CmsController@image_uploader');
Route::post('/view_covers_images', 'CmsController@delete_images');
Route::post('/view_general_images', 'CmsController@delete_images');
Route::post('/edit_adminusers', 'CmsController@edit_adminuser');
Route::get('/edit_footer', 'CmsController@edit_footer');
Route::post('/edit_footer', 'CmsController@edit_footer');
Route::get('/edit_advert', 'CmsController@edit_advert');
Route::post('/edit_advertpost', 'CmsController@edit_advertpost');
Route::get('/edit_social_links', 'CmsController@social_links');
Route::post('/edit_social_links', 'CmsController@social_links');
Route::post('/add_adminuser', 'CmsController@add_admin');

//CMS genneral Usrs
Route::get('/add_user', function () {
    return view('/cms/add-guser');
})->middleware('auth');
Route::get('/users_list', 'CmsController@list_users');
Route::get('/edit_user', 'CmsController@edit_displayUser');
Route::get('/delete_user', 'CmsController@delete_user');
Route::post('/edit_users', 'CmsController@edit_user');
Route::post('/add_user', 'CmsController@add_user');
//cms mainpage
Route::get('/edit_mainpage', 'CmsController@edit_mainpage');
Route::post('/edited_mainpage', 'CmsController@edit_mainpost');
//single page
Route::get('/edit_page', 'CmsController@edit_page');
Route::post('/edit_spage', 'CmsController@edit_postpage');
Route::post('/add_spage', 'CmsController@add_page');
Route::get('/deletepage', 'CmsController@delete_page');
//Category
Route::get('/list_category', 'CmsController@list_category');
Route::get('/edit_category', 'CmsController@edit_category');
Route::post('/add_category', 'CmsController@add_category');
Route::post('/edit_category_post', 'CmsController@edit_category_post');
Route::get('/delete_category', 'CmsController@delete_category');

//Autors
Route::get('/list_authors', 'CmsController@list_authors');
Route::post('/add_authors', 'CmsController@add_authors');
Route::get('/edit_author', 'CmsController@edit_author');
Route::post('/edit_author_post', 'CmsController@edit_author_post');
Route::get('/delete_author', 'CmsController@delete_author');

//mssgs
Route::get('/msg_author', 'CmsController@author_msg');
Route::get('/msg_user', 'CmsController@user_msg');
Route::post('/msg_post', 'CmsController@msg_post');

//blog
Route::get('/edit_blogpage', 'CmsController@edit_blogmain');
Route::post('/blogmain_post', 'CmsController@edit_bmainpost');
Route::get('/list_blog', 'CmsController@list_blogs');
Route::get('/edit_blog', 'CmsController@edit_blog');
Route::post('/edit_blog_post', 'CmsController@edit_blogpost');
Route::post('/add_blog', 'CmsController@add_blog');
Route::get('/delete_blog', 'CmsController@delete_blog');

//book_listng
Route::get('/list_books', 'CmsController@list_books');
Route::get('/search_books', 'CmsController@search_books');
Route::get('/edit_book', 'CmsController@edit_book');
Route::post('/edit_book_post', 'CmsController@edit_book_post');
Route::post('/add_book', 'CmsController@add_book');
Route::get('/delete_book', 'CmsController@delete_book');
Route::get('/delete_bookfile', 'CmsController@delete_bookfile');
Route::get('/open_book', 'CmsController@open_book');
Route::get('/download_admin', 'CmsController@download_fileadmin');

Route::post('/manage_adminpost', 'CmsController@edit_webmail');
Route::get('/manage_admin', 'CmsController@view_mail');
//resize
Route::get('/resize', 'HelperController@resize2');
