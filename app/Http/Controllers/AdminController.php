<?php

namespace App\Http\Controllers;

use App\Models\LoanCoupones;
use Illuminate\Http\Request;
use App\Models\UnUsedCoupones;
use App\Models\PackagePlans;
use App\Traits\Generics;

class AdminController extends Controller
{
    use Generics;
    //

    public function createPackage(){
        return view('admin.create_package');
    }
    public function creatingPackage(Request $req){
        $result = PackagePlans::create([
            'package_id'=>$this->generateRand(),
            'package'=>$req->package,
            'value'=>$req->value,
            'ref_bonus'=>$req->ref_bonus,
            'spons_bonus'=>$req->spons_bonus,
            'min_withdraw'=>$req->min_withdraw,
        ]);
        if($result){
            return "successfull";
        }
    }
    public function createCoupone(){
        return view('admin.create_coupone');
    }
    public function creatingCoupone(Request $req){
        $unique_id = $this->generateRand();
        $coupone_code = $this->generateId();

        $result = UnUsedCoupones::create([
            'unique_id'=>$unique_id,
            'coupone_code'=>$coupone_code,
            'status'=>"un-used"
        ]);
        if($result){
            return back()->with('created', "Coupone Code Created");
        }
    }
    
    // public function createLoanCoupone(){
    //     return view('admin.create_loan_coupone');
    // }
    // public function creatingLoanCoupone(Request $req){
    //     $unique_id = $this->generateRand();
    //     $loan_coupone = $this->generateId();

    //     $result = LoanCoupones::create([
    //         'unique_id'=>$unique_id,
    //         'loan_coupone'=>$loan_coupone,
    //         'status'=>"un-used"
    //     ]);
    //     if($result){
    //         return back()->with('created', "Coupone Code Created");
    //     }    
    // }
}
