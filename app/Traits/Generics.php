<?php

namespace app\Traits;

use App\Models\AllTransactions;
use App\Models\Coupones;
use App\Models\UnUsedCoupones;
use App\Models\PackagePlans;
use Carbon\Carbon;
use Illuminate\Support\Str;

trait Generics{

    // a function that generates a random unique ID
    function generateId(){
        $unique_id = (string) Str::uuid();
        $exploded = explode('-', $unique_id);
        $n_unique_id = $exploded[4];
        return $n_unique_id;
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
            'amount'=>$packageValue,
            'package'=>$packageName,
            'profit'=>$expected,
            'expire_at'=>$expire,
            'days_left'=>30
        ]);
        $unused = UnUsedCoupones::where('coupone_code', $req->coupone_code)->first();
        $unused->update([
        'status'=>"Used"
        ]);
        AllTransactions::create([
            'trans_id'=>$this->generateRand(),
            'email'=>$email,
            'coupone_code'=>$req->coupone_code,
            'trans_type'=> "Investment",
            'package'=>$packageName,
            'amount'=>$packageValue
        ]);
    }
}