<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAuthController;

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
    return view('homepage');
});

Route::get('login',[UserAuthController::class,'login']);

Route::get('register',[UserAuthController::class,'register']);

Route::post('newUser',[UserAuthController::class,'newUser'])->name('auth.newUser');

Route::post('check',[UserAuthController::class,'check'])->name('auth.check');

Route::get('profile',[UserAuthController::class,'profile']);

Route::get('logout',[UserAuthController::class,'logout']);
