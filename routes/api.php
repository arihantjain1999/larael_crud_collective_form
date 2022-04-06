<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SetDataController;
use App\Http\Controllers\API\ApiLoginController;
use Laravel\Passport\Passport;
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
// Route::post('/create',[SetDataController::class,'create']);
// Route::get('/delete',[SetDataController::class,'destroy']);
// Route::post('/update',[SetDataController::class,'update']);
// Route::get('/show',[SetDataController::class,'show']);
// Route::get('/index',[SetDataController::class,'index']);
// Route::get('/index1',[SetDataController::class,'index1']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register',[ApiLoginController::class,'register']);
Route::post('login',[ApiLoginController::class,'login']);
//add this middleware to ensure that every request is authenticated
Route::middleware('auth:api')->group(function(){
    Route::get('user', [ApiLoginController::class,'authenticated']);
    Route::post('/create',[SetDataController::class,'create']);
    Route::get('/delete',[SetDataController::class,'destroy']);
    Route::post('/update',[SetDataController::class,'update']);
    Route::get('/show',[SetDataController::class,'show']);
    Route::get('/index',[SetDataController::class,'index']);
    Route::post('/logout',[ApiLoginController::class,'logout']);

});

