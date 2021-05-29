<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CityDataController;
use App\Http\Controllers\CittaHomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RecensioneController;
use App\Http\Controllers\RicercaController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

Route::post('ricerca',[RicercaController::class, 'ricercaFunction']);

Route::get('/',[CittaHomeController::class,'datiCitta'])->name('homepage');

Route::post('newUser',[UserAuthController::class,'newUser'])->name('auth.newUser');

Route::post('check',[UserAuthController::class,'checkLogin'])->name('auth.check');

Route::get('logout',[UserAuthController::class,'logout']);


Route::middleware('AlreadyLogged') ->group(function(){
    Route::get('login',[UserAuthController::class,'login']);
    Route::get('register',[UserAuthController::class,'register']);

    //RESET PASSWORD:
    Route::get('/forgot-password', function () {
        return view('Password.forgot-password');
    })->middleware('guest')->name('password.request');
    
    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);
    
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    })->middleware('guest')->name('password.email');
    
    Route::get('/reset-password/{token}', function ($token) {
        return view('Password.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');
    
    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|max:12|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
        
        return $status == Password::PASSWORD_RESET
                    //? back()->with('status', __($status))
                    ? redirect('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    })->middleware('guest')->name('password.update');
});

Route::middleware('isLogged') ->group(function(){
    Route::get('profile',[UserAuthController::class,'profile']);
    Route::get('/{nome}',[CityDataController::class, 'getData']);
    Route::post('like',[LikeController::class, 'likeFunction'])->name('like');
    Route::post('recensione', [RecensioneController::class, 'recensioneFunction'])->name('recensione');
    Route::post('dropComment', [RecensioneController::class, 'dropRecensioneFunction'])->name('dropComment');
    Route::post('modifyComment', [RecensioneController::class, 'modifyCommentFunction'])->name('modifyComment');
});