<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\log_in_out_Controller;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[registerController::class,'register']);
Route::post('/login',[log_in_out_Controller::class,'log_in']);
//Route::post('/logout',[log_in_out_Controller::class,'log_out']);
Route::post('/logcheck',[log_in_out_Controller::class,'logcheck']);
//getUserData
Route::post('/getUserData',[log_in_out_Controller::class,'getUserData']);
Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::post('/logout',[log_in_out_Controller::class,'log_out']);
    Route::post('/getUserData',[log_in_out_Controller::class,'getUserData']);
});