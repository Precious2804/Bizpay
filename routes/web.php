<?php

use App\Http\Controllers\MainController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::post('/do-login', [MainController::class, 'doLogin'])->name('do-login');
Route::get('auth/register', [MainController::class, 'register'])->name('auth.register');
Route::post('/do-register', [MainController::class, 'doRegister'])->name('do-register');

Route::group(['middleware'=>['authCheck']], function(){
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [MainController::class, 'logout'])->name('logout');
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::post('/update_profile', [MainController::class, 'updateProfile'])->name('update_profile');
    Route::post('/update_pic', [MainController::class, 'updatePicture'])->name('update_pic');
    Route::get('/invest', [MainController::class, 'invest'])->name('invest');
    Route::get('/withdraw', [MainController::class, 'withdraw'])->name('withdraw');
    Route::get('/referral', [MainController::class, 'referral'])->name('referral');
    Route::get('/loan', [MainController::class, 'loan'])->name('loan');
    Route::get('/new_coupone', [MainController::class, 'newCoupone'])->name('new_coupone');
    Route::post('/re_invest', [MainController::class, 'reInvest'])->name('re_invest');
});