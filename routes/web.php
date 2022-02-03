<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::get('/logout', [LoginController::class,'logout']);
Route::get('/register', [RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'store']);
Route::group(['prefix'=>'verification','middleware'=>'auth'],function(){
    Route::get('/', [VerificationController::class,'index']);
    Route::get('verify/{id}',[VerificationController::class,'verifyToken']);
    Route::get('/resend',[VerificationController::class,'resendToken']);
});

Route::get('/', [HomeController::class,'index']);

Route::group(['prefix'=>'manage'],function(){
    Route::group(['prefix'=>'category'],function(){
        Route::get('/', [CategoryController::class,'index']);
        Route::post('/create',[CategoryController::class,'store']);
        Route::post('/edit/{id}',[CategoryController::class,'update']);
        Route::post('/delete/{id}',[CategoryController::class,'destroy']);
    });
    Route::group(['prefix'=>'product'],function(){
        Route::get('/', [ProductController::class,'index']);
        Route::post('/create',[ProductController::class,'store']);
        Route::post('/edit/{id}',[ProductController::class,'update']);
        Route::post('/delete/{id}',[ProductController::class,'destroy']);
    });
});
