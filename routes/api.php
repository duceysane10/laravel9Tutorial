<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


////// Public Routes
// ///////// Showing data
Route::get('/Show/{id}',[ApiController::class,'show']
);
// ///////// Registaring user
Route::post('/register',[AuthController::class,'register']
);
// ///////// Login user
Route::get('/login',[AuthController::class,'login']
);
// ///////// Showing Alldata
Route::get('/ShowAll',[ApiController::class,'showAll']
);
///////// Search by name
Route::get('/search/{name}',[ApiController::class,'search']
);



// Protucted Routes
Route::group(['middleware' => ['auth:sanctum']],function () {
// //////////////////////// Insert Route data /////////////////////////
Route::post('/Student',[ApiController::class,'addmember']
);
// //////////////////////// Update Routedata /////////////////////////
Route::put('/update/{id}',[ApiController::class,'updatemember']
);
// //////////////////////// Delete Routedata /////////////////////////
Route::delete('/delete/{id}',[ApiController::class,'deleteemember']
);
// ///////// uploading FIlle
Route::post('/file',[ApiController::class,'upload'
]);
// ///////// Logout
Route::post('/logout',[AuthController::class,'logout']);
});



