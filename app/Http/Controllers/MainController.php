<?php

namespace App\Http\Controllers;

use App\Models\AllTransactions;
use App\Models\ContactMessages;
use App\Models\Coupones;
use App\Models\EmailVerifyToken;
use App\Models\LoanRequests;
use App\Models\PackagePlans;
use App\Models\ReferralTable;
use App\Models\RefWithdraw;
use App\Models\UnUsedCoupones;
use App\Models\User;
use App\Models\VendorAccount;
use App\Models\WithdrwaRequest;
use App\Notifications\CreatedInvestment;
use App\Notifications\LoanRequest;
use App\Notifications\VerifyEmailNotification;
use App\Notifications\WithdrawalRequestNotification;
use Illuminate\Http\Request;
use App\Traits\Generics;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    use Generics;

    //
    public function about()
    {
        $page = 'about';
        return $this->landingDynamic($page);
    }
    public function aboutLoan()
    {
        $page = 'about-loan';
        return $this->landingDynamic($page);
    }
    public function howItWorks()
    {
        $page = 'how-it-works';
        return $this->landingDynamic($page);
    }
    public function terms()
    {
        $page = 'terms';
        return $this->landingDynamic($page);
    }
    public function packages()
    {
        $page = 'packages';
        $packages = ['packages'=>PackagePlans::all()];
        return $this->landingDynamic($page)->with($packages);
    }
    public function contact()
    {
        $page = 'contact';
        return $this->landingDynamic($page);
    }
    public function doContact(Request $req){
        ContactMessages::create([
            'message_id'=>$this->generateRand(),
            'name'=>$req->name,
            'email'=>$req->email,
            'subject'=>$req->subject,
            'message'=>$req->message
        ]);

        return back()->with('sent', "Message has been sent successfully to the admin");
    }
    public function resendEmail()
    {
        $page = 'auth.resend-email';
        return $this->landingDynamic($page);
    }
    public function resend(Request $req)
    {
        $req->validate([
            'email'=>'required|email'
        ]);
        $email = $req->email;
        $user = User::where('email', $email)->first();
        if(!$user){
            return back()->with('unknown', "This email address is not recognized");
        } else{
            $name = $user['first_name'];
            $token = $this->generateId();
            $user->notify(new VerifyEmailNotification($name, $email, $token));
            return back()->with('verifyEmail', "An Email Verification Link has been sent to the email address " . $email . " for veification. Do ensure to verify your email address before progressing!");
        }
    }
    public function getCoupon()
    {
        $page = 'get-coupon';
        $vendors = ['vendors' => VendorAccount::all()];
        return $this->landingDynamic($page)->with($vendors);
    }

    public function login()
    {
        $page = 'auth.login';
        return $this->landingDynamic($page);
    }
    public function completeVerification(Request $req)
    {
        $email = $req->email;
        $token = $req->token;
        if (EmailVerifyToken::where('token', $token)->exists() == true) {
            $page = 'complete-verification';

            $user = User::where('email', $email)->first();
            $user->update([
                'isVerified' => 1
            ]);
            $tok = EmailVerifyToken::where('token', $token)->first();
            $tok->delete();
            return $this->landingDynamic($page);
        }
    }


    public function register(Request $req)
    {
        $page = 'auth.register';
        $referID = ['referID' => $req->referral];
        $packages = ['packages' => PackagePlans::all()];
        return $this->landingDynamic($page)->with($referID)
            ->with($packages);
    }

    //checks the users inputs and perform sign in
    public function doLogin(Request $req)
    {
        $user = User::where('email', $req->email)->first();
        if (User::Where('email', $req->email)->exists() == true) {

            $credentials = ['email' => $req->email, 'password' => $req->password];
            if (Auth::validate($credentials) == true) {
                Auth::attempt($credentials, $req->remember_me == 'on' ? true : false);
                if ($user['isAdmin'] == 1) {
                    return redirect()->to(route('admin.dashboard'));
                } else {
                    if ($user['isVerified'] == 0) {
                        return back()->with('unverified', "This account has not been verified");
                    } else {
                        return redirect()->to(route('dashboard'));
                    }
                }
            } else {
                return redirect()->back()->with('info', 'Incorrect password!, please check your credentials and try again.')->withInput($req->only('loginEmail'));
            }
        } else {
            return redirect()->back()->with('infoEmail', 'Email address does not exist!, please check your credentials and try again.');
        }
    }

    public function doRegister(Request $req)
    {
        $req->validate([
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|unique:users',
            'date' => 'required',
            'coupone_code' => 'required|string',
            'value' => 'required',
            'password' => 'required|confirmed'
        ]);
        $getPackage = PackagePlans::where('value', $req->value)->first();
        $packageName = $getPackage->package;

        $selectCoupone = UnUsedCoupones::where('coupone_code', $req->coupone_code)
            ->where('package', $packageName)
            ->first();
        if (!$selectCoupone) {
            return back()->with('fail', 'Sorry! This Coupon is not Recognized for the selected Package , Kindly Re-confirm Coupone Code to Register');
        } else {
            if ($selectCoupone->status == "Used") {
                return back()->with('usedCoup', "Sorry! This Coupon Has already been used by another User");
            } else {
                $calAge = $this->calculateAge($req);
                if ($calAge) {
                    return $this->calculateAge($req);
                } else {
                    $unique_id = $this->generateRand();
                    $email = $req->email;
                    $result = User::create([
                        'unique_id' => $unique_id,
                        'first_name' => $req->first_name,
                        'last_name' => $req->last_name,
                        'email' => $req->email,
                        'phone' => $req->phone,
                        'date' => $req->date,
                        'coupone_code' => $req->coupone_code,
                        'package' => $packageName,
                        'password' => Hash::make($req->password)
                    ]);
                    if ($result) {
                        $this->usingAcoupone($email, $req);
                        $registeringUser = User::where('email', $req->email)->first();
                        //implementing the referral grants id a user uses a referral code
                        if ($req->referral) {
                            $userRef = User::where('unique_id', $req->referral)->first(); //get the user with the referral code used

                            //get the user's current package and the ref_bonus for the current package
                            $package = $userRef['package'];
                            $ref_package = PackagePlans::where('package', $package)->first();
                            $ref_bonus = $ref_package['ref_bonus'];

                            //calculate the referral user new referral bonus and update referral user details
                            $userCurrentRef = $userRef['ref_bonus'];
                            $newRefBonus = $userCurrentRef + $ref_bonus;
                            $userRef->update([
                                'ref_bonus' => $newRefBonus
                            ]);

                            //referral user details
                            $firstName = $userRef['first_name'];
                            $lastName = $userRef['last_name'];
                            $remail = $userRef['email'];
                            $registeringUser->update([
                                'referral' => $firstName . " " . $lastName,
                            ]);
                            ReferralTable::create([
                                'unique_id' => $this->generateRand(),
                                'referrer' => $remail,
                                'refered' => $req->email,
                                'ref_id' => $req->referral
                            ]);
                        } else {
                            $registeringUser->update([
                                'referral' => "None",
                                'ref_bonus' => "0"
                            ]);
                        }
                        //sending the mail
                        $name = $req->first_name;
                        $token = $this->generateId();
                        $userDet = User::where('email', $email)->first();
                        $userDet->notify(new VerifyEmailNotification($name, $email, $token));
                        EmailVerifyToken::create([
                            'token' => $token,
                            'email' => $email
                        ]);
                        return back()->with('verifyEmail', "An Email Verification Link has been sent to the email address " . $email . " for veification. Do ensure to verify your email address before progressing!");
                    }
                }
            }
        }
    }

    //logout method
    public function logout()
    {
        Auth::logout();
        return redirect('auth/login');
    }

    public function profile()
    {
        $page = 'profile';
        return $this->dynamicPage($page);
    }

    public function updateProfile(Request $req)
    {
        $user = User::where('email', auth()->user()->email)->first();
        $result = $user->update([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'phone' => $req->phone,
        ]);
        if ($result) {
            return back()->with('success', "Profile Updated Successfully");
        }
    }
    // update picture method
    public function updatePicture(Request $req)
    {
        //find logged in user
        $data = User::where('email', auth()->user()->email)->first();
        $req->validate([
            'image' => 'required|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);
        if ($req->file()) {
            $name = time() . '_' . $req->image->getClientOriginalName();
            $filePath = $req->file('image')->storeAs('uploads', $name, 'public');

            $data->image = '/storage/' . $filePath;
            $data->save();
        }
        return back()->with('successPic', 'Profile Picture Uploaded Successfully');
    }

    public function dashboard()
    {
        $page = 'dashboard';
        return $this->dynamicPage($page);
    }

    public function invest()
    {
        $page = 'invest';
        return $this->dynamicPage($page);
    }

    public function reInvest(Request $req)
    {
        $req->validate([
            'coupone_code' => 'required|string',
            'value' => 'required'
        ]);
        $getPackage = PackagePlans::where('value', $req->value)->first();
        $packageName = $getPackage->package;
        $coupone = $req->coupone_code;
        $name = auth()->user()->first_name;
        $user = User::where('email', '=', auth()->user()->email)->first();
        $email = $user->email;
        $selectCoupone = UnUsedCoupones::where('coupone_code', $coupone)
            ->where('package', $packageName)
            ->first();
        if (!$selectCoupone) {
            return back()->with('fail', "Coupone is not Recognized for the selected package plan, Kindly Re-confirm the coupone details and Try again");
        } else {
            if ($selectCoupone->status == "Used") {
                return back()->with('usedCoup', "Sorry! This Coupon Has already been used by another User");
            } else {
                $expected = $getPackage->min_withdraw;
                $expire = Carbon::now()->addDays(30);
                $amount = $req->value;
                $seclectEmailCoup = Coupones::where('user_email', $email)->first();
                $user->update([
                    'coupone_code' => $coupone
                ]);
                $seclectEmailCoup->update([
                    'unique_id' => $this->generateRand(),
                    'coupone_code' => $coupone,
                    'user_email' => $email,
                    'status' => "Active",
                    'package' => $packageName,
                    'amount' => $amount,
                    'profit' => $expected,
                    'expire_at' => $expire,
                    'days_left' => 30,
                ]);
                $unused = UnUsedCoupones::where('coupone_code', $coupone)->first();
                $unused->update([
                    'status' => "Used"
                ]);
                $this->updateCouponeTrans($req, $email, $packageName, $amount);
                $user->notify(new CreatedInvestment($name, $email, $packageName, $amount, $coupone));
                return back()->with('success', "Re-investment was successful");
            }
        }
    }
    public function withdraw()
    {
        $page = 'withdraw';
        return $this->dynamicPage($page);
    }

    public function doWithdraw(Request $req)
    {
        $req->validate([
            'coupone_code' => 'unique:withdrwa_requests'
        ]);
        $email = auth()->user()->email;
        $username = auth()->user()->first_name . " " . auth()->user()->last_name;
        $user = User::where('email', $email)->first();
        $phone = $user['phone'];
        $coupone = $req->coupone_code;
        $couponeDetails = Coupones::where('coupone_code', $coupone)->first();
        $coupPackage = $couponeDetails['package'];
        $coupAmount = $couponeDetails['amount'];
        $coupProfit = $couponeDetails['profit'];
        $coupStatus = $couponeDetails['status'];
        $unique_id = $this->generateRand();
        if ($coupStatus == "Expired") {
            $result = WithdrwaRequest::create([
                'unique_id' => $unique_id,
                'email' => $email,
                'phone' => $phone,
                'coupone_code' => $coupone,
                'package' => $coupPackage,
                'amount' => $coupAmount,
                'profit' => $coupProfit,
                'status' => "Awaiting Payment"
            ]);
            if ($result) {
                $couponeDetails->update([
                    'status' => "Awaiting Payment"
                ]);
                $user->notify(new WithdrawalRequestNotification($email, $coupAmount, $coupPackage, $username, $coupProfit, $coupone));
                return back()->with("success", "Your Withdrawal Request was received successfully. Please hold on for a while, as we Process your payment. Thank you");
            }
        } elseif ($coupStatus != "Expired") {
            return back()->with('failed', "Sorry! You cannot Withdraw this Coupon Investment, Thank You");
        }
    }

    public function confirmPay(Request $req)
    {
        $selectTrans = AllTransactions::where('coupone_code', $req->coupone_code)
            ->where('trans_type', "Withdrawal")->first();
        if ($selectTrans) {
            return back()->with('alreadyExists', "Sorry, This coupon has already been withdrawn and paid for");
        }
        $selectCoup = Coupones::where('coupone_code', $req->coupone_code)->first();
        $selectWithdraw = WithdrwaRequest::where('coupone_code', $req->coupone_code)->first();

        $result = $selectCoup->update([
            'status' => "Payment Completed"
        ]);
        if ($result) {
            $selectWithdraw->update([
                'status' => "Payment Completed"
            ]);
            $email = auth()->user()->email;
            $trans_type = "Withdrawal";
            $packageName = $selectCoup['package'];
            $amount = $selectCoup['profit'];
            $coupone = $req->coupone_code;
            AllTransactions::create([
                'trans_id' => $this->generateRand(),
                'email' => $email,
                'coupone_code' => $coupone,
                'trans_type' => $trans_type,
                'package' => $packageName,
                'amount' => $amount,
                'status' => "Withdrawal Completed"
            ]);
            return back()->with('successPay', "Payment has been Completed and Confirmed Successfully");
        }
    }

    public function referral()
    {
        $page = 'referral';
        return $this->dynamicPage($page);
    }
    public function withdrawBonus(Request $req)
    {
        $req->validate([
            'ref_id' => 'unique:ref_withdraws'
        ]);
        $user = User::where('email', auth()->user()->email)->first();
        $phone = $user['phone'];
        $bonus_amount = $req->bonus_amount;

        if ($bonus_amount < 10000) {
            return back()->with('fail', "You are currently not eligible to Withdraw your referral bonus");
        } else {
            $result = RefWithdraw::create([
                'unique_id' => $this->generateRand(),
                'ref_id' => $req->ref_id,
                'email' => auth()->user()->email,
                'phone' => $phone,
                'bonus_amount' => $bonus_amount,
                'status' => "Awaiting Response"
            ]);
            if ($result) {
                return back()->with('success', "Your Request to withdraw your bonus has been received Successfully");
            }
        }
    }
    public function confirmRef(Request $req)
    {
        $user = User::where('unique_id', $req->ref_id)->first();
        $selectRefWith = RefWithdraw::where('ref_id', $req->ref_id)->first();
        if ($selectRefWith) {
            $selectRefWith->update([
                'status' => "Payment Completed"
            ]);
            AllTransactions::create([
                'trans_id' => $this->generateRand(),
                'coupone_code' => "Ref Bonus",
                'package' => "Ref Boonus",
                'email' => auth()->user()->email,
                'trans_type' => "Ref Bonus",
                'amount' => $req->bonus_amount,
                'status' => "Payment Completed"
            ]);
            $user->update([
                'ref_bonus' => "0"
            ]);

            return back()->with('successConfirm', "Referral Bonus has been confirmed as Received");
        }
    }

    public function loan()
    {
        $page = 'loan';
        return $this->dynamicPage($page);
    }

    public function getLoan(Request $req)
    {
        $checkEmail = User::where('email', '=', $req->email)->first();
        $email = $req->email;
        $username = $req->fname . " " . $req->lname;
        $reasons = $req->reasons;
        $duration = $req->duration;
        $amount = $req->amount;
        $req->validate([
            'email' => 'required|email',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'phone' => 'required|max:12',
            'duration' => 'required',
            'amount' => 'required',
            'reasons' => 'required',
            'document' => 'required|mimes:png,jpg,jpeg,gif,svg|max:4096'
        ]);
        if (!$checkEmail) {
            return back()->with('invalid', "Your Email Address is not Registered on Bizpay, please create an Account first on our Platform to Use this feature, Thank You");
        } else {
            //if request has a file type
            if ($req->file()) {
                $name = time() . '_' . $req->document->getClientOriginalName();
                $filePath = $req->file('document')->storeAs('uploads', $name, 'public');

                $loan_coupone = $this->generateId();
                $loan_id = $this->generateRand();
                //creates the message
                $result = LoanRequests::create([
                    'loan_id' => $loan_id,
                    'loan_coupone' => $loan_coupone,
                    'email' => $req->email,
                    'fname' => $req->fname,
                    'lname' => $req->lname,
                    'phone' => $req->phone,
                    'duration' => $req->duration,
                    'amount' => $req->amount,
                    'reasons' => $req->reasons,
                    'document' => $filePath,
                    'status' => "Awaiting Approval"
                ]);
                if ($result) {
                    AllTransactions::create([
                        'trans_id' => $loan_id,
                        'coupone_code' => $loan_coupone,
                        'package' => "Loan Package",
                        'email' => $req->email,
                        'trans_type' => "Loan",
                        'amount' => $req->amount,
                        'status' => "Awaiting Approval"
                    ]);
                    $checkEmail->notify(new LoanRequest($email, $loan_coupone, $username, $reasons, $duration, $amount));
                    return back()->with('success', "Your Loan Request has been Sent and is Awaiting Confirmation");
                }
            }
        }
    }
    public function newCoupone()
    {
        $page = 'new_coupone';
        return $this->dynamicPage($page);
    }
}
