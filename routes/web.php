<?php
// importing All Controller
use App\Http\Controllers\addmember;
use App\Http\Controllers\login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\UploadController;
use App\Http\Livewire\ContactForm;
use App\Http\Livewire\ShowContacts;
use App\Mail\Samplemail;
use GuzzleHttp\Middleware;

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
Route :: view('about','about');
Route :: get('duco',[Users::class,'viewLoad']);

// //////// dispalying Blade tempalte data ////////////////////////
Route ::get('/products',[products::class,'display']);

// //////////////////////// geting form data /////////////////////////
Route ::post('/products',[products::class,'getdata']);
Route :: view('login','product');

///////////////////////// Tree Types Of Middle ware are down ////////////////////
// single Route middleware
Route :: view('contact','contact')->middleware('single');

// ///////////////// Group Middle ware /////////
Route::group(['middleware'=>['protectedpage']],function(){
    Route :: view('contact','contact');
    Route :: view('about','about');
});

///////// geting Data form database inside Users contrller/////////////////
Route :: get('users',[Users::class,'getusers']);
///////// geting Data form the API function inside Users contrller /////////////////
Route :: get('getApi',[Users::class,'getApi']);

// Route ::get('users/{name}',[Users ::class, 'welcome']);

Route :: view('all','users');



/////////////////// Session Login /////////////
Route::post('/user',[LoginController::class,'loginuser']);
 //////// when to go login page
 Route::get('/loginv', function () {
    if(session()->has('username')){
        return redirect('about');
    }
    return view('loginview');
});
/// logout
Route::get('/logout', function () {
    if(session()->has('username')){
        session()->pull('username');
    }
    return redirect('loginv');
});
Route::get('about',function(){
	if(!session()->has('username') ){
		return redirect('loginv');
    }
});



///////// uplading file view ///////
Route::view('upload','upload');
Route::post('upload',[UploadController::class,'upload']);

// Route controller featurekaan waxaa wata laravel 9
Route::controller(addmember::class)->group(function(){
//////// Adding members to the database ///////////
Route ::post('/addmember','addmember');
/// showing All members //////////////////////////////
Route ::get('/showm','showmember');
/// showing All members //////////////////////////////
Route ::get('delete/{id}','deletemember');
/// getin one members to update //////////////////////////////
Route ::get('edit/{id}','getmember');
/// updating  //////////////////////////////
Route ::post('update/','updatemember');

// calling Join Route
Route::get('join','joinD');

// one To one Raltion ship
Route::get('OneToOne','oneToOne');
// one To Many Raltion ship
Route::get('oneTomany','oneTomany');
///////////// sessing using Flash ///////////////////
// //////////////////////// geting form data /////////////////////////
Route ::post('/Addm','Add');
});
Route :: view('addm','addm');
// Enf addmember Conroller Route


//// Email Template
Route::get('mail', function () {
    return new Samplemail();
});

////////// Livewire form ////////////////
Route::get('/contact',ContactForm::class);
Route::get('/Allcontact',ShowContacts::class);

/// sendig email
Route::get('/sendEmail',[MailController::class,'sendmail']);
