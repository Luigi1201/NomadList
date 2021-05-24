<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CityDataController;
use App\Http\Controllers\CittaHomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RecensioneController;
use App\Http\Controllers\RicercaController;
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

Route::get('/',[CittaHomeController::class,'datiCitta'])->name('homepage');

Route::post('newUser',[UserAuthController::class,'newUser'])->name('auth.newUser');

Route::post('check',[UserAuthController::class,'check'])->name('auth.check');

Route::get('logout',[UserAuthController::class,'logout']);

Route::middleware('AlreadyLogged') ->group(function(){
    Route::get('login',[UserAuthController::class,'login']);
    Route::get('register',[UserAuthController::class,'register']);
});

Route::middleware('isLogged') ->group(function(){
    Route::get('profile',[UserAuthController::class,'profile']);
    Route::get('/{nome}',[CityDataController::class, 'getData']);
    Route::post('like',[LikeController::class, 'likeFunction'])->name('like');
    Route::post('recensione', [RecensioneController::class, 'recensioneFunction'])->name('recensione');
    Route::post('dropComment', [RecensioneController::class, 'dropRecensioneFunction'])->name('dropComment');
    Route::post('modifyComment', [RecensioneController::class, 'modifyCommentFunction'])->name('modifyComment');
});

Route::post('ricerca',[RicercaController::class, 'ricercaFunction']);