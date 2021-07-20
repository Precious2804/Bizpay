<?php

namespace App\Http\Controllers;

use App\Models\AllTransactions;
use App\Models\Coupones;
use App\Models\PackagePlans;
use App\Models\UnUsedCoupones;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\Generics;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    use Generics;
    //
    public function login(){
        return view('auth.login');
    } 
        //checks the users inputs and perform sign in
        public function doLogin(Request $req){
            //validating inputs
            $req->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $loggedUserInfo = User::where('email', '=', $req->email)->first();
    
            if (!$loggedUserInfo){
                return back()->with('fail', "Un-recognized Email Address");
            } else {
                //check password
                if (Hash::check($req->password, $loggedUserInfo->password)){
                    $req->session()->put('loggedUser', $loggedUserInfo->email);
                    return redirect('dashboard');
                } else {
                    return back()->with('fail', "Incorrect Password");
                }
            }
    
        }
    public function register(){
        $packages = ['packages'=>PackagePlans::all()];
        return view('auth.register', $packages);
    }
    public function doRegister(Request $req){
        $selectCoupone = UnUsedCoupones::where('coupone_code', $req->coupone_code)->first();
        if(!$selectCoupone){
            return back()->with('fail', "Coupone is not Recognized, Kindly Re-confirm Coupone Code to Register");
        } 
        else{
            $expDate = explode('-', $req->date);
            $year = $expDate[0];
            $expCurr = explode('-', Carbon::now());
            $currYear = $expCurr[0];
            $age = $currYear - $year;

            if($age < 18){
                return back()->with('ageFail', "You must be Above 18 Years of Age to Register");
            } 
            else{
                $req->validate([
                    'email'=>'required|email|unique:users',
                    'phone'=>'required|string',
                    'date'=>'required',
                    'coupone_code'=>'required|string',
                    'value'=>'required',
                    'password'=>'required|confirmed'
                ]);
                $unique_id = $this->generateRand();
                $email = $req->email;
                $result = User::create([
                    'unique_id'=>$unique_id,
                    'first_name'=>$req->first_name,
                    'last_name'=>$req->last_name,
                    'email'=>$req->email,
                    'phone'=>$req->phone,
                    'date'=>$req->date,
                    'coupone_code'=>$req->coupone_code,
                    'referral'=>$req->referral,
                    'password'=>Hash::make($req->password)
                ]);
                if($result){
                    $this->usingAcoupone($email, $req);
                    
                    return back()->with('success', "Successfull Registration");
                }
            }
            
        }
        
    }

        //logout method
    public function logout(){
        if (session()->has('loggedUser')){
            session()->pull('loggedUser');
            return redirect ('auth/login');
        }
    }

    public function profile(){
        $user = ['loggedUserInfo'=>User::where('email', '=', session('loggedUser'))->first()];
        return view('profile', $user);
    }

    public function updateProfile(Request $req){
        $user = User::where('email', '=', session('loggedUser'))->first();
        $result = $user->update([
            'first_name'=>$req->first_name,
            'last_name'=>$req->last_name,
            'phone'=>$req->phone,
        ]);
        if($result){
            return back()->with('success', "Profile Updated Successfully");
        }
    }
        // update picture method
        public function updatePicture(Request $req)
        {
            //find logged in user
            $data = User::find(session('loggedUser'));
    
            $req->validate([
                'image' => 'required|mimes:png,jpg,jpeg,gif,svg|max:2048'
                ]);
            
                if($req->file()) {
                    $name = time().'_'.$req->image->getClientOriginalName();
                    $filePath = $req->file('image')->storeAs('uploads', $name, 'public');
        
                    $data->image = '/storage/' . $filePath;
                    $data->save();
                }
        
                return back()->with('successPic','Profile Picture Uploaded Successfully');
            
        }

    public function dashboard(){
        $user = ['loggedUserInfo'=>User::where('email', '=', session('loggedUser'))->first()];
        $coupone = ['couponeDetails'=>Coupones::where('user_email', session('loggedUser'))->first()];
        $transact = ['transact'=>AllTransactions::where('email', session('loggedUser'))->get()];        
        return view('dashboard', $user)->with($coupone)
                                        ->with($transact);
    }

    public function invest(){
        $user = ['loggedUserInfo'=>User::where('email', '=', session('loggedUser'))->first()];
        $coupone = ['couponeDetails'=>Coupones::where('user_email', session('loggedUser'))->first()];
        $transact = ['transact'=>AllTransactions::where('email', session('loggedUser'))->get()];
        $packages = ['packages'=>PackagePlans::all()];
        return view('invest', $user)->with($coupone)
                                    ->with($transact)
                                    ->with($packages);
    }

    public function reInvest(Request $req){
        $user = User::where('email', '=', session('loggedUser'))->first();
        $email = $user->email;
        $selectCoupone = UnUsedCoupones::where('coupone_code', $req->coupone_code)->first();
        if(!$selectCoupone){
            return back()->with('fail', "Coupone is not Recognized, Kindly Re-confirm Coupone Code");
        }
        else{
            $req->validate([
                'coupone_code'=>'required|string',
                'value'=>'required'
            ]);
            $getPackage = PackagePlans::where('value', $req->value)->first();
            $packageName = $getPackage->package;
            $expected = $getPackage->min_withdraw;
            $expire = Carbon::now()->addDays(30);
            $amount = $req->amount;
            $seclectEmailCoup = Coupones::where('user_email', $email)->first();
            $user->update([
                'coupone_code'=>$req->coupone_code
            ]);
            $seclectEmailCoup->update([
                'unique_id'=> $this->generateRand(),
                'coupone_code'=>$req->coupone_code,
                'user_email'=>$email,
                'package'=>$packageName,
                'amount'=>$req->value,
                'profit'=>$expected,
                'expire_at'=>$expire,
                'days_left'=>30,
                'status'=>"Active"
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
                'amount'=>$amount
            ]);
            return back()->with('success', "Re-investment was successful");
        }

    }
    public function withdraw(){
        $user = ['loggedUserInfo'=>User::where('email', '=', session('loggedUser'))->first()];
        $coupone = ['couponeDetails'=>Coupones::where('user_email', session('loggedUser'))->first()];
        $transact = ['transact'=>AllTransactions::where('email', session('loggedUser'))->get()];
        return view('withdraw', $user)->with($coupone)
                                        ->with($transact);
    }
    public function referral(){
        $user = ['loggedUserInfo'=>User::where('email', '=', session('loggedUser'))->first()];
        return view('referral', $user);
    }
    public function loan(){
        $user = ['loggedUserInfo'=>User::where('email', '=', session('loggedUser'))->first()];
        return view('loan', $user);
    }
    public function newCoupone(){
        $user = ['loggedUserInfo'=>User::where('email', '=', session('loggedUser'))->first()];
        $coupone = ['couponeDetails'=>Coupones::where('email', session('loggedUser'))->first()];
        return view('new_coupone', $user)->with($coupone);
    }
}
