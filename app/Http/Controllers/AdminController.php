<?php

namespace App\Http\Controllers;

use App\Models\AllTransactions;
use App\Models\LoanCoupones;
use App\Models\LoanRequests;
use Illuminate\Http\Request;
use App\Models\UnUsedCoupones;
use App\Models\PackagePlans;
use App\Models\RefWithdraw;
use App\Models\User;
use App\Models\VendorAccount;
use App\Models\WithdrwaRequest;
use App\Notifications\ApprovedLoanNotification;
use App\Traits\Generics;

class AdminController extends Controller
{
    use Generics;
    //
    public function dashboard(){
        $users = ['users'=>User::count('unique_id')];
        $transacts = ['transacts'=>AllTransactions::count('trans_type')];
        $loan = ['loan'=>LoanRequests::where('status', "Awaiting Approval")->count()];
        $withdraw = ['withdraw'=>WithdrwaRequest::where('status', "Awaiting Payment")->count()];
        $allwith = ['allwith'=>WithdrwaRequest::all()];
        return view('admin.dashboard')->with($users)
                                        ->with($transacts)
                                        ->with($loan)
                                        ->with($withdraw)
                                        ->with($allwith);
    }

    public function createPackage(){
        $packages = ['packages'=>PackagePlans::all()];
        return view('admin.create_package')->with($packages);
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
        $allcoupones = ['allcoupones'=>UnUsedCoupones::all()];
        return view('admin.create_coupone')->with($allcoupones);
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
            return back()->with('created', "Coupone Code Has been Created Successfully!");
        }
    }
    public function allUsers(){
        $allusers = ['allusers'=>User::all()];
        return view('admin.all_users')->with($allusers);
    }
    public function delUser($unique_id){
        $findID = User::where('unique_id', $unique_id)->first();
        $result = $findID->delete();
        if($result){
            return back()->with('success', "User has been deleted Successfully!");
        }
    }
    
    public function withdraw(){
        $allwith = ['allwith'=>WithdrwaRequest::all()];
        return view('admin.withdraw')->with($allwith);
    }
    public function delWith($unique_id){
        $findID = WithdrwaRequest::where('unique_id', $unique_id)->first();
        $result = $findID->delete();
        if($result){
            return back()->with('success', "Request has been deleted Successfully!");
        }
    }
    public function loan(){
        $allloan = ['allloan'=>LoanRequests::all()];
        return view('admin.loan')->with($allloan);
    }
    public function approve($loan_id){
        $findID = LoanRequests::where('loan_id', $loan_id)->first();
        $email = $findID['email'];
        $username = $findID['fname']." ".$findID['lname'];
        $loan_coupone = $findID['loan_coupone'];
        $amount = $findID['amount'];

        $user = User::where('email', $email)->first();

        $finIDinTrans = AllTransactions::where('trans_id', $loan_id)->first();
        $result = $findID->update([
            'status'=>"Approved"
        ]);
        if($result){
            $finIDinTrans->update([
                'status'=>"Approved"
            ]);
            $user->notify(new ApprovedLoanNotification($email, $loan_coupone, $amount, $username));
            return back()->with('success', "Loan of ID $loan_id has been approved successfully");
        }
    }
    public function referral(){
        $allreferral = ['allreferral'=>RefWithdraw::all()];
        return view('admin.referral')->with($allreferral);
    }
    public function vendor(){
        $vendors = ['vendors'=>VendorAccount::all()];
        return view('admin.vendor')->with($vendors);
    }
    public function creatingVendor(Request $req){
        
        $req->validate([
            'name'=>'required|string|unique:vendor_accounts',
            'phone'=>'required|string|unique:vendor_accounts',
            'image'=>'image|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);
        $splitNumber = ltrim($req->phone, '0');
        $phone = "234".$splitNumber;
        if($req->file()) {
            $name = time().'_'.$req->image->getClientOriginalName();
            $filePath = $req->file('image')->storeAs('VendorPics', $name, 'public');
        } 
        else{
            $filePath = "No Image";
        }
        VendorAccount::create([
            'vendor_id'=>$this->generateRand(),
            'name'=>$req->name,
            'phone'=>$phone,
            'image'=>$req->image = '/storage/' . $filePath
        ]);
        return back()->with('created', "$req->name has been created successfully");
    }
    public function delVendor($vendor_id){
        $findVendor = VendorAccount::where('vendor_id', $vendor_id)->first();
        $findVendor->delete();
        return back()->with('deleted', "Vendor has been deleted Successfully");
    }
}
