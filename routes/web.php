<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Models\PackagePlans;
use App\Models\User;
use App\Models\VendorAccount;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
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

function dyn($page)
{
    $siteName = ['siteName' => "Bizpay Global"];
    $whatsAppPhone = ['whatsAppPhone' => "2348098862800"];
    $phone = ['phone' => "882-569-756"];
    $email = ['email' => "info@bizpayglobal.com"];
    $address = ['address' => "4578 Marmora Road, NG"];
    $packages = ['packages'=>PackagePlans::all()];

    return view($page)->with($siteName)
                        ->with($whatsAppPhone)
                        ->with($phone)
                        ->with($email)
                        ->with($address)
                        ->with($packages);
}

Route::get('/', function () {
    $page = 'welcome';
    return dyn($page);
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
Route::get('/complete-verification', [MainController::class, 'completeVerification'])->name('complete-verification');

Route::group(['middleware' => ['auth']], function () {
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
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('/admin/create_package', [AdminController::class, 'createPackage'])->name('admin.create_package');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/withdraw', [AdminController::class, 'withdraw'])->name('admin.withdraw');
    Route::get('/admin/all_users', [AdminController::class, 'allUsers'])->name('admin.all_users');
    Route::get('/delete-user/{unique_id}', [AdminController::class, 'delUser'])->name('delete-user');
    Route::get('/delete-with/{unique_id}', [AdminController::class, 'delWith'])->name('delete-with');
    Route::post('/creating_package', [AdminController::class, 'creatingPackage'])->name('creating_package');
    Route::get('/admin/create_coupone', [AdminController::class, 'createCoupone'])->name('admin.create_coupone');
    Route::get('/admin/coupone/{package_id}', [AdminController::class, 'coupone'])->name('admin.coupone');
    Route::get('/admin/loan', [AdminController::class, 'loan'])->name('admin.loan');
    Route::get('/admin/referral', [AdminController::class, 'referral'])->name('admin.referral');
    Route::post('/create_coup', [AdminController::class, 'creatingCoupone'])->name('create_coup');
    Route::get('/approve/{loan_id}', [AdminController::class, 'approve'])->name('approve');
    Route::get('/admin/vendor', [AdminController::class, 'vendor'])->name('admin.vendor');
    Route::post('/create-vendor', [AdminController::class, 'creatingVendor'])->name('create-vendor');
    Route::get('/del-vendor/{vendor_id}', [AdminController::class, 'delVendor'])->name('del-vendor');
});


Route::get('/password.request', function () {
    $page = 'forgot';
    return dyn($page);
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    $email = $request->email;
    $checkEmail = User::where('email', $email)->first();
    if (!$checkEmail) {
        return back()->with('invalid', "This email address is not Registered on this Platform");
    } else {
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
})->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    $page = 'reset-password';
    $bnn = ['token' => $token];
    return dyn($page)->with($bnn);
})->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
    $checkEmail = User::where('email', $request->email)->first();
    if (!$checkEmail) {
        return back()->with('invalid', "Invalid Email Address");
    } else {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('auth.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
})->name('password.update');
