<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// //////////////////////// Insert Route data /////////////////////////
Route::post('/Student',[ApiController::class,'addmember']
);

// //////////////////////// Update Routedata /////////////////////////
Route::put('/update/{id}',[ApiController::class,'updatemember']
);
// //////////////////////// Delete Routedata /////////////////////////
Route::delete('/delete/{id}',[ApiController::class,'deleteemember']
);
// ///////// Showing data
Route::get('/Show/{id}',[ApiController::class,'show']
);
// ///////// Showing Alldata
Route::get('/ShowAll',[ApiController::class,'showAll']
);

// ///////// uploading FIlle
Route::post('/file',[ApiController::class,'upload']
);
