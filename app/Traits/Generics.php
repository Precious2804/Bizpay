<?php

namespace app\Traits;

use App\Models\AllTransactions;
use App\Models\BankCodes;
use App\Models\Coupones;
use App\Models\UnUsedCoupones;
use App\Models\PackagePlans;
use App\Models\RefWithdraw;
use App\Models\User;
use App\Models\VendorAccount;
use App\Models\WithdrwaRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait Generics{

    function landingDynamic($page){
        $siteName = ['siteName'=>"Bizpay Global"];
        $whatsAppPhone = ['whatsAppPhone'=>"2349123652607"];
        $phone = ['phone'=>"882-569-756"];
        $email = ['email'=>"info@bizpayglobal.com"];
        $address = ['address'=>"4578 Marmora Road, NG"];

        return view($page)->with($siteName)
                            ->with($whatsAppPhone)
                            ->with($phone)
                            ->with($email)
                            ->with($address);
    }

    function dynamicPage($page){
        $user = ['loggedUserInfo'=>User::where('email', auth()->user()->email)->first()];
        $coupone = ['couponeDetails'=>Coupones::where('user_email', auth()->user()->email)->first()];
        $transact = ['transact'=>AllTransactions::where('email', auth()->user()->email)->get()];
        $packages = ['packages'=>PackagePlans::all()];
        $registerRoute = route('auth.register');
        $unique_id = $user['loggedUserInfo']['unique_id'];
        $routeName = ['routeName'=>$registerRoute."?referral=".$unique_id];
        $refReqDetails = ['refReqDetails'=>RefWithdraw::where('email', auth()->user()->email)->first()];
        $bank = ['bank'=>BankCodes::all()];
        return view($page)->with($user)
                            ->with($coupone)
                            ->with($transact)
                            ->with($packages)
                            ->with($routeName)
                            ->with($refReqDetails)
                            ->with($bank);
    }

    function calculateAge($req){
        $expDate = explode('-', $req->date);
        $year = $expDate[0];
        $expCurr = explode('-', Carbon::now());
        $currYear = $expCurr[0];
        $age = $currYear - $year;
        if($age < 18){
            return back()->with('ageFail', "You must be Above 18 Years of Age to Register");
        }    
    }

    // a function that generates a random unique ID
    function generateId(){
        $unique_id = (string) Str::uuid();
        $exploded = explode('-', $unique_id);
        $n_unique_id = $exploded[4];
        return $n_unique_id;
    }

    function createUniqueID($table, $column){
        $id = $this->generateId();
        return DB::table($table)->where($column, $id)->first() ? $this->createUniqueID($table, $column) :  $id;
    }

    //a function that generates random numbers
    function generateRand(){
        $random = rand(100000, 999999);
        return $random;
    }
    function usingAcoupone($email, $req){
        $getPackage = PackagePlans::where('value', $req->value)->first();
        $packageValue = $getPackage->value;
        $packageName = $getPackage->package;
        $expected = $getPackage->min_withdraw;
        $expire = Carbon::now()->addDays(30);
        Coupones::create([
            'unique_id'=>$this->generateRand(),
            'coupone_code'=>$req->coupone_code,
            'user_email'=>$email,
            'status'=>"Active",
            'package'=>$packageName,
            'amount'=>$packageValue,
            'profit'=>$expected,
            'expire_at'=>$expire,
            'days_left'=>30
        ]);
        $amount = $packageValue;
        $unused = UnUsedCoupones::where('coupone_code', $req->coupone_code)->first();
        $unused->update([
        'status'=>"Used"
        ]);
        $this->updateCouponeTrans($req, $email, $packageName, $amount);
    }

    function updateCouponeTrans($req, $email, $packageName, $amount){
        $trans_type = "Investment";
        $coupone_code = $req->coupone_code;
        AllTransactions::create([
            'trans_id'=>$this->generateRand(),
            'email'=>$email,
            'coupone_code'=>$coupone_code,
            'trans_type'=> $trans_type,
            'package'=>$packageName,
            'amount'=>$amount,
            'status'=>"Awaiting Withdrawal"
        ]);
    }
}