<?php

use App\Http\Controllers\AdminController;
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
    $siteName = ['siteName'=>"Bizpay Global"];
    $whatsAppPhone = ['whatsAppPhone'=>"2348098862800"];
    $phone = ['phone'=>"882-569-756"];
    $email = ['email'=>"info@bizpayglobal.com"];
    $address = ['address'=>"4578 Marmora Road, NG"];
    return view('welcome')->with($siteName)
                            ->with($whatsAppPhone)
                            ->with($phone)
                            ->with($email)
                            ->with($address);
})->name('welcome');
Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::post('/do-login', [MainController::class, 'doLogin'])->name('do-login');
Route::get('auth/register', [MainController::class, 'register'])->name('auth.register');
Route::post('/do-register', [MainController::class, 'doRegister'])->name('do-register');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/about-loan', [MainController::class, 'aboutLoan'])->name('about-loan');
Route::get('/how-it-works', [MainController::class, 'howItWorks'])->name('how-it-works');
Route::get('/terms', [MainController::class, 'terms'])->name('terms');
Route::get('/packages', [MainController::class, 'packages'])->name('packages');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/get-coupon', [MainController::class, 'getCoupon'])->name('get-coupon');

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
    Route::post('/do_withdraw', [MainController::class, 'doWithdraw'])->name('do_withdraw');
    Route::post('/confirm_pay', [MainController::class, 'confirmPay'])->name('confirm_pay');
    Route::post('/get_loan', [MainController::class, 'getLoan'])->name('get_loan');
    Route::post('/withdraw_bonus', [MainController::class, 'withdrawBonus'])->name('withdraw_bonus');
    Route::post('/confirm_ref', [MainController::class, 'confirmRef'])->name('confirm_ref');
});


//admin controller
Route::get('/admin/create_package', [AdminController::class, 'createPackage'])->name('admin.create_package');
Route::post('/creating_package', [AdminController::class, 'creatingPackage'])->name('creating_package');
Route::get('/admin/create_coupone', [AdminController::class, 'createCoupone'])->name('admin.create_coupone');
Route::post('/create_coup', [AdminController::class, 'creatingCoupone'])->name('create_coup');
