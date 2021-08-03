<?php

namespace App\Console\Commands;

use App\Models\Coupones;
use Illuminate\Console\Command;


class CheckActiveCoupon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:active';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return 0;
        $expiration = Coupones::where('status', "Active")->where('expire_at', '<=', now());//->get();
        // if(count($expiration) > 0){
        //     foreach($expiration as $k => $eachExpiration){
        //         $eachExpiration->status = 'Expired';
        //         $eachExpiration->save();
        //     }
        // }
        $expiration->update(['status' => "Expired"]);
        

        $coupons = Coupones::all();
        foreach ($coupons as $coupon) {
            if($coupon->days_left > 0){
                $coupon->days_left = $coupon->days_left - 1;
                $coupon->save();
            } 
        }    
    }
}
