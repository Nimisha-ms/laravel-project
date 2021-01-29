<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\CheckPermission;
;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('allcustomer',[CustomerController::class,'index']);
Route::get('addcustomer',[CustomerController::class,'create']);
Route::post('addcustomer',[CustomerController::class,'store']);
Route::get('editcustomer/{id}',[CustomerController::class,'edit']);
Route::post('editcustomer/{id}',[CustomerController::class,'update']);
Route::get('deletecustomer/{id}',[CustomerController::class,'destroy']);


//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);



Route::group(['middleware' => 'auth'], function () {
    // User needs to be authenticated to enter here.
    Route::get('/', function ()    {
        // Uses Auth Middleware
    });

    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });

    Route::get('createpost',[PostController::class,'create']);
    Route::post('createpost',[PostController::class,'store']);

    Route::get('allposts',[PostController::class,'index']);
    Route::get('viewpost/{id}',[PostController::class,'show']);
    Route::post('storecomments',[CommentController::class,'store'])->name('comments.store');
});

//Middleware - User Access Control by Role:

Route::group(['middleware' => 'auth'], function(){
	
	Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

	Route::get('permissions-all-users', [App\Http\Controllers\HomeController::class, 'allUsers'])->middleware('check-permission:user|admin|superadmin');
	
	Route::get('permissions-admin-superadmin', [App\Http\Controllers\HomeController::class, 'adminSuperadmin'])->middleware('check-permission:admin|superadmin');

	Route::get('permissions-superadmin', [App\Http\Controllers\HomeController::class, 'superadmin'])->middleware('check-permission:superadmin');
   
});


//contactus
Route::get('contact',[ContactController::class,'addcontact']);
Route::post('contact',[ContactController::class,'storecontact']);


//Mail:
Route::get('sendmail',function() {

    $details = [
        'title' => 'Mail for testing',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('testFreelance.n@gmail.com')->send(new \App\Mail\MyTestMail($details));

    dd("Mail send successfully");

});

Route::get('email',[JobController::class,'processQueue']);

Route::get('sendnoti',[HomeController::class,'sendNotification']);

Route::get('mail', [MailController::class,'index']);

Route::get('message/index', [MessageController::class,'index']);
Route::get('message/send', [MessageController::class,'send']);

Route::get('sendEmailQueue',[JobController::class, 'processBitQueue']);

Route::get('notifybit',[MessageController::class,'bitNotify']);