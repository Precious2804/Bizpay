<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Models\PackagePlans;
use App\Models\User;
use App\Models\VendorAccount;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
    $siteName = ['siteName' => env('APP_NAME') ];
    $whatsAppPhone = ['whatsAppPhone' => "2349123652607"];
    $phone = ['phone' => "882-569-756"];
    $email = ['email' => "info@millionairareclub.com"];
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

Route::get('/clear-cache', function(){
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');

    return "DONE";
});

Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::post('/do-login', [MainController::class, 'doLogin'])->name('do-login');
Route::get('auth/register', [MainController::class, 'register'])->name('auth.register');
Route::get('auth/resend-email', [MainController::class, 'resendEmail'])->name('auth.resend-email');
Route::post('/do-register', [MainController::class, 'doRegister'])->name('do-register');
Route::post('/resend', [MainController::class, 'resend'])->name('resend');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/about-loan', [MainController::class, 'aboutLoan'])->name('about-loan');
Route::get('/loan-page', [MainController::class, 'loanPage'])->name('loan-page');
Route::get('/how-it-works', [MainController::class, 'howItWorks'])->name('how-it-works');
Route::get('/terms', [MainController::class, 'terms'])->name('terms');
Route::get('/packages', [MainController::class, 'packages'])->name('packages');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::post('/do-contact', [MainController::class, 'doContact'])->name('do-contact');
Route::get('/get-coupon', [MainController::class, 'getCoupon'])->name('get-coupon');
Route::get('/complete-verification', [MainController::class, 'completeVerification'])->name('complete-verification');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [MainController::class, 'logout'])->name('logout');
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::post('/update_profile', [MainController::class, 'updateProfile'])->name('update_profile');
    Route::post('/account_valid', [MainController::class, 'validateAccount'])->name('account_valid');
    Route::post('/update_account', [MainController::class, 'updateAccount'])->name('update_account');
    Route::post('/update_pic', [MainController::class, 'updatePicture'])->name('update_pic');
    Route::get('/invest', [MainController::class, 'invest'])->name('invest');
    Route::get('/payment_details', [MainController::class, 'payment_details'])->name('payment_details');
    Route::get('/withdraw', [MainController::class, 'withdraw'])->name('withdraw');
    Route::get('/referral', [MainController::class, 'referral'])->name('referral');
    Route::get('/loan', [MainController::class, 'loan'])->name('loan');
    Route::get('/new_coupone', [MainController::class, 'newCoupone'])->name('new_coupone');
    Route::post('/re_invest', [MainController::class, 'reInvest'])->name('re_invest');
    Route::get('/activate_acct', [MainController::class, 'activate_acct'])->name('activate_acct');
    Route::get('/do_withdraw', [MainController::class, 'doWithdraw'])->name('do_withdraw');
    Route::post('/confirm_pay', [MainController::class, 'confirmPay'])->name('confirm_pay');
    Route::post('/get_loan', [MainController::class, 'getLoan'])->name('get_loan');
    Route::post('/withdraw_bonus', [MainController::class, 'withdrawBonus'])->name('withdraw_bonus');
    Route::post('/confirm_ref', [MainController::class, 'confirmRef'])->name('confirm_ref');
});


//admin controller
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('/admin/create_package', [AdminController::class, 'createPackage'])->name('admin.create_package');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/invest', [AdminController::class, 'invest'])->name('admin.invest');
    Route::get('/admin/withdraw', [AdminController::class, 'withdraw'])->name('admin.withdraw');
    Route::get('/admin/all_users', [AdminController::class, 'allUsers'])->name('admin.all_users');
    Route::get('/admin/activate', [AdminController::class, 'activate'])->name('admin.activate');
    Route::get('/delete-user/{unique_id}', [AdminController::class, 'delUser'])->name('delete-user');
    Route::get('/delete-with/{unique_id}', [AdminController::class, 'delWith'])->name('delete-with');
    Route::post('/creating_package', [AdminController::class, 'creatingPackage'])->name('creating_package');
    Route::get('/admin/create_coupone', [AdminController::class, 'createCoupone'])->name('admin.create_coupone');
    Route::get('/admin/coupone/{package_id}', [AdminController::class, 'coupone'])->name('admin.coupone');
    Route::get('/admin/loan', [AdminController::class, 'loan'])->name('admin.loan');
    Route::get('/admin/bank', [AdminController::class, 'bank'])->name('admin.bank');
    Route::get('/admin/referral', [AdminController::class, 'referral'])->name('admin.referral');
    Route::get('/admin/contact', [AdminController::class, 'contact'])->name('admin.contact');
    Route::post('/create_coup', [AdminController::class, 'creatingCoupone'])->name('create_coup');
    Route::get('/approve/{loan_id}', [AdminController::class, 'approve'])->name('approve');
    Route::get('/admin/vendor', [AdminController::class, 'vendor'])->name('admin.vendor');
    Route::post('/create-vendor', [AdminController::class, 'creatingVendor'])->name('create-vendor');
    Route::post('/update_admin_bank', [AdminController::class, 'update_admin_bank'])->name('update_admin_bank');
    Route::get('/del-vendor/{vendor_id}', [AdminController::class, 'delVendor'])->name('del-vendor');
    Route::get('/del-coup/{coupone_code}', [AdminController::class, 'delCoup'])->name('del-coup');
    Route::get('/del_pack/{package_id}', [AdminController::class, 'delPack'])->name('del_pack');
    Route::get('/cancel_invest', [AdminController::class, 'cancel_invest'])->name('cancel_invest');
    Route::get('/activate_invest', [AdminController::class, 'activate_invest'])->name('activate_invest');
    Route::get('/confirm_invest', [AdminController::class, 'confirm_invest'])->name('confirm_invest');
    Route::get('/approve_with', [AdminController::class, 'approve_with'])->name('approve_with');
    Route::get('/delete_with', [AdminController::class, 'delete_with'])->name('delete_with');
    Route::get('/activate_now', [AdminController::class, 'activate_now'])->name('activate_now');
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
                    // 'password' => Hash::make($password)
                    'password' => $password
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
