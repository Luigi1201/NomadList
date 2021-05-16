<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CityDataController;
use App\Http\Controllers\CittaHomeController;
use App\Http\Controllers\LikeController;
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

Route::get('/',[CittaHomeController::class,'datiCitta']);

Route::get('login',[UserAuthController::class,'login'])->middleware('AlreadyLogged');

Route::get('register',[UserAuthController::class,'register'])->middleware('AlreadyLogged');

Route::post('newUser',[UserAuthController::class,'newUser'])->name('auth.newUser');

Route::post('check',[UserAuthController::class,'check'])->name('auth.check');

Route::get('profile',[UserAuthController::class,'profile'])->middleware('isLogged');

Route::get('logout',[UserAuthController::class,'logout']);

Route::get('/{nome}',[CityDataController::class, 'getData'])->middleware('isLogged');

Route::post('like',[LikeController::class, 'likeFunction'])->name('like');
