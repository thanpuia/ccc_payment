<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

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

Route::get('rate/get',[PaymentController::class,'index']);
Route::post('payment/create',[PaymentController::class,'store']);

Route::post('customer/store',[CustomerController::class,'store']);
Route::get('customer',[CustomerController::class,'index']);

Route::post("login",[UserController::class,'index']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's

    });